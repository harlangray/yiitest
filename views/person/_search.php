<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'per_id') ?>

    <?= $form->field($model, 'per_full_name') ?>

    <?= $form->field($model, 'per_biometric_id') ?>

    <?= $form->field($model, 'per_fingerprint_mapid') ?>

    <?= $form->field($model, 'per_other_name1') ?>

    <?php // echo $form->field($model, 'per_other_name2') ?>

    <?php // echo $form->field($model, 'per_call_name1') ?>

    <?php // echo $form->field($model, 'per_call_name2') ?>

    <?php // echo $form->field($model, 'per_gender_id') ?>

    <?php // echo $form->field($model, 'per_nic') ?>

    <?php // echo $form->field($model, 'per_passport_no') ?>

    <?php // echo $form->field($model, 'per_date_of_birth') ?>

    <?php // echo $form->field($model, 'per_birth_place') ?>

    <?php // echo $form->field($model, 'per_nationality_id') ?>

    <?php // echo $form->field($model, 'per_race_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
