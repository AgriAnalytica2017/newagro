<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 26.09.2017
 * Time: 11:07
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24.08.2017
 * Time: 12:16
 */
/*echo "<pre>";
var_dump($date['budget']['fact_remains']);die;*/
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
                Фактичні витрати на пальне, грн
            </h3>
            <a href="/new-farmer/fact_budget_field" class="btn btn-success" style="float: right; margin-top: 7px; margin-right: 15px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        </div>
        <table class="table table-striped well">
            <thead>
            <tr>
                <th>Найменування робіт</th>
                <th>Назва с/г техніки</th>
                <th>Назва с/г обладнання</th>
                <th>Тип пального</th>
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
            foreach ($date['budget']['fact_remains'] as $fuel){
                if($fuel['equipment']==true)foreach ($fuel['equipment'] as $equipment){
                    $total_sum +=$equipment['price'];
                    if($equipment['eq'][0]['equipment_name']!=null)foreach ($equipment['eq'] as $eq){
                        ?>
                        <tr>
                            <?if($fuel['id']!=$id){?><td rowspan="<?=$fuel['row']?>"><? echo $fuel['action']?></td><?} ?>
                            <?if($equipment['id']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['vehicles_name']?></td><?}?>
                            <td><?=$eq['equipment_name']?></td>
                            <?if($equipment['id']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $date['fuel_type']['ua'][$equipment['vehicles_type_fuel']] ?></td><?}?>
                            <?if($equipment['id']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['total_fuel'].' л'?></td><?}?>
                            <?if($equipment['id_v']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><?=number_format($equipment['fuel_price'],2,',',' ')?></td><?}?>
                            <?if($equipment['id']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo number_format($equipment['price'],2,',',' ')?></td><?} ?>
                        </tr>
                        <?
                        $id = $fuel['id'];
                        $id_v = $equipment['id'];
                    }else{?>
                        <tr>
                            <?if($fuel['id']!=$id){?><td rowspan="<?=$fuel['row']?>"><? echo $fuel['action']?></td><?} ?>
                            <td><? echo $equipment['vehicles_name']?></td>
                            <td>111</td>
                            <td ><?echo $date['fuel_type']['ua'][$equipment['vehicles_type_fuel']] ?></td>
                            <td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['total_fuel'].' л'?></td>
                            <td><?=number_format($equipment['fuel_price'],2,',',' ')?></td>
                            <td rowspan="<?=count($equipment['eq'])?>"><? echo number_format($equipment['price'],2,',',' ')?></td>
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
                <td colspan="6">Всього, грн</td>
                <td><?=number_format($total_sum,2,',',' ')?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

