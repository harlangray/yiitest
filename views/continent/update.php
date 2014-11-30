<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Continent */

$this->title = 'Update Continent: ' . ' ' . $model->co_id;
$this->params['breadcrumbs'][] = ['label' => 'Continents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->co_id, 'url' => ['view', 'id' => $model->co_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="continent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
