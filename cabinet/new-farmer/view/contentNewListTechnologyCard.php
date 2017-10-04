<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 01.08.2017
 * Time: 16:17
 *
 */

/*echo "<pre>";
var_dump($date['new_crop_culture']);die;*/
?>
<style>
            .searchs{
            height: 42px;
            width: 300px;
            border-radius:3px;
        }
    .add-ico {
    margin-right: -17%;
    margin-top: -1px;
}
    .table{
    border-top: none;
    }
</style>
<div class="box-bodyn col-lg-12">
        <div class="non-semantic-protector col-sm-3">
       <?=$language['new-farmer']['57']?>
        </div>
        
<!--
        <div class="col-sm-3">
            <div class="col-sm-3 add-ico"> <a href="#newEquipment"  data-toggle="modal"> 
            <img src="/cabinet/new-farmer/template/img/add.svg" class="user-imagen add-ico" style="width: 35px; height: 35px;"> 
            </a></div>
            <a class=" add-ico non-semantic-protector col-sm-9" href="#newEquipment"  data-toggle="modal">
            <?=$language['new-farmer']['16']?></a>
            </div>
-->
            <div class="col-lg-4">
            <input class="searchs inphead" id="search" type="text" placeholder="Поиск" style="float: left">
        </div>
            </div>
            

            <div class="box-bodyn col-sm-12">
                       <div class="col-sm-6">
                        <label for="id_crop"><?=$language['new-farmer']['61']?></label>
                        <select class="form-control inphead" id="id_crop">
                            <option value="0"><?=$language['new-farmer']['61']?></option>
                            <?php foreach ($date['crop'] as $crop){ ?>
                                <option value="<?=$crop['id_crop']?>"><?if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?></option>
                            <?} ?>
                        </select>
                         </div>
                         <div class="col-sm-6" style="margin-top: 8px;">
            <div class="col-lg-12">
            <div class="col-sm-3 add-ico"> <a href="#newTech"  data-toggle="modal"> 
            <img src="/cabinet/new-farmer/template/img/add.svg" class="user-imagen add-ico" style="width: 30px;height: 30px;"> 
            </a></div>
            <a class=" add-ico non-semantic-protector col-sm-9" href="#newTech"  data-toggle="modal" style="font-size: 20px;
font-weight: 400;">
            Створити нову технологію</a>
            </div>
             <div class="col-lg-12" style="margin-top: 8px;">
            <div class="col-sm-3 add-ico"> <a href="#templateTech"  data-toggle="modal"> 
            <img src="/cabinet/new-farmer/template/img/add.svg" class="user-imagen add-ico" style="width: 30px;height: 30px;"> 
            </a></div>
            <a class=" add-ico non-semantic-protector col-sm-9" href="#templateTech"  data-toggle="modal" style="font-size: 20px;
