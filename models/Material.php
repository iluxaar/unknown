<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "material".
 *
 * @property int $id
 * @property string $name Наименование
 * @property int $purchase_price Цена закупки
 * @property int|null $selling_price Цена продажи
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'purchase_price'], 'required'],
            [['purchase_price', 'selling_price'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Наименование'),
            'purchase_price' => Yii::t('app', 'Цена закупки'),
            'selling_price' => Yii::t('app', 'Цена продажи'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\query\MaterialQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\query\MaterialQuery(get_called_class());
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
}
