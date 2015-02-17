<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prison_institute".
 *
 * @property integer $pin_id
 * @property string $pin_prison_institute_code
 * @property string $pin_prison_institute_name
 * @property integer $pin_prison_institute_type_id
 * @property string $pin_prison_institute_name_si
 * @property string $pin_prison_institute_name_ta
 */
class PrisonInstitute extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'prison_institute';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['pin_prison_institute_code', 'pin_prison_institute_name', 'pin_prison_institute_type_id'], 'required'],
            [['pin_prison_institute_type_id'], 'integer'],
            [['pin_prison_institute_code'], 'string', 'max' => 2],
            [['pin_prison_institute_name', 'pin_prison_institute_name_si', 'pin_prison_institute_name_ta'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'pin_id' => 'ID',
            'pin_prison_institute_code' => 'Prison Institute Code',
            'pin_prison_institute_name' => 'Prison Institute Name',
            'pin_prison_institute_type_id' => 'Prison Institute Type',
            'pin_prison_institute_name_si' => 'Prison Institute Name Si',
            'pin_prison_institute_name_ta' => 'Prison Institute Name Ta',
        ];
    }

    public function behaviors() {
        return [
            'LoggableBehavior' => [
                'class' => 'app\components\LoggableBehavior',
                'storeTimestamp' => false
            ],
        ];
    }

}
