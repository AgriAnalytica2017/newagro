<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24.08.2017
 * Time: 11:05
 */
/*echo "<pre>";
var_dump($date);
echo "</pre>";*/
?>
       <style>
        .width100{
            width: 100%;
        }
    </style>
       <div class="box-bodyn col-lg-12">
            <div class="non-semantic-protector col-sm-3">
<? if($_COOKIE['lang']=='ua'){echo $date['table_name_ua'];} elseif($_COOKIE['lang']=='gb'){ echo $date['table_name_en'];}?>
        </div>
          <a href="/new-farmer/budget/<?=$date['budget']['field_id_for_remains']?>" class="btn btn-success" style="float: right; margin-right: 15px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
    </div>
  <div class="table-responsive width100">
        <table class="table">
            <thead>
            <tr>
                <?if($_COOKIE['lang']=='ua'){foreach ($date['table_head_ua'] as $head){?>
                    <th><?=$head;?></th>
                <?}}
                elseif($_COOKIE['lang']=='gb'){foreach ($date['table_head_en'] as $head){?>
                    <th><?=$head;?></th>
                <?}}?>
            </tr>
            </thead>
            <tbody>
            <?
            $total_sum = 0;
            foreach ($date['budget']['remains'][$date['type']] as $material){
                $total_sum +=$material['summ_price']; ?>
                <tr>
                    <td><?=$material['action']?></td>
                    <td><?=$material['name']?></td>
                    <td><?=number_format($material['area'], 0,'.',' ')?></td>
                    <td><?=number_format($material['norm'], 2,'.',' ')?></td>
                    <td><?=number_format($material['price'], 2,'.',' ')?></td>
                    <td><?=number_format($material['summ_price'], 0,'.',' ')?></td>
                </tr>
            <?}?>
            <tr style="font-weight: bold;">
               <td colspan="5">Всього, грн</td>
               <td><?=number_format($total_sum,2,',',' ')?></td>
            </tr>
            </tbody>
        </table>
</div>