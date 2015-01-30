<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\FormGrid;
use kartik\builder\Form;


$form = ActiveForm::begin();
echo FormGrid::widget([
    'model' => $model,
    'form' => $form,
    'autoGenerateColumns' => true,
    'rows' => [
    
    
[
'attributes' => [
        'cl_name' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],

                        'cl_grade' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],

                        'cl_start_date' => ['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker','hint'=>'','options' => ['pluginOptions' => ['format' => 'yyyy-mm-dd', 'autoclose'=>true, 'todayHighlight' => true]]],

                ],
],
   
    
    ]
]);


use kartik\tabs\TabsX;
echo TabsX::widget([
    'position'=>TabsX::POS_ABOVE,
    'bordered'=>true,
    'encodeLabels'=>false,
    'items' => [    
    [
'label' => 'Students',
'content' => $this->render('_student_grid', [
         'form' => $form,
         'model' => $model,
         'studentMods' => $studentMods,
     ])
],
     ]
]);

?>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php
ActiveForm::end();
?>