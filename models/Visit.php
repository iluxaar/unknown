<?php

namespace app\models;

use app\query\ClientQuery;
use app\query\ServiceQuery;
use app\query\UserQuery;
use app\query\VisitQuery;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "visit".
 *
 * @property int $id
 * @property int $user_id Мастер
 * @property int $client_id Клиент
 * @property int $service_id Услуга
 * @property string $visit_datetime Время визита
 * @property int $status Статус записи
 * @property string|null $comment Примечание
 *
 * @property Client $client
 * @property Service $service
 * @property User $user
 */
class Visit extends \yii\db\ActiveRecord
{
	/**
	 * Запись открыта
	 */
	public const STATUS_OPEN = 0;
	
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
            [['user_id', 'client_id', 'service_id', 'visit_datetime'], 'required'],
            [['user_id', 'client_id', 'service_id', 'status'], 'integer'],
            [['visit_datetime'], 'safe'],
            [['comment'], 'string'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::class, 'targetAttribute' => ['service_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'Номер'),
            'user_id' => Yii::t('app', 'Мастер'),
	        'user.name' => Yii::t('app', 'Мастер'),
            'client_id' => Yii::t('app', 'Клиент'),
	        'client.name' => Yii::t('app', 'Клиент'),
            'service_id' => Yii::t('app', 'Услуга'),
	        'service.name' => Yii::t('app', 'Услуга'),
            'visit_datetime' => Yii::t('app', 'Время визита'),
            'status' => Yii::t('app', 'Статус'),
	        'statusName' => Yii::t('app', 'Статус'),
	        'created_at' => Yii::t('app', 'Добавлено'),
            'comment' => Yii::t('app', 'Примечание'),
        ];
    }
	
	/**
	 * @return array
	 */
	public static function statusList(): array
	{
		return [
			self::STATUS_OPEN => 'Открыта',
			self::STATUS_COMPLETE => 'Выполнена',
			self::STATUS_CANCEL => 'Отменена',
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
     * Gets query for [[Service]].
     *
     * @return ActiveQuery|ServiceQuery
     */
    public function getService(): ActiveQuery|ServiceQuery
    {
        return $this->hasOne(Service::class, ['id' => 'service_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery|UserQuery
     */
    public function getUser(): ActiveQuery|UserQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
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
		$this->visit_datetime = \Yii::$app->formatter->asDate($this->visit_datetime, 'php:Y-m-d H:i');
		
		return parent::beforeSave($insert);
	}
	
	/**
	 * @return void
	 * @throws InvalidConfigException
	 */
	public function afterFind(): void
	{
		parent::afterFind();
		
		$this->visit_datetime = \Yii::$app->formatter->asDate($this->visit_datetime, 'php:d.m.Y H:i');
	}
}
