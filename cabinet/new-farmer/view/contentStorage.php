<?php

$id_material_type = array(
    1=>'Насіння',
    2=>'Добрива',
    3=>'ЗЗР',
    4=>'ПММ'
);
$unit = array(
    1=>'кг',
    2=>'п.од',
    3=>'т',
    4=>'л',
);

/*echo "<pre>";
var_dump($date['storage']['storage_field']);die;*/
?>
<div class="box">
    <div class="box-bodyn">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content"><?=$language['new-farmer']['8']?></strong>
            </h1>
        </div>
    </div>
    <div class="box-bodyn col-lg-12" style="max-height: 55px">
        <button class="btn btn-primaryn payment_disabled" href="#Add_new" data-toggle="modal">Надходження матеріалів</button>
        <button class="btn btn-primaryn payment_disabled Sale" href="#Sale" data-toggle="modal">Вибуття матеріалів</button>
    </div>
    <div class="rown">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <br><br>
                <form method="post" action="/new-farmer/storage">
                    <div class="row">
                        <div class="col-lg-3">
                            <label>Початкова дата</label>
                            <input type="date" class="form-control inphead payment_disabled" name="date_start_cal" id="date_start_cal" value="<?=$date['date_start_calc']?>">
                        </div>
                        <div class="col-lg-3">
                            <label>Кінцева дата</label>
                            <input type="date" class="form-control inphead payment_disabled" name="date_end_cal" id="date_end_cal" value="<?=$date['date_end_calc']?>">
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-success payment_disabled" style="margin-top: 29px;">Фільтрувати</button>
                        </div>
                    </div>
                </form>
            <div class="table-responsive">
                <h3 style="float: left;"><?=$language['new-farmer']['124']?></h3>
                <table class="table">
                    <thead>
                    <tr class="tabletop" >
                        <th rowspan="2" >Назва матеріалу</th>
                        <!-- <th><?=$language['new-farmer']['126']?></th> -->
                        <th colspan="2" style="text-align: center">Залишок на початок</th>
                        <th colspan="2" style="text-align: center">Надійшло</th>
                        <th colspan="2" style="text-align: center">Вибуло</th>
                        <th colspan="2" style="text-align: center">Залишок на кінець</th>
                      <!--  <th>Середня ціна, грн</th>-->
                    </tr>
                    <tr class="tabletop">
                        <td >Кількість</td>
                        <td>Сума, грн</td>
                        <td>Кількість</td>
                        <td>Сума, грн</td>
                        <td>Кількість</td>
                        <td>Сума, грн</td>
                        <td>Кількість</td>
                        <td>Сума, грн</td>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach($date['storage']['storage_material_fact'] as $storage_material){
                        $open_material++;?>
                        <tr>
                            <td>
                                <? if($storage_material['storage_type_material']=='1'){
                                    echo '<b>'.$id_material_type[$storage_material['storage_type_material']].'</b>: '.$date['crop'][$storage_material['storage_subtype_material']]['name_crop_ua'].': '.$date['material_lib'][$storage_material['storage_material']]['name_material'];
                                }elseif($storage_material['storage_type_material']=='2'){
                                    echo '<b>'.$id_material_type[$storage_material['storage_type_material']].'</b>: '.$date['fert']['ua'][$storage_material['storage_subtype_material']].': '.$date['material_lib'][$storage_material['storage_material']]['name_material'];
                                }elseif($storage_material['storage_type_material']=='3'){
                                    echo '<b>'.$id_material_type[$storage_material['storage_type_material']].'</b>: '.$date['ppa']['ua'][$storage_material['storage_subtype_material']].': '.$date['material_lib'][$storage_material['storage_material']]['name_material'];
                                }elseif($storage_material['storage_type_material']=='4'){
                                    echo '<b>'.$id_material_type[$storage_material['storage_type_material']].'</b>: '.$date['fuel']['ua'][$storage_material['storage_subtype_material']].': '.$date['material_lib'][$storage_material['storage_material']]['name_material'];
                                }
                                ?>
                            </td>
                            <!-- <td><?=$storage_1['storage_name']?></td> -->
                            <td><?if($date['incoming_material']['start_quantity'][$storage_material['storage_material_id']]!=null)
                                    {echo $date['incoming_material']['start_quantity'][$storage_material['storage_material_id']]
                                        .' '.$unit[$storage_material['storage_unit']];}
                                        else {echo '0 '.$unit[$storage_material['storage_unit']]; }?>
                            </td>
                            <td>0</td>
                            <td><a class="btn come_storage_material payment_disabled" href="#сome_material" data-toggle="modal" data-id="<?=$storage_material['storage_material_id']?>" data-type="2"><?=$date['incoming_material']['come_material'][$storage_material['storage_material_id']].' '.$unit[$storage_material['storage_unit']]?></a></td>
                            <td><?=$date['incoming_material']['come_material_sum'][$storage_material['storage_material_id']]?></td>
                            <td><a class="btn out_storage_material payment_disabled" href="#out_material" data-toggle="modal" data-id="<?=$storage_material['storage_material_id']?>">
                                    <?=$date['incoming_material']['out_material'][$storage_material['storage_material_id']]+$date['incoming_material']['come_fact'][$storage_material['storage_material_id']].' '.$unit[$storage_material['storage_unit']]?></a></td>
                            <td><?=number_format($date['incoming_material']['come_fact_sum'][$storage_material['storage_material_id']]+$date['incoming_material']['out_material_sum'][$storage_material['storage_material_id']],2,',',' ')?></td>
                            <td>
                                <?=$storage_material['storage_quantity'].' '.$unit[$storage_material['storage_unit']]?>
                            </td>
                            <td>
                                <?=number_format($storage_material['storage_quantity']*$storage_material['storage_sum_total'],2,',',' ')?>
                            </td>
                            <!--<td>
                                <?/*=number_format($storage_material['storage_sum_total'], 2, ',', ' ')*/?>
                            </td>-->
                        </tr>
                    <?}?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
    <br>
    <div class="box-bodyn col-lg-12" style="max-height: 55px">
        <button class="btn btn-primaryn payment_disabled" href="#Add_pdoducts" data-toggle="modal"><?=$language['new-farmer']['110']?></button>
        <button href="#sale_products" class="btn btn-primary payment_disabled sale_prod" data-toggle="modal" data-id="<?=$product['product_type']?>">Реалізація продукції</button>
    </div>
    <div class="rown">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="table-responsive">
                <h3 style="float: left;"><?=$language['new-farmer']['128']?></h3>
                <table class="table">
                    <thead>
                    <tr class="tabletop">
                        <th><?=$language['new-farmer']['129']?></th>
                        <th>Залишок на початок, кг</th>
                        <th>Надійшло, кг</th>
                        <th>Вибуло, кг</th>
                        <th>Залишок на кінець, кг</th>
                        <th><?=$language['new-farmer']['114']?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach($date['products']['products'] as $product){?>
                        <tr>
                            <td><?=$date['crop'][$product['product_type']]['name_crop_ua']?></td>
                            <td><?=$product['product_quantity']?></td>
                            <td><a class="btn come_products" href="#come_products" data-toggle="modal" data-id="<?=$product['product_type']?>"><?=$date['products']['income_prod_1'][$product['product_type']]?></a></td>
                            <td><a class="btn out_sale_products" href="#out_products" data-toggle="modal"  data-id="<?=$product['product_type']?>"><?=$date['products']['actual_sales'][$product['product_type']]?></a></td>
                            <td><?=$product['product_now']?></td>
                            <td><?=$product['product_comments']?>
                            </td>
                        </tr>
                    <?}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="box-body wt">
        <div id="Add_new" class="modal fade">
            <div class="modal-dialog modal-lg">
                <form action="/new-farmer/create_storage" method="post">
                    <div class="modal-content wt">
                        <div class="box-bodyn">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <span class="box-title">Картка надходження матеріалів на склад</span>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['111']?></label>
                                    <input class="form-control inphead" type="date" name="storage_date" required>
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['117']?></label>
                                    <select class="form-control  inphead type_material" name="storage_type_material" required>
                                        <? foreach($id_material_type as $key=>$value){?>
                                            <option value="<?=$key?>"><?=$value?></option>
                                        <?}?>
                                    </select>
                                </div>
                                <div class="col-lg-3 for_seeds">
                                    <label>Культура</label>
                                    <select class="form-control inphead" name="storage_subtype_material" selected>
                                        <? foreach ($date['crop'] as $subtype){?>
                                            <option value="<?=$subtype['id_crop']?>"><?=$subtype['name_crop_ua']?></option>
                                        <?}?>
                                    </select>
                                </div>
                                <div class="col-lg-3 for_fert" style="display: none">
                                    <label>Підтип матеріалу</label>
                                    <select class="form-control inphead" name="storage_subtype_fert">
                                        <option value="1">Мінеральні</option>
                                        <option value="2">Органічні</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 for_ppa" style="display: none">
                                    <label>Підтип матеріалу</label>
                                    <select class="form-control inphead" name="storage_subtype_ppa">
                                        <option value="1">Протруйник</option>
                                        <option value="2">Гербіциди</option>
                                        <option value="3">Інсектициди</option>
                                        <option value="4">Фунгіциди</option>
                                        <option value="5">Регулятор росту рослин</option>
                                        <option value="6">Десиканти</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 for_fuel" style="display: none">
                                    <label>Підтип матеріалу</label>
                                    <select class="form-control inphead" name="storage_subtype_fuel">
                                        <option value="1">Бензин</option>
                                        <option value="2">ДП</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['118']?></label>
                                    <input list="lib_materials" class="form-control inphead" name="name_material" id="name_material" >
                                    <datalist id="lib_materials">
                                        <?foreach ($date['material_lib'] as $material_lib)if($material_lib['id_type_material']=='1'){?>
                                            <option><?=$material_lib['name_material']?></option>
                                        <?}?>
                                    </datalist>
                                </div>
                                <div class="col-lg-3 for_seeds">
                                    <label>Одиниці виміру</label>
                                    <select class="form-control inphead unit" name="storage_unit_seed">
                                        <option value="1">кг</option>
                                        <option value="2">п.од</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 for_fert unit_seed" style="display: none">
                                    <label>Одиниці виміру</label>
                                    <select class="form-control inphead unit" name="storage_unit_fert">
                                        <option value="1">кг</option>
                                        <option value="3">т</option>
                                        <option value="4">л</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 for_ppa unit" style="display: none">
                                    <label>Одиниці виміру</label>
                                    <select class="form-control inphead unit" name="storage_unit_ppa">
                                        <option value="1">кг</option>
                                        <option value="4">л</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 for_fuel" style="display: none">
                                    <label>Одиниці виміру</label>
                                    <select class="form-control inphead unit" name="storage_unit_fuel">
                                        <option value="1">кг</option>
                                        <option value="4">л</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['119']?></label>
                                    <input class="form-control storage_quantity inphead" type="text" name="storage_quantity" required>
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['132']?></label>
                                    <input class="form-control storage_sum_total inphead" type="text" name="storage_sum_total" required>
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['133']?></label>
                                    <input class="form-control storage_sum_unit inphead" type="text" name="storage_sum_unit" required>
                                </div>

                                <!--<div class="col-lg-3">
                                <label><?/*=$language['new-farmer']['112']*/?></label>
                                <input class="form-control inphead" name="storage_location" list="material_storage_location" required>
                                        <datalist id="material_storage_location">
                                            <?php /*foreach ($date['storage']['storage'] as $storage){*/?>
                                                <option ><?php /*echo $storage['storage_name'];*/?></option>
                                            <?php /*}*/?>
                                        </datalist>
                                </div>-->
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['114']?></label>
                                    <textarea name="storage_comments" class="form-control inphead"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                            <button type="submit" class="btn btn-primaryn"><?=$language['new-farmer']['109']?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="Add_pdoducts" class="modal fade">
            <div class="modal-dialog modal-lg">
                <form action="/new-farmer/incoming_products" method="post">
                    <div class="modal-content wt">
                        <div class="box-bodyn">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <span class="box-title">Картка Готова продукція надходження</span>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['111']?></label>
                                    <input class="form-control inphead" type="date" name="product_date">
                                </div>
                                <div class="col-lg-3">
                                    <label>Номер і назва поля</label>
                                    <select class="form-control inphead product_field" name="product_field" required>
                                        <? foreach ($date['field_management'] as $product){
                                            {?>
                                                <option value="<?=$product['id_field']?>"><?=$product['field_number']."_".$product['field_name']?></option>
                                            <?}?>
                                        <?}?>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label>Назва продукції</label>
                                    <select class="form-control inphead" id="product_type" name="product_name">
                                        <? foreach ($date['field_management'] as $product_name){?>
                                            <option class="prod_<?=$product_name['field_id_crop']?>" value="<?=$product_name['field_id_crop']?>"><?=$product_name['name_crop_ua']?></option>
                                        <?}?>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label>Одиниці виміру</label>
                                    <select class="form-control inphead unit" name="product_unit">
                                        <option value="1">кг</option>
                                        <option value="3">т</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['113']?></label>
                                    <input type="text" name="product_quantity" class="inphead incoming_quantity">
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['114']?></label>
                                    <textarea name="product_comments" class="form-control inphead"></textarea>
                                </div>
                                <input type="hidden" name="type_come" value="2">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                            <button type="submit" class="btn btn-primaryn"><?=$language['new-farmer']['109']?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!--<div id="Add_incoming" class="modal fade">
    <div class="modal-dialog modal-lg">
    <form action="/new-farmer/incoming_storage" method="post">
    <div class="modal-content wt">
        <div class="box-bodyn">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="box-title"><?/*=$language['new-farmer']['122']*/?></span>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-lg-3">
              <label><?/*=$language['new-farmer']['111']*/?></label>
              <input class="form-control inphead" type="date" name="incoming_date" id="incoming_date">
                <input type="hidden" name="type_come" value="2">
            </div>
            <div class="col-lg-3">
              <label><?/*=$language['new-farmer']['117']*/?></label>
              <select class="form-control inphead" name="incoming_type_material" id="incoming_type_material" required>
                <?/* foreach ($date['storage']['storage_type_material'] as $storage){*/?>
                      <option value="<?/*=$storage['storage_type_material']*/?>"><?/*=$id_material_type[$storage['storage_type_material']]*/?></option>
                <?/*}*/?>
              </select>
            </div>
            <div class="col-lg-3">
              <label><?/*=$language['new-farmer']['115']*/?></label>
              <input type="hidden" name="">
                <select name="incoming_material" class="form-control inphead" id="incoming_material">
                    <?php
        /*                    foreach ($date['storage']['storage_material_fact'] as $storage){*/?>
                        <option value="<?php /*echo $storage['storage_material_id'];*/?>"><?php /*echo $date['material_lib'][$storage['storage_material']]['name_material'];*/?></option>
                    <?php /*}*/?>
                </select>
            </div>
            <div class="col-lg-3">
              <label><?/*=$language['new-farmer']['113']*/?></label>
              <input type="text" name="incoming_quantity" id="incoming_quantity" class="inphead">
            </div>
            <div class="col-lg-3">
              <label><?/*=$language['new-farmer']['132']*/?></label>
              <input type="text" name="incoming_sum_total" id="incoming_sum_total" class="inphead">
            </div>
            <div class="col-lg-3">
              <label><?/*=$language['new-farmer']['133']*/?></label>
              <input type="text" name="incoming_price_unit" id="incoming_price_unit" class="inphead">
            </div>
            <div class="col-lg-3">
              <label><?/*=$language['new-farmer']['114']*/?></label>
              <textarea name="incoming_comments" class="form-control inphead"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?/*=$language['new-farmer']['26']*/?></button>
            <button type="submit" class="btn btn-primaryn"><?/*=$language['new-farmer']['109']*/?></button>
        </div>
    </div>
    </form>
  </div>
        </div>-->

        <div id="Sale" class="modal fade">
            <div class="modal-dialog modal-lg">
                <form action="/new-farmer/create_sales" method="post">
                    <div class="modal-content wt">
                        <div class="box-bodyn">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <span class="box-title">Картку вибуття матеріалу</span>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['111']?></label>
                                    <input class="form-control inphead" type="date" name="sale_date" required>
                                    <input type="hidden" name="type_out" value="1">
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['117']?></label>
                                    <select class="form-control  inphead type_material" name="sale_type_material"  id="sale_type_material" required>
                                        <? foreach($id_material_type as $key=>$value){?>
                                            <option value="<?=$key?>"><?=$value?></option>
                                        <?}?>
                                    </select>
                                </div>
                                <div class="col-lg-3 for_seeds">
                                    <label>Культура</label>
                                    <select class="form-control inphead" name="storage_subtype_material" selected>
                                        <? foreach ($date['crop'] as $subtype){?>
                                            <option value="<?=$subtype['id_crop']?>"><?=$subtype['name_crop_ua']?></option>
                                        <?}?>
                                    </select>
                                </div>
                                <div class="col-lg-3 for_fert" style="display: none">
                                    <label>Підтип матеріалу</label>
                                    <select class="form-control inphead" name="storage_subtype_fert">
                                        <option value="1">Мінеральні</option>
                                        <option value="2">Органічні</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 for_ppa" style="display: none">
                                    <label>Підтип матеріалу</label>
                                    <select class="form-control inphead" name="storage_subtype_ppa">
                                        <option value="1">Протруйник</option>
                                        <option value="2">Гербіциди</option>
                                        <option value="3">Інсектициди</option>
                                        <option value="4">Фунгіциди</option>
                                        <option value="5">Регулятор росту рослин</option>
                                        <option value="6">Десиканти</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 for_fuel" style="display: none">
                                    <label>Підтип матеріалу</label>
                                    <select class="form-control inphead" name="storage_subtype_fuel">
                                        <option value="1">Бензин</option>
                                        <option value="2">ДП</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['118']?></label>
                                    <select class="form-control inphead sale_material_name" name="sale_material_name">
                                        <option class="list_sale_material"></option>
                                        <? foreach($date['storage']['storage_material_fact'] as $sale_materials){?>
                                        <option class="list_sale_material sale_material_<?=$sale_materials['storage_type_material']?>"
                                                value="<?=$sale_materials['storage_material_id']?>">
                                                <?=$date['material_lib'][$sale_materials['storage_material']]['name_material']?>
                                        </option>
                                        <?}?>
                                    </select>
                                </div>
                                <div class="col-lg-3 for_seeds">
                                    <label>Одиниці виміру</label>
                                    <select class="form-control inphead unit" name="storage_unit_seed">
                                        <option value="1">кг</option>
                                        <option value="2">п.од</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 for_fert unit_seed" style="display: none">
                                    <label>Одиниці виміру</label>
                                    <select class="form-control inphead unit" name="storage_unit_fert">
                                        <option value="1">кг</option>
                                        <option value="3">т</option>
                                        <option value="4">л</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 for_ppa unit" style="display: none">
                                    <label>Одиниці виміру</label>
                                    <select class="form-control inphead unit" name="storage_unit_ppa">
                                        <option value="1">кг</option>
                                        <option value="4">л</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 for_fuel" style="display: none">
                                    <label>Одиниці виміру</label>
                                    <select class="form-control inphead unit" name="storage_unit_fuel">
                                        <option value="1">кг</option>
                                        <option value="4">л</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['119']?></label>
                                    <input class="form-control sale_quantity inphead" type="text" name="sale_quantity" required>
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['132']?></label>
                                    <input class="form-control sale_sum_total inphead" type="text" name="sale_sum_total" required>
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['133']?></label>
                                    <input class="form-control sale_sum_unit inphead" type="text" name="sale_sum_unit" required>
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['114']?></label>
                                    <textarea name="sale_comments" class="form-control inphead"></textarea>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                            <button type="submit" class="btn btn-primaryn"><?=$language['new-farmer']['109']?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="sale_products" class="modal fade">
            <div class="modal-dialog modal-lg">
                <form action="/new-farmer/create_actual_sale" method="post">
                    <div class="modal-content wt">
                        <div class="box-bodyn">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <span class="box-title">Картка реалізації готової продукції</span>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['111']?></label>
                                    <input class="form-control inphead" type="date" name="actual_sale_date">
                                </div>
                                <div class="col-lg-3">
                                    <label>Тип продукції</label>
                                    <select class="form-control inphead" name="actual_sale_product">
                                        <? foreach($date['products']['products'] as $actual_sale_products){?>
                                        <option value="<?=$actual_sale_products['product_type']?>">
                                            <?=$date['crop'][$actual_sale_products['product_type']]['name_crop_ua']?>
                                        </option>
                                        <?}?>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['113']?></label>
                                    <input type="text" name="actual_sale_quantity" class="inphead actual_sale_quantity">
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['133']?></label>
                                    <input type="text" name="actual_sale_per_unit" class="inphead actual_sale_per_unit">
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['132']?></label>
                                    <input type="text" name="actual_sale_sum" class="inphead actual_sale_sum">
                                </div>
                                <div class="col-lg-3">
                                    <label><?=$language['new-farmer']['114']?></label>
                                    <textarea name="actual_sale_comments" class="form-control inphead"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                            <button type="submit" class="btn btn-primaryn"><?=$language['new-farmer']['109']?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="сome_material" class="modal fade">
            <div class="modal-dialog modal-lg">
                    <div class="modal-content wt">
                        <div class="box-bodyn">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <span class="box-title">Розшифровка по надходженню <b class="name_come_material"></b></span>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Дата</th>
                                        <th>Кількість, кг</th>
                                        <th>Ціна за одиницю, грн</th>
                                        <th>Сума, грн</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <? foreach($date['incoming_material'] as $incoming_material)if($incoming_material['come_out_type']==2){?>
                                    <tr class="material_list open_material_<?=$incoming_material['come_out_material_id']?>">
                                        <td style="padding-left: 35px"><?=$incoming_material['come_out_date']?></td>
                                        <td><?=$incoming_material['come_out_quantity']?></td>
                                        <td><?=number_format($incoming_material['come_out_sum_total']/$incoming_material['come_out_quantity'],2,',',' ')?></td>
                                        <td><?=$incoming_material['come_out_sum_total']?></td>
                                    </tr>
                                <?}?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                        </div>
                    </div>
            </div>
        </div>
        <div id="out_material" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content wt">
                    <div class="box-bodyn">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <span class="box-title">Розшифровка по вибуттю <b class="name_out_material"></b></span>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Поле</th>
                                    <th>Найменування робіт</th>
                                    <th>Дата</th>
                                    <th>Кількість, кг</th>
                                    <th>Ціна за од., грн</th>
                                    <th>Сума, грн</th>
                                </tr>
                            </thead>
                            <tbody>
                                <? foreach($date['incoming_material'] as $incoming_material)if($incoming_material['come_out_type']==1 or $incoming_material['come_out_type']==3){?>
                                    <tr class="material_out_list out_<?=$incoming_material['come_out_type']?> open_material_<?=$incoming_material['come_out_material_id']?>">

                                        <td>
                                            <?='# '.$date['storage']['storage_field'][$date['storage']['storage_action'][$incoming_material['action_id']]['action_id_culture']]['field_number'].'_'.
                                            $date['crop'][$date['storage']['storage_field'][$date['storage']['storage_action'][$incoming_material['action_id']]['action_id_culture']]['field_id_crop']]['name_crop_ua']?>
                                        </td>
                                        <td style="width: 25%"><?=$date['action'][$date['storage']['storage_action'][$incoming_material['action_id']]['action_action_id']]['name_ua']?></td>
                                        <td style="width: 13%;"><?=$incoming_material['come_out_date']?></td>
                                        <td><?=$incoming_material['come_out_quantity']?></td>
                                        <td style="width: 10%;"><? if($incoming_material['come_out_type']==3){echo number_format($date['incoming_material']['mat_price'][$incoming_material['come_out_material_id']]['storage_sum_total'],2,',',' ');}else{echo number_format($incoming_material['come_out_sum_total']/$incoming_material['come_out_quantity'],2,',',' ');}?></td>
                                        <td><? if($incoming_material['come_out_type']==3){echo number_format($incoming_material['come_out_quantity']*$date['incoming_material']['mat_price'][$incoming_material['come_out_material_id']]['storage_sum_total'],2,',',' ');}else{echo $incoming_material['come_out_sum_total'];}?></td>
                                    </tr>
                                <?}?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                    </div>
                </div>
            </div>
        </div>

        <div id="come_products" class="modal fade">
            <div class="modal-dialog modal-md">
                <div class="modal-content wt">
                    <div class="box-bodyn">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <span class="box-title">Розшифровка по вибуттю матеріалу</span>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Кількість, кг</th>
                            </tr>
                            </thead>
                            <tbody>
                            <? foreach ($date['products']['income_prod'] as $income_prod){?>
                                <tr class="come_list come_products_<?=$income_prod['id_product']?>" >
                                    <td style="padding-left: 35px"><? echo "Date: ".$income_prod['income_date']?></td>
                                    <td><? echo "Quantity: ".$income_prod['income_product_quantity']?></td>
                                    <td></td>
                                </tr>
                            <?}?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                    </div>
                </div>
            </div>
        </div>

        <div id="out_products" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content wt">
                    <div class="box-bodyn">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <span class="box-title">Розшифровка по вибуттю матеріалу</span>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Кількість, кг</th>
                                <th>Ціна за одиницю, грн</th>
                                <th>Сума, грн</th>
                            </tr>
                            </thead>
                            <tbody>
                            <? foreach ($date['products']['actual_sale_1'] as $actual_sale_1){?>
                                <tr class="out_list sale_products_<?=$actual_sale_1['actual_sale_product']?>" style="color: red;" >
                                    <td style="padding-left: 35px"><? echo $actual_sale_1['actual_sale_date']?></td>
                                    <td><? echo $actual_sale_1['actual_sale_quantity']?></td>
                                    <td><? echo number_format($actual_sale_1['actual_sale_per_unit'], 2, ',', ' ');?></td>
                                    <td><? echo $actual_sale_1['actual_sale_sum']?></td>
                                    <td></td>
                                </tr>
                            <?}?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        var json_material_fact = '<?=json_encode($date['storage']['storage_material_fact'])?>';
        var json_type_material = '<?=json_encode($id_material_type)?>';
        var json_sub_ppa = '<?=json_encode($date['ppa']['ua'])?>';
        var json_sub_seed = '<?=json_encode($date['crop'])?>';
        var json_sub_fert = '<?=json_encode($date['fert']['ua'])?>';
        var json_sub_fuel = '<?=json_encode($date['fuel']['ua'])?>';
        var json_material_name = '<?=json_encode($date['material_lib'])?>';
        var type_material = JSON.parse(json_type_material);
        var material_fact = JSON.parse(json_material_fact);
        var sub_seed = JSON.parse(json_sub_seed);
        var sub_ppa = JSON.parse(json_sub_ppa);
        var sub_fert = JSON.parse(json_sub_fert);
        var sub_fuel = JSON.parse(json_sub_fuel);
        var material_name = JSON.parse(json_material_name);

        var payment = '<?=$_SESSION['payment_status'];?>';
        if(payment == 0){
            $('.payment_disabled').prop('disabled', true);
        }

        $('#date_start_cal').change(function () {
            var date_start_cal = $('#date_start_cal').val();
            var date_end_cal = $('#date_end_cal').val();

        });

        $('.unit, .storage_quantity, .storage_sum_total').change(function(){
            var unit = $(this).val();
            if(unit == 3){

            }
            var storage_quantity = parseFloat($('.storage_quantity').val());
            var storage_sum_total = parseFloat($('.storage_sum_total').val());
            var storage_sum_unit = (storage_sum_total/storage_quantity).toFixed(2);
            $('.storage_sum_unit').val(storage_sum_unit);
        });

        /*
        $('#incoming_quantity,#incoming_sum_total').change(function(){
            var incoming_quantity = parseFloat($('#incoming_quantity').val());
            var incoming_sum_total = parseFloat($('#incoming_sum_total').val());
            var incoming_price_unit = (incoming_sum_total/incoming_quantity).toFixed(2);
            $('#incoming_price_unit').val(incoming_price_unit);
        });
        */
        $('.sale_quantity, .sale_sum_total').change(function(){
            var sale_quantity = parseFloat($('.sale_quantity').val());
            var sale_sum_total = parseFloat($('.sale_sum_total').val());
            var sale_price_unit = (sale_sum_total/sale_quantity).toFixed(2);
            $('.sale_sum_unit').val(sale_price_unit);


        });
        /*
        $('.Sale').click(function(){
            var id = $(this).attr('data-id');
            var stock = $(this).attr('data-stock');
            $('#sale_id_material').val(id);
            $('#sale_stock').val(stock);
        });
        */
        $('.sale_prod').click(function(){
            var id = $(this).attr('data-id');
            $('#actual_sale_product').val(id);
        });

        $('.actual_sale_quantity, .actual_sale_per_unit').change(function(){
            var actual_sale_1 = parseFloat($('.actual_sale_quantity').val());
            var actual_sale_per = parseFloat($('.actual_sale_per_unit').val());
            var actual_sale = (actual_sale_per*actual_sale_1).toFixed(2);
            $('.actual_sale_sum').val(actual_sale);
        });

        $('.come_storage_material').click(function () {
            var id = $(this).attr('data-id');
            var material_type_name = type_material[material_fact[id]['storage_type_material']];
            if(material_fact[id]['storage_type_material'] ==1){
                var subt_type = sub_seed[material_fact[id]['storage_subtype_material']]['name_crop_ua'];
            }if(material_fact[id]['storage_type_material'] ==2){
                var subt_type = sub_fert[material_fact[id]['storage_subtype_material']];
            }if(material_fact[id]['storage_type_material'] ==3){
                var subt_type = sub_ppa[material_fact[id]['storage_subtype_material']];
            }if(material_fact[id]['storage_type_material'] ==4){
                var subt_type = sub_fuel[material_fact[id]['storage_subtype_material']];
            }
            var material_name_out = material_name[material_fact[id]['storage_material']]['name_material'];
            $('.name_come_material').text(material_type_name+'/'+subt_type+'/'+material_name_out);


            $('.material_list').hide();
            /*$('.close_material').css('display','none');*/
            $('.material_list').css('color','green');
            $('.open_material_'+id).show();
        });
        $('.out_storage_material').click(function () {
            var id = $(this).attr('data-id');
            var material_type_name = type_material[material_fact[id]['storage_type_material']];
            if(material_fact[id]['storage_type_material'] ==1){
                var subt_type = sub_seed[material_fact[id]['storage_subtype_material']]['name_crop_ua'];
            }if(material_fact[id]['storage_type_material'] ==2){
                var subt_type = sub_fert[material_fact[id]['storage_subtype_material']];
            }if(material_fact[id]['storage_type_material'] ==3){
                var subt_type = sub_ppa[material_fact[id]['storage_subtype_material']];
            }if(material_fact[id]['storage_type_material'] ==4){
                var subt_type = sub_fuel[material_fact[id]['storage_subtype_material']];
            }
            var material_name_out = material_name[material_fact[id]['storage_material']]['name_material'];
            $('.name_out_material').text(material_type_name+'/'+subt_type+'/'+material_name_out);
            $('.out_3').css('color','blue');
            $('.out_1').css('color','red');
            $('.material_out_list').hide();
            $('.open_material_'+id).show();
        });

        $('.out_sale_products').click(function () {
            var id = $(this).attr('data-id');
            $('.out_list').hide();
            $('.sale_products_'+id).show();
        });
        $('.come_products').click(function () {
            var id = $(this).attr('data-id');
            $('.come_list').hide();
            $('.come_products_'+id).show();
        });

        $('.type_material').change(function () {
            var type = $(this).val();
            if(type == 1){
                $('.for_seeds').css('display','block');
                $('.for_fert').css('display','none');
                $('.for_ppa').css('display','none');
                $('.for_fuel').css('display','none');
            }
            if(type == 2){
                $('.for_fert').css('display','block');
                $('.for_seeds').css('display','none');
                $('.for_ppa').css('display','none');
                $('.for_fuel').css('display','none');
            }
            if(type == 3){
                $('.for_ppa').css('display','block');
                $('.for_seeds').css('display','none');
                $('.for_fert').css('display','none');
                $('.for_fuel').css('display','none');
            }
            if(type == 4){
                $('.for_fuel').css('display','block');
                $('.for_seeds').css('display','none');
                $('.for_ppa').css('display','none');
                $('.for_fert').css('display','none');
            }
        });

        $('#sale_type_material').click(edit_crop_list_type);
        function edit_crop_list_type() {
            var id_type=$(this).val();
            $('.list_sale_material').hide();
            $('.sale_material_'+id_type).show();
        }

        $('.product_field').change(function () {
            var json_prod = '<?=json_encode($date['field_management'])?>';
            var prod = JSON.parse(json_prod);
            var product_id_field = $(this).val();
            $('.prod_'+prod[product_id_field]['field_id_crop']).attr('selected','selected');
        });
    });
</script>
