
<?php
    $month_en = array(
            'January'=>1,
            'February'=>2,
            'March'=>3,
            'April'=>4,
            'May'=>5,
            'June'=>6,
            'July'=>7,
            'August'=>8,
            'September'=>9,
            'October'=>10,
            'November'=>11,
            'December'=>12,
    );
    $month_ua = array(
            'Січень'=>1,
            'Лютий'=>2,
            'Березень'=>3,
            'Квітень'=>4,
            'Травень'=>5,
            'Червень'=>6,
            'Липень'=>7,
            'Серпень'=>8,
            'Вересень'=>9,
            'Жовтень'=>10,
            'Листопад'=>11,
            'Грудень'=>12,
    );
/*    echo "<pre>";
    var_dump($date);*/
?>
<div class="box-bodyn">
<div class="non-semantic-protector">
    <h1 class="ribbon">
        <strong class="ribbon-content"><?=$language['new-farmer']['13']?></strong>
    </h1>
</div>
<div class="rown">
    <div class="table-responsive">
        <table class="table">
            <tbody>
            <?php foreach ($date['table'] as $table){?>
                <tr>
                    <td class="<?=$table['class']?>"><?if($_COOKIE['lang']=='ua'){if($table['name_ua']=='Назва культури'){echo "Місяць";}else{echo $table['name_ua'];}}elseif($_COOKIE['lang']=='gb'){if($table['name_en']=='Crop name'){echo "Month";}else{echo $table['name_en'];}}  //?></td>
                    <? foreach ($month_en as $key=>$mon){?>
                        <th><?
                            if($table['array'] == 'budget_crop_name')echo $key;
                            if($table['array'] == 'plane_revenues') echo number_format($date['budget']['plane_revenues_month'][$mon], 0, '.', ' ');
                            if($table['array'] == 'budget_pay') echo number_format($date['budget']['budget_pay_month'][$mon], 0, '.', ' ');
                            if($table['array'] == 'budget_equipment') echo number_format($date['budget']['budget_equipment_month'][$mon], 0, '.', ' ');
                            if($table['array'] == 'budget_seeds') echo number_format($date['budget']['budget_material_month'][$mon][1], 0, '.', ' ');
                            if($table['array'] == 'budget_ppa') echo number_format($date['budget']['budget_material_month'][$mon][2], 0, '.', ' ');
                            if($table['array'] == 'budget_fertilizers') echo number_format($date['budget']['budget_material_month'][$mon][3], 0, '.', ' ');
                            if($table['array'] == 'budget_cost') echo number_format($date['budget']['budget_cost_month'][intval($mon)], 0, '.', ' ');
                            if($table['array'] == 'other_costs') echo number_format($date['budget']['other_costs_month'][$mon], 0, '.', ' ');
                            if($table['array'] == 'budget_repairs') echo number_format($date['budget']['budget_repairs_month'][$mon], 0, '.', ' ');
                            if($table['array'] == 'rent_pay') echo number_format($date['budget']['rent_pay_month'][$mon], 0, '.', ' ');
                            if($table['array'] == 'budget_services') echo number_format($date['budget']['budget_services_month'][$mon], 0, '.', ' ');
                            if($table['array'] == 'gross_profit') echo number_format($date['budget']['gross_profit_month'][intval($mon)], 0, '.', ' ');
                            if($table['array'] == 'profitability') echo number_format($date['budget']['profitability_month'][$mon], 0, '.', ' ');
                            //else echo number_format($date['budget']['budget_pay'][], 0, '.', ' ');
                            if($mon == 'Total') echo number_format($date['budget']['rent_pay_all'], 0, '.', ' ');
                            ?>
                        </th>

                    <?}?>
                </tr>
            <?}?>
            </tbody>
        </table>
    </div>
    <div class="col-lg-12" style="text-align: center;">
        <a href="/new-farmer/save_budget" class="btn btnn btn-success">Сохранить бюджет</a>
    </div>
</div>
</div>
