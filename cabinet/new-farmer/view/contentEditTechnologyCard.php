<?
$units = array(
    1=>'кг',
    2=>'л',
    3=>'м³',
    4=>'п.о'
);
/* echo "<pre>";
 var_dump($date['only_tech']);die;*/
?>
<head>
    <style>
        .searchs{
            height: 35px;
            width: 300px;
            border-radius:3px;
        }
    </style>
</head>
<div class="box-bodyn">
    <div class="non-semantic-protector">
        <h1 class="ribbon">
            <strong class="ribbon-content">Технологія на вирощування <?=mb_strtolower($date['only_tech']['name_for_tech_head'],'UTF-8');?></strong>
        </h1>
    </div>
</div>
<div class="box-bodyn">
    <div class="row">
        <div class="col-lg-3">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="font-size: 20px;">
                        <?if($date['field']!=false){?>
                            <td><? if ($_COOKIE['lang']=='ua'){ echo $date['field']['only_tech'];}elseif($_COOKIE['lang']=='gb'){echo $date['only_tech']['name_crop_en'];}?></td>
                            <td><? echo '<b> Технологія: </b>'.$date['only_tech']['tech_name'].'<br>'?>
                                <? echo '<b>Площа: </b>'.$date['field']['field_size'].'га <br>'?>
                                <? echo '<b>Урожайність: </b>'.$date['field']['field_yield'].' ц/га <br>'?>
                            </td>
                        <?}else{?>
                            <td><? if ($_COOKIE['lang']=='ua'){ echo $date['field']['only_tech'];}elseif($_COOKIE['lang']=='gb'){echo $date['only_tech']['name_crop_en'];}?></td>
                            <td><? echo '<b>Технологія:</b> '.$date['only_tech']['tech_name'].'<br>'?>
                                <? echo '<b>Площа: </b>'.$date['only_tech']['area'].' га '.'<br>'?>
                                <? echo '<b> Урожайність: </b>'.$date['only_tech']['yield'].' ц/га <br>'?></td>
                        <?}?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-9">
            <a href="/new-farmer/field_management" class="btn btn-success" style="float: right"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        </div>
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
                    <th></th>
                    <th></th>
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
<!------------employee-------------------->
<div id="Choose_employe" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title">Картка вибору працівників</span>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 10px;">
                        <button id="save_employe" type="submit" class="btn btn-primary" style="float: right"><?=$language['new-farmer']['27']?></button>
                    </div>
                    <div class="col-lg-6">
                        <table class="table">
                            <thead>
                            <tr class="tabletop">
                                <th><?=$language['new-farmer']['37']?></th>
                                <th><?=$language['new-farmer']['38']?></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <? foreach ($date['TC']['new_employee'] as $employe){?>
                                <tr>
                                    <td><?=$employe['employee_name'] ?></td>
                                    <td><?=$employe['employee_surname'] ?></td>
                                    <td><a data-data=<?=json_encode($employe); ?> class="btn btn-success btn-sm add_employee"><i class="fa fa-fw fa-arrow-right"></i>
                                        </a></td>
                                </tr>
                            <?}?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table">
                            <thead>
                            <tr class="tabletop">
                                <th><?=$language['new-farmer']['37']?></th>
                                <th><?=$language['new-farmer']['38']?></th>
                                <th><?=$language['new-farmer']['83']?></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="action_employe">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
            </div>
        </div>
    </div>
</div>
<!---------------Choose_vehicles----------------->
<div id="Choose_vehicles" class="modal fade">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title">Картка вибору с/г техніки</span>
            </div>
            <div class="modal-body">

                <div class="row">

                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                            <tr class="tabletop">
                                <th><?=$language['new-farmer']['3']?></th>
                                <th><?=$language['new-farmer']['2']?></th>
                                <th><?=$language['new-farmer']['155']?></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="action_vehicles">

                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="#choose_sg" data-toggle="modal">+</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="save_vehicles" type="submit" class="btn btn-primary"><?=$language['new-farmer']['27']?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
            </div>
        </div>
    </div>
</div>

<!---->

