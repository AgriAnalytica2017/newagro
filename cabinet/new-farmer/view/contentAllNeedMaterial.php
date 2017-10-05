<style>
    #sub_type_material, #label_sub_type_material,.filter_ppa{
        display: none;
    }
    .total_sum_need{
        font-weight: bold;
    }
</style>
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
<script>
    $(document).ready(function (){
        $("#btnExport").click(function(e) {
            e.preventDefault();
            //getting data from our table
            var data_type = 'data:application/vnd.ms-excel';
            var table_div = document.getElementById('for_export');
            var table_html = table_div.outerHTML.replace(/ /g, '%20');
            var meta ="<meta http-equiv='content-type' content='text/plain; charset=UTF-8'>";
            var a = document.createElement('a');
            a.href = data_type + ', ' + meta +  table_html;
            a.download = 'AgriAnalytica(AllNeededMaterial).xls';
            a.click();
        });
    });
</script>
<section class="content">
    <div class="box">
        <div class="box-bodyn">
            <div class="non-semantic-protector">
                <h1 class="ribbon">
                    <strong class="ribbon-content">Потреба в матеріальних ресурсах</strong>
                </h1>
            </div>
        </div>
    </div>
    <div class="rown">
        <div class="col-sm-9" id="for_export">
            <table class="table">
                <thead>
                <tr>
                    <th>Тип матеріалу</th>
                    <th>Назва</th>
                    <th>Од.виміру</th>
                    <th>Кількість</th>
                    <th>Ціна, грн/од</th>
                    <th>Сума, грн.</th>
                </tr>
                </thead>
                <tbody>
                <?
                $all_summ = 0;
                foreach ($date['material'] as $material)if ($date['budget']['need_material'][$material['id_material_price']]>0){?>
                    <tr class="materil_list type_material_<?=$material['id_type_material']?> subtype_<?=$material['key_material']?>">
                        <td><?=$date['type_material']['ua'][$material['id_type_material']]?>
                            <? if($material['id_type_material']==1) echo '/'.$date['crop_list'][$material['key_material']]['name_crop_ua']?>
                            <? if($material['id_type_material']==2) echo '/'.$date['fert_material']['ua'][$material['key_material']]?>
                            <? if($material['id_type_material']==3) echo '/'.$date['ppa_material']['ua'][$material['key_material']]?>
                            <? if($material['id_type_material']==4) echo '/'.$date['fuel_type']['ua'][$material['key_material']]?>
                        </td>
                        <td><?=$material['name_material']?></td>
                        <td><?=$unit[$material['material_unit']]?></td>
                        <td><?=$date['budget']['need_material'][$material['id_material_price']]?></td>
                        <td style="width: 10%;"><input type="text" class="form-control change_price" data-id_price="<?=$material['id_material_price']?>" value="<?=$material['price_material']?>"></td>
                        <td><?=number_format($date['budget']['need_material'][$material['id_material_price']]*$material['price_material'], 2,',',' ')?></td>
                    </tr>
                <?  $summ['mass'][$material['id_type_material']]+=$date['budget']['need_material'][$material['id_material_price']];
                    $summ['price'][$material['id_type_material']]+=$date['budget']['need_material'][$material['id_material_price']]*$material['price_material'];
                }?>
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
            <select class="form-control filter_seed" style="display: none;">
                <option value="0">Всі види</option>
                <?php foreach ($date['crop_list'] as $key=>$value){?>
                    <option value="<?=$key?>"><?=$value['name_crop_ua']?></option>
                <?} ?>
            </select>

            <select class="form-control filter_fert" style="display: none;">
                <option value="0">Всі види</option>
                <?php foreach ($date['fert_material']['ua'] as $key=>$value){?>
                    <option value="<?=$key?>"><?=$value?></option>
                <?} ?>
            </select>
            <select class="form-control filter_fuel" style="display: none;">
                <option value="0">Всі види</option>
                <option value="1">Дизельне пальне</option>
                <option value="2">Бензин</option>
            </select>
            <hr>

            <table class="table">
                <thead>
                    <tr>
                        <th colspan="3" class="text-center">Потреба, грн</th>
                    </tr>
