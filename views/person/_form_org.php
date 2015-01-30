<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'per_id')->textInput() ?>

    <?= $form->field($model, 'per_full_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'per_biometric_id')->textInput() ?>

    <?= $form->field($model, 'per_fingerprint_mapid')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'per_other_name1')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'per_other_name2')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'per_call_name1')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'per_call_name2')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'per_gender_id')->textInput() ?>

    <?= $form->field($model, 'per_nic')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'per_passport_no')->textInput(['maxlength' => 15]) ?>

    <?=  ''
                ?>
                 <?php
    echo Html::activeLabel($model,'per_date_of_birth');;
    echo DatePicker::widget([
        'model' => $model,
        'attribute' => 'per_date_of_birth',
        'options' => ['placeholder' => 'Select date ...'],
        'pluginOptions' => [      
            'todayHighlight' => true,
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'                    
        ]
]);
    ?>
    <?= ''
              ?>

    <?= $form->field($model, 'per_birth_place')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'per_nationality_id')->textInput() ?>

    <?= $form->field($model, 'per_race_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
