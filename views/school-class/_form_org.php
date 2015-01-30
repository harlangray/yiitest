<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\SchoolClass */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="school-class-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cl_name')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'cl_grade')->textInput() ?>

    <?=  ''
                ?>
                 <?php
    echo Html::activeLabel($model,'cl_start_date');;
    echo DatePicker::widget([
        'model' => $model,
        'attribute' => 'cl_start_date',
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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
