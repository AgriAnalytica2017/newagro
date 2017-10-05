<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 02.10.2017
 * Time: 14:32
 */
/*echo "<pre>";
var_dump($date['budget']['budget_crop_name']);die;*/
?>

<div class="box-body">
    <div class="responsive">
        <h3 style="float: left;">
            Фактичні витрати на послуги по культурах, грн
        </h3>
        <a href="" class="btn btn-success" style="float: right; margin-top: 7px; margin-right: 15px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        <table class="table table-striped well">
            <thead>
            <tr>
                <th>Поле</th>
                <th>Дата</th>
                <th>Найменування робіт</th>
                <th>Назва послуги</th>
                <th>Загальна сума, грн</th>
            </tr>
            </thead>
            <tbody>
            <?
            $total_pay = 0;
            foreach ($date['budget']['crop_fact_remains'] as $key=>$services) {?>
                <tr>
                <td <?if($id_field =$key){echo 'rowspan="'.count($services).'"';}?>><?= $date['budget']['budget_crop_name'][$key] ?></td>
                <?foreach ($services as $crop_services) {
                    $total_pay += $crop_services['price'];
                    ?>
                    <td><?=$crop_services['date']?></td>
                    <td><?= $crop_services['action'] ?></td>
                    <td><?= $crop_services['name']; ?></td>
                    <td><?= $crop_services['price']; ?></td>
                    </tr>
                    <?
                }
                $id_field = $key;
            }?>
            <tr style="font-weight: bold;">
                <td colspan="4">Всього, грн</td>
                <td><?=number_format($total_pay, 2,',',' ')?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
