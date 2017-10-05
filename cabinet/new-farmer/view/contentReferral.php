<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 26.09.2017
 * Time: 11:37
 */
$pay=array(
        1=>'pay',
        0=>'free'
);
$count=0;
$count_pay=0;
?>
<div class="box">
    <div class="box-bodyn">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content">Refferal</strong>
            </h1>
        </div>
    </div>
</div>
<div class="box-bodyn col-lg-12">
    <label>Ваше посилання для запрошення в програму</label>
    <input style="width: 500px; margin:0 auto" class="form-control" value="<?=SRC::getSrcR().'/register/'.$_SESSION['id_user']?>">
</div>
<div class="rown">
    <br><br>
    <div class="col-lg-9">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="4">
                        <h4 class="text-center">запрошені користувачі</h4>
                    </th>
                </tr>
                <tr>
                    <th>Ім'я</th>
                    <th>Прізвище</th>
                    <th>Cтатус оплати</th>
                    <th>Дата реєстрації</th>
                </tr>
            </thead>
            <tbody>
            <? foreach ($date['user'] as $user){?>
                <tr>
                    <td><?=$user['name']?></td>
                    <td><?=$user['last_name']?></td>
                    <td><?=$pay[$user['payment_status']]?></td>
                    <td><?=$user['data_register']?></td>
                </tr>
                <?
                $count++;
                if($user['payment_status']==1) $count_pay++;
            }?>
            </tbody>
        </table>
    </div>
    <div class="col-lg-3">
        <table class="table">
            <tr>
                <th colspan="2" class="text-center">Статистика</th>
            </tr>
            <tr>
                <th>Всього запрошених</th>
                <th><?=$count?></th>
            </tr>
            <tr>
                <th>З них придбали</th>
                <th><?=$count_pay?></th>
            </tr>
        </table>
    </div>

</div>