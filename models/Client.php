<?php

namespace app\models;

use app\query\UserQuery;
use app\validators\MobileNumberValidator;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $mobile_phone Номер телефона
 * @property string|null $birthday День рождения
 * @property string|null $comment Комментарий
 * @property Visit[] $visits Визиты
 * @property int $visitCount Количество визитов
 * @property int $debt Долг
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'mobile_phone'], 'required'],
            [['comment'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['mobile_phone'], 'string', 'max' => 18],
            [['birthday'], 'string', 'max' => 10],
            [['mobile_phone'], 'unique'],
	        ['mobile_phone', MobileNumberValidator::class],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'ФИО'),
            'mobile_phone' => Yii::t('app', 'Номер телефона'),
            'birthday' => Yii::t('app', 'День рождения'),
	        'created_at' => Yii::t('app', 'Добавлен'),
            'comment' => Yii::t('app', 'Примечание'),
	        'visitCount' => Yii::t('app', 'Визиты'),
	        'debt' => Yii::t('app', 'Долг'),
        ];
    }
	
	/**
	 * @return array
	 */
	public static function list(): array
	{
		$users = self::find()
			->select(['id', 'name'])
			->orderBy('name')
			->asArray()
			->all();
		
		return ArrayHelper::map($users, 'id', 'name');
	}

    /**
     * {@inheritdoc}
     * @return \app\query\ClientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\query\ClientQuery(get_called_class());
    }
	
	/**
	 * Gets query for [[Visit]].
	 *
	 * @return ActiveQuery|UserQuery
	 */
	public function getVisits(): ActiveQuery|UserQuery
	{
		return $this->hasMany(Visit::class, ['client_id' => 'id']);
	}
	
	/**
	 * @return int
	 */
	public function getVisitCount(): int
	{
		return count($this->visits);
	}
	
	/**
	 * @return int
	 */
	public function getDebt(): int
	{
		$visitsDebt = ArrayHelper::map($this->visits, 'id', 'debt');
		$debt = array_sum($visitsDebt);
		
		return max($debt, 0);
	}
}
