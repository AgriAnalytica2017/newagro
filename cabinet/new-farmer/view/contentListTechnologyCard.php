<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 01.08.2017
 * Time: 16:17
 *
 */
?>
<div class="box-bodyn">

        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content"><?=$language['new-farmer']['57']?></strong>
            </h1>
        </div>

</div>
<div class="box-body wt">
<div class="rown">
    <div class="col-lg-3">
        <div class="well">
            <label for="id_crop"><?=$language['new-farmer']['61']?></label>
            <select class="form-control inphead" id="id_crop">
                <option value="0"><?=$language['new-farmer']['61']?></option>
                <?php foreach ($date['crop'] as $crop){ ?>
                <option value="<?=$crop['id_crop']?>"><?if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?></option>
                <?} ?>
            </select>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th><?=$language['new-farmer']['62']?></th>
            <th><?=$language['new-farmer']['63']?></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($date['new_crop_culture'] as $culture){?>
            <tr class="tech_cart id_crop_<?=$culture['id_crop']?>">
                <td><? if($_COOKIE['lang']=='ua'){echo $culture['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $culture['name_crop_en'];}?></td>
                <td><?=$culture['tech_name']?></td>
                <td>
                    <a href="/new-farmer/copy_technology_card/<?=$culture['id_culture']?>" class="btn btn-warning"><?=$language['new-farmer']['150']?></a>
                    <a class="btn btn-warning fan fa-pencil" href="/new-farmer/edit_technology_card/<?=$culture['id_culture']?>"></a>
                <a href="/new-farmer/remove_technology_card/<?=$culture['id_culture']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                <a class="btn btn-primary" href="/new-farmer/costs_technology_card/<?=$culture['id_culture']?>"><?=$language['new-farmer']['64']?></a>
                </td>
                <td></td>
            </tr>
        <? }?>
        </tbody>
    </table>
        </div>
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
