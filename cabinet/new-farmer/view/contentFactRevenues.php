<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 02.10.2017
 * Time: 12:29
 */
/*echo "<pre>";
var_dump($date['budget']['fact_remains']);die;*/
?>

<div class="box-body">
    <div class="responsive">
        <h3 style="float: left;">
            Фактичні доходи від продажу продукції, грн
        </h3>
        <a href="" class="btn btn-success" style="float: right; margin-top: 7px; margin-right: 15px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        <table class="table table-striped well">
            <thead>
            <tr>
                <th>Культура</th>
                <th>Дата</th>
                <th>Кількість, кг</th>
                <th>Ціна грн/од</th>
                <th>Загальна сума, грн</th>
                <th>Коментарі</th>
            </tr>
            </thead>
            <tbody>
            <?
            $total_pay = 0;
            foreach ($date['budget']['fact_remains'] as $revenues) {?>
                <tr>
                <td <?echo 'rowspan="'.count($revenues['revenues']).'"'?>><?=$revenues['name_crop']?></td>
                <?foreach ($revenues['revenues'] as $crop_revenues) {
                    $total_pay += $crop_revenues['actual_sale_sum'];
                    ?>
                    <td><?= $crop_revenues['actual_sale_date'] ?></td>
                    <td><?= $crop_revenues['actual_sale_quantity']; ?></td>
                    <td><?= $crop_revenues['actual_sale_per_unit']; ?></td>
                    <td><?= $crop_revenues['actual_sale_sum']; ?></td>
                    <td><?= $crop_revenues['actual_sale_comments']; ?></td>
                    </tr>
                    <?
                }
            }?>
            <tr style="font-weight: bold;">
                <td colspan="4">Всього, грн</td>
                <td><?=number_format($total_pay, 2,',',' ')?></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
