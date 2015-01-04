<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="form">
    <?php $form = ActiveForm::begin(); ?>
    <table>
        <tr><th>Continent</th><th>Country</th></tr>
        <?php foreach($items as $i=>$item): ?>
            <tr>
                
                <td><?= $form->field($item,"[$i]cn_continent_id"); ?></td>
                <td><?= $form->field($item,"[$i]cn_name"); ?></td>

            </tr>
        <?php endforeach; ?>
            <tr>
                <?php 
                $i++;
                $item = new \app\models\Country();
                ?>
                <td><?= $form->field($item,"[$i]cn_continent_id"); ?></td>
                <td><?= $form->field($item,"[$i]cn_name"); ?></td>                
            </tr>
    </table>
    <?= Html::submitButton('Save'); ?>
    <?php ActiveForm::end(); ?>
</div><!-- form -->