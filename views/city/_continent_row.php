<?php



?>
<tr id="continent_row_<?= $index; ?>">        
    <td><?=$form->field($continentMod, "[$index]co_id", ['template' => '{input}{hint}{error}'])->textInput(['readonly' => true, 'style' => 'width : 60px']); ?></td>
    <td class="hidden"><?=$form->field($continentMod, "[$index]co_main_city_id", ['template' => '{input}{hint}{error}'])->textInput(['readonly' => true, 'style' => 'width : 60px']); ?></td>
    
    <td><?=$form->field($continentMod, "[$index]co_name", ['template' => '{input}{hint}{error}'])->textInput(['maxlength' => 20]) ?></td>
        
    <td><?=$form->field($continentMod, "[$index]co_area", ['template' => '{input}{hint}{error}'])->textInput() ?></td>
        
    <td><?=$form->field($continentMod, "[$index]co_description", ['template' => '{input}{hint}{error}'])->textarea(['rows' => 6]) ?></td>
        <td>
        <a title="Remove" onclick="removecontinentRow('continent_row_<?= $index ?>')">
            <span class="glyphicon glyphicon-trash"></span>
        </a>
    </td>      
</tr>
