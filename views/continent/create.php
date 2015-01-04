<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Continent */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Continent',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Continents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="continent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