<div id="choose_sg" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title"><?=$language['new-farmer']['84']?></span>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <input class="searchs" id="search_vehicles" type="text" placeholder="Поиск" style="float: left">
                        <button type="button" class="btn btn-primary" style="float: right" data-dismiss="modal"><?=$language['new-farmer']['27']?></button>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table tavle1">
                            <thead>
                            <tr class="tabletop">
                                <th><?=$language['new-farmer']['17']?></th>
                                <th><?=$language['new-farmer']['34']?></th>
                                <th>Вантажопідйомність, т</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($date['TC']['vehicles'] as $vehicles){?>
                                <tr class="123">
                                    <td><?=$vehicles['vehicles_name']?></td>
                                    <td><?=$vehicles['vehicles_power']?></td>
                                    <td style="width:20%;"><? if($vehicles['vehicles_load_capacity']!=0){echo $vehicles['vehicles_load_capacity'];}else{echo "";}?></td>
                                    <td><a data-data='<?=json_encode($vehicles); ?>' data-dismiss="modal" class="btn btn-success btn-sm add_vehicles"><i class="fa fa-fw fa-arrow-right"></i>
                                        </a></td>
                                </tr>
                            <? }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
            </div>
        </div>
    </div>
</div>

<!---------------Choose_Equipment----------------->

<div id="Choose_equipment" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title"><?=$language['new-farmer']['84']?></span>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <input class="searchs" id="search_equipment" type="text" placeholder="Поиск" style="float: left">
                        <button type="button" class="btn btn-primary" style="float: right" data-dismiss="modal"><?=$language['new-farmer']['27']?></button>
                    </div>
                </div><br>
                <input type="hidden" id="vehicles_id_equipment">
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table tavle2">
                            <thead>
                            <tr>
                                <th><?=$language['new-farmer']['86']?></th>
                                <th><?=$language['new-farmer']['85']?></th>
                                <th><?=$language['new-farmer']['24']?></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($date['TC']['equipment'] as $equipment){?>
                                <tr>
                                    <td><?=$date['equipment_type']['ua'][$equipment['equipment_type']]?></td>
                                    <td><?=$equipment['equipment_name']?></td>
                                    <td><? if($equipment['equipment_type']=='9'){echo $equipment['equipment_capacity'].' '.$date['equipment_unit'][$equipment['equipment_unit']];} else{echo $equipment['equipment_width'].'m';}?></td>
                                    <td><a data-data='<?=json_encode($equipment); ?>' class="btn btn-success btn-sm add_equipment"><i class="fa fa-fw fa-arrow-right"></i>
                                        </a></td>
                                </tr>
                            <?}?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table">
                            <thead>
                            <tr>
                                <th><?=$language['new-farmer']['17']?></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="list_equipment">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
            </div>
        </div>
    </div>
</div>

<!-----------------Choose_material--------------->

