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
            [['id', 'user_id', 'client_id', 'service_id', 'status'], 'integer'],
            [['visit_datetime', 'comment', 'statusName'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Visit::find()
            ->joinWith([
				'user',
	            'client',
	            'service'
            ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
	        'sort' => [
				'defaultOrder' => [
					'id' => SORT_DESC,
				]
	        ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'client_id' => $this->client_id,
            'service_id' => $this->service_id,
            'status' => $this->status,
        ]);
		
		if ($this->visit_datetime) {
			$query->andFilterWhere([
				'LIKE', 'visit_datetime', \Yii::$app->formatter->asDate($this->visit_datetime, 'php:Y-m-d') . '%', false
			]);
		}

        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