font-weight: 400;">
            Створити нову технологію за шаблоном</a>
            </div>
    </div>
                  
                    </div>
        <div class="row">
            <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th><?=$language['new-farmer']['62']?></th>
                                <th><?=$language['new-farmer']['63']?></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($date['new_crop_culture'] as $culture){?>
                                <tr class="tech_cart id_crop_<?=$culture['id_crop']?>">
                                    <td><? if($_COOKIE['lang']=='ua'){echo $culture['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $culture['name_crop_en'];}?></td>
                                    <td><?=$culture['tech_name']?></td>
                                    <td>
                                        <!--<button data-lang="<?/*=$_COOKIE['lang']*/?>" data-id="<?/*=$culture['id_culture']*/?>" class="btn btn-warning copy_template"><?/*=$language['new-farmer']['150']*/?></button>-->
                                        <a class="btn btn-warning" href="/new-farmer/edit_technology_card/<?=$culture['id_culture']?>">Редагувати технологію</a>
                                        <!--<a class="btn btn-primary" href="/new-farmer/costs_technology_card/<?/*=$culture['id_culture']*/?>"><?/*=$language['new-farmer']['64']*/?></a>-->
                                    </td>
                                    <td>
                                        <a class="btn btn-warning edit_tech_card" href="#edit_tech_card" data-toggle="modal" data-data='<?=json_encode($culture);?>'>Редагувати картку</a>
                                    </td>
                                    <td>
                                        <a href="/new-farmer/remove_technology_card/<?=$culture['id_culture']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                    </td>
                                </tr>
                            <? }?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>



<div id="newTech" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title">Картка технології</span>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <label>Назва технології</label>
                        <input type="text" class="form-control inphead" name="name_tech_card" id="name_tech_card">
                    </div>
                    <div class="col-lg-4">
                        <label><?=$language['new-farmer']['55']?></label>
                        <select class="form-control inphead op" id="crop_type">
                            <? if($_COOKIE['lang']=='gb'){?>
                                <option value="2">Crops</option>
                                <option value="1">Legumes</option>
                                <option value="3">Technical</option>
                                <option value="4">Fodder</option>
                                <option value="5">Vegetable and melons</option>
                                <option value="6">Fruit</option>
                                <option value="7">Вerries</option>
                            <?} elseif($_COOKIE['lang']=='ua'){?>
                                <option value="2">Зернові</option>
                                <option value="1">Зерно-бобові</option>
                                <option value="3">Технічні</option>
                                <option value="4">Кормові</option>
                                <option value="5">Овочеві та баштанні</option>
                                <option value="6">Плодові</option>
                                <option value="7">Ягідні</option>
                            <?}?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label><?=$language['new-farmer']['48']?></label>
                        <select class="form-control inphead" name='crop' id="crop_list_select" required>
                            <?foreach($date['crop_us'] as $crop){?>
                                <option class="crop_list crop_type_<?=$crop['crop_type']?>" value="<?=$crop['id_crop']?>"><?if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?></option>
                            <?}?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label>Урожайність, ц/га</label>
                        <input type="text" class="form-control inphead" id="yield">
                    </div>
                    <div class="col-lg-6">
                        <label>Площа, га</label>
                        <input type="text" class="form-control inphead" id="area">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                <button type="submit" class="btn btn-primaryn save_new_tech"><?=$language['new-farmer']['27']?></button>
            </div>
        </div>
    </div>
</div>

<div id="templateTech" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title">Шаблони технології</span>
            </div>

            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><?=$language['new-farmer']['62']?></th>
                            <th><?=$language['new-farmer']['63']?></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($date['new_crop_culture'] as $culture){?>
                            <tr class="tech_cart id_crop_<?=$culture['id_crop']?>">
                                <td><? if($_COOKIE['lang']=='ua'){echo $culture['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $culture['name_crop_en'];}?></td>
                                <td><?=$culture['tech_name']?></td>
                                <td>
                                    <button data-lang="<?=$_COOKIE['lang']?>" data-id="<?=$culture['id_culture']?>" class="btn btn-warning copy_template">Використати як шаблон</button>
                                    <!--<a class="btn btn-primary" href="/new-farmer/costs_technology_card/<?/*=$culture['id_culture']*/?>"><?/*=$language['new-farmer']['64']*/?></a>-->
                                </td>
                                <td></td>
                            </tr>
                        <? }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
            </div>
        </div>
    </div>
</div>

<div id="edit_tech_card" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title">Картка технології</span>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <label>Назва технології</label>
                        <input type="text" class="form-control inphead" name="name_tech_card" id="edit_name_tech_card">
                    </div>
                    <div class="col-lg-4">
                        <label><?=$language['new-farmer']['55']?></label>
                        <select class="form-control inphead op" id="edit_crop_type">
                            <? if($_COOKIE['lang']=='gb'){?>
                                <option value="2">Crops</option>
                                <option value="1">Legumes</option>
                                <option value="3">Technical</option>
                                <option value="4">Fodder</option>
                                <option value="5">Vegetable and melons</option>
                                <option value="6">Fruit</option>
                                <option value="7">Вerries</option>
                            <?} elseif($_COOKIE['lang']=='ua'){?>
                                <option value="2">Зернові</option>
                                <option value="1">Зерно-бобові</option>
                                <option value="3">Технічні</option>
                                <option value="4">Кормові</option>
                                <option value="5">Овочеві та баштанні</option>
                                <option value="6">Плодові</option>
                                <option value="7">Ягідні</option>
                            <?}?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label><?=$language['new-farmer']['48']?></label>
                        <select class="form-control inphead" name='crop' id="edit_crop_list_select" required>
                            <?foreach($date['crop_us'] as $crop){?>
                                <option class="crop_list crop_type_<?=$crop['crop_type']?>" value="<?=$crop['id_crop']?>"><?if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?></option>
                            <?}?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label>Урожайність, ц/га</label>
                        <input type="text" class="form-control inphead" id="edit_yield">
                    </div>
                    <div class="col-lg-6">
                        <label>Площа, га</label>
                        <input type="text" class="form-control inphead" id="edit_area">
                    </div>
                    <input type="hidden" name="edit_id_culture" id="edit_id_culture">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                <button type="submit" class="btn btn-primaryn save_edit_new_tech"><?=$language['new-farmer']['27']?></button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
       $('#id_crop').change(function () {
           var id=$(this).val();
           $('.tech_cart').hide(300);
           $('.id_crop_'+id).show(300);
           if(id==0)$('.tech_cart').show(300);
       });

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

        $('.save_new_tech').click(function(){
            var id_crop = $('#crop_list_select').val();
            var tech_name=$('#name_tech_card').val();
            var crop_yield=$('#yield').val();
            var area = $('#area').val()
            if(tech_name != null){
                $.ajax({
                    type: 'post',
                    url : '/new-farmer/create_new_tech_cart',
                    data:{
                        'id_crop' : id_crop,
                        'tech_name': tech_name,
                        'crop_yield':crop_yield,
                        'area':area
                    },
                    success : function(data) {
                        $(location).attr('href','/new-farmer/edit_technology_card/'+data);
                    }
                });
            }
        });

        $('.copy_template').click(function () {
            var id_culture = $(this).attr('data-id');
            var lang = $(this).attr('data-lang');
            if(lang == 'ua'){
                var tech_name = prompt('Введіть назву технологічної карти');
            }
            else{
                var tech_name = prompt('Enter technology card name');
            }
            if(tech_name != null){

                $.ajax({
                    type: 'post',
                    url : '/new-farmer/copy_technology_template',
                    data:{
                        'id_culture' : id_culture,
                        'tech_name': tech_name
                    },
                    success : function(data) {
                        $(location).attr('href','/new-farmer/edit_technology_card/'+data);
                    }
                });
                //$(location).attr('href','/new-farmer/copy_technology_template/'+id_culture+'/'+tech_name);
            }
        });

        $('.edit_tech_card').click(function () {
            var json_culture = $(this).attr('data-data');
            var culture = JSON.parse(json_culture);
            $('#edit_id_culture').val(culture['id_culture']);
            $('#edit_name_tech_card').val(culture['tech_name']);
            $('#edit_crop_type').val(culture['crop_type']);
            $('#edit_crop_list_select').val(culture['id_crop']);
            $('#edit_yield').val(culture['yield']);
            $('#edit_area').val(culture['area']);
        });

        $('.save_edit_new_tech').click(function () {
            var edit_id_culture = $('#edit_id_culture').val();
            var edit_name_tech_card = $('#edit_name_tech_card').val();
            var edit_crop_type = $('#edit_crop_type').val();
            var edit_crop_list_select = $('#edit_crop_list_select').val();
            var edit_yield = $('#edit_yield').val();
            var edit_area= $('#edit_area').val();

            if(edit_name_tech_card != null){

                $.ajax({
                    type: 'post',
                    url : '/new-farmer/edit_technology_card_list',
                    data:{
                        'edit_id_culture' : edit_id_culture,
                        'edit_name_tech_card': edit_name_tech_card,
                        'edit_crop_type': edit_crop_type,
                        'edit_crop_list_select': edit_crop_list_select,
                        'edit_yield': edit_yield,
                        'edit_area': edit_area
                    },
                    success : function() {
                        location.reload();
                    }
                });
                //$(location).attr('href','/new-farmer/copy_technology_template/'+id_culture+'/'+tech_name);
            }
        });
    });
</script>
