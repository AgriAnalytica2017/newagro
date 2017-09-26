<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 25.09.2017
 * Time: 11:07
 */
/*echo "<pre>";
var_dump($date);die;*/
?>
<div class="box-body">
    <div class="responsive">
        <h3 style="float: left;">
            Витрати на послуги, грн
        </h3>
        <a href="/new-farmer/budget/<?=$date['budget']['field_id_for_remains']?>" class="btn btn-success" style="float: right; margin-top: 7px; margin-right: 15px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        <table class="table table-striped well">
            <thead>
            <tr>
                <th>Найменування робіт</th>
                <th>Назва послуги</th>
                <th>Обсяг робіт </th>
                <th>Оплата за од.роб., грн</th>
                <th>Загальна сума, грн</th>
            </tr>
            </thead>
            <tbody>
            <?
            $total_pay = 0;
            foreach ($date['budget']['remains'] as $services){
                $total_pay += $services['total_price'];
                ?>
                <tr>
                    <td><?=$services['action']?></td>
                    <td><?=$services['services_name'];?></td>
                    <td><?=$services['amount'];?></td>
                    <td><?=$services['price'];?></td>
                    <td><?=$services['total_price'];?></td>
                </tr>
            <?}?>
            <tr style="font-weight: bold;">
                <td colspan="4">Всього, грн</td>
                <td><?=number_format($total_pay, 2,',',' ')?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
