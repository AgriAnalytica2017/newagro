   <?
    $status_card = array(
        0=>'Не затверджено',
        1=>'Затверджено'
    );
?>

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

<? //var_dump($date['rent_pay']);die;?>
<div class="box-bodyn col-lg-12">
        <div class="non-semantic-protector col-sm-3">
           <?=$language['new-farmer']['42']?>
        </div>
        
        <div data-toggle="modal" data-target="#modal-default"  class="col-sm-3">
            <div class="col-sm-3 add-ico"> <a href="#modal-default"  data-toggle="modal"> <img src="/cabinet/new-farmer/template/img/add.svg" class="user-imagen add-ico" alt="User Image" style="    width: 35px; height: 35px;"></a></div>
            <a class=" add-ico non-semantic-protector col-sm-9" href="#modal-default"><?=$language['new-farmer']['52']?></a>
            </div>
            </div>
 
            
            <div class="box-bodyn col-lg-12">
        <div class="col-sm-3" style="font-size: 20px;">
                   
                        <?if($date['field']!=false){?>
                            <? if ($_COOKIE['lang']=='ua'){ echo $date['field']['only_tech'];}elseif($_COOKIE['lang']=='gb'){echo $date['only_tech']['name_crop_en'];}?>
                            <? echo '<b> Технологія: </b>'.$date['only_tech']['tech_name'].'<br>'?>
                                <? echo '<b>Площа: </b>'.$date['field']['field_size'].'га <br>'?>
                                <? echo '<b>Урожайність: </b>'.$date['field']['field_yield'].' ц/га <br>'?>
                           
                        <?}else{?>
                            <? if ($_COOKIE['lang']=='ua'){ echo $date['field']['only_tech'];}elseif($_COOKIE['lang']=='gb'){echo $date['only_tech']['name_crop_en'];}?>
                            <? echo '<b>Технологія:</b> '.$date['only_tech']['tech_name'].'<br>'?>
                                <? echo '<b>Площа: </b>'.$date['only_tech']['area'].' га '.'<br>'?>
                                <? echo '<b> Урожайність: </b>'.$date['only_tech']['yield'].' ц/га <br>'?>
                        <?}?>
        </div>
        <div class="col-lg-9">
            <a href="/new-farmer/field_management" class="btn btn-success" style="float: right"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        </div>
</div>

