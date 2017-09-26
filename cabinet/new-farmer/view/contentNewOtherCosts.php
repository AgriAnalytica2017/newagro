 <style>
    .with-border{
        border-top: 2px solid #c0c0c0;
        margin-top: 20px;
    }
    .nav li {
        font-size: 22px;
        margin-bottom: -1px;
    }
    .panel{
    margin-top: -20px;
     }
                   .nav-tabs{
                       padding-left: 0px;
                   }          
</style>
<? //var_dump($date['rent_pay']);die;?>
<div class="box-bodyn col-lg-12">
        <div class="non-semantic-protector col-sm-4">
        Накладні витрати
        </div>
        
<!--
        <div class="col-sm-8" style="margin-left: -6%;">
                    
                      <div class="col-sm-4">
                      <select onchange="window.location.href=this.options[this.selectedIndex].value" style="width:300px; margin: 0 auto" class="searchs inphead" id="select_crop" required>
        <?php if($date['id']==0){?><option selected value="0"><?=$language['new-farmer']['163']?></option><?php }?>
        <?php foreach ($date['field'] as $field){?>
            <option <?php if($field['id_field']==$date['id']) echo "selected"?> value="<?php SRC::getSrc();?>/new-farmer/fact_tech_card/<?php echo $field['id_field']?>" ><?='#  '.$field['field_number']."_".$field['field_name'];?></option>
        <?php }?>
    </select>
            </div>
            </div>
-->
            </div>

              
