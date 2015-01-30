<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SchoolCls */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'School Cls',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'School Cls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
    echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
}
?>

<div class="school-cls-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'studentMods' => $studentMods,
            
    ]) ?>

</div>