<div class="rown">
    <div class="box">
        <div class="box-body wt">
            <form id="form" method="post" action="/new-farmer/save_edit_technology_card">
                <input type="hidden" name="crop_id" value="<?php echo $date['id']?>" required>
                <input type="hidden" id="ex_employe" name="ex_employe">
                <input type="hidden" id="ex_material" name="ex_material">
                <input type="hidden" id="ex_vehicles" name="ex_vehicles">
                <input type="hidden" id="ex_services" name="ex_services">
                <input type="hidden" id="field_size" name="field_size" value="<?=$date['field']['field_size']?>">
                <div class="table-responsive">
                    <table class="table well ">
                        <thead id="thead_edit" class="">
                        <tr style="display: none" id="update_title">
                            <th colspan="8"><h4 class="text-center" ><?=$language['new-farmer']['79']?></h4></th>
                        </tr>
                        <tr>
                            <th><label for="id_action_type"><?=$language['new-farmer']['65']?></label></th>
                            <th><label for="action_id"><?=$language['new-farmer']['66']?></label></th>
                            <th><label for="unit"><?=$language['new-farmer']['72']?></label></th>
                            <th><label for="work"><?=$language['new-farmer']['154']?></label></th>
                            <th><label for="strat_data"><?=$language['new-farmer']['67']?></label></th>
                            <th><label for="end_data"><?=$language['new-farmer']['68']?></label></th>
                            <th><a class="btn btnn btn-success btn-block" href="#Choose_vehicles" data-toggle="modal"><?=$language['new-farmer']['78']?><b id="coll_vehicles"></b></a></th>
                            <th><a class="btn btnn btn-success btn-block" href="#Choose_employe" data-toggle="modal"><?=$language['new-farmer']['73']?><b id="coll_employe"></b></a></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <select class="form-control inphead list_id_action_type" name="list_id_action_type" id="id_action_type" selected>
                                    <?php foreach ($date['action'] as $action_type)if($action_type['type']=='1'){?>
                                        <option value="<?=$action_type['action_id']?>"><?php if($_COOKIE['lang']=='ua'){echo $action_type['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $action_type['name_en'];}?></option>
                                    <?php }?>
                                </select>
                            </td>
                            <td>
                                <input list="list_action_id" name="action_id" id="action_id"  class="form-control inphead" autocomplete="off" required>
                                <datalist id="list_action_id">
                                    <?php foreach ($date['action'] as $crop)if($crop['type']==2){?>
                                        <option class="type_op type_operation_<?=$crop['subtype']?>"><?php if($_COOKIE['lang']=='ua'){echo $crop['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $crop['name_en'];}?></option>
                                    <?php }?>
                                </datalist>
                            </td>
                            <td>
                                <select class="form-control inphead" name="id_action_unit" id="id_action_unit" required>
                                    <?php foreach ($date['units'][$_COOKIE['lang']] as $action_type_id=>$action_type){?>
                                        <option value="<?php echo $action_type_id?>"><?php echo $action_type?></option>
                                    <?php }?>
                                </select>
                            </td>
                            <td>
                                <input type="text" id="work" name="work" class="form-control inphead" value="<?if($date['field'] == false){echo $date['only_tech']['area'];}else{echo $date['field']['field_size'];}?>" required>
                            </td>
                            <td>
                                <input type="date" class="form-control inphead" id="strat_data" name="strat_data" required>
                            </td>
                            <td>
                                <input type="date" class="form-control inphead" id="end_data" name="end_data" required>
                            </td>
                            <td><a class="btn btnn btn-success btn-block" href="#Choose_material" data-toggle="modal"><?=$language['new-farmer']['74']?><b id="coll_material"></b></a></td>
                            <td><a class="btn btnn btn-success btn-block" href="#Choose_services" data-toggle="modal"><?=$language['new-farmer']['152']?><b id="coll_services"></b></a></td>
                        </tr>
                        <tr id="save_actions">
                            <td colspan="8">
                                <button type="submit" class="btn btn-success Save"><?=$language['new-farmer']['77']?></button>
                            </td>
                        </tr>
                        <tr id="update_actions" style="display: none">
                            <input name="action_action_id" id="action_action_id" type="hidden">
                            <td colspan="8">
                                <button type="submit" class="btn btn-info Save"><?=$language['new-farmer']['75']?></button>
                                <a href="/new-farmer/edit_technology_card/<?php echo $date['id']?>" class="btn btn-warning"><?=$language['new-farmer']['76']?></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <div class="box-body wt">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr class="tabletop">
                    <th><?=$language['new-farmer']['65']?></th>
                    <th><?=$language['new-farmer']['66']?></th>
                    <th><?=$language['new-farmer']['154']?></th>
                    <th><?=$language['new-farmer']['67']?></th>
                    <th><?=$language['new-farmer']['68']?></th>
                    <th><?=$language['new-farmer']['81']?></th>
                    <th>Оплата праці грн/га</th>
                    <th>Матеріал<br>Норма на 1 га</th>
                    <th><?=$language['new-farmer']['152']?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($date['TC']['new_action'] as $action){?>
                    <tr>
                        <td style="width: 10%"><? if($_COOKIE['lang']=='ua')
                            {echo $date['lib'][$action['action_action_type_id']]['name_ua'];}
                            elseif($_COOKIE['lang']=='gb'){echo $date['lib'][$action['action_action_type_id']]['name_en'];}?></td>
                        <td><?=$date['lib'][$action['action_action_id']]['name_ua']?></td>
                        <td><?=number_format($action['action_work']).' '.$date['units']['ua'][$action['action_unit']]?></td>
                        <td><?=$action['action_date_start']?></td>
                        <td><?=$action['action_date_end']?></td>
                        <td>
                            <?
                            if(unserialize($action['action_machines'])!=false)
                                foreach(unserialize($action['action_machines']) as $action_machines){
                                    echo $date['TC']['vehicles'][$action_machines['id_veh']]['vehicles_name'];
                                    $equipments[$action['action_id']]=explode(',',$action_machines['id_equ']);
                                    $list_equipment="";
                                    foreach ($equipments[$action['action_id']] as $key){
                                        $list_equipment .= $date['TC']['equipment'][$key]['equipment_name'].', ';
                                    }
                                    echo $list_equipment=' + '.substr($list_equipment, 0, -2).', Пальне:'.$action_machines['fuel'].'л/га <br>';
                                }?>
                        </td>
                        <td>
                            <?
                            $new_employee=false;
                            $sum_pay =0;
                            if(unserialize($action['action_employee'])!=false)
                                foreach(unserialize($action['action_employee']) as $action_employee) {
                                    $new_employee[$action_employee['pay']]++;
                                }
                            if($new_employee!=false)foreach ($new_employee as $new_employee_pay=>$new_employee_arr){
                                $sum_pay +=$new_employee_arr*$new_employee_pay;
                            }?>
                            <?=$sum_pay?>
                        </td>
                        <td>
                            <?
                            if(unserialize($action['action_materials'])!=false) foreach(unserialize($action['action_materials']) as $action_materials){?>
                                <?=$date['TC']['new_material'][$action_materials['id']]['name_material']?>
                                (<?echo $action_materials['norm'].' '.$units[$date['TC']['new_material'][$action_materials['id']]['material_unit']]?>)
                                <br>
                            <?}?>
                        </td>
                        <td>
                            <? if($action['action_services']!=false) foreach(unserialize($action['action_services']) as $action_service){
                                echo $action_service['name'].' ('.$action_service['amount'].') '.$action_service['price'].'<br>';
                            }?>
                        </td>
                        <td><a data-services='<?=json_encode(unserialize($action['action_services']))?>'
                               data-action='<?=json_encode($action)?>'
                               data-employee='<?=json_encode(unserialize($action['action_employee']))?>'
                               data-material='<?=json_encode(unserialize($action['action_materials']))?>'
                               data-equipment='<?=json_encode(unserialize($action['action_machines']))?>'
                               class="btn btn-warning edit_action"><span class="glyphicon glyphicon-pencil"></span></a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="/new-farmer/remove_operation/<?=$action['action_id']?>">
                                <span class="glyphicon glyphicon-remove"></span></a>
                            <a class="btn btn-primary add_prod_<?=$action['action_action_type_id']?>"
                               style="display: none;" href="#add_prod" data-toggle="modal"><?=$language['new-farmer']['82']?></a>
                        </td>
                    </tr>
                <?} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
                 
                  
                  
                  <div class="modal fade in" id="modal-default" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="modal-header box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?=$language['new-farmer']['56']?></h4>
            </div>
            <form action="/new-farmer/create_new_field" method="post">
            <div class="modal-body">
                    <div class="row bo">
                        <div class="col-lg-3">
                            <label for="name_field"><?=$language['new-farmer']['44']?></label>
                            <input class="form-control inphead" type="text" name="field_number" required>
                        </div>
                        <div class="col-lg-3">
                            <label for="area_field"><?=$language['new-farmer']['45']?></label>
                            <input class="form-control inphead" type="text" name="field_name" required>
                        </div>
                        <div class="col-lg-3">
                            <label>Тип с/г угідь</label>
                            <select class="form-control inphead" name="field_usage">
                                <?if($_COOKIE['lang']=='ua'){?>
                                    <?php foreach ($date['usage']['ua'] as $usage_id=>$usage_val){?>
                                        <option value="<?=$usage_id?>"><?=$usage_val?></option>
                                    <?}}?>
                                <?if($_COOKIE['lang']=='gb'){?>
                                    <?php foreach ($date['usage']['gb'] as $usage_id=>$usage_val){?>
                                        <option value="<?=$usage_id?>"><?=$usage_val?></option>
                                    <?}}?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="area_field"><?=$language['new-farmer']['46']?></label>
                            <input class="form-control inphead" type="text" name="field_area" required>
                        </div>
                    </div>
                    <div class="row">
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
                        <div class="col-lg-4">
                            <label for="rent_field"><?=$language['new-farmer']['43']?></label>
                            <input class="form-control inphead" type="text" name="field_rent" required>
                        </div>
                    </div>
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                    <button type="submit" class="btn btn-primary save_Field" ><?=$language['new-farmer']['27']?></button>
                </div>
            </form>
        </div>
        <!-- /.modal-content wt -->
    </div>
    <!-- /.modal-dialog -->
</div>
                   
                   
                   