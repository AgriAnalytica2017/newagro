<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 04.10.2017
 * Time: 12:08
 */
?>
<div class="box">
    <div class="box-bodyn">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content">Планування реалізації продукції</strong>
            </h1>
        </div>
    </div>
    <div class="rown">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" rowspan="2">Продукція</th>
                    <th class="text-center" rowspan="2">На складі</th>
                    <th class="text-center" rowspan="2">Надійшло від урожаю</th>
                    <th class="text-center" colspan="3">Витрати</th>
                    <th class="text-center" rowspan="2">Реалізація продукції</th>
                    <th class="text-center" rowspan="2">Залишок продукції на кінець року</th>
                    <th class="text-center" rowspan="2"></th>
                </tr>
                <tr>
                    <th class="text-center">на корм тварин</th>
                    <th class="text-center">на насіння</th>
                    <th class="text-center">на оплату за оренду паїв</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($date['products'] as $id_products=>$products){?>
                <tr class="prod" id="<?=$id_products?>">
                    <td class="text-center"><?=$products['name']?></td>
                    <td class="text-center p_storage_mass<?=$id_products?>"><?=$date['sales']['storage'][$id_products]?></td>
                    <td class="text-center p_product_mass<?=$id_products?>"><?=$products['mass']?></td>
                    <td class="text-center"><input data-id="<?=$id_products?>" class="form-control ed p_minus_1<?=$id_products?>" type="text" name="minus_1" value="<?=$date['sales']['1'][$id_products]['minus_1']?>"></td>
                    <td class="text-center"><input data-id="<?=$id_products?>" class="form-control ed p_minus_2<?=$id_products?>" type="text" name="minus_2" value="<?=$date['sales']['1'][$id_products]['minus_2']?>"></td>
                    <td class="text-center"><input data-id="<?=$id_products?>" class="form-control ed p_minus_3<?=$id_products?>" type="text" name="minus_3" value="<?=$date['sales']['1'][$id_products]['minus_3']?>"></td>
                    <td class="text-center p_sales<?=$id_products?>">
                        <?=($products['mass']+$date['sales']['storage'][$id_products])-($date['sales']['1'][$id_products]['minus_1']+$date['sales']['1'][$id_products]['minus_2']+$date['sales']['1'][$id_products]['minus_3']+$date['sales']['1'][$id_products]['minus_4'])?>
                    </td>
                    <td class="text-center"><input data-id="<?=$id_products?>" class="form-control ed p_minus_4<?=$id_products?>" type="text" name="minus_4" value="<?=$date['sales']['1'][$id_products]['minus_4']?>"></td>
                    <td><button data-name="<?=$products['name']?>" data-data='<?=json_encode(unserialize($date['sales']['2'][$id_products]))?>' data-mass="<?=($products['mass'])-($date['sales']['1'][$id_products]['minus_1']+$date['sales']['1'][$id_products]['minus_2']+$date['sales']['1'][$id_products]['minus_3']+$date['sales']['1'][$id_products]['minus_4'])?>" data-id_matrial="<?=$id_products?>" class="btn btn-success add_plan">планувати реалізацію</button></td>
                </tr>
                <?}?>
            </tbody>
        </table>
    </div>
</div>

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
                            <th>продукція</th>
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
                <form id="form_material" method="post" action="/new-farmer/save_sales2">
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
        $('#material_mass').keyup(function () {
            var a=$(this).val();
            var b=parseFloat($('#modal_mass_df').text());
            var c=b-a;

            if(c<0) {
                $(this).val('');
                alert('-');
            }
            //mass_material();
        });
        $('.ed').keyup(function () {
            var id=$(this).attr('data-id');
            var storage_mass=parseFloat($('.p_storage_mass'+id).text());
            var product_mass=parseFloat($('.p_product_mass'+id).text());
            var minus_1=parseFloat($('.p_minus_1'+id).val());
            var minus_2=parseFloat($('.p_minus_2'+id).val());
            var minus_3=parseFloat($('.p_minus_3'+id).val());
            var minus_4=parseFloat($('.p_minus_4'+id).val());
            if(isNaN(storage_mass)) storage_mass=0;
            if(isNaN(product_mass)) product_mass=0;
            if(isNaN(minus_1)) minus_1=0;
            if(isNaN(minus_2)) minus_2=0;
            if(isNaN(minus_3)) minus_3=0;
            if(isNaN(minus_4)) minus_4=0;
            var sales=(product_mass+storage_mass)-(minus_1+minus_2+minus_3+minus_4);
            $('.p_sales'+id).text(sales);
        }).change(function () {
            var name=$(this).attr('name');
            var id=$(this).attr('data-id');
            var val=$(this).val();
            $.ajax({
                type : 'post',
                url : '/new-farmer/save_sales1',
                data : {
                    'name' : name,
                    'id' : id,
                    'val' : val
                }
            });
        });
        $('.add_plan').click(add_plan);
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
            var name=$(this).attr('data-name');
            var mass=$(this).attr('data-mass');
            var material_date_json=$(this).attr('data-data');
            var material_date=JSON.parse(material_date_json);
            $('#modal_name').text(name);
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
    });
</script>