<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 29.09.2017
 * Time: 17:57
 */
/*echo "<pre>";
var_dump($date['budget']['crop_remains']);die;*/
?>
<div class="box-body">
    <div class="responsive">
        <div>
            <h3 style="float: left;">
                <? if($_COOKIE['lang']=='ua'){echo $date['table_name_crop_ua'];} elseif($_COOKIE['lang']=='gb'){ echo $date['table_name_crop_ua'];}?>
            </h3>
            <a href="/new-farmer/budget_per_crop" class="btn btn-success" style="float: right; margin-top: 7px; margin-right: 15px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        </div>
        <table class="table table-striped well">
            <thead>
            <tr>
                <?if($_COOKIE['lang']=='ua'){foreach ($date['table_head_crop_ua'] as $head){?>
                    <th><?=$head;?></th>
                <?}}
                elseif($_COOKIE['lang']=='gb'){foreach ($date['table_head_crop_en'] as $head){?>
                    <th><?=$head;?></th>
                <?}}?>
            </tr>
            </thead>
            <tbody>
            <?
            $total_sum = 0;
            foreach ($date['budget']['crop_remains'][$date['type']] as $key=>$material) {
                ?>
                <tr>
                <td <? if ($id_field = $key) {
                    echo 'rowspan="' . count($material) . '"';
                } ?>><?= $date['budget']['budget_crop_name'][$key] ?></td>
                <?
                foreach ($material as $crop_material) {
                    $total_sum += $crop_material['summ_price']; ?>
                    <td><?= $crop_material['action'] ?></td>
                    <td><?= $crop_material['name'] ?></td>
                    <td><?= number_format($crop_material['area'], 0, '.', ' ') ?></td>
                    <td><?= number_format($crop_material['norm'], 2, '.', ' ') ?></td>
                    <td><?= number_format($crop_material['price'], 2, '.', ' ') ?></td>
                    <td><?= number_format($crop_material['summ_price'], 0, '.', ' ') ?></td>
                    </tr>
                <?
                }
            }?>
            <tr style="font-weight: bold;">
                <td colspan="6">Всього, грн</td>
                <td><?=number_format($total_sum,2,',',' ')?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
