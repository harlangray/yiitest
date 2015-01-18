<?php



?>
<tr id="country_row_<?= $index; ?>">        
    <td class="v-align-top"><?=$form->field($countryMod, "[$index]cn_id", ['template' => '{input}{hint}{error}'])->textInput(['readonly' => true, 'style' => 'width : 60px']); ?></td>
    <td class="v-align-top hidden"><?=$form->field($countryMod, "[$index]cn_continent_id", ['template' => '{input}{hint}{error}'])->textInput(['readonly' => true, 'style' => 'width : 60px']); ?></td>
    
    <td class="v-align-top"><?=$form->field($countryMod, "[$index]cn_capital_city_id", ['template' => '{input}{hint}{error}'])->dropDownList(\yii\helpers\ArrayHelper::map(app\models\City::find()->orderBy('c_name')->asArray()->all(), 'c_id', 'c_name')) ?></td>
        
    <td class="v-align-top"><?=$form->field($countryMod, "[$index]cn_name", ['template' => '{input}{hint}{error}'])->textInput(['maxlength' => 20]) ?></td>
        
    <td class="v-align-top"><?=$form->field($countryMod, "[$index]cn_area", ['template' => '{input}{hint}{error}'])->textInput() ?></td>
        <td class="h-align-center">
        <a title="Remove" onclick="removecountryRow('country_row_<?= $index ?>')">
            <span class="glyphicon glyphicon-trash"></span>
        </a>
    </td>      
</tr>
