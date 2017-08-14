<?php
    $language=SRC::getLanguage('farmer-small');
?>

<div class="box-bodyn">
    <div class="non-semantic-protector">
        <h1 class="ribbon">
            <strong class="ribbon-content"><?=$language['farmer-small']['27']?></strong>
        </h1>
    </div>
</div>
<div class="rown">
<div class="box">
    <div class="box-body wt">
            <form method="post" action="/new-farmer/save_edit_technology_card/<?php echo $date['id']?>">
                <input type="hidden" name="crop_id" value="<?php echo $date['id']?>" required>
                <input type="hidden" id="ex_employe" name="ex_employe">
                <input type="hidden" id="ex_material" name="ex_material">
                <input type="hidden" id="ex_vehicles" name="ex_vehicles">
                <div class="table-responsive">
                    <table class="table well ">
                        <thead class="">
                            <tr>
                                <th><label for="id_action_type"><?=$language['farmer-small']['81']?></label></th>
                                <th><label for="action_id"><?=$language['farmer-small']['82']?></label></th>
                                <th><label for="strat_data"><?=$language['farmer-small']['83']?></label></th>
                                <th><label for="end_data"><?=$language['farmer-small']['84']?></label></th>
                                <th><label for="unit"><?=$language['farmer-small']['85']?></label></th>
                                <th><a class="btn btnn btn-success btn-block" href="#Choose_employe" data-toggle="modal">Choose employee<b id="coll_employe"></b></a></th>
                                <th><a class="btn btnn btn-success btn-block" href="#Choose_material" data-toggle="modal">Choose material<b id="coll_material"></b></a></th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                    <select class="form-control dropdown" name="id_action_type" required>
                                    <?php foreach ($date['action'] as $action_type)if($action_type['type']==1){?>
                                        <option value="<?=$action_type['action_id']?>"><?php if($_COOKIE['lang']=='ua'){echo $action_type['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $action_type['name_en'];}?></option>
                                    <?php }?>
                                </select>
                            </td>
                            <td>
                                <select name="action_id" list="list_action" class="form-control dropdown" required>
                                    <?php foreach ($date['action'] as $crop)if($crop['type']==2){?>
                                        <option class="action_select action_select<?php echo $crop['action_type']?>" value="<?php echo $crop['action_id']?>"><?php if($_COOKIE['lang']=='ua'){echo $crop['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $crop['name_en'];}?></option>
                                    <?php }?>
                                </select>
                            </td>
                            <td>
                                <input type="date" class="form-control inphead" id="strat_data" name="strat_data" required>
                            </td>
                            <td>
                                <input type="date" class="form-control inphead" id="end_data" name="end_data" required>
                            </td>
                            <td>
                            <select class="form-control dropdown" name="id_action_unit" id="id_action_unit" required>
                                <?php foreach ($date['units'][$_COOKIE['lang']] as $action_type_id=>$action_type){?>
                                    <option value="<?php echo $action_type_id?>"><?php echo $action_type?></option>
                                <?php }?>
                            </select>
                            </td>
                            <td colspan="2"><a class="btn btnn btn-success btn-block" href="#Choose_vehicles" data-toggle="modal">Choose vehicles and equipment<b id="coll_vehicles"></b></a></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <button type="submit" class="btn btn-success Save"><?=$language['farmer-small']['99']?></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>
    </div>
</div>

    <div class="box-body wt">

<table class="table wt">
    <thead>
        <tr class="tabletop">
            <th>Тип операції</th>
            <th>Операція</th>
            <th>employee</th>
            <th>material</th>
            <th>vehicles and equipment</th>
            <th>Дата початку</th>
            <th>Дата закінчення</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($date['TC']['new_action'] as $action){?>
        <tr>
            <td><?=$date['lib'][$action['action_action_type_id']]?></td>
            <td><?=$date['lib'][$action['action_action_id']]?></td>
            <td>
                        <? if($date['TC']['new_action_employee'][$action['action_id']]!=false)foreach ($date['TC']['new_action_employee'][$action['action_id']] as $employee_action){?>
                        <?=$employee_action['employee_name']?> <?=$employee_action['employee_surname']?> (<?=$employee_action['action_employee_pay']?>)
                            <br>
                        <? } ?>
            </td>
            <td>
                <? if($date['TC']['new_action_material'][$action['action_id']]!=false)foreach ($date['TC']['new_action_material'][$action['action_id']] as $material_action){?>
                    <?=$material_action['storage_material']?> (<?=$material_action['action_material_norm']?>)
                    <br>
                <? } ?>
            </td>
            <td>
                <? if($date['TC']['new_action_equipment'][$action['action_id']]!=false)foreach ($date['TC']['new_action_equipment'][$action['action_id']] as $action_equipment){?>
                    <?=$date['equipment']['TC']['vehicles'][$action_equipment['action_vehicles_id']]['vehicles_name']?> (<?=$date['equipment']['TC']['equipment'][$action_equipment['action_equipment_id']]['equipment_name']?>)
                    <br>
                <? } ?>
            </td>
            <td><?=$action['action_date_start']?></td>
            <td><?=$action['action_date_end']?></td>
        </tr>
    <?} ?>
    </tbody>
</table>
    </div>

</div>
<!-------------------------------->
<div id="Choose_employe" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content wt">
        <div class="box-bodyn">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="box-title">Choose_employe</span>
        </div>
      <div class="modal-body">
         	<div class="row">
				<div class="col-lg-6">
					<table class="table">
                        <thead>
                            <tr class="tabletop">
                                <th>name</th>
                                <th>surname</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <? foreach ($date['employe'] as $employe){?>
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
                                <th>name</th>
                                <th>surname</th>
                                <th>Salary</th>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button id="save_employe" type="submit" class="btn btn-primary">Сохранить</button>
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
        <span class="box-title">Choose vehicles and equipment</span>
      </div>
      <div class="modal-body">
         	<div class="row">
         		<div class="col-lg-6">
                    <table class="table">
                        <thead>
                            <tr class="tabletop">
                                <th>name</th>
                                <th>manufacturer</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($date['equipment']['vehicles'] as $vehicles){?>
                                <tr>
                                    <td><?=$vehicles['vehicles_name']?></td>
                                    <td><?=$vehicles['vehicles_manufacturer']?></td>
                                    <td><a data-data='<?=json_encode($vehicles); ?>' class="btn btn-success btn-sm add_vehicles"><i class="fa fa-fw fa-arrow-right"></i>
                                        </a></td>
                                </tr>
                            <? }?>
                        </tbody>
                    </table>
				</div>
				<div class="col-lg-6">
                    <table class="table">
                        <thead>
                            <tr class="tabletop">
                                <th>vehicles</th>
                                <th>equipment</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="action_vehicles">

                        </tbody>
                    </table>
				</div>
			</div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
          <button id="save_vehicles" type="submit" class="btn btn-primary">Сохранить</button>
      </div>
    </div>
  </div>
</div>
<!---------------Choose_Equipment----------------->
<div id="Choose_equipment" class="modal fade">
    <div class="modal-dialog">
            <div class="modal-content wt">
                <div class="box-bodyn">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <span class="box-title">Choose equipment</span>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="vehicles_id_equipment">
                   <table class="table">
                       <thead>
                            <tr>
                                <th>equipment_name</th>
                                <th></th>
                            </tr>
                       </thead>
                       <tbody>
                        <?php foreach ($date['equipment']['equipment'] as $equipment){?>
                            <tr>
                                <td><?=$equipment['equipment_name']?></td>
                                <td><a data-text="<?=$equipment['equipment_name']?>" data-id='<?=$equipment['id_equipment']?>' class="btn btn-success btn-sm add_equipment"><i class="fa fa-fw fa-arrow-right"></i>
                                    </a></td>
                            </tr>
                        <?}?>
                       </tbody>
                   </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>

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
                    <span class="box-title">Choose material</span>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table">
                                <thead>
                                    <tr class="tabletop">
                                        <th>name</th>
                                        <th>storage_name</th>
                                        <th>storage_sum_unit</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($date['storage'] as $storage){?>
                                    <tr>
                                        <td><?=$storage['storage_material']?></td>
                                        <td><?=$storage['storage_name']?></td>
                                        <td><?=$storage['storage_sum_unit']?></td>
                                        <td><a data-data='<?=json_encode($storage); ?>' class="btn btn-success btn-sm add_material"><i class="fa fa-fw fa-arrow-right"></i>
                                            </a></td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table">
                                <thead class="tabletop">
                                    <th>name</th>
                                    <th>storage_sum_unit</th>
                                    <th>norm</th>
                                    <th></th>
                                </thead>
                                <tbody  id="action_material">

                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button id="save_material" type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
	    ///////////////////////////////////////////////////////////////
	    var id_employee=0;
	    $('.add_employee').click(add_employee);
	    function add_employee() {
            id_employee++;
            var json_employee=$(this).attr('data-data');
            var employee=JSON.parse( json_employee );
            $("#action_employe").append("<tr id='action_employee_"+id_employee+"'><td>"+employee['employee_name']+"</td><td>"+employee['employee_surname']+"</td>" +
                "<td><input type='text' data-id='"+employee['id_employee']+"' class='form-control pay_employee'></td>" +
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
        ////////////////////////////////////////////////////////////////
        var id_material=0;
        $('.add_material').click(add_material);
	    function add_material() {
            id_material++;
            var json_material=$(this).attr('data-data');
            var material=JSON.parse( json_material );
            $("#action_material").append("<tr id='action_material_"+id_material+"'>" +
                "<td>"+material['storage_material']+"</td>" +
                "<td>"+material['storage_sum_unit']+"</td>" +
                "<td>" +
                    "<input  data-id='"+material['storage_material_id']+"' class='form-control norm_material'>" +
                "</td>" +
                "<td><button class='btn btn-danger btn-sm remove_material' data-id='"+id_material+"' ><i class='fa fa-fw fa-close'></i></button></td>" +
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
        /////////////////////////////////////////////////////////////////
        var id_vehicles=0;
        $('.add_vehicles').click(add_vehicles);
        function add_vehicles() {
            id_vehicles++;
            var json_vehicles=$(this).attr('data-data');
            var vehicles=JSON.parse( json_vehicles );
            $("#action_vehicles").append("<tr id='action_vehicles_"+id_vehicles+"'>" +
                "<td>"+vehicles['vehicles_name']+"</td>" +
                "<td>" +
                    "<div class='btn-group'>" +
                    "<button id='vehicles_id_eq_"+id_vehicles+"' data-id-vehicles='"+vehicles['id_vehicles']+"' data-id-equipment='' type='button' class='btn btn-default equipment_id' disabled='disabled'>equipment</button>" +
                    "<button data-id='"+id_vehicles+"' type='button' class='btn btn-primary open_equipment'>*</button>" +
                    "</div>" +
                "</td>" +
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
                item ["id_vehicles"] = $(this).attr('data-id-vehicles');
                item ["id_equipment"] = $(this).attr('data-id-equipment');
                jsonObj.push(item);
            });
            $('#ex_vehicles').val(JSON.stringify(jsonObj));
            $('#coll_vehicles').text("("+coll+")");
            $('#Choose_vehicles').modal("hide");
        }
        $('#action_vehicles').on('click', '.open_equipment', open_equipment);
        function open_equipment() {
            $('#Choose_equipment').modal('show');
            var id=$(this).attr('data-id');
            $('#vehicles_id_equipment').val(id);
        }
        $('.add_equipment').click(add_equipment);
        function add_equipment() {
            var id=$('#vehicles_id_equipment').val();
            var id_equ=$(this).attr('data-id');
            var id_text=$(this).attr('data-text');
            $('#Choose_equipment').modal('hide');
            $('#vehicles_id_eq_'+id).text(id_text).attr('data-id-equipment', id_equ);
        }
	});
</script>