<div class="rown">
    <div class="col-lg-8 col-lg-offset-2">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" class="tabs" data-toggle="tab">Ремонт техніки та обладнання</a></li>
            <li><a href="#tab_2" class="tabs" data-toggle="tab">Інші витрати</a></li>
            <li><a href="#tab_3" class="tabs" data-toggle="tab">Операційні витрати</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel box box-primary box-bodyn">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_1" aria-expanded="false" class="collapsed">
                                        <h3 class="text-center">План: <b id="p_1"><?=$date['other_costs']['plan']['2']['costs_plan']?></b></h3>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <form action="/new-farmer/save_other_cost" method="post">
                                    <input type="hidden" name="costs_type" value="2">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Планові витрати на ремонт</label>
                                            <input class=" inphead plan_costs_fix" type="text" name="costs_plan" value="<?=$date['other_costs']['plan']['2']['costs_plan']?>">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Коментар</label>
                                            <textarea name="costs_comments" id="comments_fix" class=" inphead"><?=$date['other_costs']['plan']['2']['costs_comments']?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                     <div class="text-centern">
                                    <input type="submit" class="btn btn-primaryn" value="Зберегти план">
                                    </div>
                                </form>
                            </div>

                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_2" aria-expanded="false" class="collapsed">
                                        <h3 class="text-center">Факт: <b id="f_1">20</b></h3>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse_2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <form action="/new-farmer/create_other_fact" method="post">
                                    <input type="hidden" name="cost_fact_type" value="2" class=" inphead">
                                    <table class="table">
                                        <tr>
                                            <th>
                                                <label>Ціна, грн</label>
                                                <input class=" inphead" type="text" name="cost_fact">
                                            </th>
                                            <th>
                                                <label>Дата</label>
                                                <input class=" inphead" type="date" name="cost_fact_date">
                                            </th>
                                            <th>
                                                <label>Коментар</label>
                                                <textarea class=" inphead" type="text" name="cost_fact_note"></textarea>
                                            </th>
                                        </tr>
                                       
                                        <?if($date['other_costs']['fact']['2']!=false) foreach ($date['other_costs']['fact']['2'] as $fact_other){?>
                                            <tr>
                                                <th class="f_price_1"><?=$fact_other['cost_fact']?></th>
                                                <th><?=$fact_other['cost_fact_date']?></th>
                                                <th><?=$fact_other['cost_fact_note']?></th>
                                            </tr>
                                        <?}?>
                                    </table>
                                     <div class="text-centern">
                                         <input class="btn btn-primaryn" type="submit" value="Додати до факту">
                                        </div>
                                </form>
                            </div>
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="false" class="collapsed">
                                        <h3 class="text-center">Різниця: <b id="d_1">20</b></h3>
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_2">
                <br>
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="panel box box-primary box-bodyn">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_1_1" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">План: <b id="p_2"><?=$date['other_costs']['plan']['3']['costs_plan']?></b></h3>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_1_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/save_other_cost" method="post">
                                        <input type="hidden" name="costs_type" value="3" class=" inphead">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label>Планові інші витрати</label>
                                                <input class="inphead form-control inphead plan_other_costs" type="text" name="costs_plan" value="<?=$date['other_costs']['plan']['3']['costs_plan']?>">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Коментар</label>
                                                <textarea name="costs_comments" id="comments" class=" inphead"><?=$date['other_costs']['plan']['3']['costs_comments']?></textarea>
                                            </div>
                                        </div>
                                         <br>
                                         <div class="text-centern">
                                        <input type="submit" class="btn btn-primaryn" value="Зберегти план">
                                        </div>
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_1_2" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Факт: <b id="f_2">20</b></h3>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_1_2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/create_other_fact" method="post">
                                        <input type="hidden" name="cost_fact_type" value="3" class="inphead">
                                        <table class="table">
                                            <tr>
                                                <th>
                                                    <label>Ціна, грн</label>
                                                    <input class="inphead" type="text" name="cost_fact">
                                                </th>
                                                <th>
                                                    <label>Дата</label>
                                                    <input class="inphead" type="date" name="cost_fact_date">
                                                </th>
                                                <th>
                                                    <label>Коментар</label>
                                                    <textarea class="inphead" type="text" name="cost_fact_note"></textarea>
                                                </th>
                                            </tr>
                                            <?if($date['other_costs']['fact']['3']!=false) foreach ($date['other_costs']['fact']['3'] as $fact_other){?>
                                                <tr>
                                                    <th class="f_price_2"><?=$fact_other['cost_fact']?></th>
                                                    <th><?=$fact_other['cost_fact_date']?></th>
                                                    <th><?=$fact_other['cost_fact_note']?></th>
                                                </tr>
                                            <?}?>
                                        </table>
                                        <div class="text-centern">
                                                    <input class="btn btn-primaryn" type="submit" value="Додати до факту">
                                                    </div>
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Різниця: <b id="d_2">20</b></h3>
                                        </a>
                                    </h4>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_3">
                <br>
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="panel box box-primary  box-bodyn">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_2_1" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">План: <b id="p_3"><?=$date['other_costs']['plan']['1']['costs_plan']?></b></h3>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_2_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/save_other_cost" method="post">
                                        <input type="hidden" name="costs_type" value="1" class="inphead">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label>Операційні витрати, %</label>
                                                <input class="form-control inphead plan_other_costs" type="text" name="costs_plan" value="<?=$date['other_costs']['plan']['1']['costs_plan']?>">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Коментар</label>
                                                <textarea name="costs_comments" id="comments" class=" inphead"><?=$date['other_costs']['plan']['1']['costs_comments']?></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="text-centern">
                                        <input type="submit" class="btn btn-primaryn" value="Зберегти план">
                                        </div>
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_2_2" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Факт: <b id="f_3">10</b></h3>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_2_2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/create_other_fact" method="post">
                                        <input type="hidden" name="cost_fact_type" value="1">
                                        <table class="table">
                                            <tr>
                                                <th>
                                                    <label>Ціна</label>
                                                    <input class="form-control inphead" type="text" name="cost_fact">
                                                </th>
                                                <th>
                                                    <label>Дата</label>
                                                    <input class="inphead" type="date" name="cost_fact_date">
                                                </th>
                                                <th>
                                                    <label>Коментар</label>
                                                    <textarea class="inphead" type="text" name="cost_fact_note"></textarea>
                                                </th>
                                            </tr>
                                            <?if($date['other_costs']['fact']['1']!=false)foreach ($date['other_costs']['fact']['1'] as $fact_other){?>
                                                <tr>
                                                    <th class="f_price_3"><?=$fact_other['cost_fact']?></th>
                                                    <th><?=$fact_other['cost_fact_date']?></th>
                                                    <th><?=$fact_other['cost_fact_note']?></th>
                                                </tr>
                                            <?}?>
                                        </table>
                                        <div class="text-centern">
                                                    <input class="btn btn-primaryn" type="submit" value="Додати до факту">
                                                    </div>
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Різниця: <b id="d_3">20</b></h3>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        fact_price();
        function fact_price() {
            var f1=0, f2=0, f3=0;

            $('.f_price_1').each(function () {
                f1+=parseFloat($(this).text());
            });
            $('.f_price_2').each(function () {
                f2+=parseFloat($(this).text());
            });
            $('.f_price_3').each(function () {
                f3+=parseFloat($(this).text());
            });
            $('#f_1').text(f1);
            $('#f_2').text(f2);
            $('#f_3').text(f3);
            $('#d_1').text(parseFloat($('#p_1').text())-f1);
            $('#d_2').text(parseFloat($('#p_2').text())-f2);
            $('#d_3').text(parseFloat($('#p_3').text())-f3);
        }
    });
</script>

   