<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'People');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Person',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'per_id',
            'per_full_name',
            'per_biometric_id',
            'per_fingerprint_mapid',
            'per_other_name1',
/*            'per_other_name2',*/
/*            'per_call_name1',*/
/*            'per_call_name2',*/
/*            'per_gender_id',*/
/*            'per_nic',*/
/*            'per_passport_no',*/
/*            'per_date_of_birth',*/
/*            'per_birth_place',*/
/*            'per_nationality_id',*/
/*            'per_race_id',*/

            ['class' => 'yii\grid\ActionColumn',
'template' => '{update}{new_action1}',
'buttons' => [
    'new_action1' => function ($url, $model) {
        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                    'title' => Yii::t('app', 'New Action1'),
        ]);
    }
],
'urlCreator' => function ($action, $model, $key, $index) {
    if ($action === 'new_action1') {
        $url ='controller/action?id='.$model->per_id;
        return $url;
    }
}                
                ],
        ],
    ]); ?>

</div>
