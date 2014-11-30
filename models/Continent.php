<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "continent".
 *
 * @property integer $co_id
 * @property string $co_name
 *
 * @property Country[] $countries
 */
class Continent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'continent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['co_name'], 'required'],
            [['co_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'co_id' => 'Co ID',
            'co_name' => 'Co Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasMany(Country::className(), ['cn_continent_id' => 'co_id']);
    }
}
