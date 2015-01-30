<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\SchoolClass;
/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'st_class_id')->dropDownList(ArrayHelper::map(SchoolClass::find()->orderBy('cl_name')->asArray()->all(), 'cl_id', 'cl_name')) ?>

    <?= $form->field($model, 'st_name')->textInput(['maxlength' => 20]) ?>

    <?=  ''
                ?>
                 <?php
    echo Html::activeLabel($model,'st_date_of_birth');;
    echo DatePicker::widget([
        'model' => $model,
        'attribute' => 'st_date_of_birth',
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
