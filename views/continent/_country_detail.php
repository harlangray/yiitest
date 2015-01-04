<?php

use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\helpers\Html;

$query = app\models\Country::find();
//$query = $model->countries;
//add your conditions
$query->andWhere("cn_continent_id = $model->co_id");
$dataProvider = new \yii\data\ActiveDataProvider([
    'query' => $query,
    'pagination' => false,
]);

//$form = ActiveForm::begin();


echo TabularForm::widget([
    'form' => $form,
    'dataProvider' => $dataProvider,
    'checkboxColumn' => [
                            'class' => '\kartik\grid\CheckboxColumn',
                            'contentOptions' => ['class' => 'kv-row-select'],
                            'headerOptions' => ['class' => 'kv-all-select'],
                        ],
    'actionColumn' => [
                            'class' => '\kartik\grid\ActionColumn',
                            'updateOptions' => ['style' => 'display:none;'],
                            'width' => '60px',
                            'dropdown' => false,
                            'buttons' => [
                                
                            ]
                        ],

    'attributes' => [
        'cn_id' => ['type' => TabularForm::INPUT_STATIC, 'columnOptions'=>['hAlign'=>GridView::ALIGN_CENTER]],
        'cn_is_deleted' => ['type' => TabularForm::INPUT_TEXT],
//        'color' => [
//            'type' => TabularForm::INPUT_WIDGET, 
//            'widgetClass' => \kartik\widgets\ColorInput::classname()
//        ],
        'cn_description' => [
            'type' => TabularForm::INPUT_TEXT, 
//            'items'=>  yii\helpers\ArrayHelper::map(app\models\Country::find()->orderBy('cn_description')->asArray()->all(), 'cn_id', 'cn_description')
        ],
],
    
    'gridSettings'=>[
        'floatHeader'=>true,
        'panel'=>[
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Manage Books</h3>',
            'type' => GridView::TYPE_PRIMARY,
            'after'=> Html::a('<i class="glyphicon glyphicon-plus"></i> Add New', '#', ['class'=>'btn btn-success']) . ' ' . 
                    Html::a('<i class="glyphicon glyphicon-remove"></i> Delete', '#', ['class'=>'btn btn-danger']) . ' ' .
                    Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Save', ['class'=>'btn btn-primary'])
        ]
    ]   
    
    ]);


//ActiveForm::end();

?>