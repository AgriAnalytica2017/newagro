           
            
<head>
    <style>
        .searchs{
            height: 35px;
            width: 300px;
            border-radius:3px;
<<<<<<< HEAD
            margin-top: -0.2% !important;
=======
            margin-top: -0.4% !important;
>>>>>>> dev
        }
    </style>
</head>
<? //var_dump($date['rent_pay']);die;?>
<div class="box-bodyn col-lg-12">
        <div class="non-semantic-protector col-sm-3">
        Планові матеріали
        </div>
        
        <div class="col-sm-9" style="margin-left: -6%;">
                   <div class="non-semantic-protector col-sm-2 text-right">Фільтр</div>
                    <div class="col-sm-4">
<!--            <br>-->
<!--            <button id="add_new_material" class="btn btn-block">Додати новий матеріал</button>-->
<!--            <hr>-->
            <select class="searchs inphead filter_type">
                <option value="0">Всі матеріали</option>
                <?php foreach ($date['type_material']['ua'] as $key=>$value){?>
                   <option value="<?=$key?>"><?=$value?></option>
                <?} ?>
            </select>
            <select class="form-control filter_ppa">
                <option value="0">Всі види</option>
                <?php foreach ($date['ppa_material']['ua'] as $key=>$value){?>
                    <option value="<?=$key?>"><?=$value?></option>
                <?} ?>
            </select>
        </div>
            </div>
            </div>



<style>
#sub_type_material, #label_sub_type_material,.filter_ppa{
    display: none;
}
</style>
<?
$date['type_material']['ua'][4]='Топливо';
?>
<section class="content">
    <div class="rown">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Тип матеріалу</th>
                        <th>Назва матеріалу</th>
                        <th>Ціна, грн за одинию</th>
                    </tr>
                </thead>
                <tbody>
                    <?foreach ($date['material'] as $material){?>
                        <tr class="materil_list type_material_<?=$material['id_type_material']; if($material['id_type_material']==3){?> subtype_<?=$material['key_material']; }?>">
                            <td><?=$date['type_material']['ua'][$material['id_type_material']]?>
                                <? if($material['id_type_material']==1) echo '/'.$date['crop_list'][$material['key_material']]['name_crop_ua']?>
                                <? if($material['id_type_material']==2) echo '/'.$date['fert_material']['ua'][$material['key_material']]?>
                                <? if($material['id_type_material']==3) echo '/'.$date['ppa_material']['ua'][$material['key_material']]?>
                                <? if($material['id_type_material']==4) echo '/'.$date['fuel_material']['ua'][$material['key_material']]?>
                            </td>
                            <td><?=$material['name_material']?></td>
                            <td><?=$material['price_material']?></td>
                            <td style="width: 150px">
                                <button data-material='<?=json_encode($material)?>' class="btn btn-warning fa fa-pencil edit_material"></button>
                                <a href="/new-farmer/remove_material/<?=$material['id_material_price']?>" class="btn btn-danger fa fa-remove"></a>
                            </td>
                        </tr>
                    <?}?>
                </tbody>
            </table>
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
                <form id="form_material" method="post" action="/new-farmer/save_material_bd">
                    <input type="hidden" id="id_material_price" name="id_material_price">
                <div class="row">
                    <div class="col-lg-6">
                        <label>Тип матеріалу</label>
                        <select id="type_materia" class="form-control" name="type_material">
                            <?php foreach ($date['type_material']['ua'] as $key=>$value){?>
                                <option value="<?=$key?>"><?=$value?></option>
                            <?} ?>
                        </select>
                        <br>
                        <label id="label_sub_type_material">Підтип матеріалу</label>
                        <select id="sub_type_material_seed" class="form-control" name="sub_type_material_seed">
                            <? foreach ($date['crop_list'] as $crop_list){?>
                                <option value="<?=$crop_list['id_crop']?>"><?=$crop_list['name_crop_ua']?></option>
                            <?}?>
                        </select>
                        <select id="sub_type_material_ppa" class="form-control" name="sub_type_material_ppa" style="display: none">
                            <?php foreach ($date['ppa_material']['ua'] as $key=>$value){?>
                                <option value="<?=$key?>"><?=$value?></option>
                            <?} ?>
                        </select>
                        <select id="sub_type_material_fert" class="form-control" name="sub_type_material_fert" style="display: none">
                            <option value="1">Мінеральні</option>
                            <option value="2">Органічні</option>
                        </select>
                        <select id="sub_type_material_fuel" class="form-control" name="sub_type_material_fuel" style="display: none">
                            <option value="1">Дизельне паливо</option>
                            <option value="2">Бензин</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label><?=$language['new-farmer']['105']?></label>
                        <input list="lib_materials" class="form-control" name="name_material" id="name_material" >
                        <datalist id="lib_materials">
                            <?foreach ($date['material_lib'] as $material_lib){?>
                                <option><?=$material_lib['name_material']?></option>
                            <?}?>
                        </datalist>
                        <br>
                        <label><?=$language['new-farmer']['107']?></label>
                        <input type="text" name="price_material" id="price_material" class="form-control">
                    </div>
                </div>
                <br><br>
                <button type="submit" class="btn btn-success btn-block" id="add_material_bd">Зберегти</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#type_materia').change(function () {
           var value=$(this).val();
            if(value==3){
                $('#sub_type_material_ppa, #label_sub_type_material').show();
                $('#sub_type_material_seed').hide();
                $('#sub_type_material_fert').hide();
                $('#sub_type_material_fuel').hide();
            }if(value==1) {
                $('#sub_type_material_seed, #label_sub_type_material').show();
                $('#sub_type_material_ppa').hide();
                $('#sub_type_material_fert').hide();
                $('#sub_type_material_fuel').hide();
            }if(value==2){
                $('#sub_type_material_fert, #label_sub_type_material').show();
                $('#sub_type_material_ppa').hide();
                $('#sub_type_material_seed').hide();
                $('#sub_type_material_fuel').hide();
            }if(value==4){
                $('#sub_type_material_fuel, #label_sub_type_material').show();
                $('#sub_type_material_ppa').hide();
                $('#sub_type_material_seed').hide();
                $('#sub_type_material_fert').hide();
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
            if(material['id_type_material']==1){
                $('#sub_type_material_seed').val(material['key_material']);
            }if(material['id_type_material']==2){
                $('#sub_type_material_fert').val(material['key_material']);
            }if(material['id_type_material']==3){
                $('#sub_type_material_ppa').val(material['key_material']);
            }if(material['id_type_material']==4){
                $('#sub_type_material_fuel').val(material['key_material']);
            }

            if(material['id_type_material']==3){
                $('#sub_type_material_ppa, #label_sub_type_material').show();
                $('#sub_type_material_seed').hide();
                $('#sub_type_material_fert').hide();
                $('#sub_type_material_fuel').hide();
            }if(material['id_type_material']==1) {
                $('#sub_type_material_seed, #label_sub_type_material').show();
                $('#sub_type_material_ppa').hide();
                $('#sub_type_material_fert').hide();
                $('#sub_type_material_fuel').hide();
            }if(material['id_type_material']==2){
                $('#sub_type_material_fert, #label_sub_type_material').show();
                $('#sub_type_material_ppa').hide();
                $('#sub_type_material_seed').hide();
                $('#sub_type_material_fuel').hide();
            }if(material['id_type_material']==4){
                $('#sub_type_material_fuel, #label_sub_type_material').show();
                $('#sub_type_material_ppa').hide();
                $('#sub_type_material_seed').hide();
                $('#sub_type_material_fert').hide();
            }
            $('#material_modal').modal('show');
        })
    });
</script>
              