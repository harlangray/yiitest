<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "city".
 *
 * @property integer $c_id
 * @property string $c_name
 * @property integer $c_population
 *
 * @property Continent[] $continents
 * @property Country[] $countries
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_name', 'c_population'], 'required'],
            [['c_population'], 'integer'],
            [['c_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'ID',
            'c_name' => 'Name',
            'c_population' => 'Population',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContinents()
    {
        return $this->hasMany(Continent::className(), ['co_main_city_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasMany(Country::className(), ['cn_capital_city_id' => 'c_id']);
    }
    
    public function behaviors() {
        return [
            'LoggableBehavior' => [
                'class' => 'yii\behaviors\LoggableBehavior',
                'storeTimestamp' => false
            ],
            
                        
            
                        
                        
                        
            
            
            
                    ];
    }
    
    
}
