<head>
    <style type="text/css">
        .tech_cart{
    margin-top: 35px;
    padding-left: 10px;
    padding-right: 10px;
    text-align: center;
    }
    .tech_head>label{
        text-align: center;
        font-size: 20px!important;
    }
    </style>
    <script src="http://thecodeplayer.com/uploads/js/prefixfree-1.0.7.js" type="text/javascript"></script>
</head>
<div class="box-bodyn">


        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content">Field management</strong>
            </h1>
        </div>

<!--    <img src="/cabinet/new-farmer/template/img/le.svg" class="le" width="50px;"><div class=""></div> <img src="/cabinet/new-farmer/template/img/ri.svg" class="ri" width="50px;">-->
</div>
<div class="box head-style">
    <div class="box-body wt">
        <div class="form-group fg">
            <div class="col-sm-2 control-label middle"><img src="/cabinet/new-farmer/template/img/1.png" class="img" width="90px;">
                <img src="/cabinet/new-farmer/template/img/3.png" class="imgi" width="40px;"></div>
            <label for="inputName" class="col-sm-4 control-label middle">Rent UAH per ha:</label>
                <div class="col-sm-2 col-left">
                    <input type="text" class="form-control classEdits inphead" id="lease" placeholder="Price" value="" style="margin-bottom: 15px;">
                </div>
        </div>
    </div>
</div>
<div class="box-body wt">
    <div class="rown" style="text-align: center">
            <table class="table" style="width: 85%;">
                <thead>
                    <tr class="tabletop">
                       <th>Field number</th>
                       <th>Field name</th>
                       <th>Area, ha</th>
                       <th>Usage</th>
                       <th>Culture</th>
                       <th>Expected yield</th>
                       <th></th>
                       <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($date['field'] as $field){ ?>
                    <tr>
                        <td><?=$field['field_number']?></td>
                        <td><?=$field['field_name']?></td>
                        <td style="width: 16%;">
                            <input class="form-control edit_field inphead area_plus" data-table="1" data-id_field="<?=$field['id_field']?>" type="text" name="field_size" value="<?=$field['field_size']?>">
                            </td>
                        <td>
                            <select class="form-control edit_field inphead" data-table="2" data-id_field="<?=$field['id_field']?>" name="field_usage">
                                <?php foreach ($date['usage']['ua'] as $usage_id=>$usage_val){?>
                                <option <?php if($field['field_usage']==$usage_id) echo 'selected'?>  value="<?=$usage_id?>"><?=$usage_val?></option>
                                <?}?>
                            </select>
                        </td>
                        <td  style="width: 11%;"><?=$field['name_crop_ua']?></td>
   <th style="width: 16%;"><input class="form-control edit_field inphead" value="<?=$field['field_yield']?>" name="field_yield" data-table="3" data-id_field="<?=$field['id_field']?>">
    </th>

                        <th><a href="" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></th>
                        <th><a href="" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a></th>
                    </tr>
                <?php }?>
                    <tr>
                        <th style="font-size: 20px">Total area</th>
                        <th style="font-size: 20px;"><b id="total_area"></b>, hectare</th>
                    </tr>
                </tbody>
            </table>
    <div style="text-align: center">
        <button type="button" class="btn btn-warning btn-lg sh" data-toggle="modal" data-target="#modal-default" >
            Add crop
        </button>
    </div>
    </div>
</div>
<div class="modal fade in" id="modal-default" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="modal-header box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Добавить культуру</h4>
            </div>
            <form action="/new-farmer/create_new_field" method="post">
            <div class="modal-body">
                    <div class="row bo">
                        <div class="col-lg-4">
                            <label for="name_field">Номер поля</label>
                            <input class="form-control inphead" type="text" name="field_number" required>
                        </div>
                        <div class="col-lg-4">
                            <label for="area_field">Назва поля</label>
                            <input class="form-control inphead" type="text" name="field_name" required>
                        </div>
                        <div class="col-lg-4">
                            <label for="area_field">Площа поля, га</label>
                            <input class="form-control inphead" type="text" name="field_area" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Вид</label>
                            <select class="form-control inphead op" id="crop_type">
                                <option value="1">Рослинництво</option>
                                <option value="2">Овочівництво</option>
                                <option value="3">Плоди</option>
                                <option value="4">Ягоди</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label>Культура</label>
                            <select class="form-control inphead" name='crop' id="crop_list_select" required>
                                <?foreach($date['crop_us'] as $crop){?>
                                    <option class="crop_list crop_type_<?=$crop['type']?>" value="<?=$crop['id_crop']?>"><?if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?></option>
                                <?}?>
                            </select>
                        </div>
                    </div>
