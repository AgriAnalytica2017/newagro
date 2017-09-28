<style>
.width100{
            width: 100%;
        }
</style>
           <div class="box-bodyn col-lg-12">
            <div class="non-semantic-protector col-sm-3">
        Eкономічні показники
        </div>
    </div>
    <div class="table-responsive width100">
<table class="table">
    <tbody>
        <?foreach ($date['fin_table_ua'] as $key=>$value){?>
            <tr>
                <th><?=$value?></th>
                <?foreach ($date['budget']['remains']['fin'] as $item){?>
                    <td><?if($key=='crop_name') echo $item[$key]; else echo number_format($item[$key], $date['coll'][$key], ',', ' ');?></td>
                <?}?>
            </tr>
        <?}?>
    </tbody>
</table>
</div>