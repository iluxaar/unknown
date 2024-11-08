<?php

namespace app\query;

/**
 * This is the ActiveQuery class for [[\app\models\Visit]].
 *
 * @see \app\models\Visit
 */
class VisitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Visit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Visit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