<!--                    <div class="tech_cart">-->
<!--                        <div class="tech_head">-->
<!--                            <label>Технологічна карта</label>-->
<!--                        </div>-->
<!--                        <div class="row">-->
<!--                            <div class="col-lg-6 ">-->
<!--                                    <label class="tech_label">-->
<!--                                        <input type="radio" name="optionsRadios" value="new">-->
<!--                                        Створити нову технологічну карту-->
<!--                                    </label>-->
<!--                                <div id="new_tech_cart">-->
<!--                                    <label >Назва технологічної карти</label>-->
<!--                                    <input class="form-control inp" type="text" name="name_tech_cart" id="name_tech_cart">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-lg-6 ">-->
<!--                                <label class="tech_label"> Використати готову технологічну карту</label>-->
<!--                                <div class="form-group">-->
<!--                                    --><?// foreach($date['crop_culture'] as $cart){?>
<!--                                        <div class="rad tech_cart_crop_--><?//=$cart['id_crop']?><!--" class="radio">-->
<!--                                            <label>-->
<!--                                                <input  type="radio" name="optionsRadios" value="--><?//=$cart['id_culture']?><!--" required>-->
<!--                                                --><?//if($_COOKIE['lang']=='ua'){echo $cart['name_crop_ua'].'_'.$cart['tech_name'];}elseif($_COOKIE['lang']=='gb'){echo $cart['name_crop_en'].'_'.$cart['tech_name'];}?>
<!--                                            </label>-->
<!--                                        </div>-->
<!--                                    --><?//}?>
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btnn btn-success save_Field" >Зберегти</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content wt -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $().ready(function(){
        $('.edit_field').change(field_edit);
        function field_edit() {
            var id=$(this).attr('data-id_field');
            var value=$(this).val();
            var table=$(this).attr('data-table');
            $.ajax({
                type : 'post',
                url : '/new-farmer/edit_field',
                data : {
                    'id' : id,
                    'table' : table,
                    'value' : value
                }
            });
        }
        var crop_id_st=$('#crop_list_select').val();
        $('.rad').hide();
        $('.tech_cart_crop_'+crop_id_st).show();
        $('#crop_type').click(crop_list_type);
        function crop_list_type() {
            var id_type=$(this).val();
            $('.crop_list').hide();
            $('.crop_type_'+id_type).show();
            $('#crop_list_select').val(' ');
            $('.rad').hide();
            $('input[name="optionsRadios"]').attr('checked', false);
            $("#new_tech_cart").hide();
        }
        
        $("input[name='optionsRadios']").change(radio_select);
        $("#new_tech_cart").hide();
        function radio_select() {
            var value= $("input[name='optionsRadios']:checked").val();
            if(value == 'new'){
                $("#name_tech_cart").prop('required',true);
                $("#new_tech_cart").show();
            }
            else{
                $("#name_tech_cart").prop('required',false);
                $("#new_tech_cart").hide();
            }
        }
        $('#crop_list_select').change(tech_cart_crop);
        function tech_cart_crop() {
            var crop_id=$(this).val();
            $('.rad').hide();
            $('.tech_cart_crop_'+crop_id).show();
            $("#new_tech_cart").hide();
            $('input[name="optionsRadios"]').attr('checked', false);
        }

        $('.area_plus').keyup(total_area);
        $(document).ready(total_area);
        function total_area() {
           var total_area=0;
            $(".area_plus").each(function(){
                var area=parseFloat($(this).val());
                if(isNaN(area)) area=0;
                
                total_area += area;
            });
            $('#total_area').text(total_area);
        }
    });
</script>