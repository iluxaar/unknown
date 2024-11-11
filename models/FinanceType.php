<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "finance_type".
 *
 * @property int $id
 * @property int $type Приход/Расход
 * @property string $name Название
 *
 * @property Finance[] $finances
 */
class FinanceType extends \yii\db\ActiveRecord
{
	/** @var int Расход */
	protected const TYPE_EXPENSE = 0;
	
	/** @var int Приход */
	protected const TYPE_INCOME = 1;
	
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Тип'),
	        'typeName' => Yii::t('app', 'Тип'),
            'name' => Yii::t('app', 'Название'),
        ];
    }
	
	/**
	 * @return string[]
	 */
	public static function typesMap()
	{
		return [
			self::TYPE_EXPENSE => 'Расход',
			self::TYPE_INCOME => 'Приход',
		];
	}
	
	/**
	 * @return string|null
	 */
	public function getTypeName(): ?string
	{
		$typesMap = self::typesMap();
		
		return $typesMap[$this->type] ?? null;
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
     * Gets query for [[Finances]].
     *
     * @return \yii\db\ActiveQuery|\app\query\FinanceQuery
     */
    public function getFinances()
    {
        return $this->hasMany(Finance::class, ['type_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\query\FinanceTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\query\FinanceTypeQuery(get_called_class());
    }
}
