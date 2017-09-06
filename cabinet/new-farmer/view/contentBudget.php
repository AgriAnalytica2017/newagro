<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 09.08.2017
 * Time: 9:12
 */

?>

<div class="box">
    <div class="box-bodyn">
    <div class="non-semantic-protector">
        <h1 class="ribbon">
            <strong class="ribbon-content">Budget</strong>
        </h1>
    </div>
</div>
    <div class="box-bodyn col-lg-12" style="max-height: 55px">
        <div class="col-sm-5"></div>
        <div class="col-sm-2" style="margin-top: -12px;">
        <select onchange="window.location.href=this.options[this.selectedIndex].value" class="form-control inphead">
            <option value="/new-farmer/budget/">budget</option>
            <?php foreach ($date['save_budget_list'] as $list){?>
                <option <?php  if($date['id_budget']==$list['id_budget']) echo 'selected'?>  value="<?=SRC::getSrc().'/new-farmer/budget/'.$list['id_budget']?>"><?=$list['data_save'].' '.$list['time_save']?></option>
            <?}?>
        </select>
        </div>
        <div class="col-sm-5"></div>
    </div>

    <div class="rown">
        <div class="table-responsive">
        <table class="table">
            <tbody>
                <?php foreach ($date['table'] as $table){?>
                    <tr>
                        <td class="<?=$table['class']?>"><? if($_COOKIE['lang']=='ua'){echo $table['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $table['name_en'];}?></td>
                        <?php foreach ($date['budget'][$table['array']] as $key => $value){?>
                            <td <? if($table['array'] =='budget_crop_name' and $date['id_budget']!=false) echo "colspan=2 style='text-align:center;'"?> ><?if($table['array']!='budget_crop_name'){ if($table['href']!=false) echo '<a href="'.$table['href'].$key.'">'.number_format($value).'</a>'; else echo number_format($value);} else echo $value;?></td>
                            <? if($table['array']!='budget_crop_name' and $date['id_budget']!=false){?><td><? echo number_format($date['return_budget'][$table['array']][$key]);?></td><?}?>
                        <?}?>
                    </tr>
                <?}?>
            </tbody>
        </table>
        </div>
        <div class="col-lg-12" style="text-align: center;">
        <a href="/new-farmer/save_budget" class="btn btnn btn-success">Сохранить бюджет</a>
        </div>
    </div>

</div>