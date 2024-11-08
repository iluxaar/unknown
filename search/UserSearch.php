<?php

namespace app\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id'], 'integer'],
            [['name', 'email', 'mobile_phone'], 'safe'],
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
     * @return ActiveDataProvider|false
     */
    public function search($params)
    {
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->setAttributes($params);
        if (!$this->validate()) {
            return false;
        }

        $query->andFilterWhere(['id' => $this->id,])
	        ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'mobile_phone', $this->mobile_phone])
	        ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
