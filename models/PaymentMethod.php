<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "payment_method".
 *
 * @property int $id
 * @property string $name Способ оплаты
 */
class PaymentMethod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_method';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
            'name' => Yii::t('app', 'Способ оплаты'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\query\PaymentMethodQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\query\PaymentMethodQuery(get_called_class());
    }
	
	/**
	 * @return array
	 */
	public static function list(): array
	{
		$methods = self::find()
			->select(['id', 'name'])
			->orderBy('name')
			->asArray()
			->all();
		
		return ArrayHelper::map($methods, 'id', 'name');
	}
}
