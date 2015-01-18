<?php
use app\models\Country; 
use yii\helpers\Html;
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="glyphicon glyphicon-list"></i>Manage Country</h3>        
    </div>
    <table id="country_grid">
        <tr>
            <?php $countryMod = new Country; ?>
                   <th><?= $countryMod->getAttributeLabel('cn_id'); ?></th>
                    <th><?= $countryMod->getAttributeLabel('cn_continent_id'); ?></th>
                    <th class="hidden"><?= $countryMod->getAttributeLabel('cn_capital_city_id'); ?></th>
                    <th><?= $countryMod->getAttributeLabel('cn_name'); ?></th>
                    <th><?= $countryMod->getAttributeLabel('cn_area'); ?></th>
               </tr>
     
<?php
$index = 0;
foreach ($countryMods as $index => $countryMod){
     echo $this->render('_country_row', [
         'form' => $form,
         'countryMod' => $countryMod,
         'index' => $index,
     ]);     
}
$countryCnt = $index + 1; 
?>
</table>

<?php
echo Html::a('<i class="glyphicon glyphicon-plus"></i> Add New', '#', ['class'=>'btn btn-success', 'onClick' => 'addcountryRow();']) 
?>
</div>


<script>
    var countryCnt= <?= $countryCnt; ?>;    
    function addcountryRow(){
        <?php
            $countryMod = new Country();
            $countryMod->cn_capital_city_id = isset($model->c_id)?$model->c_id:0;
            $rowHtml = $this->render('_country_row',
                array('form' => $form,
                    'countryMod' => $countryMod,
                    'index' => '#replace#'));
//            $rowHtml = str_replace(array("\r\n", "\r", "\n"), "", $rowHtml);
//            $rowHtml = str_replace("'", "\"", $rowHtml);
        ?>
       rowHtml = <?= json_encode($rowHtml); ?>;    
       
       rowHtml = rowHtml.replace(/#replace#/g, countryCnt);
       countryCnt++;
           
       $('#country_grid').append(rowHtml);
    } 
    
    function removecountryRow(id){
        var row = $("#" + id);
        row.html('');
    }    
</script>