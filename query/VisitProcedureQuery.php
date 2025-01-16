<?php

namespace app\query;

/**
 * This is the ActiveQuery class for [[\app\models\VisitProcedure]].
 *
 * @see \app\models\VisitProcedure
 */
class VisitProcedureQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\VisitProcedure[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\VisitProcedure|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
