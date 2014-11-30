<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Continent;

/**
 * ContinentSearch represents the model behind the search form about `app\models\Continent`.
 */
class ContinentSearch extends Continent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['co_id'], 'integer'],
            [['co_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Continent::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'co_id' => $this->co_id,
        ]);

        $query->andFilterWhere(['like', 'co_name', $this->co_name]);

        return $dataProvider;
    }
}
