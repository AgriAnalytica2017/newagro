<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24.08.2017
 * Time: 12:16
 */
//echo "<pre>";
//var_dump($date['budget']['remains']);
//echo "</pre>";
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
                Fuel costs
            </h3>
        </div>
        <table class="table table-striped well">
            <thead>
            <tr>
                <th <? if($data=2) echo 'rowspan="2"';?>>Operation</th>
                <th>Vehicle name</th>
                <th>Vehicle manufacturer</th>
                <th>Vehicle fuel</th>
                <th>Equipment name</th>
                <th>Equipment type</th>
                <th>Equipment kind</th>
                <th>Fuel rate per hectare</th>
                <th>Total, UAH</th>
            </tr>
            </thead>
            <tbody>
                <?
                $id=0;
                $id_v=0;
                foreach ($date['budget']['remains'] as $fuel){
                    if($fuel['equipment']==true)foreach ($fuel['equipment'] as $equipment){
                        if($equipment['eq']==true)foreach ($equipment['eq'] as $eq){?>
                        <tr>
                            <?if($fuel['id']!=$id){?><td rowspan="<?=$fuel['row']?>"><? echo $fuel['action']?></td><?} ?>
                            <?if($equipment['id_v']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['vehicles_name']?></td><?}?>
                            <?if($equipment['id_v']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $equipment['vehicles_manufacturer']?></td><?}?>
                            <?if($equipment['id_v']!=$id_v){?><td rowspan="<?=count($equipment['eq'])?>"><? echo $date['fuel_type']['gb'][$equipment['vehicles_fuel']] ?></td><?}?>
                            <td><?=$eq['equipment_name']?></td>
                            <td><?=$date['type_equipment']['ua'][$eq['equipment_type']]?></td>
                            <td><?=$date['kind_equipment'][$eq['equipment_kind']]?></td>
                            <?if($fuel['id']!=$id){?><td rowspan="<?=$fuel['row']?>"><? echo $fuel['rate'].' l/h'?></td><?} ?>
                            <?if($fuel['id']!=$id){?><td rowspan="<?=$fuel['row']?>"><? echo $fuel['summ_price']?></td><?} ?>
                        </tr>
                        <?
                        $id=$fuel['id'];$id_v=$equipment['id_v'];
                        }else{?>
                        <tr>
                            <?if($fuel['id']!=$id){?><td rowspan="<?=$fuel['row']?>"><? echo $fuel['action']?></td><?} ?>
                            <td><?if($equipment['id_v']!=$id_v) echo $equipment['vehicles_name']?></td>
                            <td><?if($equipment['id_v']!=$id_v) echo $equipment['vehicles_manufacturer']?></td>
                            <td><?if($equipment['id_v']!=$id_v) echo $date['fuel_type']['gb'][$equipment['vehicles_fuel']] ?></td>
                            <td colspan="3"></td>
                            <?if($fuel['id']!=$id){?><td rowspan="<?=$fuel['row']?>"><? echo $fuel['rate']?></td><?} ?>
                            <?if($fuel['id']!=$id){?><td rowspan="<?=$fuel['row']?>"><? echo $fuel['summ_price']?></td><?} ?>
                        </tr>
                        <?$id=$fuel['id'];$id_v=$equipment['id_v'];}
                    }else{?>
                        <tr>
                            <td><?if($fuel['id']!=$id) echo $fuel['action']?></td>
                            <td colspan="6"></td>
                            <td><?if($fuel['id']!=$id) echo $fuel['rate']?></td>
                            <td><?if($fuel['id']!=$id) echo $fuel['summ_price']?></td>
                        </tr>
                    <?$id=$fuel['id'];}
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
