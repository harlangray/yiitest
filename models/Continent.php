<?php

namespace app\models;

use Yii;
use yii\db\Expression;/**
 * This is the model class for table "continent".
 *
 * @property integer $co_id
 * @property string $co_name
 * @property string $co_date_field
 * @property string $co_datetime_field
 * @property string $co_created_on
 * @property string $co_created_at
 * @property integer $co_created_by
 * @property integer $co_is_deleted
 * @property integer $co_updated_by
 * @property string $co_updated_at
 * @property string $co_deleted_at
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
            [['co_name', 'co_date_field', 'co_datetime_field', 'co_created_on'], 'required'],
            [['co_date_field', 'co_datetime_field', 'co_created_on', 'co_created_at', 'co_updated_at', 'co_deleted_at'], 'safe'],
            [['co_created_by', 'co_is_deleted', 'co_updated_by'], 'integer'],
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
            'co_name' => 'Name',
            'co_date_field' => 'Date Field',
            'co_datetime_field' => 'Datetime Field',
            'co_created_on' => 'Created On',
            'co_created_at' => 'Created At',
            'co_created_by' => 'Created By',
            'co_is_deleted' => 'Is Deleted',
            'co_updated_by' => 'Updated By',
            'co_updated_at' => 'Updated At',
            'co_deleted_at' => 'Deleted At',
        ];
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
                'deletedByColumn' => '',
                'deletedTimeColumn' => 'co_deleted_at',
            ]                
                    ];
    }
    
        public static function find() {
        return parent::find()->where(['co_is_deleted' => false]);
    }    
    }
