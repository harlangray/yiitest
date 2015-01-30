<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "school_class".
 *
 * @property integer $cl_id
 * @property string $cl_name
 * @property integer $cl_grade
 * @property string $cl_start_date
 *
 * @property Student[] $students
 */
class SchoolClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cl_name', 'cl_grade', 'cl_start_date'], 'required'],
            [['cl_grade'], 'integer'],
            [['cl_start_date'], 'safe'],
            [['cl_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cl_id' => Yii::t('app', 'ID'),
            'cl_name' => Yii::t('app', 'Name'),
            'cl_grade' => Yii::t('app', 'Grade'),
            'cl_start_date' => Yii::t('app', 'Start Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['st_class_id' => 'cl_id']);
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
