<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24.08.2017
 * Time: 12:16
 */
/*echo "<pre>";
var_dump($date['budget']['remains']);die;*/
    ?>
<style>
    td{
        border: 1px solid #59ae7f !important;
    }
</style>
<div class="box-body">
    <div class="responsive">
        <div>
            <h3 style="float: left;">
               Витрати на пальне, грн
            </h3>
            <a href="/new-farmer/budget/<?=$date['budget']['field_id_for_remains']?>" class="btn btn-success" style="float: right; margin-top: 7px; margin-right: 15px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        </div>
        <table class="table table-striped well">
            <thead>
            <tr>
                <th>Найменування робіт</th>
                <th>Назва с/г техніки</th>
                <th>Назва с/г обладнання</th>
                <th>Тип пального</th>
                <th>Обсяг робіт га,т</th>
                <th>Витрати пального на од.роб., л</th>
                <th>Витрати пального на весь обсяг робіт, л</th>
                <th>Ціна пального, грн/л</th>
                <th>Сума, грн</th>
            </tr>
            </thead>
            <tbody>
                <?
                $id=0;
                $id_v=0;
                $total_sum = 0;
                foreach ($date['budget']['remains'] as $fuel){
                    if($fuel['equipment']==true)foreach ($fuel['equipment'] as $equipment){
                        $total_sum +=$equipment['summ_price'];
                        if($equipment['eq'][0]['equipment_name']!=null)foreach ($equipment['eq'] as $eq){
                           ?>
                        <tr>
                            <?if($fuel['id']!=$id){?><td rowspan="<?=$fuel['row']?>"><? echo $fuel['action']?></td><?} ?>
                            <?if($equipment['id']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['vehicles_name']?></td><?}?>
                            <td><?=$eq['equipment_name']?></td>
                            <?if($equipment['id']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $date['fuel_type']['ua'][$equipment['vehicles_type_fuel']] ?></td><?}?>
                            <?if($fuel['id']!=$id){?><td rowspan="<?=$fuel['row']?>"><? echo $fuel['work_amount']?></td><?} ?>
                            <?if($equipment['id']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['rate'].' л'?></td><?} ?>
                            <?if($equipment['id']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['total_fuel'].' л'?></td><?}?>
                            <td><?=$equipment['fuel_price']?></td>
                            <?if($equipment['id']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['summ_price']?></td><?} ?>
                        </tr>
                        <?
                        $id = $fuel['id'];
                        $id_v = $equipment['id'];
                        }else{?>
                        <tr>
                            <?if($fuel['id']!=$id){?><td rowspan="<?=$fuel['row']?>"><? echo $fuel['action']?></td><?} ?>
                            <td><? echo $equipment['vehicles_name']?></td>
                            <td></td>
                            <td ><?echo $date['fuel_type']['ua'][$equipment['vehicles_type_fuel']] ?></td>
                           <td><? echo $fuel['work_amount']?></td>
                            <td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['rate'].' л'?></td>
                            <td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['total_fuel'].' л'?></td>
                            <td><?=$equipment['fuel_price']?></td>
                            <td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['summ_price']?></td>
                        </tr>
                        <?$id=$fuel['id'];$id_v=$equipment['id_v'];}
                    }else{?>
                        <tr>
                            <td><?if($fuel['id']!=$id) echo $fuel['action']?></td>
                            <td colspan="8"></td>
                        </tr>
                    <?$id=$fuel['id'];}
                }
                ?>
            <tr style="font-weight: bold;">
                <td colspan="8">Всього, грн</td>
                <td><?=number_format($total_sum,2,',',' ')?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
