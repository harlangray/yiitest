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
        'c_name' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],

                        'c_population' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],

                ],
],
   
    
    ]
]);

     echo $this->render('_continent_grid', [
         'form' => $form,
         'model' => $model,
         'continentMods' => $continentMods,
     ]);
     echo $this->render('_country_grid', [
         'form' => $form,
         'model' => $model,
         'countryMods' => $countryMods,
     ]);

?>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php
ActiveForm::end();
?>