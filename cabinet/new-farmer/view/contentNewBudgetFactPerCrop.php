<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 08.09.2017
 * Time: 11:10
 */
?>
 <style>
        .width100{
            width: 100%;
        }
          .level2 {
    padding-left: 0px !important;
}
          .level1 {
    padding-left: 0px !important;
}
/*
    }
     .table>tbody>tr>td:first-child {
    padding-left: 30px;
    text-align: -webkit-left;
}
*/
    </style>
   <div class="box-bodyn col-lg-12">
            <div class="non-semantic-protector col-sm-3">
       План/Факт бюджет по культурах
        </div>
    </div>
        <div class="table-responsive width100">
            <table class="table">
                <tbody>
                <?php foreach ($date['table'] as $table){?>
                    <tr>
                        <td class="<?=$table['class']?>"><?if($_COOKIE['lang']=='ua'){echo $table['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $table['name_en'];}?></td>
                        <?php foreach ($date['budget']['crop_'.$table['array']] as $key => $value){?>
                            <td class="line_left" <? if($table['array'] =='budget_crop_name') echo "colspan=3 style='text-align:center;'"?> ><a href="/new-farmer/budget"><?if($table['array']!='budget_crop_name') echo number_format($value); else echo $value;?></a></td>
                            <? if($table['array']!='budget_crop_name'){?>
                                <td><a><? echo number_format($date['budget']['crop_fact_'.$table['array']][$key]);?></a></td>
                                <td class="<? if($value-$date['budget']['crop_fact_'.$table['array']][$key]<0) echo 'minus'; else echo 'plus'?>"><a><? echo number_format($value-$date['budget']['crop_fact_'.$table['array']][$key]);?></a></td>
                            <?}?>
                        <?} ?>
                    </tr>
                    <? if($table['array'] =='budget_crop_name'){?>
                        <tr>
                            <td></td>
                            <?php foreach ($date['budget']['crop_'.$table['array']] as $key => $value){?>
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
        <!--<div class="col-lg-12" style="text-align: center;">
            <a href="/new-farmer/save_budget" class="btn btnn btn-success">Сохранить бюджет</a>
        </div>-->