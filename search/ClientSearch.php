<?php

namespace app\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Client;

/**
 * ClientSearch represents the model behind the search form of `app\models\Client`.
 */
class ClientSearch extends Client
{
	
	/**
	 * @return array[]
	 */
    public function rules(): array
    {
        return [
            [['name', 'mobile_phone'], 'safe'],
        ];
    }
	
	/**
	 * @return array
	 */
    public function scenarios(): array
    {
        return Model::scenarios();
    }
	
	/**
	 * @param array $params
	 * @return ActiveDataProvider
	 */
    public function search(array $params): ActiveDataProvider
    {
        $query = Client::find()->with([
	        'visits.visitProcedures',
			'visits.payments'
        ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
	        'sort' => [
		        'defaultOrder' => [
			        'created_at' => SORT_DESC,
		        ]
	        ],
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'mobile_phone', $this->mobile_phone]);

        return $dataProvider;
    }
}
