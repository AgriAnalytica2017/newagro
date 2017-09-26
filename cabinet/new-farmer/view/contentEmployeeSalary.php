<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24.08.2017
 * Time: 12:17
 */
/*    echo "<pre>";
    var_dump($date);die;*/
?>

<div class="box-body">
    <div class="responsive">
        <h3 style="float: left;">
            Витрати на зарплату, грн
        </h3>
        <a href="/new-farmer/budget/<?=$date['budget']['field_id_for_remains']?>" class="btn btn-success" style="float: right; margin-top: 7px; margin-right: 15px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        <table class="table table-striped well">
            <thead>
            <tr>
                <th>Найменування робіт</th>
                <th>П.І.Б</th>
                <th>Позиція</th>
                <th>Оплата за од.роб., грн</th>
                <th>Загальна сума, грн</th>
            </tr>
            </thead>
            <tbody>
            <?
            $total_pay = 0;
            foreach ($date['budget']['remains'] as $salary){
                $total_pay += $salary['summ_pay'];
                ?>
                <tr>
                    <td><?=$salary['action']?></td>
                    <td><?=$date['employee'][$salary['name']]['employee_name'].' '.$date['employee'][$salary['surname']]['employee_surname'];?></td>
                    <td><?=$date['employee'][$salary['position']]['employee_position'];?></td>
                    <td><?=$salary['pay'];?></td>
                    <td><?=$salary['summ_pay'];?></td>
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

