<?php

namespace app\query;

/**
 * This is the ActiveQuery class for [[\app\models\Finance]].
 *
 * @see \app\models\Finance
 */
class FinanceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Finance[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Finance|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
