<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 09.08.2017
 * Time: 9:12
 */
?>

<? 
//var_dump($date['return_budget']);die;?>
<select class="form-control">
    <?foreach ($date[''] as $value){?>
        <option value="<?=$value['id_budget']?>"><?=$value['data_save'].' '.$value['time_save']?></option>
    <?}?>

</select>
<table class="table">
    <tbody>
        <?php foreach ($date['table'] as $table){?>
            <tr>
                <td class="<?=$table['class']?>"><?=$table['name']?></td>
                <?php foreach ($date['budget'][$table['array']] as $key => $value){?>
                    <td <? if($table['array'] =='budget_crop_name') echo "colspan=2"?> ><?if($table['array']!='budget_crop_name') echo number_format($value); else echo $value;?></td>
                    <? if($table['array']!='budget_crop_name'){?><td><? echo number_format($date['return_budget'][$table['array']][$key]);?></td><?}?>
                <?} ?>
            </tr>
        <?}?>
    </tbody>
</table>
<a href="/new-farmer/save_budget" class="btn btn-success">Сохранить бюджет</a>
