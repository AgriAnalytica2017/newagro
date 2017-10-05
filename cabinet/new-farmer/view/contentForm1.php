<style>
    .heade_form{
        font-size: 17px;
    }
</style>
<script>
    $(document).ready(function (){
        $("#trash").click(trash);
        function trash() {
            $('form input[type="text"]').val('');
        }
    });
</script>
<section class="content">
    <div class="box">
        <div class="box-bodyn">
            <div class="non-semantic-protector">
                <h1 class="ribbon">
                    <strong class="ribbon-content">Ф.1 Баланс, тис. грн.</strong>
                </h1>
            </div>
        </div>
    </div>


    <form action="/new-farmer/save-form/<?php echo $date["table"]?>" method="post">
    <div class="rown">
        <div class="box-header">
            <h3 class="box-title"></h3>
            <div class="box-tools">
                <button type="button" class="btn btn-danger" id="trash" ><i class="fa fa-fw fa-trash-o"></i> Очистити</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-save"></i> Зберегти</button>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <tbody>
                <tr>
                    <th class="text-center">Актив</th>
                    <th class="text-center">Код рядка</th>
                    <th class="text-center" colspan="2">2014</th>
                    <th class="text-center">2015</th>
                    <th class="text-center">2016</th>
                </tr>
                <tr>
                    <th class="text-center">1</th>
                    <th class="text-center">2</th>
                    <th class="text-center">На початок звітного періоду</th>
                    <th class="text-center">На кінець звітного періоду></th>
                    <th class="text-center">На кінець звітного періоду</th>
                    <th class="text-center">На кінець звітного періоду</th>
                </tr>
                <?php foreach ($date["title"] as $title)if($title["type"]==1){?>
                    <tr>
                        <td <?php if($title["b"]==false){?>class="text-center"<? }?>><?php if($_COOKIE['lang'] == 'gb'){echo $title['EN'];} else{echo $title['UA'];}?></td>
                        <td class="text-center"><b><?php echo $title["b"]?></b></td>
                        <?php if($title["b"]!=false){?>
                            <td class="text-center"><input name="s2014-<?php echo $title["b"]?>" type="text" class="form-control classEdit" pattern="[-+]?[0-9]*\.?,?[0-9]*" value="<?php echo $date["date"][$title["b"]]["s14"]?>"></td>
                            <td class="text-center"><input name="e2014-<?php echo $title["b"]?>" type="text" class="form-control classEdit" pattern="[-+]?[0-9]*\.?,?[0-9]*" value="<?php echo $date["date"][$title["b"]]["e14"]?>"></td>
                            <td class="text-center"><input name="e2015-<?php echo $title["b"]?>" type="text" class="form-control classEdit" pattern="[-+]?[0-9]*\.?,?[0-9]*" value="<?php echo $date["date"][$title["b"]]["e15"]?>"></td>
                            <td class="text-center"><input name="e2016-<?php echo $title["b"]?>" type="text" class="form-control classEdit" pattern="[-+]?[0-9]*\.?,?[0-9]*" value="<?php echo $date["date"][$title["b"]]["e16"]?>"></td>
                            <? } ?>
                    </tr>
                <?} ?>

                <tr>
                    <th colspan="4"><br></th>

                </tr>

                <tr>
                    <th class="text-center">Пасив</th>
                    <th class="text-center">Код рядка</th>
                    <th class="text-center" colspan="2">2014</th>
                    <th class="text-center">2015</th>
                    <th class="text-center">2016</th>
                </tr>
                <tr>
                    <th class="text-center">1</th>
                    <th class="text-center">2</th>
                    <th class="text-center">На початок звітного періоду</th>
                    <th class="text-center">На кінець звітного періоду></th>
                    <th class="text-center">На кінець звітного періоду</th>
                    <th class="text-center">На кінець звітного періоду</th>
                </tr>
                <?php foreach ($date["title"] as $title)if($title["type"]==2){?>
                    <tr>
                        <td <?php if($title["b"]==false){?>class="text-center"<? }?>><?php if($_COOKIE['lang']=='gb'){echo $title['EN'];}else{echo $title["UA"];}?></td>
                        <td class="text-center"><b><?php echo $title["b"]?></b></td>
                        <?php if($title["b"]!=false){?>
                            <td class="text-center"><input name="s2014-<?php echo $title["b"]?>" type="text" class="form-control classEdit" pattern="[-+]?[0-9]*\.?,?[0-9]*" value="<?php echo $date["date"][$title["b"]]["s14"]?>"></td>
                            <td class="text-center"><input name="e2014-<?php echo $title["b"]?>" type="text" class="form-control classEdit" pattern="[-+]?[0-9]*\.?,?[0-9]*" value="<?php echo $date["date"][$title["b"]]["e14"]?>"></td>
                            <td class="text-center"><input name="e2015-<?php echo $title["b"]?>" type="text" class="form-control classEdit" pattern="[-+]?[0-9]*\.?,?[0-9]*" value="<?php echo $date["date"][$title["b"]]["e15"]?>"></td>
                            <td class="text-center"><input name="e2016-<?php echo $title["b"]?>" type="text" class="form-control classEdit" pattern="[-+]?[0-9]*\.?,?[0-9]*" value="<?php echo $date["date"][$title["b"]]["e16"]?>"></td>
                            <?} ?>
                    </tr>
                <?} ?>
                </tbody>
            </table>




        </div>
    </div>
    </form>
</section>
