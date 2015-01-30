<?php



?>
<tr id="student_row_<?= $index; ?>">        
    <td class="v-align-top"><?=$form->field($studentMod, "[$index]st_id", ['template' => '{input}{hint}{error}'])->textInput(['readonly' => true, 'style' => 'width : 60px']); ?></td>
    <td class="v-align-top hidden"><?=$form->field($studentMod, "[$index]st_class_id", ['template' => '{input}{hint}{error}'])->textInput(['readonly' => true, 'style' => 'width : 60px']); ?></td>
    
    <td class="v-align-top"><?=$form->field($studentMod, "[$index]st_name", ['template' => '{input}{hint}{error}'])->textInput(['maxlength' => 20]) ?></td>
        
    <td class="v-align-top"><?= ''
                ?>
                 <?php
    echo \kartik\date\DatePicker::widget([
        'model' => $studentMod,
        'attribute' => "[$index]st_date_of_birth",
        'options' => ['placeholder' => 'Select date ...'],
        'pluginOptions' => [      
            'todayHighlight' => true,
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'                    
        ]
]);
    ?>
    <?= ''
              ?></td>
        <td class="h-align-center">
        <a title="Remove" onclick="removestudentRow('student_row_<?= $index ?>')">
            <span class="glyphicon glyphicon-trash"></span>
        </a>
    </td>      
</tr>
