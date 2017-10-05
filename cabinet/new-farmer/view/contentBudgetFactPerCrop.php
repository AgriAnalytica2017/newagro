<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 08.09.2017
 * Time: 11:10
 */
?>

<div class="box">
    <div class="box-bodyn">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content">План/Факт бюджет по культурах</strong>
            </h1>
        </div>
    </div>
    <div class="rown">

        <div class="table-responsive">
            <table class="table">
                <tbody>
                <?php foreach ($date['table'] as $table){?>
                    <tr>
                        <td class="<?=$table['class']?>"><?if($_COOKIE['lang']=='ua'){echo $table['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $table['name_en'];}?></td>
                        <?php foreach ($date['budget']['crop_'.$table['array']] as $key => $value){?>
                            <td class="line_left" <? if($table['array'] =='budget_crop_name') echo "colspan=3 style='text-align:center;'"?> ><? if($table['href_crop'] !=false){echo "<a href='".$table['href_crop'].$key."' </a>";}?><?if($table['array']!='budget_crop_name') echo number_format($value); else echo $value;?></td>
                            <? if($table['array']!='budget_crop_name'){?>
                                <td><? if($table['href_crop_fact'] !=false){echo "<a href='".$table['href_crop_fact'].$key."' </a>";}?><? echo number_format($date['budget']['crop_fact_'.$table['array']][$key]);?></td>
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
    </div>

</div>
