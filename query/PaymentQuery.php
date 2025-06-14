<?php

namespace app\query;

/**
 * This is the ActiveQuery class for [[\app\models\Payment]].
 *
 * @see \app\models\Payment
 */
class PaymentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Payment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Payment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