<!--                    <tr>-->
<!--                        <td>#</td>-->
<!--                        <td>вартість</td>-->
<!--                    </tr>-->
                </thead>
                <tbody>
                <?php
                $all_summ =0;
                foreach ($date['type_material']['ua'] as $key=>$value){
                    $all_summ += $summ['price'][$key];?>
                    <tr>
                        <td><?=$value?></td>

                        <td><?=number_format($summ['price'][$key], 2,',',' ')?></td>
                    </tr>
                <?}?>
                <tr class="total_sum_need">
                    <td>Сума, грн</td>
                    <td><?=number_format($all_summ,2,',',' ')?></td>
                </tr>
                </tbody>

            </table>
        </div>
        <button  class="btn btn-primary" id="btnExport" type="submit" style="margin-bottom: 10px;">Експорт в Exel
        </button>
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
                            <label><?=$language['new-farmer']['105']?></label>
                            <input list="lib_materials" class="form-control" name="name_material" id="name_material" >
                            <datalist id="lib_materials">
                                <?foreach ($date['material_lib'] as $material_lib){?>
                                    <option><?=$material_lib['name_material']?></option>
                                <?}?>
                            </datalist>
                        </div>
                        <div class="col-lg-6">
                            <label><?=$language['new-farmer']['107']?></label>
                            <input type="text" name="price_material" id="price_material" class="form-control">
                            <br>
                            <label id="label_sub_type_material">Підтип матеріалу</label>
                            <select id="sub_type_material" class="form-control" name="sub_type_material">
                                <?php foreach ($date['ppa_material']['ua'] as $key=>$value){?>
                                    <option value="<?=$key?>"><?=$value?></option>
                                <?} ?>
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-success btn-block" id="add_material_bd">save</button>
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
                $('.filter_seed').hide(time);
                $('.filter_fert').hide(time);
                $('.filter_fuel').hide(time);
            }else {
                if(type==1){
                    $('.filter_seed').show(time);
                    $('.filter_ppa').hide();
                    $('.filter_fert').hide();
                    $('.filter_fuel').hide();
                }
                if(type==2){
                    $('.filter_fert').show(time);
                    $('.filter_ppa').hide();
                    $('.filter_seed').hide();
                    $('.filter_fuel').hide();
                }
                if(type==3){
                    $('.filter_ppa').show(time);
                    $('.filter_seed').hide();
                    $('.filter_fert').hide();
                    $('.filter_fuel').hide();
                }
                if (type==4){
                    $('.filter_fuel').show(time);
                    $('.filter_seed').hide();
                    $('.filter_fert').hide();
                    $('.filter_ppa').hide();
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
                $('.type_material_1').hide();
                $('.type_material_2').hide();
                $('.type_material_4').hide();
            }else {
                $('.subtype_' + subtype).show(time);
                $('.type_material_1').hide();
                $('.type_material_2').hide();
                $('.type_material_4').hide();
            }
        }

        $('.filter_fert').change(filter_fert);
        function filter_fert() {
            var time=200;
            var subtype=$(this).val();
            $('.materil_list').hide(time);
            if(subtype==0){
                $('.type_material_2').show(time);
                $('.type_material_1').hide();
                $('.type_material_3').hide();
                $('.type_material_4').hide();
            }else {
                $('.subtype_' + subtype).show(time);
                $('.type_material_1').hide();
                $('.type_material_3').hide();
                $('.type_material_4').hide();
            }
        }

        $('.filter_fuel').change(filter_fuel);
        function filter_fuel() {
            var time=200;
            var subtype=$(this).val();
            $('.materil_list').hide(time);
            if(subtype==0){
                $('.type_material_4').show(time);
                $('.type_material_1').hide();
                $('.type_material_3').hide();
                $('.type_material_2').hide();
            }else {
                $('.subtype_' + subtype).show(time);
                $('.type_material_1').hide();
                $('.type_material_3').hide();
                $('.type_material_2').hide();
            }
        }

        $('.filter_seed').change(filter_seed);
        function filter_seed() {
            var time=200;
            var subtype=$(this).val();
            $('.materil_list').hide(time);
            if(subtype==0){
                $('.type_material_1').show(time);
                $('.type_material_4').hide();
                $('.type_material_3').hide();
                $('.type_material_2').hide();
            }else {
                $('.subtype_' + subtype).show(time);
                $('.type_material_4').hide();
                $('.type_material_3').hide();
                $('.type_material_2').hide();
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

        $('.change_price').change(changePrice);

        function changePrice() {
            var id_material_price = $(this).attr('data-id_price');
            var change_price = $(this).val();

            $.ajax({
                type : 'post',
                url : '/new-farmer/change_price_material',
                data : {
                    'id_material_price': id_material_price,
                    'change_price' : change_price
                }
            });
        }
    });
</script>