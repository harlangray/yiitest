<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $cn_id
 * @property integer $cn_continent_id
 * @property string $cn_name
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
            [['cn_continent_id', 'cn_name'], 'required'],
            [['cn_continent_id'], 'integer'],
            [['cn_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cn_id' => 'Cn ID',
            'cn_continent_id' => 'Cn Continent ID',
            'cn_name' => 'Cn Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCnContinent()
    {
        return $this->hasOne(Continent::className(), ['co_id' => 'cn_continent_id']);
    }
}
