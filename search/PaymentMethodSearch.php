<?php

namespace app\search;

use app\models\PaymentMethod;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PaymentMethodSearch represents the model behind the search form of `app\models\PaymentMethod`.
 */
class PaymentMethodSearch extends PaymentMethod
{

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios();
    }
	
	/**
	 * @param $params
	 * @return ActiveDataProvider
	 */
    public function search($params)
    {
        $query = PaymentMethod::find();
	    
	    return new ActiveDataProvider([
	        'query' => $query,
		    'sort' => [
			    'defaultOrder' => [
				    'id' => SORT_DESC,
			    ]
		    ],
	    ]);
    }
}
