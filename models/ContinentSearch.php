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
            [['co_id', 'co_main_city_id', 'co_area', 'co_created_by', 'co_updated_by', 'co_is_deleted', 'co_deleted_by'], 'integer'],
            [['co_name', 'co_description', 'co_created_at', 'co_updated_at', 'co_deleted_at'], 'safe'],
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
            'co_main_city_id' => $this->co_main_city_id,
            'co_area' => $this->co_area,
            'co_created_by' => $this->co_created_by,
            'co_created_at' => $this->co_created_at,
            'co_updated_by' => $this->co_updated_by,
            'co_updated_at' => $this->co_updated_at,
            'co_is_deleted' => $this->co_is_deleted,
            'co_deleted_by' => $this->co_deleted_by,
            'co_deleted_at' => $this->co_deleted_at,
        ]);

        $query->andFilterWhere(['like', 'co_name', $this->co_name])
            ->andFilterWhere(['like', 'co_description', $this->co_description]);

        return $dataProvider;
    }
}
