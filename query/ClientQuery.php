<?php

namespace app\query;

/**
 * This is the ActiveQuery class for [[\app\models\Client]].
 *
 * @see \app\models\Client
 */
class ClientQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Client[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Client|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
