<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "country".
 *
 * @property integer $cn_id
 * @property string $cn_description
 * @property integer $cn_continent_id
 * @property integer $cn_is_deleted
 * @property string $cn_deleted_at
 * @property integer $cn_deleted_by
 *
 * @property Continent $cnContinent
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cn_description', 'cn_continent_id'], 'required'],
            [['cn_continent_id', 'cn_is_deleted', 'cn_deleted_by'], 'integer'],
            [['cn_deleted_at'], 'safe'],
            [['cn_description'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cn_id' => 'ID',
            'cn_description' => 'Description',
            'cn_continent_id' => 'Continent',
            'cn_is_deleted' => 'Is Deleted',
            'cn_deleted_at' => 'Deleted At',
            'cn_deleted_by' => 'Deleted By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCnContinent()
    {
        return $this->hasOne(Continent::className(), ['co_id' => 'cn_continent_id']);
    }
    
    public function behaviors() {
        return [
            'LoggableBehavior' => [
                'class' => 'yii\behaviors\LoggableBehavior',
                'storeTimestamp' => false
            ],
            
                        
            
                        
                        
                   'AttributeBehaviorDelete' => [
            'class' => 'yii\behaviors\AttributeBehavior',
            'attributes' => [
                Country::EVENT_BEFORE_INSERT => 'cn_is_deleted',
            ],  
            'value' => false,
            ],
                        
            
            
            
                        'SoftDeleteBehavior' => [
                'class' => 'yii\behaviors\SoftDeleteBehavior',
                'deletedColumn' => 'cn_is_deleted',
                'deletedByColumn' => 'cn_deleted_by',
                'deletedTimeColumn' => 'cn_deleted_at',
            ]                
                    ];
    }
    
//        public static function find() {
//        return parent::find()->where(['cn_is_deleted' => false]);
//    }    
    }
