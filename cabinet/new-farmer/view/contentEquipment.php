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
            <strong class="ribbon-content">Equipment</strong>
        </h1>
    </div>
        </div>
    <div class="col-sm-4" style="padding-right: 0px">
        </div>
</div>
<div class="box-bodyn col-lg-12" style="max-height: 55px">
    <a class="btn btn-primaryn top sh" href="#newEquipment" data-toggle="modal">Add equipment</a>
</div>
<div class="rown">
<table class="table">
    <thead>
        <tr class="tabletop">
            <th>name</th>
            <th>type</th>
            <th>capacity</th>
            <th>width</th>
            <th></th><th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($date['equipment'] as $equipment){?>
        <tr>
            <td><?=$equipment['equipment_name']?></td>
            <td><?=$date['equipment_type']['ua'][$equipment['equipment_type']]?></td>
            <td><?=$equipment['equipment_capacity']?></td>
            <td><?=$equipment['equipment_width']?></td>

            <td><a class="btn btn-warning fa fa-pencil edit_open" data-data='<?=json_encode($equipment); ?>'></a></td>
            <td><a href="/new-farmer/remove_equipment/<?=$equipment['id_equipment']?>" class="btn btn-danger fa fa-remove"></a></td>
        </tr>
    <? }?>
    </tbody>
</table>
</div>
<div id="newEquipment" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <form method="post" action="/new-farmer/create_equipment">
                <div class="box-bodyn">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <span class="box-title">Add equipment</span>
                </div>

            <div class="modal-body">
                    <label>name</label>
                    <input type="text" name="equipment_name" class="form-control inphead" required>
                    <label>type</label>
                    <select name="equipment_type" class="form-control inphead">
                        <?php  foreach ($date['equipment_type']['ua'] as $id_type=>$name_type){?>
                        <option value="<?=$id_type?>"><?=$name_type?></option>
                        <? }?>
                    </select>
                    <label>capacity</label>
                    <input type="text" name="equipment_capacity" class="form-control inphead" required>
                    <label>width</label>
                    <input type="text" name="equipment_width" class="form-control inphead" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primaryn">Сохранить</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div id="editEquipment" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <form method="post" action="/new-farmer/edit_equipment">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit equipment</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="ed_id_equipment" name="ed_id_equipment">
                    <label>name</label>
                    <input type="text" id="ed_equipment_name" name="ed_equipment_name" class="form-control inphead" required>
                    <label>type</label>
                    <select id="ed_equipment_type" name="ed_equipment_type" class="form-control inphead">
                        <?php  foreach ($date['equipment_type']['ua'] as $id_type=>$name_type){?>
                            <option value="<?=$id_type?>"><?=$name_type?></option>
                        <? }?>
                    </select>
                    <label>capacity</label>
                    <input id="ed_equipment_capacity"  type="text" name="ed_equipment_capacity" class="form-control inphead" required>
                    <label>width</label>
                    <input id="ed_equipment_width"  type="text" name="ed_equipment_width" class="form-control inphead" required>
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
            var json_equipment=$(this).attr('data-data');
            var equipment=JSON.parse( json_equipment );
            $('#editEquipment').modal('show');
            $('#ed_id_equipment').val(equipment['id_equipment']);
            $('#ed_equipment_name').val(equipment['equipment_name']);
            $('#ed_equipment_type').val(equipment['equipment_type']);
            $('#ed_equipment_capacity').val(equipment['equipment_capacity']);
            $('#ed_equipment_width').val(equipment['equipment_width']);
        }
    });
</script>
