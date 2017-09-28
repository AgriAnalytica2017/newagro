    <style>
        .table{
            overflow: auto;
        }
        .fix_table{
            width: 300px;
            position: absolute;
            z-index: 3;
            background: #ebf1f2;
            float: left;
                text-align: left;
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
        .width100{
            width: 100%;
        }
         tr>th {
    padding-left: 30px!important;
}
    .level2 {
    padding-left: 45px!important;
}
    .level1 {
    padding-left: 30px!important;
    }
    </style>
        <div class="box-bodyn col-lg-12">
            <div class="non-semantic-protector col-sm-3">
        Cash Flow
        </div>
    </div>

    <div class="box-bodyn col-lg-12">
        <div class="col-lg-3">
            <select id="start_date" class=" inphead form-control">
                <option>start</option>
                <? foreach ($date['budget']['month_active'] as $month=>$true){?>
                    <option><?=$month?></option>
                <?}?>
            </select>
        </div>
        <div class="col-lg-3">
            <select id="end_date" class=" inphead form-control">
                <option>end</option>
                <? foreach ($date['budget']['month_active'] as $month=>$true){?>
                    <option><?=$month?></option>
                <?}?>
            </select>
        </div>
    </div>
        <div class="table-responsive width100">
            <table class="table">
                <tbody>
                <?php foreach ($date['table_cash'] as $table){ ?>
                    <tr>
                        <th class="fix_table <?=$table['class']?>"><?if($_COOKIE['lang']=='ua'){if($table['name_ua']=='Назва культури'){echo "Місяць";}else{echo $table['name_ua'];}}elseif($_COOKIE['lang']=='gb'){if($table['name_en']=='Crop name'){echo "Month";}else{echo $table['name_en'];}}  ?></th>
                        <td class="padding_fix <?=$table['class']?>"><?if($_COOKIE['lang']=='ua'){if($table['name_ua']=='Назва культури'){echo "Місяць";}else{echo $table['name_ua'];}}elseif($_COOKIE['lang']=='gb'){if($table['name_en']=='Crop name'){echo "Month";}else{echo $table['name_en'];}}  ?></td>
                        <? foreach ($date['budget']['month_active'] as $month=>$true){?>
                            <td class="ov_table <?if($left[$table['array']]==false) echo 'left_tableq'?>" data-month="<?=$month?>"><?if($table['array'] == 'budget_crop_name')echo '<b>'.$month.'</b>'; else echo number_format($date['budget'][$table['array'].'_month'][$month], 0, '.', ' ');?></td>
                            <? $left[$table['array']]=true;
                        }?>
                    </tr>
                    <? if($table['revenue'] == 'on'){ ?>
                        <? foreach ($date['budget']['plane_revenues_month_crop'] as $id_crop=>$revenues){?>
                            <tr>
                                <th class="fix_table level3"><?=$date['budget']['plane_name_crop'][$id_crop]?></th>
                                <td class="padding_fix"></td>
                                <? foreach ($date['budget']['month_active'] as $month=>$true){?>
                                    <td class="ov_table" data-month="<?=$month?>"><?=number_format($revenues[$month]); ?></td>
                                <?}?>
                            </tr>
                        <?}
                    }?>
                <? }?>
                </tbody>
            </table>
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
                    if(date<start) {$(this).hide()};
                    if(date>end) {$(this).hide()};
                });
           }
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
