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
?>
<table class="table">
    <thead>
        <tr>
            <td>Ім'я</td>
            <td>Прізвище</td>
            <td>Cтатус оплати</td>
            <td>Дата реєстрації</td>
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
    <?}?>
    </tbody>
</table>
