<?
$date['type_material']['ua'][4]='Пальне';
$date['fuel_type']['ua']=array(
    1=>'Дизель',
    2=>'Бензин'
);
$unit=array(
    1=>'кг',
    2=>'л',
    3=>'м³',
    4=>'п.о'
);
?>
<section class="content">
    <div class="box">
        <div class="box-bodyn">
            <div class="non-semantic-protector">
                <h1 class="ribbon">
                    <strong class="ribbon-content">Планування закупівель матеріалів</strong>
                </h1>
            </div>
        </div>
    </div>
    <div class="rown">
        <div class="col-sm-9">
            <table class="table">
                <thead>
                <tr>
                    <th class="text-center">Тип матеріалу</th>
                    <th class="text-center">Назва</th>
                    <th class="text-center">Од.виміру</th>
                    <th class="text-center">Необхідна кількість <br />з урахуванням складу</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <? foreach ($date['material']['price_material'] as $arr_material)if($date['need_material'][$arr_material['id_material_price']]==TRUE){?>
                    <tr class="materil_list type_material_<?=$arr_material['id_type_material']; if($arr_material['id_type_material']==3){?> subtype_<?=$arr_material['key_material']; }?>">
                        <td class="text-center"><?=$date['type_material']['ua'][$arr_material['id_type_material']]?>
                            <? if($arr_material['id_type_material']==1) echo '/'.$date['crop_list'][$arr_material['key_material']]['name_crop_ua']?>
                            <? if($arr_material['id_type_material']==2) echo '/'.$date['fert_material']['ua'][$arr_material['key_material']]?>
                            <? if($arr_material['id_type_material']==3) echo '/'.$date['ppa_material']['ua'][$arr_material['key_material']]?>
                            <? if($arr_material['id_type_material']==4) echo '/'.$date['fuel_type']['ua'][$arr_material['key_material']]?>
                        </td>
                        <td class="text-center"><?=$arr_material['name_material']?></td>
                        <td class="text-center"><?=$unit[$arr_material['material_unit']]?></td>
                        <td class="text-center"><?=$date['need_material'][$arr_material['id_material_price']]-$date['material']['storage_material'][$arr_material['id_lib_material']]?></td>
                        <td class="text-center"><button data-data='<?=json_encode(unserialize($date['material']['cash_flow_material'][$arr_material['id_material']]))?>' data-mass="<?=$date['need_material'][$arr_material['id_material_price']]-$date['material']['storage_material'][$arr_material['id_lib_material']]?>" data-id_matrial="<?=$arr_material['id_material']?>" class="btn btn-success add_plan">планувати закупівлі</button></td>
                    </tr>
                <?}?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-3">
            <h4 class="text-center">Фільтр</h4>
            <select class="form-control filter_type">
                <option value="0">Всі матеріали</option>
                <?php foreach ($date['type_material']['ua'] as $key=>$value){?>
                    <option value="<?=$key?>"><?=$value?></option>
                <?} ?>
            </select>
            <br>
            <select class="form-control filter_ppa">
                <option value="0">Всі види</option>
                <?php foreach ($date['ppa_material']['ua'] as $key=>$value){?>
                    <option value="<?=$key?>"><?=$value?></option>
                <?} ?>
            </select>
            <hr>
        </div>
    </div>
