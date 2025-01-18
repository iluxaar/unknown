<?php

namespace app\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Visit;

/**
 * VisitSearch represents the model behind the search form of `app\models\Visit`.
 */
class VisitSearch extends Visit
{
	
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios(): array
    {
        return Model::scenarios();
    }
	
	/**
	 * @param $clientId
	 * @param array $params
	 * @return ActiveDataProvider
	 */
    public function search($clientId, array $params = []): ActiveDataProvider
    {
        $query = Visit::find()->with([
			'client',
	        'visitProcedures.service',
	        'payments.paymentMethod'
        ])->where(['client_id' => $clientId]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
	        'sort' => [
				'defaultOrder' => [
					'visit_datetime' => SORT_DESC,
				]
	        ],
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'status' => $this->status,
        ]);

        return $dataProvider;
    }
}
