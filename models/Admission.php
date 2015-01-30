<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admission".
 *
 * @property integer $adm_id
 * @property string $adm_name_as_in_warrant
 * @property double $age_at_admission
 * @property integer $adm_age_category_id
 * @property integer $adm_inmate_category_id
 * @property integer $adm_occurrence_classification_id
 * @property integer $adm_meal_type_id
 * @property string $adm_registration_no
 * @property integer $adm_person_id
 * @property integer $adm_current_prison_institute_id
 * @property integer $adm_current_permenent_location_id
 * @property integer $adm_marital_status_id
 * @property integer $adm_religion_id
 * @property string $adm_date_of_admission
 * @property string $adm_date_of_registration
 * @property integer $adm_sepecial_order_type_id
 * @property integer $adm_face_id
 * @property string $adm_face_description
 * @property integer $adm_hair_id
 * @property string $adm_hair_description
 * @property integer $adm_eyes_id
 * @property string $adm_eyes_description
 * @property integer $adm_norse_id
 * @property string $adm_norse_description
 * @property integer $adm_health_id
 * @property string $adm_health_description
 * @property string $adm_body_mark_1
 * @property string $adm_body_mark_2
 * @property string $adm_body_mark_3
 * @property string $adm_address_line_1
 * @property string $adm_address_line_2
 * @property string $adm_delivery_post_office
 * @property string $adm_address_postal_code
 * @property string $adm_address_country
 * @property integer $adm_province_id
 * @property integer $adm_district_id
 * @property integer $adm_ds_id
 * @property integer $adm_gn_devision_id
 * @property integer $adm_city_id
 * @property integer $adm_police_division_id
 * @property integer $adm_education_level_id
 * @property string $adm_photo_lhs
 * @property string $adm_photo_rhs
 * @property string $adm_photo_front
 * @property string $adm_warrant_scan
 * @property integer $adm_inmate_classification_id
 * @property string $adm_date_of_orientation
 * @property integer $adm_is_attended_to_orientation_programe
 * @property integer $adm_admission_status
 * @property integer $adm_registration_status
 * @property integer $adm_post_registration_status
 */
