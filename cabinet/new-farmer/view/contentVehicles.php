<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 27.07.2017
 * Time: 11:40
 */
?>

    <div class="box-bodyn col-lg-12">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="non-semantic-protector">
                <h1 class="ribbon">
                    <strong class="ribbon-content">Vehicles</strong>
                </h1>
            </div>
        </div>
        <div class="col-sm-4" style="padding-right: 0px">
    </div>
</div>
<div class="box-bodyn col-lg-12" style="max-height: 55px">
    <a class="btn btn-primaryn top sh" href="#newVehicles" data-toggle="modal">Add vehicles</a>
</div>
<div class="rown">
<table class="table">
    <thead>
        <tr class="tabletop">
            <th>name</th>
            <th>manufacturer</th>
            <th>license</th>
            <th>fuel</th>
            <th>acquisition</th>
            <th>power</th>
            <th></th><th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($date['vehicles'] as $vehicles){?>
        <tr>
            <td><?=$vehicles['vehicles_name']?></td>
            <td><?=$vehicles['vehicles_manufacturer']?></td>
            <td><?=$vehicles['vehicles_license']?></td>
            <td><?=$date['fuel_type']['ua'][$vehicles['vehicles_fuel']]?></td>
            <td><?=$vehicles['vehicles_acquisition']?></td>
            <td><?=$vehicles['vehicles_power']?></td>
            <td><a class="btn btn-warning fa fa-pencil edit_open" data-data='<?=json_encode($vehicles); ?>'></a></td>
            <td><a href="/new-farmer/remove_vehicles/<?=$vehicles['id_vehicles']?>" class="btn btn-danger fa fa-remove"></a></td>
        </tr>
    <? }?>
    </tbody>
</table>
</div>
<div id="newVehicles" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <form method="post" action="/new-farmer/create_vehicles">
                <div class="box-bodyn">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <span class="box-title">Add equipment</span>
                </div>
            <div class="modal-body">
                    <label>name</label>
                    <input type="text" name="vehicles_name" class="form-control inphead" required>
                    <label>manufacturer</label>
                    <input type="text" name="vehicles_manufacturer" class="form-control inphead" required>
                    <label>license</label>
                    <input type="text" name="vehicles_license" class="form-control inphead" required>
                    <label>fuel</label>
                    <select name="vehicles_fuel" class="form-control inphead">
                        <?php  foreach ($date['fuel_type']['ua'] as $id_type=>$name_type){?>
                        <option value="<?=$id_type?>"><?=$name_type?></option>
                        <? }?>
                    </select>
                    <label>acquisition</label>
                    <select class="form-control inphead" name="vehicles_acquisition" required>
                        <?php for($x=2017;$x>=1930;$x--){?>
                            <option><?=$x?></option>
                        <?}?>
                    </select>
                    <label>Usage year</label>
                    <input type="text" name="usage_year" class="form-control inphead">
                    <label>purchase price</label>
                    <input type="text" name="purchase_price" class="form-control inphead">
                    <input type="hidden" name="current_year" value="<?php echo date('Y')?>">
                    <label>vehicles_power</label>
                    <input type="text" name="vehicles_power" class="form-control inphead" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primaryn">Сохранить</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div id="editVehicles" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <form method="post" action="/new-farmer/edit_vehicles">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add equipment</h4>
                </div>
                <div class="modal-body">
                    <input id="id_vehicles" type="hidden" name="id_vehicles">
                    <label>name</label>
                    <input type="text" name="vehicles_name" id="vehicles_name" class="form-control inphead" required>
                    <label>manufacturer</label>
                    <input type="text" name="vehicles_manufacturer" id="vehicles_manufacturer" class="form-control inphead" required>
                    <label>license</label>
                    <input type="text" name="vehicles_license" id="vehicles_license" class="form-control inphead" required>
                    <label>fuel</label>
                    <select name="vehicles_fuel" id="vehicles_fuel" class="form-control inphead">
                        <?php  foreach ($date['fuel_type']['ua'] as $id_type=>$name_type){?>
                            <option value="<?=$id_type?>"><?=$name_type?></option>
                        <? }?>
                    </select>
                    <label>acquisition</label>
                    <select class="form-control inphead" name="vehicles_acquisition" id="vehicles_acquisition" required>
                        <?php for($x=2017;$x>=1930;$x--){?>
                            <option><?=$x?></option>
                        <?}?>
                    </select>
                    <label>power</label>
                    <input type="text" name="vehicles_power" id="vehicles_power" class="form-control inphead" required>
                    <label>Usage year</label>
                    <input type="text" name="usage_year" id="vehicles_usage_year" class="form-control inphead">
                    <label>purchase price</label>
                    <input type="text" name="purchase_price" id="vehicles_purchase_price" class="form-control inphead">
                    <input type="hidden" name="current_year" value="<?php echo date('Y')?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primaryn">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.edit_open').click(edit_open);
        function edit_open() {
            var json_vehicles=$(this).attr('data-data');
            var vehicles=JSON.parse( json_vehicles );
            $('#editVehicles').modal('show');
            $('#id_vehicles').val(vehicles['id_vehicles']);
            $('#vehicles_name').val(vehicles['vehicles_name']);
            $('#vehicles_manufacturer').val(vehicles['vehicles_manufacturer']);
            $('#vehicles_license').val(vehicles['vehicles_license']);
            $('#vehicles_fuel').val(vehicles['vehicles_fuel']);
            $('#vehicles_acquisition').val(vehicles['vehicles_acquisition']);
            $('#vehicles_power').val(vehicles['vehicles_power']);
            $('#vehicles_usage_year').val(vehicles['vehicles_usage_year']);
            $('#vehicles_purchase_price').val(vehicles['vehicles_purchase_price']);
        }
    });
</script>
