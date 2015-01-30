<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Person;

/**
 * PersonSearch represents the model behind the search form about `app\models\Person`.
 */
class PersonSearch extends Person
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['per_id', 'per_biometric_id', 'per_gender_id', 'per_nationality_id', 'per_race_id'], 'integer'],
            [['per_full_name', 'per_fingerprint_mapid', 'per_other_name1', 'per_other_name2', 'per_call_name1', 'per_call_name2', 'per_nic', 'per_passport_no', 'per_date_of_birth', 'per_birth_place'], 'safe'],
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
        $query = Person::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'per_id' => $this->per_id,
            'per_biometric_id' => $this->per_biometric_id,
            'per_gender_id' => $this->per_gender_id,
            'per_date_of_birth' => $this->per_date_of_birth,
            'per_nationality_id' => $this->per_nationality_id,
            'per_race_id' => $this->per_race_id,
        ]);

        $query->andFilterWhere(['like', 'per_full_name', $this->per_full_name])
            ->andFilterWhere(['like', 'per_fingerprint_mapid', $this->per_fingerprint_mapid])
            ->andFilterWhere(['like', 'per_other_name1', $this->per_other_name1])
            ->andFilterWhere(['like', 'per_other_name2', $this->per_other_name2])
            ->andFilterWhere(['like', 'per_call_name1', $this->per_call_name1])
            ->andFilterWhere(['like', 'per_call_name2', $this->per_call_name2])
            ->andFilterWhere(['like', 'per_nic', $this->per_nic])
            ->andFilterWhere(['like', 'per_passport_no', $this->per_passport_no])
            ->andFilterWhere(['like', 'per_birth_place', $this->per_birth_place]);

        return $dataProvider;
    }
}