class Admission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admission';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['adm_id', 'adm_name_as_in_warrant', 'age_at_admission', 'adm_inmate_category_id', 'adm_occurrence_classification_id', 'adm_meal_type_id', 'adm_registration_no', 'adm_person_id', 'adm_current_prison_institute_id'], 'required'],
            [['adm_id', 'adm_age_category_id', 'adm_inmate_category_id', 'adm_occurrence_classification_id', 'adm_meal_type_id', 'adm_person_id', 'adm_current_prison_institute_id', 'adm_current_permenent_location_id', 'adm_marital_status_id', 'adm_religion_id', 'adm_sepecial_order_type_id', 'adm_face_id', 'adm_hair_id', 'adm_eyes_id', 'adm_norse_id', 'adm_health_id', 'adm_province_id', 'adm_district_id', 'adm_ds_id', 'adm_gn_devision_id', 'adm_city_id', 'adm_police_division_id', 'adm_education_level_id', 'adm_inmate_classification_id', 'adm_is_attended_to_orientation_programe', 'adm_admission_status', 'adm_registration_status', 'adm_post_registration_status'], 'integer'],
            [['age_at_admission'], 'number'],
            [['adm_date_of_admission', 'adm_date_of_registration', 'adm_date_of_orientation'], 'safe'],
            [['adm_name_as_in_warrant', 'adm_delivery_post_office', 'adm_address_country'], 'string', 'max' => 50],
            [['adm_registration_no'], 'string', 'max' => 20],
            [['adm_face_description', 'adm_hair_description', 'adm_eyes_description', 'adm_norse_description', 'adm_health_description', 'adm_body_mark_1', 'adm_body_mark_2', 'adm_body_mark_3'], 'string', 'max' => 30],
            [['adm_address_line_1', 'adm_address_line_2'], 'string', 'max' => 100],
            [['adm_address_postal_code'], 'string', 'max' => 10],
            [['adm_photo_lhs', 'adm_photo_rhs', 'adm_photo_front', 'adm_warrant_scan'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'adm_id' => Yii::t('app', 'Adm ID'),
            'adm_name_as_in_warrant' => Yii::t('app', 'Adm Name As In Warrant'),
            'age_at_admission' => Yii::t('app', 'Age At Admission'),
            'adm_age_category_id' => Yii::t('app', 'Adm Age Category ID'),
            'adm_inmate_category_id' => Yii::t('app', 'Adm Inmate Category ID'),
            'adm_occurrence_classification_id' => Yii::t('app', 'Adm Occurrence Classification ID'),
            'adm_meal_type_id' => Yii::t('app', 'Adm Meal Type ID'),
            'adm_registration_no' => Yii::t('app', 'Adm Registration No'),
            'adm_person_id' => Yii::t('app', 'Adm Person ID'),
            'adm_current_prison_institute_id' => Yii::t('app', 'Adm Current Prison Institute ID'),
            'adm_current_permenent_location_id' => Yii::t('app', 'Adm Current Permenent Location ID'),
            'adm_marital_status_id' => Yii::t('app', 'Adm Marital Status ID'),
            'adm_religion_id' => Yii::t('app', 'Adm Religion ID'),
            'adm_date_of_admission' => Yii::t('app', 'Adm Date Of Admission'),
            'adm_date_of_registration' => Yii::t('app', 'Adm Date Of Registration'),
            'adm_sepecial_order_type_id' => Yii::t('app', 'Adm Sepecial Order Type ID'),
            'adm_face_id' => Yii::t('app', 'Adm Face ID'),
            'adm_face_description' => Yii::t('app', 'Adm Face Description'),
            'adm_hair_id' => Yii::t('app', 'Adm Hair ID'),
            'adm_hair_description' => Yii::t('app', 'Adm Hair Description'),
            'adm_eyes_id' => Yii::t('app', 'Adm Eyes ID'),
            'adm_eyes_description' => Yii::t('app', 'Adm Eyes Description'),
            'adm_norse_id' => Yii::t('app', 'Adm Norse ID'),
            'adm_norse_description' => Yii::t('app', 'Adm Norse Description'),
            'adm_health_id' => Yii::t('app', 'Adm Health ID'),
            'adm_health_description' => Yii::t('app', 'Adm Health Description'),
            'adm_body_mark_1' => Yii::t('app', 'Adm Body Mark 1'),
            'adm_body_mark_2' => Yii::t('app', 'Adm Body Mark 2'),
            'adm_body_mark_3' => Yii::t('app', 'Adm Body Mark 3'),
            'adm_address_line_1' => Yii::t('app', 'Adm Address Line 1'),
            'adm_address_line_2' => Yii::t('app', 'Adm Address Line 2'),
            'adm_delivery_post_office' => Yii::t('app', 'Adm Delivery Post Office'),
            'adm_address_postal_code' => Yii::t('app', 'Adm Address Postal Code'),
            'adm_address_country' => Yii::t('app', 'Adm Address Country'),
            'adm_province_id' => Yii::t('app', 'Adm Province ID'),
            'adm_district_id' => Yii::t('app', 'Adm District ID'),
            'adm_ds_id' => Yii::t('app', 'Adm Ds ID'),
            'adm_gn_devision_id' => Yii::t('app', 'Adm Gn Devision ID'),
            'adm_city_id' => Yii::t('app', 'Adm City ID'),
            'adm_police_division_id' => Yii::t('app', 'Adm Police Division ID'),
            'adm_education_level_id' => Yii::t('app', 'Adm Education Level ID'),
            'adm_photo_lhs' => Yii::t('app', 'Adm Photo Lhs'),
            'adm_photo_rhs' => Yii::t('app', 'Adm Photo Rhs'),
            'adm_photo_front' => Yii::t('app', 'Adm Photo Front'),
            'adm_warrant_scan' => Yii::t('app', 'Adm Warrant Scan'),
            'adm_inmate_classification_id' => Yii::t('app', 'Adm Inmate Classification ID'),
            'adm_date_of_orientation' => Yii::t('app', 'Adm Date Of Orientation'),
            'adm_is_attended_to_orientation_programe' => Yii::t('app', 'Adm Is Attended To Orientation Programe'),
            'adm_admission_status' => Yii::t('app', 'Adm Admission Status'),
            'adm_registration_status' => Yii::t('app', 'Adm Registration Status'),
            'adm_post_registration_status' => Yii::t('app', 'Adm Post Registration Status'),
        ];
    }
}
