<?php
/* @var $model app\models\Continent */


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
                'co_name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '']],
                'co_date_field' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => '\kartik\widgets\DatePicker', 'hint' => '', 'pluginOptions' => ['autoclose' => true]],
                'co_datetime_field' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => '\kartik\widgets\DateTimePicker', 'hint' => '', 'pluginOptions' => ['autoclose' => true]],
            ],
        ],
        [
            'attributes' => [
                'co_created_on' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => '\kartik\widgets\DatePicker', 'hint' => '', 'pluginOptions' => ['autoclose' => true]],
            ],
        ],
    ]
]);


 

?>  
  
<?= $this->render('_country_detail', [
        'model' => $model,
    'form' => $form,
    ]); 
?>


<div class="form-group">
<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php
ActiveForm::end();
?>