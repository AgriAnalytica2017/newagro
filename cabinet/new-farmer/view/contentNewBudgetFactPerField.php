<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 09.08.2017
 * Time: 9:12
 */

?>
 <style>
        .width100{
            width: 100%;
        }
          .level2 {
    padding-left: 0px!important;
}
    </style>
<div class="box">
      <div class="box-bodyn col-lg-12">
            <div class="non-semantic-protector col-sm-3">
        План/Факт бюджет по полях
        </div>
         <a href="/new-farmer/budget_per_crop" class="btn btn-success" style="float: left; margin-left: 30px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
    </div>
   <!-- <div class="box-bodyn col-lg-12" style="max-height: 55px">
        <div class="col-sm-5"></div>
        <div class="col-sm-2" style="margin-top: -12px;">
        <select onchange="window.location.href=this.options[this.selectedIndex].value" class="form-control inphead">
            <option value="/new-farmer/budget/">budget</option>
            <?php /*foreach ($date['save_budget_list'] as $list){*/?>
                <option <?php /* if($date['id_budget']==$list['id_budget']) echo 'selected'*/?>  value="<?/*=SRC::getSrc().'/new-farmer/budget/'.$list['id_budget']*/?>"><?/*=$list['data_save'].' '.$list['time_save']*/?></option>
            <?/*}*/?>
        </select>
        </div>
        <div class="col-sm-5"></div>
    </div>
-->
        <div class="table-responsive  width100">
        <table class="table">
            <tbody>
                <?php foreach ($date['table'] as $table){?>
                    <tr>
                        <td class="<?=$table['class']?>"><? if($_COOKIE['lang']=='ua'){echo $table['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $table['name_en'];}?></td>
                        <?php foreach ($date['budget'][$table['array']] as $key => $value){?>
                            <td class="line_left" <? if($table['array'] =='budget_crop_name') echo "colspan='3' style='text-align:center;'"?> ><?if($table['array']!='budget_crop_name'){ if($table['href']!=false) echo '<a href="'.$table['href'].$key.'">'.number_format($value).'</a>'; else echo number_format($value);} else echo $value;?></td>
                            <? if($table['array']!='budget_crop_name' and $date['id_budget']!=false){?><td><? echo number_format($date['return_budget'][$table['array']][$key]);?></td><?}?>
                            <? if($table['array']!='budget_crop_name'){?>
                                <td><?if($table['href_fact']!=false) echo "<a href='".$table['href_fact'].$key."' </a>"?><? echo number_format($date['budget']['field_fact_'.$table['array']][$key]);?></td>
                                <td class="<? if($value-$date['budget']['field_fact_'.$table['array']][$key]<0) echo 'minus'; else echo 'plus'?>"><a><? echo number_format($value-$date['budget']['field_fact_'.$table['array']][$key]);?></a></td>
                            <?}?>
                        <?}?>
                    </tr>
                    <? if($table['array'] =='budget_crop_name'){?>

                        <tr>
                            <td></td>
                        <?php foreach ($date['budget'][$table['array']] as $key => $value){?>
                            <td class="line_left">План</td>
                            <td>Факт</td>
                            <td>(+/-)</td>
                        <?}?>
                        </tr>
                    <?}?>
                <?}?>
            </tbody>
        </table>
        </div>
       <!-- <div class="col-lg-12" style="text-align: center;">
        <a href="/new-farmer/save_budget" class="btn btnn btn-success">Сохранить бюджет</a>
        </div>-->
</div>