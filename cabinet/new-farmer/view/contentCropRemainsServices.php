<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 29.09.2017
 * Time: 16:01
 */
/*echo "<pre>";
var_dump($date);die;*/
?>


<div class="box-body">
    <div class="responsive">
        <h3 style="float: left;">
            Витрати на послуги по культурах, грн
        </h3>
        <a href="/new-farmer/budget_per_crop" class="btn btn-success" style="float: right; margin-top: 7px; margin-right: 15px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        <table class="table table-striped well">
            <thead>
            <tr>
                <th>Поле</th>
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
            foreach ($date['budget']['crop_remains'] as $key=>$services) {?>
                <tr>
                <td <?if($id_field =$key){echo 'rowspan="'.count($services).'"';}?>><?= $date['budget']['budget_crop_name'][$key] ?></td>
                <?foreach ($services as $crop_services) {
                    $total_pay += $crop_services['total_price'];
                    ?>
                    <td><?= $crop_services['action'] ?></td>
                    <td><?= $crop_services['services_name']; ?></td>
                    <td><?= $crop_services['amount']; ?></td>
                    <td><?= $crop_services['price']; ?></td>
                    <td><?= $crop_services['total_price']; ?></td>
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