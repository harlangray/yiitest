<table>
     <tr>
          <?php $countryMod = new \app\models\Country; ?>
          <th><?= $countryMod->getAttributeLabel('cn_name'); ?></th>
     </tr>
<?php

foreach ($countryMods as $countryMod){
     echo $this->render('_country_row', [
         'countryMod' => $countryMod,
     ]);     
}
?>

</table>