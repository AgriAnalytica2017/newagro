
<div class="box">
    <div class="box-bodyn">
      <div class="non-semantic-protector">
                <h1 class="ribbon">
                    <strong class="ribbon-content">Storage</strong>
                </h1>
          </div>
    </div>
    <div class="box-bodyn col-lg-12" style="max-height: 55px">
      <a class="btn btn-primaryn top" href="#Add_new" data-toggle="modal">Add new material to the storage</a>
      <a class="btn btn-primaryn top" href="#Add_incoming" data-toggle="modal">Add incoming goods</a>
      <a class="btn btn-primaryn top" href="#All_incoming" data-toggle="modal">All incoming goods</a>
    </div>

    <div class="box-body wt">
    <div class="row">
      <div class="col-lg-3">
      </div>
      <div class="col-lg-6">
         <table class="table table-bordered">
        <thead>
          <tr class="tabletop">
            <th>Type of material/Material</th>
            <th>Storage location</th>
            <th>Stock</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <? foreach($date['storage']['storage_material'] as $storage_material){?>
          <? foreach($date['material_types'] as $storage_material_type)if($storage_material_type['id_action'] == $storage_material['storage_type_material']){?>
          <? foreach($date['storage']['storage'] as $storage_1)if($storage_1['storage_id']==$storage_material['storage_location']){?>
          <tr>
            <td><? echo $storage_material_type['name_ua'].': '.$storage_material['storage_material'];?></td>
            <td><?=$storage_1['storage_name']?></td>
            <td><?=$storage_material['storage_quantity']?></td>
            <td>
            <a class="btn btn-primaryn Sale" href="#Sale" data-toggle="modal" data-id = "<?=$storage_material['storage_material_id']?>" data-stock="<?=$storage_material['storage_quantity']?>">Sale</a></td>
          </tr>
          <?}?>
          <?}?>
          <?}?>
        </tbody>
      </table>
      </div>
      <div class="col-lg-3">
      </div>
     
    </div>
			

<div id="Add_new" class="modal fade">
    <div class="modal-dialog modal-lg">
    <form action="/new-farmer/create_storage" method="post">
    <div class="modal-content wt">
        <div class="box-bodyn">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="box-title">Add new material to the storage </span>
        </div>
     
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-3">
          <label>Type of Material</label>
          <select class="form-control inphead" name="storage_type_material" required>
            <? foreach($date['material_types'] as $material_type)if($material_type['type'] == '4'){?>
            <option value="<?=$material_type['id_action']?>"><?=$material_type['name_ua']?></option>
            <?}?>
          </select>
        </div>
        <div class="col-lg-3">
          <label>Material</label>
          <input class="form-control inphead" name="storage_material" required>
        </div>
        <div class="col-lg-3">
          <label>Quantity</label>
          <input class="form-control storage_quantity inphead" type="text" name="storage_quantity" required>
        </div>
        <div class="col-lg-3">
          <label>Sum total</label>
          <input class="form-control storage_sum_total inphead" type="text" name="storage_sum_total" required>
        </div>

              <div style="margin-top: 95px;"></div>
        <div class="col-lg-3">
          <label>Sum per unit</label>
          <input class="form-control storage_sum_unit inphead" type="text" name="storage_sum_unit" required>
        </div>
        <div class="col-lg-3">
          <label>Date</label>
          <input class="form-control inphead" type="date" name="storage_date" required>
        </div>
                <div class="col-lg-3">
          <label>Storage location</label>
          <input class="form-control inphead" name="storage_location" list="material_storage_location" required>
                <datalist id="material_storage_location">
                    <?php
                    foreach ($date['storage']['storage'] as $storage){?>
                        <option ><?php echo $storage['storage_name'];?></option>
                    <?php }?>
                </datalist>
        </div>
                <div class="col-lg-3">
          <label>Comments</label>
          <textarea name="storage_comments" class="form-control inphead"></textarea>
        </div>


          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="submit" class="btn btn-primaryn">Добавить</button>
        </div>
    </div>
    </form>
  </div>
</div>

