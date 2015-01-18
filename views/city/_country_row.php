<?php



?>
<tr id="country_row_<?= $index; ?>">        
    <td><?=$form->field($countryMod, "[$index]cn_id", ['template' => '{input}{hint}{error}'])->textInput(['readonly' => true, 'style' => 'width : 60px']); ?></td>
        
    <td><?=$form->field($countryMod, "[$index]cn_continent_id", ['template' => '{input}{hint}{error}'])->dropDownList(\yii\helpers\ArrayHelper::map(app\models\Continent::find()->orderBy('co_name')->asArray()->all(), 'co_id', 'co_name')) ?></td>
    <td class="hidden"><?=$form->field($countryMod, "[$index]cn_capital_city_id", ['template' => '{input}{hint}{error}'])->textInput(['readonly' => true, 'style' => 'width : 60px']); ?></td>
    
    <td><?=$form->field($countryMod, "[$index]cn_name", ['template' => '{input}{hint}{error}'])->textInput(['maxlength' => 20]) ?></td>
        
    <td><?=$form->field($countryMod, "[$index]cn_area", ['template' => '{input}{hint}{error}'])->textInput() ?></td>
        <td>
        <a title="Remove" onclick="removecountryRow('country_row_<?= $index ?>')">
            <span class="glyphicon glyphicon-trash"></span>
        </a>
    </td>      
</tr>
