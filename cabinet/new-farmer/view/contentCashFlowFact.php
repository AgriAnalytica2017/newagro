<style>
    .table{
        overflow: auto;
    }
    .fix_table{
        width: 300px;
        position: absolute;
        z-index: 3;
        background: #d4f5db;
        float: left;
    }
    .padding_fix{
        min-width: 300px!important;
        width: 200px!important;
    }
    .ov_table{
        z-index: 2;
        text-align: center;
        padding-left: 25px!important;
        padding-right: 25px!important;
        border-left: 1px solid #59ae7f;
        min-width: 135px;
    }
    tr{
        display: none;
        cursor: pointer;
    }
    .showrow,.budget_crop_name,.cf_operating_activities,.cf_investment,.cf_financial,.gross_profit{
        display: table-row;
    }
</style>
<div class="box-bodyn">
    <div class="non-semantic-protector">
        <h1 class="ribbon">
            <strong class="ribbon-content">План/Факт Cash Flow</strong>
        </h1>
    </div>
    <div class="rown">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <?php foreach ($date['table_cash'] as $table){ ?>
                    <tr class="<?=$table['array']?>">
                        <th class="fix_table <?=$table['class']?>"><?if($_COOKIE['lang']=='ua'){if($table['name_ua']=='Назва культури'){echo "Місяць";}else{echo $table['name_ua'];}}elseif($_COOKIE['lang']=='gb'){if($table['name_en']=='Crop name'){echo "Month";}else{echo $table['name_en'];}}  ?></th>
                        <td class="padding_fix <?=$table['class']?>"><?if($_COOKIE['lang']=='ua'){if($table['name_ua']=='Назва культури'){echo "Місяць";}else{echo $table['name_ua'];}}elseif($_COOKIE['lang']=='gb'){if($table['name_en']=='Crop name'){echo "Month";}else{echo $table['name_en'];}}  ?></td>
                        <? foreach ($date['budget']['month_active'] as $month=>$true){?>
                            <td class="ov_table <?if($left[$table['array']]==false) echo 'left_tableq'?>"<?if($table['array'] == 'budget_crop_name')echo 'colspan="3"'?>><?if($table['array'] == 'budget_crop_name')echo '<b>'.$month.'</b>'; else echo number_format($date['budget'][$table['array'].'_month'][$month], 0, '.', ' ');?></td>
                            <?if($table['array'] != 'budget_crop_name'){?>
                                <td class="ov_table"><?echo number_format($date['budget']['month_fact_'.$table['array']][$month]);?></td>
                                <td class="ov_table <? if($date['budget'][$table['array'].'_month'][$month]-$date['budget']['month_fact_'.$table['array']][$month]<0) echo 'minus'; else echo 'plus'?>"><?echo number_format($date['budget'][$table['array'].'_month'][$month]-$date['budget']['month_fact_'.$table['array']][$month]);?></td>
                            <?}?>
                            <? $left[$table['array']]=true;
                        }?>
                    </tr>
                    <? if($table['revenue'] == 'on'){ ?>
                        <? foreach ($date['budget']['plane_revenues_month_crop'] as $id_crop=>$revenues){?>
                            <tr class="operational_plus_3">
                                <th class="fix_table level3"><?=$date['budget']['plane_name_crop'][$id_crop]?></th>
                                <td class="padding_fix"></td>
                                <? foreach ($date['budget']['month_active'] as $month=>$true){?>
                                    <td class="ov_table"><?=number_format($revenues[$month]); ?></td>
                                    <td class="ov_table"><?=number_format($date['budget']['month_crop_fact_revenue'][$month][$id_crop]); ?></td>
                                    <td class="ov_table <? if($date['budget'][$table['array'].'_month'][$month]-$date['budget']['month_fact_'.$table['array']][$month]<0) echo 'minus'; else echo 'plus'?>"><?=number_format($revenues[$month]-$date['budget']['month_crop_fact_revenue'][$month][$id_crop]); ?></td>
                                <?}?>
                            </tr>
                        <?}
                    }?>
                    <? if($table['array'] =='budget_crop_name'){?>
                        <tr>
                            <td class="fix_table"><br></td>
                            <td></td>
                            <?php foreach ($date['budget']['month_active'] as $month=>$true){?>
                                <td class="line_left">План</td>
                                <td class="line_left">Факт</td>
                                <td class="line_left">(+/-)</td>
                            <?}?>
                        </tr>
                    <?}?>
                <? }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#start_date, #end_date').change(date_filter);
        function date_filter() {
            $('.ov_table').show();
            var start=parseFloat($('#start_date').val());
            var end=parseFloat($('#end_date').val());
            $('.ov_table').each(function () {
                var date=parseFloat($(this).attr('data-month'));
                if(date<start) {$(this).hide()}
                if(date>end) {$(this).hide()}
            });
        }
        $('.cf_operating_activities').click(function () {
            $('.cf_operational_plus,.cf_operational_minus,.cf_operational_difference').toggle();
            $('.operational_plus_1,.operational_plus_2,.operational_plus_3,.budget_seeds,.budget_fertilizers,.budget_ppa,.budget_equipment,.budget_pay,.budget_services,.budget_repairs,.rent_pay,.other_costs,.percentages_other_costs').hide();
        });
        $('.cf_operational_plus').click(function () {
            $('.operational_plus_1,.operational_plus_2').toggle();
            $('.operational_plus_3').hide();
        });
        $('.operational_plus_1').click(function () {
            $('.operational_plus_3').toggle();
        });
        $('.cf_operational_minus').click(function () {
            $('.budget_seeds,.budget_fertilizers,.budget_ppa,.budget_equipment,.budget_pay,.budget_services,.budget_repairs,.rent_pay,.other_costs,.percentages_other_costs').toggle();
        });
        $('.cf_investment').click(function () {
            $('.cf_investment_plus,.cf_investment_minus,.cf_investment_difference').toggle();
            $('.investment_plus_1,.investment_plus_2,.investment_plus_3,.investment_minus_1,.investment_minus_2,.investment_minus_3').hide();
        });
        $('.cf_financial').click(function () {
            $('.cf_financial_plus,.cf_financial_minus,.cf_financial_difference').toggle();
            $('.financial_plus_1,.financial_plus_2,.financial_plus_3,.financial_minus_1,.financial_minus_2,.financial_minus_3').hide();
        });
        $('.cf_investment_plus').click(function () {
            $('.investment_plus_1,.investment_plus_2,.investment_plus_3').toggle();
        });
        $('.cf_investment_minus').click(function () {
            $('.investment_minus_1,.investment_minus_2,.investment_minus_3').toggle();
        });
        $('.cf_financial_plus').click(function () {
            $('.financial_plus_1,.financial_plus_2,.financial_plus_3').toggle();
        });
        $('.cf_financial_minus').click(function () {
            $('.financial_minus_1,.financial_minus_2,.financial_minus_3').toggle();
        });
    });