<div id="Add_incoming" class="modal fade">
    <div class="modal-dialog modal-lg">
    <form action="/new-farmer/incoming_storage" method="post">
    <div class="modal-content wt">
        <div class="box-bodyn">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="box-title">Add incoming goods </span>
        </div>
     
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-3">
              <label>Date</label>
              <input class="form-control inphead" type="date" name="incoming_date">
            </div>
            <div class="col-lg-3">
              <label>Type of Material</label>
              <select class="form-control inphead" name="incoming_type_material" required>
                <? foreach ($date['storage']['storage_type_material'] as $storage){ 
                    foreach($date['material_types'] as $material_type)if($material_type['id_action'] == $storage['storage_type_material']){?>
                      <option value="<?=$material_type['id_action']?>"><?=$material_type['name_ua']?></option>
                <?}?>
                <?}?>
              </select>
            </div>
            <div class="col-lg-3">
              <label>Material</label>
              <input type="hidden" name="">
                <select name="incoming_material" class="form-control inphead">
                    <?php
                    foreach ($date['storage']['storage_material'] as $storage){?>
                        <option value="<?php echo $storage['storage_material_id'];?>"><?php echo $storage['storage_material'];?></option>
                    <?php }?>
                </select>
            </div>
            <div class="col-lg-3">
              <label>Quantity</label>
              <input type="text" name="incoming_quantity" class="inphead incoming_quantity">
            </div>
            <div class="col-lg-3">
              <label>Sum total</label>
              <input type="text" name="incoming_sum_total" class="inphead incoming_sum_total">
            </div>
            <div class="col-lg-3">
              <label>Price per unit</label>
              <input type="text" name="incoming_price_unit" class="inphead incoming_price_unit">
            </div>
            <div class="col-lg-3">
              <label>Comments</label>
              <textarea name="incoming_comments" class="form-control inphead"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="submit" class="btn btn-primaryn">Добавить</button>
        </div>
    </div>
    </form>
  </div>
</div>

<div id="All_incoming" class="modal fade">
    <div class="modal-dialog modal-lg">
    <form action="/new-farmer/incoming_storage" method="post">
    <div class="modal-content wt">
        <div class="box-bodyn">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="box-title">All incoming goods</span>
        </div>
     
          <table class="table">
            <thead>
              <tr class="tabletop">
                <th>Date</th>
                <th>Type of material</th>
                <th>Material</th>
                <th>Quantity</th>
                <th>Sum total</th>
                <th>Price per unit</th>
                <th>Comments</th>
              </tr>
            </thead>
            <tbody>
              <? foreach($date['incoming_material'] as $incoming_material){?>
                <tr>
                  <td><?=$incoming_material['incoming_date']?></td>
                  <td><?=$incoming_material['incoming_type_material']?></td>
                  <td><?=$incoming_material['incoming_material']?></td>
                  <td><?=$incoming_material['incoming_quantity']?></td>
                  <td><?=$incoming_material['incoming_sum_total']?></td>
                  <td><?=$incoming_material['incoming_price_unit']?></td>
                  <td><?=$incoming_material['incoming_comments']?></td>
                </tr>
              <?}?>
            </tbody>
          </table>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="submit" class="btn btn-primaryn">Добавить</button>
        </div>
    </div>
    </form>
  </div>
</div>

<div id="Sale" class="modal fade">
    <div class="modal-dialog modal-lg">
    <form action="/new-farmer/create_sales" method="post">
    <div class="modal-content wt">
        <div class="box-bodyn">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="box-title">Sale</span>
        </div>
     
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-3">
              <label>Date</label>
              <input type="hidden" name="sale_id_material" id="sale_id_material">
              <input type="hidden" name="sale_stock" id="sale_stock">
              <input class="form-control inphead" type="date" name="sale_date">
            </div>
            <div class="col-lg-3">
              <label>Quantity</label>
              <input type="text" name="sale_quantity" class="inphead sale_quantity">
            </div>
            <div class="col-lg-3">
              <label>Sum total</label>
              <input type="text" name="sale_sum_total" class="inphead sale_sum_total">
            </div>
            <div class="col-lg-3">
              <label>Price per unit</label>
              <input type="text" name="sale_price_unit" class="inphead sale_price_unit">
            </div>
            <div class="col-lg-3">
              <label>Comments</label>
              <textarea name="sale_comments" class="form-control inphead"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="submit" class="btn btn-primaryn">Добавить</button>
        </div>
    </div>
    </form>
  </div>
</div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {   
    $('.storage_quantity, .storage_sum_total').change(function(){
      var storage_quantity = parseFloat($('.storage_quantity').val());
      var storage_sum_total = parseFloat($('.storage_sum_total').val());
      var storage_sum_unit = (storage_sum_total/storage_quantity).toFixed(2);
      $('.storage_sum_unit').val(storage_sum_unit);
    });

    $('.incoming_quantity, .incoming_sum_total').change(function(){
      var incoming_quantity = parseFloat($('.incoming_quantity').val());
      var incoming_sum_total = parseFloat($('.incoming_sum_total').val());
      var incoming_price_unit = (incoming_sum_total/incoming_quantity).toFixed(2);
      $('.incoming_price_unit').val(incoming_price_unit);
    });

    $('.sale_quantity, .sale_sum_total').change(function(){
      var stock = parseFloat($('#sale_stock').val());
      var sale_quantity = parseFloat($('.sale_quantity').val());
      if(sale_quantity > stock){
        alert("Not enough material in the storage");
      }
      var sale_sum_total = parseFloat($('.sale_sum_total').val());
      var sale_price_unit = (sale_sum_total/sale_quantity).toFixed(2);
      $('.sale_price_unit').val(sale_price_unit);

      
    });
    $('.Sale').click(function(){
      var id = $(this).attr('data-id');
      var stock = $(this).attr('data-stock');
      $('#sale_id_material').val(id);
      $('#sale_stock').val(stock);
    });
  });
</script>
