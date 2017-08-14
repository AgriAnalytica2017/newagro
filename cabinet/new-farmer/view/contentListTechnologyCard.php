<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 01.08.2017
 * Time: 16:17
 */?>
<div class="box-bodyn col-lg-12">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content">List Technology Card</strong>
            </h1>
        </div>
    </div>
    <div class="col-sm-4" style="padding-right: 0px">
       </div>
</div>
<div class="box-bodyn col-lg-12" style="max-height: 55px">
    <a class="btn btn-primaryn top" href="#myModal" data-toggle="modal">Add Technology Card</a>
</div>
<div class="box-body wt">
<div class="rown">
    <div class="col-lg-3">
        <div class="well">
            <label for="id_crop">crop</label>
            <select class="form-control inphead" id="id_crop">
                <option value="0">crop</option>
                <?php foreach ($date['crop'] as $crop){ ?>
                <option value="<?=$crop['id_crop']?>"><?=$crop['name_crop_ua']?></option>
                <?} ?>
            </select>
        </div>
    </div>
    <div class="col-lg-9">
    <table class="table">
        <thead>
        <tr>
            <th>crop_name</th>
            <th>name</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($date['new_crop_culture'] as $culture){?>
            <tr class="tech_cart id_crop_<?=$culture['id_crop']?>">
                <td><?=$culture['name_crop_ua']?></td>
                <td><?=$culture['tech_name']?></td>
                <td><a class="btn btn-warning fan fa-pencil" href="/new-farmer/edit_technology_card/<?=$culture['id_culture']?>"></a>
                <a class="btn btn-primaryn" href="/new-farmer/costs_technology_card/<?=$culture['id_culture']?>">Costs Technology Card</a>
                </td>
                <td></td>
            </tr>
        <? }?>
        </tbody>
    </table>
    </div>
</div>
</div>
<script>
    $(document).ready(function () {
       $('#id_crop').change(function () {
           var id=$(this).val();
           $('.tech_cart').hide(300);
           $('.id_crop_'+id).show(300);
           if(id==0)$('.tech_cart').show(300);
       });
    });
</script>
