<div class="box">
    <div class="box-bodyn">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content"><?=$language['new-farmer']['164']?></strong>
            </h1>
        </div>
    </div>
</div>
<div class="box-bodyn col-lg-12">
    <select onchange="window.location.href=this.options[this.selectedIndex].value" style="width:300px; margin: 0 auto" class="form-control  inphead" id="select_crop" required>
        <?php if($date['id']==0){?><option selected value="0"><?=$language['new-farmer']['163']?></option><?php }?>
        <?php foreach ($date['field'] as $field){?>
            <option <?php if($field['id_field']==$date['id']) echo "selected"?> value="<?php SRC::getSrc();?>/new-farmer/fact_tech_card/<?php echo $field['id_field']?>" ><?='#  '.$field['field_number']."_".$field['field_name'];?></option>
        <?php }?>
    </select>
</div>
<? if($date['id']<>0){?>
<div class="box-bodyn col-lg-12" id="scroll_for_op">
    <table class="table">
        <thead>
        <tr>
            <th><?=$language['new-farmer']['61']?></th>
            <th>№ поля</th>
            <th><?=$language['new-farmer']['45']?></th>
            <th><?=$language['new-farmer']['63']?></th>
            <th><?=$language['new-farmer']['46']?></th>
            <th>Урожайність ц/га</th>
        </tr>
        </thead>
        <tbody>
        <?foreach ($date['field'] as $field_tab)if($date['id']==$field_tab['id_field']){?>
            <tr>
                <td><? if ($_COOKIE['lang']=='ua'){ echo $field_tab['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $field_tab['name_crop_en'];}?></td>
                <td><?=$field_tab['field_number']?></td>
                <td><?=$field_tab['field_name']?></td>
                <td><?=$field_tab['tech_name']?></td>
                <td id="field_size"><?=$field_tab['field_size']?></td>
                <td><?=$field['field_yield']?></td>
            </tr>
        <?}?>
        </tbody>
    </table>
</div>
    <div class="rown">
        <br><br>
        <div class="col-lg-6">
            <div class="rown">
                <div class="box-body wt">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="tabletop">
                                <th colspan="5"><h4 class="text-center"><?=$language['new-farmer']['168']?></h4></th>
                            </tr>
                            <tr class="tabletop">
                                <th><?=$language['new-farmer']['65']?></th>
                                <th><?=$language['new-farmer']['66']?></th>
                                <th><?=$language['new-farmer']['67']?></th>
                                <th><?=$language['new-farmer']['68']?></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <? foreach ($date['action']['action'] as $action){?>
                                <tr>
                                    <td style="width: 29%"><? if($_COOKIE['lang']=='gb'){echo $date['action']['action_type'][$action['action_action_type_id']]['name_en'];}elseif($_COOKIE['lang']=='ua'){echo $date['action']['action_type'][$action['action_action_type_id']]['name_ua'];}?></td>
                                    <td style="width: 29%"><? if($_COOKIE['lang']=='gb'){echo $date['action']['action_type'][$action['action_action_id']]['name_en'];}elseif($_COOKIE['lang']=='ua'){echo $date['action']['action_type'][$action['action_action_id']]['name_ua'];}?>
                                    <td><?=$action['action_date_start']?></td>
                                    <td><?=$action['action_date_end']?></td>
                                    <td style="width: 10%"><a data-action_id="<?=$action['action_id']?>"
                                                data-start_date="<?=$action['action_date_start']?>"
                                                data-end_date="<?=$action['action_date_end']?>"
                                                data-action_type_id="<?=$action['action_action_type_id']?>"
                                                data-action_action_id="<?=$action['action_action_id']?>"
                                                data-material='<?=json_encode(unserialize($action['action_materials']));?>'
                                                data-employee='<?=json_encode(unserialize($action['action_employee']));?>'
                                                data-machines='<?=json_encode(unserialize($action['action_machines']));?>'
                                                data-services='<?=json_encode(unserialize($action['action_services']));?>'
                                                data-fact='<?=json_encode($date['action']['fact'][$action['action_id']])?>'
                                                class="btn btn-primary btn-sm edit_action" href="#scroll_for_op"><?=$language['new-farmer']['169']?></a>
                                    </td>
                                </tr>
                            <?}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="fact_tech_card" style="display: none">
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 15px;">
                        <table class="table">
                            <thead>
                            <tr class="tabletop">
                                <th colspan="5"><h4 class="text-center"><?=$language['new-farmer']['169']?></h4></th>
                            </tr>
                            <tr class="tabletop" id="info_operation_fact">

                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div>
                    <div class="col-lg-12" style="margin-top: 31px;">
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-lg-3">
                            <button class="btn btn-success  new_open_material">Матеріали</button>
                        </div>
                        <div class="col-lg-3">
                            <button class="btn btn-success new_open_employee">Працівники</button>
                        </div>
                        <div class="col-lg-3">
                            <button class="btn btn-success new_open_ppa">ПММ</button>
                        </div>
                        <div class="col-lg-3">
                            <button class="btn btn-success new_open_services">Послуги</button>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-12" id="style_open_material" style="display: none; margin-top: 10px;">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="tabletop">
                                        <th>Назва матеріалу</th>
                                        <th>Загальна кількість матеріалу, кг</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="3" class="text-center">План</th>
                                    </tr>
                                </tbody>
                                <tbody id="material">

                                </tbody>
                                <tbody>
                                    <tr>
                                        <th colspan="3" class="text-center">Факт</th>
                                    </tr>
                                </tbody>
                                <tbody id="in_fact_material">

                                </tbody>
                            </table>
                                <button class='btn btn-success adding_fact_data' href='#mat_fact' data-toggle='modal'>Факт<b id="coll_material_fact"></b></button>
                        </div>
                    </div>
                    <div class="col-lg-12" id="style_open_employee" style="display: none; margin-top: 10px;">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="tabletop">
                                        <th>П.І.Б працівника</th>
                                        <th>Зарплата, грн</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="2" class="text-center">План</th>
                                    </tr>
                                </tbody>
                                <tbody id="employee">

                                </tbody>
                                <tbody>
                                    <tr>
                                        <th colspan="2" class="text-center">Факт</th>
                                    </tr>
                                </tbody>
                                <tbody id="in_fact_employee">

                                </tbody>
                            </table>
                            <button class='btn btn-success adding_fact_data' href='#fact_employee' data-toggle='modal'>Факт<b id="coll_employee_fact"></b></button>
                        </div>
                    </div>
                    <div class="col-lg-12" id="style_open_ppa" style="display: none; margin-top: 10px;">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr class="tabletop">
                                    <th>С/г техніка</th>
                                    <th>С/г машини</th>
                                    <th colspan="2">Кількість пального, л</th>
                                </tr>
                                </thead>
                                <tr>
                                    <th colspan="3" class="text-center">План</th>
                                    <th></th>
                                </tr>
                                <tbody id="equipment">

                                </tbody>
                                <tbody>
                                <tr>
                                    <th colspan="3" class="text-center">Факт</th>
                                    <th>Дата</th>
                                </tr>
                                </tbody>
                                <tbody id="in_fact_equipment">

                                </tbody>
                            </table>
                            <button class='btn btn-success adding_fact_data' href='#fact_machines' data-toggle='modal'>Факт<b id="coll_fuel_fact"></b></button>
                        </div>
                    </div>
                    <div class="col-lg-12" id="style_open_services" style="display: none; margin-top: 10px;">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr class="tabletop">
                                    <th>Назва послуги</th>
                                    <th>Загальна сума, грн</th>
                                </tr>
                                </thead>
                                <tr>
                                    <th colspan="2" class="text-center">План</th>
                                </tr>
                                <tbody id="services">

                                </tbody>
                                <tbody>
                                <tr>
                                    <th colspan="2" class="text-center">Факт</th>
                                </tr>
                                </tbody>
                                <tbody id="in_fact_services">

                                </tbody>
                            </table>
                            <button class='btn btn-success adding_fact_data' href='#fact_services' data-toggle='modal'>Факт<b id="coll_services"></b></button>
                        </div>
                    </div>


                <div class="col-lg-12">
                    <form action="/new-farmer/save_fact" method="post">
                        <input name="save_fact_id_action" id="save_fact_id_action" type="hidden">
                        <input name="save_fuel_fact" id="save_fuel_fact" type="hidden">
                        <input name="save_material_fact" id="save_material_fact" type="hidden">
                        <input name="save_services_fact" id="save_services_fact" type="hidden">
                        <input name="save_employee_fact" id="save_employee_fact" type="hidden">
                        <button class="btn btn-primary adding_fact_data save_change"  style="float: left; margin-top: 45px;" type="submit"><?=$language['new-farmer']['184']?></button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
<?}?>
<!--Material Fact-->
<div id="mat_fact" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title">Картка списання матеріалу</span>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-5">
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
                                        <th>Кількість на складі, кг/л</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($date['action']['storage_material'] as $storage_material)if($storage_material['storage_type_material']!=4){?>
                                        <tr class="list_materials type_material_<?=$storage_material['storage_type_material']?>" >
                                            <td><?=$date['material_lib'][$storage_material['storage_material']]['name_material']?></td>
                                            <!-- <td><?=$storage_material['storage_sum_unit']?></td> -->
                                            <td id="material_st_<?=$storage_material['storage_material_id']?>" data-mass="<?=$storage_material['storage_quantity']?>"><?=$storage_material['storage_quantity']?></td>
                                            <td><a data-id="<?=$storage_material['storage_material_id']?>" data-name='<?=$date['material_lib'][$storage_material['storage_material']]['name_material']?>' class="btn btn-success btn-sm fact_add_material"><i class="fa fa-fw fa-arrow-right"></i>
                                                </a></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <table class="table">
                            <thead class="tabletop">
                            <tr>
                                <th><?=$language['new-farmer']['93']?></th>
                                <th>Кількість, кг/л</th>
                                <th>Дата</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody  id="fact_action_material">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
               <!-- <button id="save_material" type="submit" class="btn btn-primary"><?/*=$language['new-farmer']['27']*/?></button>-->
            </div>
        </div>
    </div>
</div>
<!--fact_employee-->
<div id="fact_employee" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title"><?=$language['new-farmer']['73']?></span>
            </div>
            <div class="modal-body">
                <div class="row">
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
                            <? foreach ($date['action']['employee'] as $employe){?>
                                <tr>
                                    <td><?=$employe['employee_name'] ?></td>
                                    <td><?=$employe['employee_surname'] ?></td>
                                    <td>
                                        <a data-id='<?=$employe['id_employee'] ?>' class="btn btn-success btn-sm add_employee"><i class="fa fa-fw fa-arrow-right"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?}?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table">
                            <thead>
                            <tr class="tabletop">
                                <th><?=$language['new-farmer']['38']?></th>
                                <th>Зарплата, грн</th>
                                <th>Дата</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="fact_employe_action">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                <!--<button id="save_employe" type="submit" class="btn btn-primary"><?/*=$language['new-farmer']['27']*/?></button>-->
            </div>
        </div>
    </div>
</div>

<!--fact_services-->
<div id="fact_services" class="modal fade">
    <div class="modal-dialog modal-md">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title"><?=$language['new-farmer']['73']?></span>
            </div>

            <div class="modal-header">
                <button id="fact_add_services" class="btn btn-success">add</button>
            </div>
            <div class="modal-body">
                <table class="table" >
                    <thead>
                    <tr>
                        <th>Назва</th>
                        <th>Загальна ціна, грн</th>
                        <th>Дата</th>
                    </tr>
                    </thead>
                    <tbody id="fact_action_services">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
               <!-- <button id="save_employe" type="submit" class="btn btn-primary"><?/*=$language['new-farmer']['27']*/?></button>-->
            </div>
        </div>
    </div>
</div>

<!--fact_machines Fact-->
<div id="fact_machines" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title"><?=$language['new-farmer']['87']?></span>
            </div>
            <div class="modal-body">

                <div class="row">
                    <br>
                    <div class="col-lg-12">
                        <table class="table">
                            <thead class="tabletop">
                            <tr>
                                <th>С/г техніка</th>
                                <th>С/г обладнання</th>
                                <th>Паливо</th>
                                <th>Кількість</th>
                                <th>Дата</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody  id="fact_action_fuel">

                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="#choose_sg" data-toggle="modal">+</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                <!--<button id="save_material" type="submit" class="btn btn-primary"><?/*=$language['new-farmer']['27']*/?></button>-->
            </div>
        </div>
    </div>
</div>

<div id="choose_fuel_name" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title"><?=$language['new-farmer']['84']?></span>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <input type="hidden" id="vehicles_id_fuel">
                        <table class="table">
                            <thead>
                            <tr class="tabletop">
                                <th><?=$language['new-farmer']['93']?></th>
                                <th><?=$language['new-farmer']['95']?></th>
                                <th>Кількість на складі, л</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($date['action']['storage_material'] as $storage_material)if($storage_material['storage_type_material']==4){?>
                                <tr class="list_fuel type_fuel_<?=$storage_material['storage_type_material']?>" >
                                    <td><?=$date['material_lib'][$storage_material['storage_material']]['name_material']?></td>
                                    <td><?=$storage_material['storage_sum_unit']?></td>
                                    <td id="fuel_st_<?=$storage_material['storage_material_id']?>" data-mass="<?=$storage_material['storage_quantity']?>"><?=$storage_material['storage_quantity']?></td>
                                    <td><a data-id="<?=$storage_material['storage_material_id']?>" data-name='<?=$date['material_lib'][$storage_material['storage_material']]['name_material']?>' class="btn btn-success btn-sm fact_add_fuel"><i class="fa fa-fw fa-arrow-right"></i>
                                        </a></td>
                                </tr>
                            <?php }?>
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
                            <?php foreach ($date['action']['vehicles'] as $vehicles){?>
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
                            <?php foreach ($date['action']['equipment'] as $equipment){?>
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




<script>
    $(document).ready(function () {

        var payment = '<?=$_SESSION['payment_status'];?>';
        if(payment == 0){
            var msg = 'Дана функція недоступна в DEMO режимі';
            $('.adding_fact_data').prop('disabled', true);
        }
        var json_plan_material='<?=json_encode($date['action']['material_lib']);?>';
        var json_vehicles ='<?=json_encode($date['action']['vehicles'])?>';
        var json_equipment_lib ='<?=json_encode($date['action']['equipment'])?>';
        var json_plan_employee ='<?=json_encode($date['action']['employee']);?>';
        var json_storage ='<?=json_encode($date['action']['storage_material']);?>';
        var json_action_type='<?=json_encode($date['action']['action_type'])?>';
        var action_type_name=JSON.parse(json_action_type);

        var plan_material = JSON.parse(json_plan_material);
        var vehicles = JSON.parse(json_vehicles);
        var equipment_lib = JSON.parse(json_equipment_lib);
        var plan_employee = JSON.parse(json_plan_employee);
        var storage = JSON.parse(json_storage);
        var id_g_employee=0;
        ///////////////////////////MATERIAL/////////////////////////////////////
        var id_material=0;
        $('.fact_add_material').click(add_material);
        function add_material() {
            id_material++;
            var name=$(this).attr('data-name');
            var id_materials=$(this).attr('data-id');

            $("#fact_action_material").append("<tr class='material_json' id='f_action_material_"+id_material+"'>" +
                "<td>" + name + "</td>" +
                "<td><input data-id='"+id_materials+"' type='text' class='form-control norm_material material_st_"+id_materials+"' ></td>" +
                "<td><input class='date_material form-control' type='date'></td>" +
                "<td><button class='btn btn-danger btn-sm remove_material' data-id='"+id_material+"'><i class='fa fa-fw fa-close'></i></button></td>" +
                "</tr>");
            save_material();
        }
        $('#fact_action_material').on('change', '.date_material, .norm_material', save_material);


        $('#fact_action_material').on('keyup', '.norm_material', norm_material);
        function norm_material() {
            var id=$(this).attr('data-id');
            var mass=0;
            $('.material_st_'+id).each(function () {
                var mass_mat=parseFloat($(this).val());
                if(isNaN(mass_mat)) mass_mat=0;
                mass+=mass_mat;
            });
            var ex_mass=$('#material_st_'+id).attr('data-mass')-mass;
            if(ex_mass<0){
                $(this).val($(this).val().substr(1));
                alert("-");
                var mass=0;
                $('.material_st_'+id).each(function () {
                    var mass_mat=parseFloat($(this).val());
                    if(isNaN(mass_mat)) mass_mat=0;
                    mass+=mass_mat;
                });
                ex_mass=$('#material_st_'+id).attr('data-mass')-mass;
            }
            $('#material_st_'+id).text(ex_mass);
            save_material();
        }
        $('#fact_action_material').on('click', '.remove_material', remove_material);
        function remove_material() {
            var id=$(this).attr('data-id');
            $('#f_action_material_'+id).remove();
            save_material();
        }
        $('#save_material').click(save_material);
        function save_material() {
            jsonObj = [];
            var coll=0;
            $(".material_json").each(function() {
                coll++;
                item = {};
                item ["id"] = $(this).find('.norm_material').attr('data-id');
                item ["norm"] = $(this).find('.norm_material').val();
                item ["date"] = $(this).find('.date_material').val();
                jsonObj.push(item);
            });
            $('#save_material_fact').val(JSON.stringify(jsonObj));
            $('#coll_material_fact').text("("+coll+")");
        }

        ///////////////////////////VEHICLES//////////////////////////////////////
        var id_vehicles=0;
        $('.add_vehicles').click(add_vehicles);
        function add_vehicles() {
            id_vehicles++;
            var json_vehicles=$(this).attr('data-data');
            var vehicles=JSON.parse( json_vehicles );
            $("#fact_action_fuel").append("<tr class='equipment_id fuel_json' id='action_vehicles_"+id_vehicles+"'>" +
                "<td>"+vehicles['vehicles_name']+"</td>" +
                "<td >" +
                "<div class='btn-group'>" +
                "<div id='vehicles_id_eq_"+id_vehicles+"'  data-id-vehicles='"+vehicles['id_vehicles']+"' data-id-equipment='[]'  class='ex_equ' style='max-width: 70px' disabled='disabled'></div>" +
                "<button data-id='"+id_vehicles+"' type='button' class='btn btn-primary open_equipment'>+</button>" +
                "</div>" +
                "</td>" +
                "<td id='fuel_"+id_vehicles+"'>" +
                "<button data-id='"+id_vehicles+"' type='button' class='btn btn-primary open_fuel'>+</button>" +
                "</td>" +
                "<td id='norm_fuel_"+id_vehicles+"'></td>" +
                "<td><input class='date_fuel form-control' type='date'></td>" +
                "<td><button class='btn btn-danger btn-sm remove_vehicles' data-id='"+id_vehicles+"' ><i class='fa fa-fw fa-close'></i></button></td>" +
                "</tr>");
            save_fuel();
        }
        $('#fact_action_fuel').on('click', '.remove_vehicles', remove_vehicles);
        function remove_vehicles() {
            var id=$(this).attr('data-id');
            $('#action_vehicles_'+id).remove();
            save_fuel();
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
            save_fuel();
        }

        ////////////////////////////////equipment////////////////////////////////////////////
        var id_equipment=0;
        $('#fact_action_fuel').on('click', '.open_equipment', open_equipment);
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
                        "<td>"+machines[value['id']]['equipment_name']+"</td>" +
                        "<td><button class='btn btn-danger btn-sm remove_equipment equipment_lists' data-name='"+equipment_lib[value['id']]['equipment_name']+"' data-idr='"+id_equipment+"' data-id='"+value['id']+"'><i class='fa fa-fw fa-close'></i></button></td>" +
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
            save_fuel();
        }
        $('#list_equipment').on('click', '.remove_equipment', remove_equipment);
        function remove_equipment(){
            var id=$(this).attr('data-idr');
            $('#action_equipment_'+id).remove();
            save_equipment();
            save_fuel();
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
            save_fuel();
        }
        /////////////////////////////////////////////////////////////////////////////////////

        ///////////////////////////FUEL/////////////////////////////////////

        $('#fact_action_fuel').on('click', '.open_fuel', open_fuel);
        function open_fuel() {
            $('#choose_fuel_name').modal('show');
            var id=$(this).attr('data-id');
            $('#vehicles_id_fuel').val(id);
        }

        var id_fuel=0;
        $('.fact_add_fuel').click(add_fuel);
        function add_fuel() {
            id_fuel++;
            var name=$(this).attr('data-name');
            var id_fuels=$(this).attr('data-id');
            var id_veh=$('#vehicles_id_fuel').val();
            $('#fuel_'+id_veh).html(name+"<br><button data-id='1' type='button' class='btn btn-primary open_fuel'>+</button>");
            $('#norm_fuel_'+id_veh).html("<input data-id='"+id_fuels+"' type='text' class='form-control norm_fuel fuel_st_"+id_fuel+"' >")
            $('#choose_fuel_name').modal('hide');

            /*$("#fact_action_fuel").append("<tr class='fuel_json' id='action_fuel_" + id_fuel + "'>" +
                "<td>" + name + "</td>" +
                "<td><input data-id='"+id_fuels+"' type='text' class='form-control norm_fuel fuel_st_"+id_fuel+"' ></td>" +
                "<td><input class='date_fuel form-control' type='date'></td>" +
                "<td><button class='btn btn-danger btn-sm remove_fuel' data-id='" + id_fuel + "' ><i class='fa fa-fw fa-close'></i></button></td>" +
                "</tr>");*/
            save_fuel();

        }
        $('#fact_action_fuel').on('change', '.date_fuel', save_fuel);
        $('#fact_action_fuel').on('keyup', '.norm_fuel', norm_fuel);
        function norm_fuel() {
            var id=$(this).attr('data-id');
            var mass=0;
            $('.fuel_st_'+id).each(function () {
                var mass_mat=parseFloat($(this).val());
                if(isNaN(mass_mat)) mass_mat=0;
                mass+=mass_mat;
            });
            var ex_mass=$('#fuel_st_'+id).attr('data-mass')-mass;
            if(ex_mass<0){
                $(this).val($(this).val().substr(1));
                alert("-");
                var mass=0;
                $('.fuel_st_'+id).each(function () {
                    var mass_mat=parseFloat($(this).val());
                    if(isNaN(mass_mat)) mass_mat=0;
                    mass+=mass_mat;
                });
                ex_mass=$('#fuel_st_'+id).attr('data-mass')-mass;
            }
            $('#fuel_st_'+id).text(ex_mass);
            save_fuel();
        }
        $('#fact_action_fuel').on('click', '.remove_fuel', remove_fuel);
        function remove_fuel() {
            var id=$(this).attr('data-id');
            $('#action_fuel_'+id).remove();
            save_fuel();
        }
        $('#save_fuel').click(save_fuel);
        function save_fuel() {
            jsonObj = [];
            var coll=0;
            $(".fuel_json").each(function() {
                coll++;
                item = {};
                item ["id_veh"] = $(this).find('.ex_equ').attr('data-id-vehicles');
                item ["id_eq"] = JSON.parse($(this).find('.ex_equ').attr('data-id-equipment'));
                item ["id"] = $(this).find('.norm_fuel').attr('data-id');
                item ["norm"] = $(this).find('.norm_fuel').val();
                item ["date"] = $(this).find('.date_fuel').val();
                jsonObj.push(item);
            });
            $('#save_fuel_fact').val(JSON.stringify(jsonObj));
            $('#coll_fuel_fact').text("("+coll+")");
        }
        /////////////////////employe//////////////////////////////////////////////////////////
        $('.add_employee').click(function () {
            id_g_employee++;
            var id_employe = $(this).attr('data-id');
            $('#fact_employe_action').append(
                "<tr class='ex_fact_employe' id='g_employee_"+id_g_employee+"'>" +
                "<td>"+plan_employee[id_employe]['employee_surname']+"</td>" +
                "<td><input data-id='"+id_employe+"' type='text' class='form-control em_fact'></td>" +
                "<td><input class='form-control em_date' type='date'></td>" +
                "<td><button class='btn btn-danger btn-sm remove_employe' data-id='" + id_g_employee + "' ><i class='fa fa-fw fa-close'></i></button></td>" +
                "<td></td>" +
                "</tr>");
            save_employee();
        });

        $('#fact_employe_action').on('click', '.remove_employe', remove_employe);
        function remove_employe() {
            var id=$(this).attr('data-id');
            $('#g_employee_'+id).remove();
            save_employe();
        }
        $('#save_employe').click(save_employee);

        $('#fact_employe_action').on('change', '.em_date, .em_fact', save_employee);
        function save_employee() {
            jsonObj = [];
            var coll=0;
            $(".ex_fact_employe").each(function() {
                coll++;
                item = {};
                item ["id"] = $(this).find('.em_fact').attr('data-id');
                item ["pay"] = $(this).find('.em_fact').val();
                item ["date"] = $(this).find('.em_date').val();
                jsonObj.push(item);
            });
            $('#save_employee_fact').val(JSON.stringify(jsonObj));
            $('#coll_employee_fact').text("("+coll+")");
            //$('#fact_employee').modal("hide");
        }
        ///////////////////////services///////////////////////////////////////
        var id_services=0;
        $('#fact_add_services').click(add_services);
        function add_services() {
            id_services++;
            $('#fact_action_services').append("<tr class='fact_action_services' id='f_services_"+id_services+"'>" +
                "<td><input  class='name form-control se_name' type='text'></td>" +
                "<td><input  class='name form-control se_price' type='text'></td>" +
                "<td><input  class='name form-control se_date' type='date'></td>" +
                "<td><button class='btn btn-danger btn-sm remove_service' data-id='" + id_services + "' ><i class='fa fa-fw fa-close'></i></button></td>" +
                "</tr>");
        }

        $('#fact_action_services').on('click', '.remove_service', remove_service);
        function remove_service() {
            var id=$(this).attr('data-id');
            $('#f_services_'+id).remove();
            save_services();
        }
        $('#fact_add_services').click(save_services);
        $('#fact_action_services').on('change', '.se_name, .se_price, .se_date', save_services);
        function save_services() {
            jsonObj = [];
            var coll=0;
            $(".fact_action_services").each(function() {
                coll++;
                item = {};
                item ["name"] = $(this).find('.se_name').val();
                item ["price"] = $(this).find('.se_price').val();
                item ["date"] = $(this).find('.se_date').val();
                jsonObj.push(item);
            });
            $('#save_services_fact').val(JSON.stringify(jsonObj));
            $('#coll_services').text("("+coll+")");
        }

        //////////////////////////////////////////////////////////////
        var def_material = 'Матеріали відсутні';
        var def_employee = 'Працівники відсутні';
        var def_equipment = 'Техніка відсутня';
        var def_services = 'Послуги відсутні';
        var def_plan='План';

        $('.edit_action').click(function () {
            $('.fact_tech_card').css('display','block');
            $("#material,#employee, #services,#equipment,#serv,#emplo,#mat,#equp," +
                "#in_fact_material,#in_fact_employee,#in_fact_equipment,#in_fact_services, #info_operation_fact").html('');

            var elementClick = $(this).attr("href");
            var destination = $(elementClick).offset().top;
                $('html').animate({ scrollTop: destination }, 35);


            var action_id = $(this).attr('data-action_id');
            var json_equipment = $(this).attr('data-machines');
            var json_services = $(this).attr('data-services');
            var json_material =$(this).attr('data-material');
            var json_employee = $(this).attr('data-employee');
            var json_fact = $(this).attr('data-fact');
            var action_action_id = $(this).attr('data-action_action_id');
            var action_type_id = $(this).attr('data-action_type_id');
            var start_date = $(this).attr('data-start_date');
            var end_date = $(this).attr('data-end_date');
            var field_size=parseFloat($('#field_size').text());
            var material = JSON.parse(json_material);
            var employee = JSON.parse(json_employee);
            var equipment = JSON.parse(json_equipment);
            var services = JSON.parse(json_services);
            var fact=JSON.parse(json_fact);
            if(!isNaN(fact)) fact={};
            var fuel_storage_name=[];

            $('#save_fact_id_action').val(action_id);


            $('#info_operation_fact').append(
                "<th>"+ action_type_name[action_type_id]['name_ua'] +"</th>"+
                "<th>"+ action_type_name[action_action_id]['name_ua'] +"</th>"+
                "<th>"+ start_date +"</th>"+
                "<th>"+ end_date +"</th>"
            );
            ///////Загрузка Плана
            if(material == false){
                $("#material").append(
                    "<tr>" +
                    "<td colspan='3' class='text-center'>" + def_material + "</td>" +
                    "</tr>");
            }else {
                $.each(material, function (key, value) {
                    $("#material").append(
                        "<tr>" +
                        "<td>" + plan_material[value['id']]['name_material'] + "</td>" +
                        "<td>" + value['norm']*field_size + "</td>"+
                        "</tr>"
                    );
                });
            }
            if(employee == false){
                $("#employee").append("<tr id='action_employee_" + action_id + "'>" +
                    "<td colspan='2' class='text-center'>" + def_employee + "</td>" +
                    "</tr>");
            }
            else{
                $.each(employee, function (key, employee) {
                    $("#employee").append(
                        "<tr>" +
                        "<td>" + plan_employee[employee['id']]['employee_name'] +' '+ plan_employee[employee['id']]['employee_surname']+"</td>" +
                        "<td>" + employee['pay']*field_size + "</td>" +
                        "</tr>"
                    );
                });
            }
            if(equipment == false){
                $("#equipment").append("<tr>" +
                    "<td colspan='3' class='text-center'>" + def_equipment + "</td>" +
                    "</tr>");
            }
            else{
                var id_machine=0;
                    $.each(equipment, function (key, machines) {
                        id_machine++;
                        if(machines['id_veh']!=false){
                        $("#equipment").append("<tr>"+
                            "<td>"+ vehicles[machines['id_veh']]['vehicles_name']+"</td>"+
                            "<td id='equipment_"+id_machine+"'></td>"+
                            "<td colspan='2'>"+machines['fuel']*field_size+"</td>"+
                            "</tr>"
                        );}
