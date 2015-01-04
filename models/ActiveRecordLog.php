<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "active_record_log".
 *
 * @property integer $id
 * @property string $description
 * @property string $action
 * @property string $model
 * @property integer $idModel
 * @property string $field
 * @property string $creationdate
 * @property string $userid
 */
class ActiveRecordLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'active_record_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idModel'], 'integer'],
            [['creationdate'], 'safe'],
            [['description'], 'string', 'max' => 255],
            [['action'], 'string', 'max' => 20],
            [['model', 'field', 'userid'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'action' => 'Action',
            'model' => 'Model',
            'idModel' => 'Id Model',
            'field' => 'Field',
            'creationdate' => 'Creationdate',
            'userid' => 'Userid',
        ];
    }
}
