<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 26.09.2017
 * Time: 10:49
 */?>

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
            Фактичні витрати на послуги, грн
        </h3>
        <a href="/new-farmer/fact_budget_field" class="btn btn-success" style="float: right; margin-top: 7px; margin-right: 15px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        <table class="table table-striped well">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Найменування робіт</th>
                <th>Назва послуги</th>
                <th>Загальна сума, грн</th>
            </tr>
            </thead>
            <tbody>
            <?
            $total_pay = 0;
            foreach ($date['budget']['fact_remains'] as $fact_services){
                $total_pay += $fact_services['price'];
                ?>
                <tr>
                    <td><?=$fact_services['date']?></td>
                    <td><?=$fact_services['action']?></td>
                    <td><?=$fact_services['name'];?></td>
                    <td><?=$fact_services['price'];?></td>
                </tr>
            <?}?>
            <tr style="font-weight: bold;">
                <td colspan="3">Всього, грн</td>
                <td><?=number_format($total_pay, 2,',',' ')?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

