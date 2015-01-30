<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "person".
 *
 * @property integer $per_id
 * @property string $per_full_name
 * @property integer $per_biometric_id
 * @property string $per_fingerprint_mapid
 * @property string $per_other_name1
 * @property string $per_other_name2
 * @property string $per_call_name1
 * @property string $per_call_name2
 * @property integer $per_gender_id
 * @property string $per_nic
 * @property string $per_passport_no
 * @property string $per_date_of_birth
 * @property string $per_birth_place
 * @property integer $per_nationality_id
 * @property integer $per_race_id
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['per_id', 'per_full_name'], 'required'],
            [['per_id', 'per_biometric_id', 'per_gender_id', 'per_nationality_id', 'per_race_id'], 'integer'],
            [['per_date_of_birth'], 'safe'],
            [['per_full_name'], 'string', 'max' => 100],
            [['per_fingerprint_mapid'], 'string', 'max' => 10],
            [['per_other_name1', 'per_other_name2', 'per_call_name1', 'per_call_name2'], 'string', 'max' => 30],
            [['per_nic', 'per_passport_no'], 'string', 'max' => 15],
            [['per_birth_place'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'per_id' => Yii::t('app', 'ID'),
            'per_full_name' => Yii::t('app', 'Full Name'),
            'per_biometric_id' => Yii::t('app', 'Biometric'),
            'per_fingerprint_mapid' => Yii::t('app', 'Fingerprint Mapid'),
            'per_other_name1' => Yii::t('app', 'Other Name1'),
            'per_other_name2' => Yii::t('app', 'Other Name2'),
            'per_call_name1' => Yii::t('app', 'Call Name1'),
            'per_call_name2' => Yii::t('app', 'Call Name2'),
            'per_gender_id' => Yii::t('app', 'Gender'),
            'per_nic' => Yii::t('app', 'Nic'),
            'per_passport_no' => Yii::t('app', 'Passport No'),
            'per_date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'per_birth_place' => Yii::t('app', 'Birth Place'),
            'per_nationality_id' => Yii::t('app', 'Nationality'),
            'per_race_id' => Yii::t('app', 'Race'),
        ];
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
