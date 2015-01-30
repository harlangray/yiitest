<?php
use app\models\Student; 
use yii\helpers\Html;
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="glyphicon glyphicon-list"></i>Manage Students</h3>        
    </div>
    <table id="student_grid">
        <tr>
            <?php $studentMod = new Student; ?>
                     <th class="detail-header"><?= $studentMod->getAttributeLabel('st_id'); ?></th>
                      <th class="detail-header hidden"><?= $studentMod->getAttributeLabel('st_class_id'); ?></th>
                      <th class="detail-header"><?= $studentMod->getAttributeLabel('st_name'); ?></th>
                      <th class="detail-header"><?= $studentMod->getAttributeLabel('st_date_of_birth'); ?></th>
                      <th class="detail-header">Action</th>
     </tr>
     
<?php
$index = 0;
foreach ($studentMods as $index => $studentMod){
     echo $this->render('_student_row', [
         'form' => $form,
         'studentMod' => $studentMod,
         'index' => $index,
     ]);     
}
$studentCnt = $index + 1; 
?>
</table>
    <div class="detail-button-panel">
<?php
echo Html::a('<i class="glyphicon glyphicon-plus"></i> Add New', '#', ['class'=>'btn btn-success', 'onClick' => 'addstudentRow();']) 
?>    </div>
</div>


<script>
    var studentCnt= <?= $studentCnt; ?>;    
    function addstudentRow(){
        <?php
            $studentMod = new Student();
            $studentMod->st_class_id = isset($model->cl_id)?$model->cl_id:0;
            $rowHtml = $this->render('_student_row',
                array('form' => $form,
                    'studentMod' => $studentMod,
                    'index' => '#replace#'));
//            $rowHtml = str_replace(array("\r\n", "\r", "\n"), "", $rowHtml);
//            $rowHtml = str_replace("'", "\"", $rowHtml);
        ?>
       rowHtml = <?= json_encode($rowHtml); ?>;    
       
       rowHtml = rowHtml.replace(/#replace#/g, studentCnt);
       studentCnt++;
           
       $('#student_grid').append(rowHtml);
    } 
    
    function removestudentRow(id){
        var row = $("#" + id);
        row.html('');
    }    
</script>
