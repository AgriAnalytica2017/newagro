<?php
    $language=SRC::getLanguage('farmer-small');


  //echo "<pre>"; var_dump($date['plane_sale']);die;
    $month_name_en = array(
    1=>'January',
    2=>'February',
    3=>'March',
    4=>'April',
    5=>'May',
    6=>'June',
    7=>'July',
    8=>'August',
    9=>'September',
    10=>'October',
    11=>'November',
    12=>'December',
    );
?>
<div class="box">
    <div class="box-bodyn">
            <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content">Sales</strong>
            </h1>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
            <div class="rown">
                <div class="col-lg-10">
                <div>
                    <h3 style="float: left;">Actual sales</h3>
                </div>
                    <table class="table">
                        <thead>
                            <tr class="tabletop">
                                <th><?=$language['farmer-small']['64']?></th>
                                <th>Material</th>
                                <th><?=$language['farmer-small']['68']?></th>
                                <th><?=$language['farmer-small']['70']?></th>
                                <th><?=$language['farmer-small']['73']?></th>
                                <th>Sales comments</th>
                            </tr>
                        </thead>
                        <tbody class="sales">
                            <? foreach($date['sales'] as $sales){
                                $date_elements  = explode("-",$sales['sale_date']);
                                $month=$date_elements[1]+0;?>
                                <tr class="fact <?php echo 'material_st_'.$sales['storage_type_material'].' month_'.$month?>">
                                    <td><?=$sales['sale_date']?></td>
                                    <td><? echo $sales['name_ua'].': '.$sales['storage_material'];?></td>
                                    <td><?=$sales['sale_quantity']?></td>
                                    <td><?=$sales['sale_sum_total']?></td>
                                    <td><?=$sales['sale_price_unit']?></td>
                                    <td><?=$sales['sale_comments']?></td>
                                </tr>
                            <?}?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-2">
                    <div class="box">
                        <div class="box-bodyn">
                            <label for="material_id">Material</label>
                            <select name="material_id" id="material_id" class="form-control inphead">
                                <option value="0">Material</option>
                                <?php foreach ($date["material"] as  $crop){ ?>
                                    <option value="<?php echo $crop['id_action']?>"><?php {echo $crop['name_ua'];}?></option>
                                <?php }?>
                            </select>
                            <br>
                            <label for="month"><?=$language['farmer-small']['47']?></label>
                            <select name="month" id="month" class="form-control  inphead">
                                <option value="0"><?=$language['farmer-small']['47']?></option>
                                <?php for ($x=1;$x<=12;$x++){ ?>
                                    <option value="<?php echo $x?>"><?=$month_name_en[$x]?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>

                </div>
            </div>

             <div class="rown">
                <div class="col-lg-10">
                <div>
                    <h3 style="float: left;">Planing sales</h3>
                    <a  style="float: right;" class="btn btn-primaryn" href="#Plan_sale" data-toggle="modal">Add planning sales</a>
                </div>
                    <table class="table">
                        <thead>
                            <tr class="tabletop">
                                <th>Field number/Field name</th>
                                <th>Culture</th>
                                <th>Expected yield</th>
                                <th>Average price</th>
                                <th>Revenues from sales</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach($date['plane_sale'] as $plane_sale){?>
                                <tr>
                                    <td><? echo $plane_sale['field_number'].'/'.$plane_sale['field_name'];?></td>
                                    <td><?=$plane_sale['name_crop_ua']?></td>
                                    <td><?=$plane_sale['plane_sale_expected_yield']?></td>
                                    <td><?=$plane_sale['plane_sale_avr_price']?></td>
                                    <td><?=$plane_sale['plane_sale_revenue']?></td>
                                </tr>
                            <?}?>
                        </tbody>
                    </table>
                </div>
                </div>
        </div>
    </div>
</div>
<div id="Plan_sale" class="modal fade">
    <div class="modal-dialog modal-lg">
    <form action="" method="post">
    <div class="modal-content wt">
        <div class="box-bodyn">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="box-title">Add planning sales</span>
        </div>
     
        <div class="modal-body">
                              <table class="table">
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Culture</th>
                                <th>Expected yield</th>
                                <th>Average price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="sales">
                            <? foreach($date['plane_sales'] as $plane_sales){?>
                            <tr>
                                <td><?=$plane_sales['field_name'];?></td>
                                <td><?=$plane_sales['name_crop_ua'];?></td>
                                <td><?=$plane_sales['field_yield']*$plane_sales['field_size']*100;?></td>
                                <td><input type="text" name="avr_price" class="form-control <?php echo 'avr_price_'.$plane_sales['id_field']?>"></td>
                                <td><a class="btn btn-primary btn-sm add_sale" 
                                data-field="<?=$plane_sales['id_field']?>"
                                data-crop="<?=$plane_sales['id_crop']?>"
                                data-expected = "<?=$plane_sales['field_yield']*$plane_sales['field_size']*100;?>"
                                >Add to sale
                                </a></td>
                            </tr>
                            <?}?>
                        </tbody>
                    </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="button" class="btn btn-primaryn save_sale">Сохранить</button>
        </div>
    </div>
    </form>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#material_id,#month').change(filter);
        function filter() {
            var month=$('#month').val();
            var material=$('#material_id').val();
            $('.fact').show();
            if(month != 0){
                $('.sales tr:not(.month_'+month+')').hide();
            }
            if(material!=0){
                $('.sales tr:not(.material_st_'+material+')').hide();
            }
        }

        $('.add_sale').click(function(){
            var field_id = $(this).attr('data-field');
            var crop = $(this).attr('data-crop');
            var avr_price = $('.avr_price_'+field_id).val();
            var expected_yield = $(this).attr('data-expected');
            var revenue = avr_price*expected_yield;
            
            $.ajax({
                type : 'post',
                url : '/new-farmer/plane_sale',
                data : {
                    'field_id' : field_id,
                    'culture': crop, 
                    'avr_price' : avr_price,
                    'expected_yield' : expected_yield,
                    'revenue': revenue,
                }
            });
        });
        $('.save_sale').click(function(){
           location.reload();
        });
	});
</script>