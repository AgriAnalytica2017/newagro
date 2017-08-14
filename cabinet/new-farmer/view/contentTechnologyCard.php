<? //var_dump($date['field_management']);?>
<head>
	<style type="text/css">
		.cont{
			display: none;
		}
	</style>
</head>
<div class="box">
    <div class="box-bodyn col-lg-12" >
<!--			<span class="box-title col-sm-2" style="padding: 0">Технологічні карти</span>-->
            <div class="non-semantic-protector">
                <h1 class="ribbon">
                    <strong class="ribbon-content">Технологічні карти</strong>
                </h1>
            </div>
        </div>

    <div class="box-bodyn col-lg-12" style="max-height: 55px">
        <div class="col-sm-4"></div>
        <div class="col-sm-2" style="margin-top: -18px;">
            <label for="id_action_type"></label>
            <select onchange="window.location.href=this.options[this.selectedIndex].value" class="form-control sub-header inphead" id="select_field" required style="height: ">
                <option value="0">Виберіть поле</option>
                <?php foreach ($date['field'] as $crop){?>
                    <option <?php if($crop['id_field']== $date['id']) echo "selected"?> value="<?php SRC::getSrc();?>/new-farmer/technology_card/<?php echo $crop['id_field']?>"><?php echo $crop['field_name']?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-sm-2">
            <a class="btnn btn-primaryn topn sh" href="/new-farmer/list_technology_card">list technology card</a></div>
        <div class="col-sm-4"></div>
    </div>

    <div class="box-body wt">
	<?if($date['id']<>0){?>
        <div class="rown">
			<table class="table table-bordered">
				<thead>
					<tr class="tabletop">
                       <th>Field number</th>
                       <th>Field name</th>
                       <th>Area, ha</th>
                       <th>Usage</th>
                       <th>Culture</th>
                       <th>Expected yield</th>
                    </tr>
				</thead>
				<tbody>
					<tr>
						<td><?=$date['field_management'][0]['field_number']?></td>
						<td><?=$date['field_management'][0]['field_name']?></td>
						<td><?=$date['field_management'][0]['field_size']?></td>
						<td><?=$date['field_management'][0]['field_usage']?></td>
						<td><?=$date['field_management'][0]['name_crop_ua']?></td>
						<td><?=$date['field_management'][0]['field_yield']?></td>
					</tr>
				</tbody>
			</table>
        </div>
    <div class="rown"  style="text-align: center">
        <form method="post" action="/new-farmer/create_technology_card">
            <input type="hidden" name="id_field" value="<?=$date['field_management'][0]['id_field']?>">
            <input type="hidden" name="id_crop" value="<?=$date['field_management'][0]['field_id_crop']?>">
            <div class="tech_cart">
                <div class="tech_head">
                    <label>Технологічна карта</label>
                </div><br>
                <div class="row"><div class="col-lg-2"></div>
                    <div class="col-lg-4 ">
                            <label class="tech_label">
                                <input type="radio" name="optionsRadios" value="new">
                                Створити нову технологічну карту
                            </label>
                        <div id="new_tech_cart">
                            <label >Назва технологічної карти</label>
                            <input class="form-control inphead" type="text" name="name_tech_cart" id="name_tech_cart">
                        </div>
                    </div>

                    <div class="col-lg-4 ">
                        <label class="tech_label">Використати готову технологічну карту</label>
                        <div class="form-group">
                            <? foreach($date['crop_culture'] as $cart){?>
                                <div class="rad" class="radio">
                                    <label>
                                        <input <?if($date['field_management'][0]['field_id_culture']==$cart['id_culture']) echo 'checked';?>  type="radio" name="optionsRadios" value="<?=$cart['id_culture']?>" required>
                                        <?if($_COOKIE['lang']=='ua'){echo $cart['name_crop_ua'].'_'.$cart['tech_name'];}elseif($_COOKIE['lang']=='gb'){echo $cart['name_crop_en'].'_'.$cart['tech_name'];}?>
                                    </label>
                                </div>
                            <?}?>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
            <br>
            <div style="text-align: center">
                <button type="submit" class="btnn btn-success btn-lg sh">save</button>
            </div>
        </form>
        <?}?>
</div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("input[name='optionsRadios']").change(radio_select);
        $("#new_tech_cart").hide();
        function radio_select() {
            var value= $("input[name='optionsRadios']:checked").val();
            if(value == 'new'){
                $("#name_tech_cart").prop('required',true);
                $("#new_tech_cart").show();
            }
            else{
                $("#name_tech_cart").prop('required',false);
                $("#new_tech_cart").hide();
            }
        }
	});
</script>