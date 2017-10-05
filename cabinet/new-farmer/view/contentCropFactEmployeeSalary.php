<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 02.10.2017
 * Time: 15:01
 */
/*echo "<pre>";
var_dump($date['budget']['crop_fact_remains']);die;*/
?>

<div class="box-body">
    <div class="responsive">
        <h3 style="float: left;">
            Витрати на зарплату, грн
        </h3>
        <a href="" class="btn btn-success" style="float: right; margin-top: 7px; margin-right: 15px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        <table class="table table-striped well">
            <thead>
            <tr>
                <th>Поле</th>
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
            foreach ($date['budget']['crop_fact_remains'] as $key=>$salary) {?>
                <tr>
                <td <?if($id_field =$key){echo 'rowspan="'.count($salary).'"';}?>><?= $date['budget']['budget_crop_name'][$key] ?></td>
                <?foreach ($salary as $crop_salary) {
                    $total_pay += $crop_salary['salary'];
                    ?>
                    <td><?=$crop_salary['date']?></td>
                    <td><?=$crop_salary['action']?></td>
                    <td><?=$date['employee'][$crop_salary['name']]['employee_name'].' '.$date['employee'][$crop_salary['surname']]['employee_surname'];?></td>
                    <td><?=$date['employee'][$crop_salary['position']]['employee_position'];?></td>
                    <td><?=$crop_salary['salary'];?></td>
                    </tr>
                    <?
                }
                $id_field = $key;
            }?>


            <tr style="font-weight: bold;">
                <td colspan="5">Всього, грн</td>
                <td><?=number_format($total_pay, 2,',',' ')?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
