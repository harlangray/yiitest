<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;
use yii\helpers\ArrayHelper;
use app\models\City;
/* @var $this yii\web\View */
/* @var $model app\models\Continent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="continent-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'co_main_city_id')->dropDownList(ArrayHelper::map(City::find()->orderBy('c_name')->asArray()->all(), 'c_id', 'c_name')) ?>

    <?= $form->field($model, 'co_name')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'co_area')->textInput() ?>

    <?= $form->field($model, 'co_description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
