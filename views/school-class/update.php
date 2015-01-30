<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SchoolClass */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'School Class',
]) . ' ' . $model->cl_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'School Classes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cl_name, 'url' => ['view', 'id' => $model->cl_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
    echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
}
?>

<div class="school-class-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
                    
    ]) ?>

</div>
