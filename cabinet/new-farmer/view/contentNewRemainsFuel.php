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
/*
    td{
        border: 1px solid #59ae7f !important;
    }
*/
</style>
       <div class="box-bodyn col-lg-12">
        <div class="non-semantic-protector col-sm-4">
       Витрати на пальне, грн
        </div>
                   <a href="/new-farmer/budget/<?=$date['budget']['field_id_for_remains']?>" class="btn btn-success" style="float: right;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
                    </div>

       <div class="table-responsive width100">
        <table class="table table-striped">
            <thead>
            <tr>
                <th <? if($data=2) echo 'rowspan="2"';?>>Найменування робіт</th>
                <th>Назва с/г техніки</th>
                <th>Назва с/г обладнання</th>
                <th>Тип пального</th>
                <th>Обсяг робіт га,т</th>
                <th>Розхід пального на од.роб., л</th>
                <th>Загальний обсяг пального, л</th>
                <th>Ціна пального, грн/л</th>
                <th>Сумма, грн</th>
            </tr>
            </thead>
            <tbody>
                <?
                $id=0;
                $id_v=0;
                $total_sum = 0;
                foreach ($date['budget']['remains'] as $fuel){
                    if($fuel['equipment']==true)foreach ($fuel['equipment'] as $equipment){
                        if($equipment['eq'][1]['equipment_name']!=null)foreach ($equipment['eq'] as $eq){
                            $total_sum +=$equipment['summ_price'];?>
                        <tr>
                            <?if($fuel['id']!=$id){?><td rowspan="<?=$fuel['row']?>"><? echo $fuel['action']?></td><?} ?>
                            <?if($equipment['id_v']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['vehicles_name']?></td><?}?>
                            <td><?=$eq['equipment_name']?></td>
                            <?if($equipment['id_v']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $date['fuel_type']['ua'][$equipment['vehicles_type_fuel']] ?></td><?}?>
                            <?if($fuel['id']!=$id){?><td rowspan="<?=$fuel['row']?>"><? echo $fuel['work_amount']?></td><?} ?>
                            <?if($equipment['id_v']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['rate'].' л'?></td><?} ?>
                            <?if($equipment['id_v']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['total_fuel'].' л'?></td><?}?>
                            <td><?=$equipment['fuel_price']?></td>
                            <?if($equipment['id_v']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['summ_price']?></td><?} ?>
                        </tr>
                        <?
                        $id=$fuel['id'];$id_v = $equipment['id_v'];
                        }else{?>
                        <tr>
                            <?if($fuel['id']!=$id){?><td rowspan="<?=$fuel['row']?>"><? echo $fuel['action']?></td><?} ?>
                            <td><? echo $equipment['vehicles_name']?></td>
                            <td></td>
                            <td><?echo $date['fuel_type']['ua'][$equipment['vehicles_type_fuel']] ?></td>
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