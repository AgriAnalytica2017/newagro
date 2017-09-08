<?php
$month = array(
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
?>
<div class="box-bodyn">
    <div class="non-semantic-protector">
        <h1 class="ribbon">
            <strong class="ribbon-content">Cash Flow</strong>
        </h1>
    </div>
    <div class="rown">
        <div class="table-responsive">
            <table class="table">
                <tbody>
               <?php foreach ($date['table_cash'] as $table){?>
                   <tr>
                       <th class="<?=$table['class']?>"><?if($table['name_en']=='Item'){echo "Month";}else{echo $table['name_ua'];}?></th>

                       <? foreach ($month as $key=>$mon){?>
                           <td><?
                               if($table['array'] == 'action')echo $key;
                               if($table['array'] == 'revenue' or $table['php'] == 'revenue2') echo number_format($date['budget']['plane_revenues_month'][$mon], 0, '.', ' ');
                               if($table['array'] == 'budget_pay') echo number_format($date['budget']['budget_pay_month'][$mon], 0, '.', ' ');
                               if($table['array'] == 'budget_equipment') echo number_format($date['budget']['budget_equipment_month'][$mon], 0, '.', ' ');
                               if($table['array'] == 'budget_seeds') echo number_format($date['budget']['budget_material_month'][$mon][1], 0, '.', ' ');
                               if($table['array'] == 'budget_ppa') echo number_format($date['budget']['budget_material_month'][$mon][2], 0, '.', ' ');
                               if($table['array'] == 'budget_fertilizers') echo number_format($date['budget']['budget_material_month'][$mon][3], 0, '.', ' ');
                               if($table['array'] == 'activities_costs') echo number_format($date['budget']['budget_cost_month'][$mon], 0, '.', ' ');
                               if($table['array'] == 'rent_pay') echo number_format($date['budget']['rent_pay_all']/12, 0, '.', ' ');
                               if($table['array'] == 'net_cash_flow') echo number_format($date['budget']['gross_profit_month'][$mon], 0, '.', ' ');
                               if($table['array'] == 'profitability') echo number_format($date['budget']['profitability_month'][$mon], 0, '.', ' ');
                               //else echo number_format($date['budget']['budget_pay'][], 0, '.', ' ');
                               ?>
                           </td>
                       <?}?>
                   </tr>
                   <? if($table['php'] == 'revenue'){ ?>
                       <? foreach ($date['budget']['plane_revenues_month_crop'] as $id_crop=>$revenues){?>
                       <tr>
                           <th class="level3"><?=$date['budget']['plane_name_crop'][$id_crop]?></th>
                       <? foreach ($month as $key=>$mon){?>
                           <td><?=number_format($revenues[$mon]); ?></td>
                       <?}?>
                       </tr>
                       <?}
                   }?>
               <?}?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-12" style="text-align: center;">
            <a href="/new-farmer/save_budget" class="btn btnn btn-success">Сохранить бюджет</a>
        </div>
    </div>
</div>