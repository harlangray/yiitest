<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper; 
use app\models\Continent;

/* @var $this yii\web\View */
/* @var $model app\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $form->field($model, 'cn_continent_id')->textInput(); ?>

            <?= $form->field($model, 'cn_continent_id')->dropDownList(ArrayHelper::map(Continent::find()->asArray()->all(), 'co_id', 'co_name')) ?>
    
    <?= $form->field($model, 'cn_name')->textInput(['maxlength' => 20]) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
