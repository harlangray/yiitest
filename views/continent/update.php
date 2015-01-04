<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Continent */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Continent',
]) . ' ' . $model->co_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Continents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->co_name, 'url' => ['view', 'id' => $model->co_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="continent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
