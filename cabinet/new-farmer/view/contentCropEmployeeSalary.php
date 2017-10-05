<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 29.09.2017
 * Time: 16:54
 */
/*echo "<pre>";
var_dump($date['budget']);die;*/
?>

<div class="box-body">
    <div class="responsive">
        <h3 style="float: left;">
            Витрати на зарплату, грн
        </h3>
        <a href="/new-farmer/budget_per_crop" class="btn btn-success" style="float: right; margin-top: 7px; margin-right: 15px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        <table class="table table-striped well">
            <thead>
            <tr>
                <th>Поле</th>
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
            foreach ($date['budget']['crop_remains'] as $key=>$salary) {?>
                <tr>
                <td <?if($id_field =$key){echo 'rowspan="'.count($salary).'"';}?>><?= $date['budget']['budget_crop_name'][$key] ?></td>
                <?foreach ($salary as $crop_salary) {
                    $total_pay += $crop_salary['summ_pay'];
                    ?>
                    <td><?=$crop_salary['action']?></td>
                    <td><?=$date['employee'][$crop_salary['name']]['employee_name'].' '.$date['employee'][$crop_salary['surname']]['employee_surname'];?></td>
                    <td><?=$date['employee'][$crop_salary['position']]['employee_position'];?></td>
                    <td><?=$crop_salary['pay'];?></td>
                    <td><?=$crop_salary['summ_pay'];?></td>
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
