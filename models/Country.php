<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "country".
 *
 * @property integer $cn_id
 * @property integer $cn_continent_id
 * @property integer $cn_capital_city_id
 * @property string $cn_name
 * @property integer $cn_area
 * @property integer $cn_is_deleted
 * @property string $cn_deleted_at
 * @property integer $cn_deleted_by
 * @property integer $cn_created_by
 *
 * @property Continent $cnContinent
 * @property User $cnCreatedBy
 * @property City $cnCapitalCity
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
            [['cn_continent_id', 'cn_capital_city_id', 'cn_name', 'cn_area'], 'required'],
            [['cn_continent_id', 'cn_capital_city_id', 'cn_area', 'cn_is_deleted', 'cn_deleted_by', 'cn_created_by'], 'integer'],
            [['cn_deleted_at'], 'safe'],
            [['cn_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cn_id' => 'ID',
            'cn_continent_id' => 'Continent',
            'cn_capital_city_id' => 'Capital City',
            'cn_name' => 'Name',
            'cn_area' => 'Area',
            'cn_is_deleted' => 'Is Deleted',
            'cn_deleted_at' => 'Deleted At',
            'cn_deleted_by' => 'Deleted By',
            'cn_created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCnContinent()
    {
        return $this->hasOne(Continent::className(), ['co_id' => 'cn_continent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCnCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'cn_created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCnCapitalCity()
    {
        return $this->hasOne(City::className(), ['c_id' => 'cn_capital_city_id']);
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
                Country::EVENT_BEFORE_INSERT => 'cn_created_by',
                            ],  
            'value' => Yii::$app->getUser()->id,
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
    
        public static function find() {
        return parent::find()->where(['cn_is_deleted' => false]);
    }    
    
}
