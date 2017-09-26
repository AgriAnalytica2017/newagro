<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 25.09.2017
 * Time: 15:18
 */
/*echo "<pre>";
var_dump($date);die;*/
?>
<div class="box-body">
    <div class="responsive">
        <div>
            <h3 style="float: left;">
                <? echo $date['table_name_fact_ua']?>
            </h3>
            <a href="/new-farmer/fact_budget_field" class="btn btn-success" style="float: right; margin-top: 7px; margin-right: 15px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        </div>
        <table class="table table-striped well">
            <thead>
            <tr>
                <?foreach ($date['table_head_fact_ua'] as $head){?>
                    <th><?=$head;?></th>
                <?}?>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?
                $total_sum = 0;
                foreach ($date['budget']['fact_remains'][$date['type']] as $material){
                $total_sum +=$material['price']; ?>
            <tr>
                <td><?=$material['date']?></td>
                <td><?=$material['action']?></td>
                <td><?=$date['material_name'][$material['material']]['name_material']?></td>
                <td><?=number_format($material['area'], 0,',',' ')?></td>
                <td><?=number_format($material['quantity'], 2,',',' ')?></td>
                <td><?=number_format($material['price'], 2,',',' ')?></td>
            </tr>
            <?}?>
            </tr>
            <tr style="font-weight: bold;">
                <td colspan="5">Всього, грн</td>
                <td><?=number_format($total_sum,2,',',' ')?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

