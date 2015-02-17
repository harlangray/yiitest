<?php
namespace app\components;

use Yii;
use yii\base\Behavior;
use yii\db\BaseActiveRecord;

class SoftDeleteBehavior extends Behavior {
    public $deletedColumn = '';
    public $deletedTimeColumn = '';
    public $deletedByColumn = '';
    public $timestampColumn = null;

    public function events() {
        return [
            BaseActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
        ];
    }

    public function beforeDelete($event) {
        
        $deletedColumn = $this->deletedColumn;
        $deletedByColumn = $this->deletedByColumn;
        $deletedTimeColumn = $this->deletedTimeColumn;
        
        $model = $this->owner;
        if($deletedColumn != '')
            $model->$deletedColumn = 1;
        if($deletedByColumn != '')
            $model->$deletedByColumn = Yii::$app->user->getId();
        if($deletedTimeColumn != '')
            $model->$deletedTimeColumn = date('Y-m-d H:i:s');
        
        $model->save();
        
        $event->isValid = false; 
    }

}

?>