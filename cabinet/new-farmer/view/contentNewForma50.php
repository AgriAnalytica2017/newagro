            
<head>
    <style>
        .searchs{
            height: 35px;
            width: 300px;
            border-radius:3px;
            margin-top: -0.2%;
        }
<<<<<<< HEAD
=======
          .width100{
            width: 100%;
        }
>>>>>>> dev
    </style>
</head>
<? //var_dump($date['rent_pay']);die;?>
<div class="box-bodyn col-lg-12">
        <div class="non-semantic-protector col-sm-3">
          Forma 50 (<?=$date['year']?>)
        </div>
        
       
            </div>

              
<<<<<<< HEAD

<div class="rown">
=======
<div class="table-responsive width100">
>>>>>>> dev
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
<<<<<<< HEAD
                    <td><input class="form-control" name="forma-<?=$crop_id?>-<?=$x?>" value="<?=$date['form_date'][$crop_id][$x]?>"></td>
=======
                    <td><input class="inphead" name="forma-<?=$crop_id?>-<?=$x?>" value="<?=$date['form_date'][$crop_id][$x]?>"></td>
>>>>>>> dev
                <?}?>
            </tr>
        <?}?>
    </tbody>
</table>
   <div class="col-lg-12" style=" text-align: center;">
    <input type="submit" class="btn btn-primaryn" value="save">
    </div>
</form>
<<<<<<< HEAD
</div>
               
                
             
=======
</div>      
>>>>>>> dev