</script>
<?php //foreach ($date['table_cash'] as $table){?>
<!--    <tr>-->
<!--        <th class="--><?//=$table['class']?><!--">--><?//if($table['name_en']=='Item'){echo "Month";}else{echo $table['name_ua'];}?><!--</th>-->
<!---->
<!--        --><?// foreach ($month as $key=>$mon){?>
<!--            <td>--><?//
//                if($table['array'] == 'action')echo $key;
//                if($table['array'] == 'revenue' or $table['php'] == 'revenue2') echo number_format($date['budget']['plane_revenues_month'][$mon], 0, '.', ' ');
//                if($table['array'] == 'budget_pay') echo number_format($date['budget']['budget_pay_month'][$mon], 0, '.', ' ');
//                if($table['array'] == 'budget_equipment') echo number_format($date['budget']['budget_equipment_month'][$mon], 0, '.', ' ');
//                if($table['array'] == 'budget_seeds') echo number_format($date['budget']['budget_material_month'][$mon][1], 0, '.', ' ');
//                if($table['array'] == 'budget_ppa') echo number_format($date['budget']['budget_material_month'][$mon][2], 0, '.', ' ');
//                if($table['array'] == 'budget_fertilizers') echo number_format($date['budget']['budget_material_month'][$mon][3], 0, '.', ' ');
//                if($table['array'] == 'activities_costs') echo number_format($date['budget']['budget_cost_month'][$mon], 0, '.', ' ');
//                if($table['array'] == 'rent_pay') echo number_format($date['budget']['rent_pay_all']/12, 0, '.', ' ');
//                if($table['array'] == 'net_cash_flow') echo number_format($date['budget']['gross_profit_month'][$mon], 0, '.', ' ');
//                if($table['array'] == 'profitability') echo number_format($date['budget']['profitability_month'][$mon], 0, '.', ' ');
//                //else echo number_format($date['budget']['budget_pay'][], 0, '.', ' ');
//                ?>
<!--            </td>-->
<!---->
<!--        --><?//}?>
<!--    </tr>-->
<!--    --><?// if($table['php'] == 'revenue'){ ?>
<!--        --><?// foreach ($date['budget']['plane_revenues_month_crop'] as $id_crop=>$revenues){?>
<!--            <tr>-->
<!--                <th class="level3">--><?//=$date['budget']['plane_name_crop'][$id_crop]?><!--</th>-->
<!--                --><?// foreach ($month as $key=>$mon){?>
<!--                    <td>--><?//=number_format($revenues[$mon]); ?><!--</td>-->
<!--                --><?//}?>
<!--            </tr>-->
<!--        --><?//}
//    }?>
<?//}?>