<style>
    th, td{
        text-align: center;
    }
</style>
<div class="box">
    <div class="box-bodyn">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content">Forma 50 (<?=$date['year']?>)</strong>
            </h1>
        </div>
    </div>
</div>
<div class="rown">
<form method="post" action="/new-farmer/saveForma50">
    <input type="hidden" name="yaer" value="<?=$date['year']?>">
<table class="table">
    <thead>
        <tr>
            <th rowspan="2">Культура</th>
            <th colspan="3">Виробництво продукції</th>
            <th colspan="4">Реалізація продукції (робіт, послуг)</th>
        </tr>
        <tr>
            <th>зібрана площа / площа насаджень у плодоносному віці, га</th>
            <th>вироблено продукції, ц</th>
            <th>виробнича собівартість, тис. грн.</th>
            <th>у фізичній масі, ц</th>
            <th>виробнича собівартість, тис. грн.</th>
            <th>повна собівартість, тис. грн.</th>
            <th>чистий дохід (виручка) від реалізації, тис. грн.</th>
        </tr>
    </thead>
    <tbody>
        <tr>
                <td>A</td>
            <?for($x=1;$x<=7;$x++){?>
                <td><?=$x?></td>
            <?}?>
        </tr>
        <?foreach ($date['crop'] as $crop_id=>$crop_name){?>
            <tr>
                <td><?=$crop_name?></td>
                <?for($x=1;$x<=7;$x++){?>
                    <td><input class="form-control" name="forma-<?=$crop_id?>-<?=$x?>" value="<?=$date['form_date'][$crop_id][$x]?>"></td>
                <?}?>
            </tr>
        <?}?>
    </tbody>
</table>
    <input type="submit" class="btn btn-primaryn" value="save">
</form>
</div>