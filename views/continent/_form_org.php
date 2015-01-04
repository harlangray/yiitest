<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Continent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="continent-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'co_name')->textInput(['maxlength' => 20]) ?>

    <?=  ''
                ?>
                 <?php
    echo Html::activeLabel($model,'co_date_field');;
    echo DatePicker::widget([
        'model' => $model,
        'attribute' => 'co_date_field',
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

    <?=  ''
                ?>
                 <?php
    echo Html::activeLabel($model,'co_datetime_field');;
    echo DateTimePicker::widget([
        'model' => $model,
        'attribute' => 'co_datetime_field',
        'options' => ['placeholder' => 'Select time ...'],
        'pluginOptions' => [      
            'todayHighlight' => true,
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd hh:ii'                    
        ]
]);
    ?>
    <?= ''
              ?>

    <?=  ''
                ?>
                 <?php
    echo Html::activeLabel($model,'co_created_on');;
    echo DatePicker::widget([
        'model' => $model,
        'attribute' => 'co_created_on',
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
