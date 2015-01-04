<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContinentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="continent-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'co_id') ?>

    <?= $form->field($model, 'co_name') ?>

    <?= $form->field($model, 'co_date_field') ?>

    <?= $form->field($model, 'co_datetime_field') ?>

    <?= $form->field($model, 'co_created_on') ?>

    <?php // echo $form->field($model, 'co_created_at') ?>

    <?php // echo $form->field($model, 'co_created_by') ?>

    <?php // echo $form->field($model, 'co_is_deleted') ?>

    <?php // echo $form->field($model, 'co_updated_by') ?>

    <?php // echo $form->field($model, 'co_updated_at') ?>

    <?php // echo $form->field($model, 'co_deleted_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
