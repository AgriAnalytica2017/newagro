
<div class="box-headern">
    <div class="non-semantic-protector">
        <h1 class="ribbon">
            <strong class="ribbon-content">економічні показники</strong>
        </h1>
    </div>
</div>
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