<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 09.08.2017
 * Time: 9:12
 */
?>
<div class="box-bodyn">
    <div class="non-semantic-protector">
        <h1 class="ribbon">
            <strong class="ribbon-content">Storage</strong>
        </h1>
    </div>
</div>
<? 
 echo date;
//var_dump($date['return_budget']);die;?>
<select onchange="window.location.href=this.options[this.selectedIndex].value" class="form-control">
    <option value="/new-farmer/budget/">budget</option>
    <?php foreach ($date['save_budget_list'] as $list){?>
        <option <?php  if($date['id_budget']==$list['id_budget']) echo 'selected'?>  value="<?=SRC::getSrc().'/new-farmer/budget/'.$list['id_budget']?>"><?=$list['data_save'].' '.$list['time_save']?></option>
    <?}?>
</select>
<table class="table">
    <tbody>
        <?php foreach ($date['table'] as $table){?>
            <tr>
                <td class="<?=$table['class']?>"><?=$table['name']?></td>
                <?php foreach ($date['budget'][$table['array']] as $key => $value){?>
                    <td <? if($table['array'] =='budget_crop_name' and $date['id_budget']!=false) echo "colspan=2 style='text-align:center;'"?> ><?if($table['array']!='budget_crop_name') echo number_format($value); else echo $value;?></td>
                    <? if($table['array']!='budget_crop_name' and $date['id_budget']!=false){?><td><? echo number_format($date['return_budget'][$table['array']][$key]);?></td><?}?>
                <?} ?>
            </tr>
        <?}?>
    </tbody>
</table>
<a href="/new-farmer/save_budget" class="btn btnn btn-success">Сохранить бюджет</a>
