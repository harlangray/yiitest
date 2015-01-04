<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "audit_trail".
 *
 * @property integer $id
 * @property string $old_value
 * @property string $new_value
 * @property string $action
 * @property string $model
 * @property integer $model_id
 * @property string $field
 * @property string $stamp
 * @property integer $user_id
 */
class AuditTrail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'audit_trail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['old_value', 'new_value'], 'string'],
            [['action', 'model', 'model_id', 'stamp', 'user_id'], 'required'],
            [['model_id', 'user_id'], 'integer'],
            [['stamp'], 'safe'],
            [['action', 'field'], 'string', 'max' => 20],
            [['model'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'old_value' => 'Old Value',
            'new_value' => 'New Value',
            'action' => 'Action',
            'model' => 'Model',
            'model_id' => 'Model ID',
            'field' => 'Field',
            'stamp' => 'Stamp',
            'user_id' => 'User ID',
        ];
    }
}
