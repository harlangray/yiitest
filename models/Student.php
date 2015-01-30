<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "student".
 *
 * @property integer $st_id
 * @property integer $st_class_id
 * @property string $st_name
 * @property string $st_date_of_birth
 *
 * @property SchoolClass $stClass
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['st_class_id', 'st_name', 'st_date_of_birth'], 'required'],
            [['st_class_id'], 'integer'],
            [['st_date_of_birth'], 'safe'],
            [['st_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'st_id' => Yii::t('app', 'ID'),
            'st_class_id' => Yii::t('app', 'Class'),
            'st_name' => Yii::t('app', 'Name'),
            'st_date_of_birth' => Yii::t('app', 'Date Of Birth'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStClass()
    {
        return $this->hasOne(SchoolClass::className(), ['cl_id' => 'st_class_id']);
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
