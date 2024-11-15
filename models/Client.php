<?php

namespace app\models;

use app\query\UserQuery;
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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Имя'),
            'mobile_phone' => Yii::t('app', 'Номер телефона'),
            'birthday' => Yii::t('app', 'День рождения'),
	        'created_at' => Yii::t('app', 'Добавлен'),
            'comment' => Yii::t('app', 'Примечание'),
	        'visitsCount' => Yii::t('app', 'Кол-во визитов'),
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
	 * @return bool|int|string|null
	 */
	public function getVisitsCount(): bool|int|string|null
	{
		return $this->getVisits()->count();
	}
}
