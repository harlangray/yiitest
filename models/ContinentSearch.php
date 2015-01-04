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
            [['co_id', 'co_created_by', 'co_is_deleted', 'co_updated_by'], 'integer'],
            [['co_name', 'co_date_field', 'co_datetime_field', 'co_created_on', 'co_created_at', 'co_updated_at', 'co_deleted_at'], 'safe'],
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
            'co_date_field' => $this->co_date_field,
            'co_datetime_field' => $this->co_datetime_field,
            'co_created_on' => $this->co_created_on,
            'co_created_at' => $this->co_created_at,
            'co_created_by' => $this->co_created_by,
            'co_is_deleted' => $this->co_is_deleted,
            'co_updated_by' => $this->co_updated_by,
            'co_updated_at' => $this->co_updated_at,
            'co_deleted_at' => $this->co_deleted_at,
        ]);

        $query->andFilterWhere(['like', 'co_name', $this->co_name]);

        return $dataProvider;
    }
}
