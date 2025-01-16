<?php

namespace app\models;

use app\query\ClientQuery;
use app\query\PaymentQuery;
use app\query\VisitProcedureQuery;
use app\query\VisitQuery;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "visit".
 *
 * @property int $id
 * @property int $client_id Клиент
 * @property string $visit_datetime Время визита
 * @property int $status Статус записи
 * @property-read null|string $statusName
 * @property-read null|string $statusColor
 * @property string|null $complaint Жалобы
 * @property VisitProcedure[] $visitProcedures Процедуры
 * @property Payment[] $payments Оплаты
 * @property int $debt Задолженность
 *
 * @property Client $client
 */
class Visit extends ActiveRecord
{
	/**
	 * Запись
	 */
	public const STATUS_OPEN = 0;
	
	/**
	 * Запланирован
	 */
	public const STATUS_PLAN = 1;
	
	/**
	 * Выполнено
	 */
	public const STATUS_COMPLETE = 5;
	
	/**
	 * Запись отменена
	 */
	public const STATUS_CANCEL = 9;
	
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'visit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['client_id', 'visit_datetime', 'status'], 'required'],
            [['client_id', 'status'], 'integer'],
	        ['status', 'default', 'value' => self::STATUS_OPEN],
            [['visit_datetime'], 'safe'],
            [['complaint'], 'string'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'Номер'),
            'client_id' => Yii::t('app', 'Клиент'),
            'visit_datetime' => Yii::t('app', 'Время визита'),
            'status' => Yii::t('app', 'Статус'),
	        'statusName' => Yii::t('app', 'Статус'),
	        'created_at' => Yii::t('app', 'Добавлено'),
            'complaint' => Yii::t('app', 'Жалобы'),
	        'clientName' => Yii::t('app', 'Клиент'),
	        'clientMobilePhone' => Yii::t('app', 'Моб. номер'),
	        'visitProcedures' => Yii::t('app', 'Процедуры'),
	        'payments' => Yii::t('app', 'Платежи'),
        ];
    }
	
	/**
	 * @return array
	 */
	public static function statusList(): array
	{
		return [
			self::STATUS_OPEN => 'Запись',
			self::STATUS_PLAN => 'Запланирован',
			self::STATUS_COMPLETE => 'Выполнен',
			self::STATUS_CANCEL => 'Отменен',
		];
	}

    /**
     * Gets query for [[Client]].
     *
     * @return ActiveQuery|ClientQuery
     */
    public function getClient(): ActiveQuery|ClientQuery
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }
	
	/**
	 * @return ActiveQuery|VisitProcedureQuery
	 */
	public function getVisitProcedures(): ActiveQuery|VisitProcedureQuery
	{
		return $this->hasMany(VisitProcedure::class, ['visit_id' => 'id']);
	}
	
	/**
	 * @return ActiveQuery|VisitProcedureQuery
	 */
	public function getPayments(): ActiveQuery|PaymentQuery
	{
		return $this->hasMany(Payment::class, ['visit_id' => 'id']);
	}
	
	/**
	 * @return string|null
	 */
	public function getStatusName(): ?string
	{
		$list = self::statusList();
		
		return $list[$this->status] ?? null;
	}
	
	/**
	 * @return string|null
	 */
	public function getStatusColor(): ?string
	{
		$colors = [
			self::STATUS_OPEN => '#007bff',
			self::STATUS_PLAN => '#6c757d',
			self::STATUS_COMPLETE => '#28a745',
			self::STATUS_CANCEL => '#dc3545',
		];
		
		return $colors[$this->status] ?? null;
	}
	
	/**
	 * @return int
	 */
	public function getDebt(): int
	{
		$procedureSum = $this->getVisitProcedures()->sum('sum');
		$paymentSum = $this->getPayments()->sum('sum');
		$debt = $procedureSum - $paymentSum;
		
		return $debt > 0 ? $debt : 0;
	}

    /**
     * {@inheritdoc}
     * @return VisitQuery the active query used by this AR class.
     */
    public static function find(): VisitQuery
    {
        return new VisitQuery(static::class);
    }
	
	/**
	 * @param $insert
	 * @return bool
	 * @throws InvalidConfigException
	 */
	public function beforeSave($insert): bool
	{
		$this->visit_datetime = Yii::$app->formatter->asDate($this->visit_datetime, 'php:Y-m-d H:i');
		
		return parent::beforeSave($insert);
	}
	
	/**
	 * @return void
	 * @throws InvalidConfigException
	 */
	public function afterFind(): void
	{
		parent::afterFind();
		
		$this->visit_datetime = Yii::$app->formatter->asDate($this->visit_datetime, 'php:d.m.Y H:i');
	}
}
