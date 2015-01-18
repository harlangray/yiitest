<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Continent */

$this->title = $model->co_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Continents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="continent-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->co_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->co_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'co_id',
            [
                'attribute' => 'co_main_city_id',
                'value'=>$model->coMainCity->c_name,
            ],
            'co_name',
            'co_area',
            'co_description:ntext',
            'co_created_by',
            'co_created_at',
            'co_updated_by',
            'co_updated_at',
            'co_is_deleted',
            'co_deleted_by',
            'co_deleted_at',
        ],
    ]) ?>

</div>