<div id="Choose_material" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title"><?=$language['new-farmer']['87']?></span>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-6">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#bd_materials" data-toggle="tab"><?=$language['new-farmer']['88']?></a></li>
                            <li><a href="#new_materials" data-toggle="tab"><?=$language['new-farmer']['89']?></a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="bd_materials">

                                <select class="form-control"  id="type_material_list_bd">
                                    <option value="1"><?=$language['new-farmer']['90']?></option>
                                    <option value="2"><?=$language['new-farmer']['91']?></option>
                                    <option value="3"><?=$language['new-farmer']['92']?></option>
                                </select>
                                <br>
                                <table class="table">
                                    <thead>
                                    <tr class="tabletop">
                                        <th><?=$language['new-farmer']['93']?></th>
                                        <!-- <th><?=$language['new-farmer']['95']?></th> -->
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($date['TC']['new_material'] as $new_material){?>
                                        <tr class="list_materials type_matrial_<?=$new_material['id_type_material']?><?if($new_material['id_type_material']==1){echo "_".$new_material['key_material'];}?>">
                                            <td><?=$new_material['name_material']?></td>
                                            <!-- <td><?=$new_material['price_material']?></td> -->
                                            <td><a data-data='<?=json_encode($new_material); ?>' class="btn btn-success btn-sm add_material"><i class="fa fa-fw fa-arrow-right"></i>
                                                </a></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="new_materials">
                                <form method="post" id="material_form" action="javascript:void(null);">
                                    <label><?=$language['new-farmer']['96']?></label>
                                    <select class="form-control id_type_material" name="id_type_material">
                                        <option value="1"><?=$language['new-farmer']['90']?></option>
                                        <option value="2"><?=$language['new-farmer']['91']?></option>
                                        <option value="3"><?=$language['new-farmer']['92']?></option>
                                    </select>
                                    <br>
                                    <input type="hidden" name="key_material_1" value="<?=$date['field']['field_id_crop']?>">
                                    <div class="sub_type_seed">
                                        <label><?=$language['new-farmer']['97']?></label>
                                        <input class="form-control" value="<?=$date['only_tech']['name_crop_ua']?>" disabled>
                                    </div>
                                    <div class="sub_type_ppa" style="display: none">
                                        <label><?=$language['new-farmer']['97']?></label>
                                        <select class="form-control" name="key_material_3" id="key_material_3">
                                            <option value="1"><?=$language['new-farmer']['102']?></option>
                                            <option value="2"><?=$language['new-farmer']['98']?></option>
                                            <option value="3"><?=$language['new-farmer']['100']?></option>
                                            <option value="4"><?=$language['new-farmer']['99']?></option>
                                            <option value="5">Регулятор росту рослин</option>
                                            <option value="6"><?=$language['new-farmer']['103']?></option>
                                            <option value="7"><?=$language['new-farmer']['101']?></option>
                                            <option value="8"><?=$language['new-farmer']['104']?></option>
                                        </select>
                                    </div>
                                    <div class="sub_type_fert" style="display: none">
                                        <label><?=$language['new-farmer']['97']?></label>
                                        <select class="form-control" name="key_material_2" id="key_material_2">
                                            <option value="1">Мінеральні</option>
                                            <option value="2">Органічні</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <label><?=$language['new-farmer']['105']?></label>
                                            <input list="lib_materials" class="form-control" name="name_material" id="name_material" >
                                            <datalist id="lib_materials">
                                                <?foreach ($date['material_lib'] as $material_lib){?>
                                                    <option><?=$material_lib['name_material']?></option>
                                                <?}?>
                                            </datalist>
                                        </div>
                                        <div class="col-lg-5">
                                            <label><?=$language['new-farmer']['106']?></label>
                                            <select name="unit_material" id="unit_material"  class="form-control unit_material">
                                                <option value="1">kg</option>
                                                <option value="2">l</option>
                                                <option value="3">м³</option>
                                                <option value="4">п.о</option>
                                            </select>
                                        </div>
                                        <!--<div class="col-lg-6">
                                            <label><?/*=$language['new-farmer']['107']*/?></label>
                                            <input type="text" name="price_material" id="price_material" class="form-control">
                                        </div>-->
                                        <div class="col-lg-6">
                                            <label class="units">Норма на 1 га </label>
                                            <input type="text" name="norm_material" id="norm_material" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success btn-block" id="add_material_bd"><?=$language['new-farmer']['109']?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <table class="table">
                            <thead class="tabletop">
                            <th><?=$language['new-farmer']['93']?></th>
                            <th><?=$language['new-farmer']['72']?></th>
                            <th>Норма на од. роботи</th>
                            <th></th>
                            </thead>
                            <tbody  id="action_material">

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                <button id="save_material" type="submit" class="btn btn-primary"><?=$language['new-farmer']['27']?></button>
            </div>
        </div>
    </div>
</div>

<!---------services----------->

<div id="Choose_services" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title">Картка Послуги</span>
            </div>
            <div class="modal-header">
                <div class="col-lg-12">
                    <button id="add_services" class="btn btn-success">Додати послугу</button>
                    <button id="save_services" type="submit" class="btn btn-primary"><?=$language['new-farmer']['27']?></button>
                </div>
            </div>
            <div class="modal-body">
                <table class="table" >
                    <thead>
                    <tr>
                        <th>Назва послуги</th>
                        <th>Обсяг роботи</th>
                        <th>Оплата за од. роботи, грн</th>
                        <th>Загальна сума, грн</th>
                    </tr>
                    </thead>
                    <tbody id="action_services">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
            </div>
        </div>
    </div>
</div>

<div id="add_prod" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form action="/new-farmer/incoming_products" method="post">
            <div class="modal-content wt">
                <div class="box-bodyn">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <span class="box-title"><?=$language['new-farmer']['110']?></span>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <label><?=$language['new-farmer']['111']?></label>
                            <input class="form-control inphead" type="date" name="product_date">
                        </div>
                        <div class="col-lg-3">
                            <label><?=$language['new-farmer']['112']?></label>
                            <input class="form-control inphead" name="product_storage_location" list="material_storage_location" required>
                            <datalist id="material_storage_location">
                                <?php
                                foreach ($date['storage']['storage'] as $storage){?>
                                    <option ><?php echo $storage['storage_name'];?></option>
                                <?php }?>
                            </datalist>
                        </div>
                        <div class="col-lg-3">
                            <label><?=$language['new-farmer']['113']?></label>
                            <input type="text" name="product_quantity" class="inphead incoming_quantity">
                        </div>
                        <div class="col-lg-3">
                            <label><?=$language['new-farmer']['114']?></label>
                            <textarea name="product_comments" class="form-control inphead"></textarea>
                            <input type="hidden" name="product_type" value="<?=$date['field']['field_id_crop']?>">
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
<!--<div id="select_fuel" style="display:none;">
    <select class="form-control id_fuel">
        <?php /*foreach ($date['TC']['new_material'] as $new_material)if($new_material['id_type_material']==4){*/?>
            <option value="<?/*=$new_material['id_material_price']*/?>"><?/*=$new_material['name_material']*/?></option>
        <?php /*}*/?>
    </select>
</div>-->
<script type="text/javascript">
    $(document).ready(function(){
        var json_vehicles_bd_name='<?=json_encode($date['TC']['vehicles'])?>';
        var vehicles_bd_name=JSON.parse( json_vehicles_bd_name );
        var json_equipment_bd_name='<?=json_encode($date['TC']['equipment'])?>';
        var equipment_bd_name=JSON.parse( json_equipment_bd_name );
        var json_material='<?=json_encode($date['TC']['new_material'])?>';
        var material_bd=JSON.parse( json_material );
        var json_employe='<?=json_encode($date['TC']['new_employee'])?>';
        var employe_bd=JSON.parse( json_employe );
        var json_action_lib='<?=json_encode($date['lib'])?>';
        var action_lib = JSON.parse(json_action_lib);
        var json_units = '<?=json_encode($date['units']['ua'])?>';
        var units = JSON.parse(json_units);
        var json_unit_material = '<?=json_encode($date['unit_material']['ua'])?>';
        var unit_material = JSON.parse(json_unit_material);
        var html_fuel_select=$('#select_fuel').html();


        $('#end_data').change(function () {
            var start_date = $('#strat_data').val();
            var end_date = $('#end_data').val();
            if(end_date<start_date){
                alert('Дата закінчення операції не може бути швидше за дату початку');
                $('#end_data').val('');
            }
        });
        var json_sub_type_seed = '<?=$date['only_tech']['id_crop']?>';
        var subtype_seed = JSON.parse(json_sub_type_seed);
        $('.list_materials').hide();
        $('.type_matrial_1_'+subtype_seed).show();
        $("#type_material_list_bd").change(function () {
            $('.list_materials').hide();
            var type=$(this).val();
            if(type==1){
                $('.type_matrial_'+type+'_'+subtype_seed).show();
            }else {
                $('.type_matrial_'+type).show();
            }
        });
        ////////////////////////////SERVICES///////////////////////////////////
        var id_services=0;
        $('#add_services').click(add_services);
        function add_services() {
            var total_work=$('#work').val();
            id_services++;
            $('#action_services').append("<tr class='action_services' id='action_services_"+id_services+"'>" +
                "<td><input  class='name form-control ' type='text'></td>" +
                "<td><input data-id='"+id_services+"' id='s_amount"+id_services+"' class='amount form-control in_services' type='text' value='"+total_work+"'></td>" +
                "<td><input data-id='"+id_services+"' id='s_price"+id_services+"' class='price form-control in_services' type='text'></td>" +
                "<td id='s_total"+id_services+"'></td>" +
                "<td><button class='btn btn-danger btn-sm remove_services' data-id='"+id_services+"' ><i class='fa fa-fw fa-close'></i></button></td>" +
                "</tr>");
        }
        $('#action_services').on('change', '.in_services', function () {
            var id=$(this).attr('data-id');
            var unit = $('#id_action_unit').val();
            var amount=parseFloat($('#s_amount'+id).val());
            var price=parseFloat($('#s_price'+id).val());
            $('#s_total'+id).text(amount*price)
        });
        $('#action_services').on('click','.remove_services', remove_services);
        $('#save_services').click(save_services);
        function remove_services() {
            var id = $(this).attr('data-id');
            $('#action_services_'+id).remove();
        }
        function save_services() {
            jsonObj = [];
            var coll=0;
            $(".action_services").each(function() {
                coll++;
                item = {};
                item ["name"] = $(this).find('.name').val();
                item ["amount"] = $(this).find('.amount').val();
                item ["price"] = $(this).find('.price').val();
                jsonObj.push(item);
            });
            $('#ex_services').val(JSON.stringify(jsonObj));
            $('#coll_services').text("("+coll+")");
            $('#Choose_services').modal("hide");
        }
        ///////////////////////////EMPLOYEE////////////////////////////////////
        var id_employee=0;
        $('.add_employee').click(add_employee);
        function add_employee() {
            id_employee++;
            var json_employee=$(this).attr('data-data');
            var employee=JSON.parse( json_employee );
            $("#action_employe").append("<tr id='action_employee_"+id_employee+"'><td>"+employee['employee_name']+"</td><td>"+employee['employee_surname']+"</td>" +
                "<td><input type='text' data-id='"+employee['id_employee']+"' class='form-control pay_employee  inphead'></td>" +
                "<td><button class='btn btn-danger btn-sm remove_employee' data-id='"+id_employee+"' ><i class='fa fa-fw fa-close'></i></button></td>" +
                "</tr>");
        }
        $('#action_employe').on('click', '.remove_employee', remove_employee);
        function remove_employee() {
            var id=$(this).attr('data-id');
            $('#action_employee_'+id).remove();
        }
        $('#save_employe').click(save_employe);
        function save_employe() {
            jsonObj = [];
            var coll=0;
            $(".pay_employee").each(function() {
                coll++;
                item = {};
                item ["id"] = $(this).attr('data-id');
                item ["pay"] = $(this).val();
                jsonObj.push(item);
            });
            $('#ex_employe').val(JSON.stringify(jsonObj));
            $('#coll_employe').text("("+coll+")");
            $('#Choose_employe').modal("hide");
        }
        ///////////////////////////MATERIAL/////////////////////////////////////
        var id_material=0;
        $('.add_material').click(add_material);
        function add_material() {
            id_material++;
            var json_material=$(this).attr('data-data');
            var material=JSON.parse( json_material );
            $("#action_material").append("<tr id='action_material_" + id_material + "'>" +
                "<td>" + material['name_material'] + "</td>" +
                "<td>" + unit_material[material['material_unit']] + "</td>" +
                "<td><input data-id='"+material['id_material_price']+"' type='text' class='form-control norm_material' ></td>" +
                "<td><button class='btn btn-danger btn-sm remove_material' data-id='" + id_material + "' ><i class='fa fa-fw fa-close'></i></button></td>" +
                "</tr>");

        }
        $('#action_material').on('click', '.remove_material', remove_material);
        function remove_material() {
            var id=$(this).attr('data-id');
            $('#action_material_'+id).remove();
        }
        $('#save_material').click(save_material);
        function save_material() {
            jsonObj = [];
            var coll=0;
            $(".norm_material").each(function() {
                coll++;
                item = {};
                item ["id"] = $(this).attr('data-id');
                item ["norm"] = $(this).val();
                jsonObj.push(item);
            });
            $('#ex_material').val(JSON.stringify(jsonObj));
            $('#coll_material').text("("+coll+")");
            $('#Choose_material').modal("hide");
        }
        //Добавление материала
        $("#material_form").submit(add_material_bd);
        function add_material_bd(){
            id_material++;
            var form = $('#material_form').serialize();
            var material_name=$('#name_material').val();
           /* var price=$('#price_material').val();*/
            var norm=$('#norm_material').val();
            var unit=$('#unit_material').val();


            $('#name_material').val('');
            /*$('#price_material').val('');*/
            $('#id_type_material').val('');
            $('#key_material_3').val('');
            $('#unit_material').val('');
            $('#norm_material').val('');

            $.ajax({
                type: 'POST',
                url: '/new-farmer/create_material',
                data: form,
                response : 'text',
                success: function(id_bd_material){
                    $("#action_material").append("<tr id='action_material_" + id_material + "'>" +
                        "<td>" + material_name + "</td>" +
                        "<td>" + unit_material[unit] + "</td>" +
                        "<td><input data-id='"+id_bd_material+"' type='text' class='form-control norm_material' value='"+norm+"' ></td>" +
                        "<td><button class='btn btn-danger btn-sm remove_material' data-id='" + id_material + "' ><i class='fa fa-fw fa-close'></i></button></td>" +
                        "</tr>");
                }
            });
        }
        ///////////////////////////VEHICLES//////////////////////////////////////
        var id_vehicles=0;
        $('.add_vehicles').click(add_vehicles);
        function add_vehicles() {
            id_vehicles++;
            var json_vehicles=$(this).attr('data-data');
            var vehicles=JSON.parse( json_vehicles );
            $("#action_vehicles").append("<tr class='equipment_id' id='action_vehicles_"+id_vehicles+"'>" +
                "<td>"+vehicles['vehicles_name']+"</td>" +
                "<td >" +
                "<div class='btn-group'>" +
                "<div id='vehicles_id_eq_"+id_vehicles+"'  data-id-vehicles='"+vehicles['id_vehicles']+"' data-id-equipment='[]'  class='ex_equ' style='max-width: 70px' disabled='disabled'></div>" +
                "<button data-id='"+id_vehicles+"' type='button' class='btn btn-primary open_equipment'>+</button>" +
                "</div>" +
                "</td>" +
                "<td><input type='text'  class='form-control fuel'></td>" +
                "<td><button class='btn btn-danger btn-sm remove_vehicles' data-id='"+id_vehicles+"' ><i class='fa fa-fw fa-close'></i></button></td>" +
                "</tr>");
        }
        $('#action_vehicles').on('click', '.remove_vehicles', remove_vehicles);
        function remove_vehicles() {
            var id=$(this).attr('data-id');
            $('#action_vehicles_'+id).remove();
        }
        $('#save_vehicles').click(save_vehicles);
        function save_vehicles() {
            jsonObj = [];
            var coll=0;
            $(".equipment_id").each(function() {
                coll++;
                item = {};
                item ["id_vehicles"] = $(this).find('.ex_equ').attr('data-id-vehicles');
                item ["id_equipment"] = JSON.parse($(this).find('.ex_equ').attr('data-id-equipment'));
                item ["fuel"]=$(this).find('.fuel').val();
                jsonObj.push(item);
            });
            $('#ex_vehicles').val(JSON.stringify(jsonObj));
            $('#coll_vehicles').text("("+coll+")");
            $('#Choose_vehicles').modal("hide");
        }

        ////////////////////////////////equipment////////////////////////////////////////////
        var id_equipment=0;
        $('#action_vehicles').on('click', '.open_equipment', open_equipment);
        function open_equipment() {
            $('#Choose_equipment').modal('show');
            var id=$(this).attr('data-id');
            $('#vehicles_id_equipment').val(id);
            $("#list_equipment").html(' ');
            var json_equipment=$('#vehicles_id_eq_'+id).attr('data-id-equipment');
            var equipment=JSON.parse(json_equipment);
            if(isNaN(equipment)){
                $.each(equipment, function(key, value) {
                    id_equipment++;
                    $("#list_equipment").append("<tr id='action_equipment_"+id_equipment+"'>" +
                        "<td>"+equipment_bd_name[value['id']]['equipment_name']+"</td>" +
                        "<td><button class='btn btn-danger btn-sm remove_equipment equipment_lists' data-name='"+equipment_bd_name[value['id']]['equipment_name']+"' data-idr='"+id_equipment+"' data-id='"+value['id']+"'><i class='fa fa-fw fa-close'></i></button></td>" +
                        "</tr>");
                });
            }
        }
        $('.add_equipment').click(add_equipment);
        function add_equipment(){
            id_equipment++;
            var json_equipment=$(this).attr('data-data');
            var equipment=JSON.parse( json_equipment );
            $("#list_equipment").append("<tr id='action_equipment_"+id_equipment+"'>" +
                "<td>"+equipment['equipment_name']+"</td>" +
                "<td><button class='btn btn-danger btn-sm remove_equipment equipment_lists' data-name='"+equipment['equipment_name']+"' data-idr='"+id_equipment+"' data-id='"+equipment['id_equipment']+"'><i class='fa fa-fw fa-close'></i></button></td>" +
                "</tr>");
            save_equipment();
        }
        $('#list_equipment').on('click', '.remove_equipment', remove_equipment);
        function remove_equipment(){
            var id=$(this).attr('data-idr');
            $('#action_equipment_'+id).remove();
            save_equipment();
        }

        function save_equipment(){
            var id=$('#vehicles_id_equipment').val();
            jsonObj = [];
            var coll=0;
            var text_eq='';
            $(".equipment_lists").each(function() {
                coll++;
                item = {};
                item ['id'] = $(this).attr('data-id');
                jsonObj.push(item);
                text_eq+=$(this).attr('data-name')+', ';
            });
            $('#vehicles_id_eq_'+id).text(text_eq).attr('data-id-equipment', JSON.stringify(jsonObj));
        }
        /////////////////////////////////////////////////////////////////////////////////////



        $('.edit_action').click(open_edit);
        function open_edit() {
            $('#thead_edit').css({'background':'rgb(240, 204, 149)'});
            $('#update_title').show(300);
            var json_action=$(this).attr('data-action');
            var action=JSON.parse( json_action );
            $('#form').attr('action','/new-farmer/update_action');

            var json_employee=$(this).attr('data-employee');
            var employee=JSON.parse( json_employee );
            var json_material=$(this).attr('data-material');
            var material=JSON.parse( json_material );
            var json_equipment=$(this).attr('data-equipment');
            var equipment=JSON.parse( json_equipment );
            var json_services=$(this).attr('data-services');
            var services=JSON.parse( json_services );
            $("#action_action_id").val(action['action_id']);
            $('#id_action_type').val(action['action_action_type_id']);
            $('#action_id').val(action_lib[action['action_action_id']]['name_ua']);
            $('#strat_data').val(action['action_date_start']);
            $('#end_data').val(action['action_date_end']);
            $('#id_action_unit').val(action['action_unit']);
            $('#work').val(action['action_work']);
            var type_id = $(this).attr('data-type_action');
            if(type_id == 27){
                $('.add_prod_'+type_id).css('display','inline');
            }
            //services
            $("#action_services").html('');
            $.each(services, function(key, value) {
                id_services++;
                $('#action_services').append("<tr class='action_services' id='action_services_"+id_services+"'>" +
                    "<td><input  class='name form-control ' type='text' value='"+value['name']+"'></td>" +
                    "<td><input data-id='"+id_services+"' id='s_amount"+id_services+"' class='amount form-control in_services' type='text' value='"+value['amount']+"'></td>" +
                    "<td><input data-id='"+id_services+"' id='s_price"+id_services+"' class='price form-control in_services' type='text' value='"+value['price']+"'></td>" +
                    "<td id='s_total"+id_services+"'>"+value['amount']*value['price']+"</td>" +
                    "<td><button class='btn btn-danger btn-sm remove_services' data-id='"+id_services+"' ><i class='fa fa-fw fa-close'></i></button></td>" +
                    "</tr>");
            });
            save_services();
            //employe
            $("#action_employe").html('');
            $.each(employee, function(key, value) {
                id_employee++;
                var employee=value;
                $("#action_employe").append("<tr id='action_employee_"+id_employee+"'>" +
                    "<td>"+employe_bd[employee['id']]['employee_name']+"</td>" +
                    "<td>"+employe_bd[employee['id']]['employee_surname']+"</td>" +
                    "<td><input type='text' data-id='"+employee['id']+"' value='"+employee['pay']+"' class='form-control pay_employee  inphead'></td>" +
                    "<td><button class='btn btn-danger btn-sm remove_employee' data-id='"+id_employee+"' ><i class='fa fa-fw fa-close'></i></button></td>" +
                    "</tr>");
            });
            save_employe();
            //material
            $("#action_material").html('');
            if(isNaN(material)){
                $.each(material, function(key, value) {
                    id_material++;
                    var material = value;
                    $("#action_material").append("<tr id='action_material_" + id_material + "'>" +
                        "<td>" + material_bd[material['id']]['name_material'] + "</td>" +
                        "<td>" + unit_material[material_bd[material['id']]['material_unit']] + "</td>" +
                        "<td><input data-id='"+material['id']+"' value='"+material['norm']+"' type='text' class='form-control norm_material' ></td>" +
                        "<td><button class='btn btn-danger btn-sm remove_material' data-id='" + id_material + "' ><i class='fa fa-fw fa-close'></i></button></td>" +
                        "</tr>");
                });
            }
            save_material();
            //vehicles
            $("#action_vehicles").html('');
            $.each(equipment, function(key, value) {
                id_vehicles++;
                var vehicles=value;
                jsonObj = [];
                if (vehicles['id_equ']!=false){
                    var vehicles_arr = vehicles['id_equ'].split(',');
                    var coll=0;
                    var text_eq='';
                    $.each(vehicles_arr, function(key2, value2) {
                        coll++;
                        item = {};
                        item ['id'] = value2;
                        jsonObj.push(item);
                        text_eq+=equipment_bd_name[value2]['equipment_name']+', ';
                    });
                }
                $("#action_vehicles").append("<tr class='equipment_id' id='action_vehicles_"+id_vehicles+"'>" +
                    "<td>"+ vehicles_bd_name[vehicles['id_veh']]['vehicles_name'] +"</td>" +
                    "<td>" +
                    "<div class='btn-group'>" +
                    "<div id='vehicles_id_eq_"+id_vehicles+"'  data-id-vehicles='"+vehicles['id_veh']+"' data-id-equipment='"+JSON.stringify(jsonObj)+"'  class='ex_equ' style='max-width: 70px' disabled='disabled'>"+text_eq+"</div>" +
                    "<button data-id='"+id_vehicles+"' type='button' class='btn btn-primary open_equipment'>*</button>" +
                    "</div>" +
                    "</td>" +
                    "<td><input type='text' class='form-control fuel' value='"+vehicles['fuel']+"'></td>" +
                    "<td><button class='btn btn-danger btn-sm remove_vehicles' data-id='"+id_vehicles+"' ><i class='fa fa-fw fa-close'></i></button></td>" +
                    "</tr>");
            });
            save_vehicles();
            scroll_to_top(200);
            $('#save_actions').hide();
            $('#update_actions').show();
        }
        function scroll_to_top(speed) {
            $('body,html').animate({scrollTop: 0}, speed);
        }
/*        $('#planing_unit_material').change(function () {
            var unit = $(this).val();
            if(unit == 1){
                var units = 'Norm kg/h';
                $('#units').text(units);
            }
            if(unit == 2){
                var units = 'Norm l/h';
                $('#units').text(units);
            }
            if(unit == 3) {
                var units = 'Norm м³/h';
                $('#units').text(units);
            }
        });*/
        $('.id_type_material').change(function () {
            var type_material = $(this).val();
            if(type_material=='2'){
                $('.sub_type_fert').css('display','block');
                $('.sub_type_ppa').css('display','none');
                $('.sub_type_seed').css('display','none');
            }if(type_material == '3'){
                $('.sub_type_ppa').css('display','block');
                $('.sub_type_fert').css('display','none');
                $('.sub_type_seed').css('display','none');
            }if(type_material=='1'){
                $('.sub_type_seed').css('display','block');
                $('.sub_type_fert').css('display','none');
                $('.sub_type_ppa').css('display','none');
            }
        });

        /*$('.unit_material').change(function () {
         var unit = $(this).val();
         alert(unit);
         if(unit == 1){
         $('.units').text('Norm kg/h');
         }
         if(unit == 2){
         $('.units').text('Norm l/h');
         }
         if(unit == 3){
         $('.units').text('Norm м³/h');
         }
         else {
         $('.units').text('Norm п.од/г');
         }
         });*/

        (function( $ ){
            $.fn.jSearch = function( options ) {

                var defaults = {
                    selector: null,
                    child: null,
                    minValLength: 3,
                    Found: function(elem, event){},
                    NotFound: function(elem, event){},
                    Before: function(t){},
                    After: function(t){},
                };

                var options = $.extend(defaults, options);
                var $this = $(this);

                if ( options.selector == null || options.child === null || typeof options.NotFound != "function" || typeof options.Found != "function" || typeof options.After != "function" || typeof options.Before != "function" )
                { console.error( 'One of the parameters is incorrect.' ); return false; }


                $this.on( 'keyup', function(event){

                    options.Before($this);

                    if ( $(this).val().length >= options.minValLength ) {
                        console.clear();

                        $( options.selector ).find( options.child ).each(function( event ){
                            if ( this.innerText.toLowerCase().indexOf( $this.val().toLowerCase() ) == -1 ) {
                                options.NotFound( this, event );
                            } else {
                                options.Found( this, event );
                            }

                        });

                    }
                    options.After($this);
                });
            };
        })( jQuery );

        $('#search_vehicles').jSearch({
            selector  : '.tavle1',
            child : 'tr > td',
            minValLength: 0,
            Before: function(){
                $('.tavle1 tr').data('find','');
            },
            Found : function(elem){
                $(elem).parent().data('find','true');
                $(elem).parent().show();
            },
            NotFound : function(elem){
                if (!$(elem).parent().data('find'))
                    $(elem).parent().hide();
            },
            After : function(t){
                if (!t.val().length) $('.tavle1 tr').show();
            }
        });

        $('#search_equipment').jSearch({
            selector  : '.tavle2',
            child : 'tr > td',
            minValLength: 0,
            Before: function(){
                $('.tavle2 tr').data('find','');
            },
            Found : function(elem){
                $(elem).parent().data('find','true');
                $(elem).parent().show();
            },
            NotFound : function(elem){
                if (!$(elem).parent().data('find'))
                    $(elem).parent().hide();
            },
            After : function(t){
                if (!t.val().length) $('.tavle2 tr').show();
            }
        });

        /*        $('.list_id_action_type').change(function () {
         var type_operation = $(this).val();
         $('.type_op').hide();
         $('.type_operation_'+type_operation).show();
         });*/
    });
</script>