<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int $visit_id Визит
 * @property int $payment_method_id Способ оплаты
 * @property int $sum Сумма
 *
 * @property PaymentMethod $paymentMethod
 * @property Visit $visit
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['visit_id', 'payment_method_id', 'sum'], 'required'],
            [['visit_id', 'payment_method_id', 'sum'], 'integer'],
            [['payment_method_id'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentMethod::class, 'targetAttribute' => ['payment_method_id' => 'id']],
            [['visit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Visit::class, 'targetAttribute' => ['visit_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'visit_id' => Yii::t('app', 'Визит'),
            'payment_method_id' => Yii::t('app', 'Способ оплаты'),
            'sum' => Yii::t('app', 'Сумма'),
        ];
    }

    /**
     * Gets query for [[PaymentMethod]].
     *
     * @return \yii\db\ActiveQuery|\app\query\PaymentMethodQuery
     */
    public function getPaymentMethod()
    {
        return $this->hasOne(PaymentMethod::class, ['id' => 'payment_method_id']);
    }

    /**
     * Gets query for [[Visit]].
     *
     * @return \yii\db\ActiveQuery|\app\query\VisitQuery
     */
    public function getVisit()
    {
        return $this->hasOne(Visit::class, ['id' => 'visit_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\query\PaymentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\query\PaymentQuery(get_called_class());
    }
}
