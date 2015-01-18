<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\FormGrid;
use kartik\builder\Form;

use yii\helpers\ArrayHelper;
use app\models\Continent;
use app\models\User;

$form = ActiveForm::begin();
echo FormGrid::widget([
    'model' => $model,
    'form' => $form,
    'autoGenerateColumns' => true,
    'rows' => [
    
    
[
'attributes' => [
        'cn_continent_id' => ['type'=>Form::INPUT_DROPDOWN_LIST, 'items' => ArrayHelper::map(Continent::find()->orderBy('co_name')->asArray()->all(), 'co_id', 'co_name'),'options'=>['placeholder'=>'']],

                        'cn_name' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],

                        'cn_area' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'']],

                ],
],
   
    
    ]
]);


?>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php
ActiveForm::end();
?>