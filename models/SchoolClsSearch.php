<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SchoolCls;

/**
 * SchoolClsSearch represents the model behind the search form about `app\models\SchoolCls`.
 */
class SchoolClsSearch extends SchoolCls
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cl_id', 'cl_grade'], 'integer'],
            [['cl_name', 'cl_start_date'], 'safe'],
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
        $query = SchoolCls::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'cl_id' => $this->cl_id,
            'cl_grade' => $this->cl_grade,
            'cl_start_date' => $this->cl_start_date,
        ]);

        $query->andFilterWhere(['like', 'cl_name', $this->cl_name]);

        return $dataProvider;
    }
}
