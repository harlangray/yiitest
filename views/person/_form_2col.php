<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;


$form = ActiveForm::begin();
echo Form::widget([
    'model' => $model,
    'form' => $form,
    'columns' => 2,
    'attributes' => [
    'per_id' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],
            
                'per_full_name' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],
            
                'per_biometric_id' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],
            
                'per_fingerprint_mapid' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],
            
                'per_other_name1' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],
            
                'per_other_name2' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],
            
                'per_call_name1' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],
            
                'per_call_name2' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],
            
                'per_gender_id' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],
            
                'per_nic' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],
            
                'per_passport_no' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],
            
                'per_date_of_birth' => ['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker','hint'=>'','pluginOptions'=>['autoclose'=>true]],
            
                'per_birth_place' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],
            
                'per_nationality_id' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],
            
                'per_race_id' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],
            
                ]
]);
?>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php
ActiveForm::end();
?>