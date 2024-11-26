<?php

namespace app\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Finance;

/**
 * FinanceSearch represents the model behind the search form of `app\models\Finance`.
 */
class FinanceSearch extends Finance
{
	public $financeType;
	
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type', 'user_id', 'material_id', 'visit_id', 'sum', 'financeType'], 'integer'],
            [['created_at', 'comment'], 'safe'],
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
        $query = Finance::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
	        'sort' => [
		        'defaultOrder' => [
			        'id' => SORT_DESC,
		        ]
	        ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
            'user_id' => $this->user_id,
            'material_id' => $this->material_id,
            'visit_id' => $this->visit_id,
            'sum' => $this->sum,
        ])->andFilterWhere(['like', 'comment', $this->comment]);
	    
	    if ($this->created_at) {
		    $query->andFilterWhere([
			    'LIKE', 'created_at', \Yii::$app->formatter->asDate($this->created_at, 'php:Y-m-d') . '%', false
		    ]);
	    }

        return $dataProvider;
    }
}