</section>
<div id="material_modal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title">Картка матеріалу</span>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="id_material_price" name="id_material_price">
                    <div class="row">
                        <table class="table">
                            <tr>
                                <th>Назва матеріалу</th>
                                <th>потрібно</th>
                                <th>заплановано</th>
                                <th>залишилося запланувати</th>
                            </tr>
                            <tr>
                                <td id="modal_name"></td>
                                <td id="modal_mass"></td>
                                <td id="modal_mass_plan"></td>
                                <td id="modal_mass_df"></td>
                            </tr>
                        </table>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>
                                        <label>кількість</label>
                                        <input class="form-control" type="text" id="material_mass">
                                    </td>
                                    <td>
                                        <label>ціна</label>
                                        <input class="form-control" type="text" id="material_price">
                                    </td>
                                    <td>
                                        <label>дата закупівлі</label>
                                        <input class="form-control" type="date" id="material_date">
                                    </td>
                                    <td>
                                        <br>
                                        <button class="btn btn-success" id="add_month_list">додати</button>
                                    </td>
                                </tr>
                            </thead>
                            <tbody id="list_month_material">

                            </tbody>
                        </table>
                    </div>
                    <br><br>
                    <form id="form_material" method="post" action="/new-farmer/save_material_date">
                        <input id="save_date_material" name="save_date_material" type="hidden">
                        <input id="save_id_material" name="save_id_material" type="hidden">
                    </form>
                <button class="btn btn-success btn-block" id="add_material_bd">зберегти планування</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.add_plan').click(add_plan);
        var json_material='<?=json_encode($date['material_lib'])?>';
        var material=JSON.parse(json_material);

        function mass_material() {
            var mass_plan_date=0;
            var mass= $('#modal_mass').text();
            $('.material_date').each(function () {
                mass_plan_date+=parseFloat($(this).find('.mass_md').text());
            });
            $('#modal_mass_plan').text(mass_plan_date);
            $('#modal_mass_df').text(mass-mass_plan_date);
        }

        var id_material_date=0;
        function add_plan() {
            var id_material=$(this).attr('data-id_matrial');
            var mass=$(this).attr('data-mass');
            var material_date_json=$(this).attr('data-data');
            var material_date=JSON.parse(material_date_json);
            $('#modal_name').text(material[id_material]['name_material']);
            $('#modal_mass').text(mass);
            $('#list_month_material').html('');
            $.each(material_date, function(key, value) {
                id_material_date++;
                $('#list_month_material').append('' +
                    '<tr class="material_date" id="md_'+id_material_date+'">' +
                    '<td class="mass_md">'+value['m']+'</td>' +
                    '<td class="price_md">'+value['p']+'</td>' +
                    '<td class="date_md">'+value['d']+'</td>' +
                    '<td><button data-md="'+id_material_date+'" class="btn btn-danger remove_md">-</button></td>' +
                    '</tr>');
            });
            $('#material_modal').modal('show');
            $('#save_id_material').val(id_material);
            mass_material();
        }

        $('#add_month_list').click(add_month_list);
        function add_month_list() {
            var mass=$('#material_mass').val();
            var price=$('#material_price').val();
            var date=$('#material_date').val();
            id_material_date++;
            $('#list_month_material').append('' +
                '<tr class="material_date" id="md_'+id_material_date+'">' +
                    '<td class="mass_md">'+mass+'</td>' +
                    '<td class="price_md">'+price+'</td>' +
                    '<td class="date_md">'+date+'</td>' +
                    '<td><button data-md="'+id_material_date+'" class="btn btn-danger remove_md">-</button></td>' +
                '</tr>');
            $('#material_mass').val('');
            $('#material_price').val('');
            $('#material_date').val('');
            mass_material();
        }
        $('#list_month_material').on('click','.remove_md', function () {
           var md=$(this).attr('data-md');
           $('#md_'+md).remove();
            mass_material();
        });
        $('#add_material_bd').click(save_material_month);
        function save_material_month() {
            jsonObj = [];
            $('.material_date').each(function () {
                item = {};
                item ["m"] = $(this).find('.mass_md').text();
                item ["p"] = $(this).find('.price_md').text();
                item ["d"] = $(this).find('.date_md').text();
                jsonObj.push(item);
            });
            $('#save_date_material').val(JSON.stringify(jsonObj));
            $("#form_material").submit();
        }
        $('#type_materia').change(function () {
            var value=$(this).val();
            if(value==3){
                $('#sub_type_material, #label_sub_type_material').show();
            }else {
                $('#sub_type_material, #label_sub_type_material').hide();
            }
        });
        //filter
        $('.filter_type').change(filter_type);
        function filter_type() {
            var time=200;
            var type=$(this).val();
            if(type==0){
                $('.materil_list').show(time);
                $('.filter_ppa').hide(time);
            }else {
                if(type==3){
                    $('.filter_ppa').show(time);
                }else {
                    $('.filter_ppa').hide(time);
                }
                $('.materil_list').hide(time);
                $('.type_material_'+type).show(time);
            }
        }
        $('.filter_ppa').change(filter_ppa);
        function filter_ppa() {
            var time=200;
            var subtype=$(this).val();
            $('.materil_list').hide(time);
            if(subtype==0){
                $('.type_material_3').show(time);
            }else {
                $('.subtype_' + subtype).show(time);
            }
        }
        $('#add_new_material').click(function () {
            $('#form_material').attr('action','/new-farmer/save_material_bd');
            $('#id_material_price').val('');
            $('#name_material').val('');
            $('#price_material').val('');
            $('#type_materia').val('');
            $('#sub_type_material').val('');
            $('#material_modal').modal('show');
        });
        $('.edit_material').click(function () {
            $('#form_material').attr('action','/new-farmer/save_edit_material_bd');
            var material_json=$(this).attr('data-material');
            var material=JSON.parse(material_json);
            $('#id_material_price').val(material['id_material_price']);
            $('#name_material').val(material['name_material']);
            $('#price_material').val(material['price_material']);
            $('#type_materia').val(material['id_type_material']);
            $('#sub_type_material').val(material['key_material']);
            if(material['id_type_material']==3){
                $('#sub_type_material, #label_sub_type_material').show();
            }else {
                $('#sub_type_material, #label_sub_type_material').hide();
            }
            $('#material_modal').modal('show');
        });
    });
</script>
