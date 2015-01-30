<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;

use yii\helpers\ArrayHelper;
use app\models\SchoolClass;

$form = ActiveForm::begin();
echo Form::widget([
    'model' => $model,
    'form' => $form,
    'columns' => 2,
    'attributes' => [
    'st_class_id' => ['type'=>Form::INPUT_DROPDOWN_LIST, 'items' => ArrayHelper::map(SchoolClass::find()->orderBy('cl_name')->asArray()->all(), 'cl_id', 'cl_name'),'options'=>['prompt' => 'Select...', 'placeholder'=>'']],
            
                'st_name' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],
            
                'st_date_of_birth' => ['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker','hint'=>'','options' => ['pluginOptions' => ['format' => 'yyyy-mm-dd', 'autoclose'=>true, 'todayHighlight' => true]]],
            
                ]
]);
?>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php
ActiveForm::end();
?>