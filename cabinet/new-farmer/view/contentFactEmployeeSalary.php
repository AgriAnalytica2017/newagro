<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 26.09.2017
 * Time: 9:42
 */?>

<div class="box-body">
    <div class="responsive">
        <h3 style="float: left;">
            Фактичні витрати на зарплату, грн
        </h3>
        <a href="/new-farmer/fact_budget_field" class="btn btn-success" style="float: right; margin-top: 7px; margin-right: 15px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        <table class="table table-striped well">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Найменування робіт</th>
                <th>П.І.Б</th>
                <th>Позиція</th>
                <th>Загальна сума, грн</th>
            </tr>
            </thead>
            <tbody>
            <?
            $total_pay = 0;
            foreach ($date['budget']['fact_remains'] as $fact_salary){
                $total_pay += $fact_salary['salary'];
                ?>
                <tr>
                    <td><?=$fact_salary['date'];?></td>
                    <td><?=$fact_salary['action']?></td>
                    <td><?=$date['employee'][$fact_salary['name']]['employee_name'].' '.$date['employee'][$fact_salary['surname']]['employee_surname'];?></td>
                    <td><?=$date['employee'][$fact_salary['position']]['employee_position'];?></td>
                    <td><?=$fact_salary['salary'];?></td>
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
