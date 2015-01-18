<?php
use app\models\Continent; 
use yii\helpers\Html;
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="glyphicon glyphicon-list"></i>Manage Continent</h3>        
    </div>
    <table id="continent_grid">
        <tr>
            <?php $continentMod = new Continent; ?>
                   <th><?= $continentMod->getAttributeLabel('co_id'); ?></th>
                    <th class="hidden"><?= $continentMod->getAttributeLabel('co_main_city_id'); ?></th>
                    <th><?= $continentMod->getAttributeLabel('co_name'); ?></th>
                    <th><?= $continentMod->getAttributeLabel('co_area'); ?></th>
                    <th><?= $continentMod->getAttributeLabel('co_description'); ?></th>
               </tr>
     
<?php
$index = 0;
foreach ($continentMods as $index => $continentMod){
     echo $this->render('_continent_row', [
         'form' => $form,
         'continentMod' => $continentMod,
         'index' => $index,
     ]);     
}
$continentCnt = $index + 1; 
?>
</table>

<?php
echo Html::a('<i class="glyphicon glyphicon-plus"></i> Add New', '#', ['class'=>'btn btn-success', 'onClick' => 'addcontinentRow();']) 
?>
</div>


<script>
    var continentCnt= <?= $continentCnt; ?>;    
    function addcontinentRow(){
        <?php
            $continentMod = new Continent();
            $continentMod->co_main_city_id = isset($model->c_id)?$model->c_id:0;
            $rowHtml = $this->render('_continent_row',
                array('form' => $form,
                    'continentMod' => $continentMod,
                    'index' => '#replace#'));
//            $rowHtml = str_replace(array("\r\n", "\r", "\n"), "", $rowHtml);
//            $rowHtml = str_replace("'", "\"", $rowHtml);
        ?>
       rowHtml = <?= json_encode($rowHtml); ?>;    
       
       rowHtml = rowHtml.replace(/#replace#/g, continentCnt);
       continentCnt++;
           
       $('#continent_grid').append(rowHtml);
    } 
    
    function removecontinentRow(id){
        var row = $("#" + id);
        row.html('');
    }    
</script>