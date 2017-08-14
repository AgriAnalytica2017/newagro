<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 09.08.2017
 * Time: 9:12
 */
$save=array(
    'plane_revenues'=>$date['budget']['plane_revenues'],
    'budget_seeds'=>$date['budget']['budget_seeds'],
    'budget_fertilizers'=>$date['budget']['budget_fertilizers'],
    'budget_ppa'=>$date['budget']['budget_ppa'],
    'budget_equipment'=>$date['budget']['budget_equipment'],
    'budget_pay'=>$date['budget']['budget_pay'],
);
//$array = serialize($save);
echo "<pre>";
var_dump($array);
?>
<table class="table">
    <tbody>
        <?php foreach ($date['table'] as $table){?>
            <tr>
                <td class="<?=$table['class']?>"><?=$table['name']?></td>
                <?php foreach ($date['budget'][$table['array']] as $value){?>
                    <td><?if($table['array']!='budget_crop_name') echo number_format($value); else echo $value;?></td>
                <?} ?>
            </tr>
        <?}?>
    </tbody>
</table>
