<?php

namespace app\models;

use Yii;
use yii\db\Expression;/**
 * This is the model class for table "continent".
 *
 * @property integer $co_id
 * @property integer $co_main_city_id
 * @property string $co_name
 * @property integer $co_area
 * @property string $co_description
 * @property integer $co_created_by
 * @property string $co_created_at
 * @property integer $co_updated_by
 * @property string $co_updated_at
 * @property integer $co_is_deleted
 * @property integer $co_deleted_by
 * @property string $co_deleted_at
 *
 * @property City $coMainCity
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
            [['co_main_city_id', 'co_name', 'co_area', 'co_description'], 'required'],
            [['co_main_city_id', 'co_area', 'co_created_by', 'co_updated_by', 'co_is_deleted', 'co_deleted_by'], 'integer'],
            [['co_description'], 'string'],
            [['co_created_at', 'co_updated_at', 'co_deleted_at'], 'safe'],
            [['co_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'co_id' => 'ID',
            'co_main_city_id' => 'Main City',
            'co_name' => 'Name',
            'co_area' => 'Area',
            'co_description' => 'Description',
            'co_created_by' => 'Created By',
            'co_created_at' => 'Created At',
            'co_updated_by' => 'Updated By',
            'co_updated_at' => 'Updated At',
            'co_is_deleted' => 'Is Deleted',
            'co_deleted_by' => 'Deleted By',
            'co_deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoMainCity()
    {
        return $this->hasOne(City::className(), ['c_id' => 'co_main_city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasMany(Country::className(), ['cn_continent_id' => 'co_id']);
    }
    
    public function behaviors() {
        return [
            'LoggableBehavior' => [
                'class' => 'yii\behaviors\LoggableBehavior',
                'storeTimestamp' => false
            ],
            
                        
            
                   'AttributeBehaviorUser' => [
            'class' => 'yii\behaviors\AttributeBehavior',
            'attributes' => [
                Continent::EVENT_BEFORE_INSERT => 'co_created_by',
                Continent::EVENT_BEFORE_UPDATE => 'co_updated_by',
            ],  
            'value' => Yii::$app->getUser()->id,
            ],
                        
                   'AttributeBehaviorTime' => [
            'class' => 'yii\behaviors\AttributeBehavior',
            'attributes' => [
                Continent::EVENT_BEFORE_INSERT => 'co_created_at',
                Continent::EVENT_BEFORE_UPDATE => 'co_updated_at',
            ],  
            'value' => new Expression('NOW()'),
            ],
                        
                   'AttributeBehaviorDelete' => [
            'class' => 'yii\behaviors\AttributeBehavior',
            'attributes' => [
                Continent::EVENT_BEFORE_INSERT => 'co_is_deleted',
            ],  
            'value' => false,
            ],
                        
            
            
            
                        'SoftDeleteBehavior' => [
                'class' => 'yii\behaviors\SoftDeleteBehavior',
                'deletedColumn' => 'co_is_deleted',
                'deletedByColumn' => 'co_deleted_by',
                'deletedTimeColumn' => 'co_deleted_at',
            ]                
                    ];
    }
    
        public static function find() {
        return parent::find()->where(['co_is_deleted' => false]);
    }    
    
}
