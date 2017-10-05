<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03.10.2017
 * Time: 10:19
 */?>
<?php
//error_reporting(0);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>Успешно проведенная оплата</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script type="text/javascript" src="./js/jquery-1.7.2.min.js" ></script>
    <script type="text/javascript" src="./js/script.js"></script>
</head>

<div id="content" style="height:800px; width:980px; margin:0 auto; border:1px solid black; padding:200px 100px; text-align:center;">
    <h1>Оплата движка MSCMS - прошла успешно.<br/> Спасибо!</h1>
    <br/>
    <?php if(!empty($payment['datr'])) print_r($payment); ?>
    <p>MSCMS - это инновационное решение в мире веб-разработок, призванное привести создание веб-ресурсов к одному верному, прибыльному стандарту. Полностью масштабируемая платформа, которая стремительно развивается, привлекая в свой штат только опытнейших разработчиков. Поэтому наше сообщество состоит из людей, которые хотят изменить сам принцип веб-разработки в прогрессивную сторону.</p>
    <br/>
    <br/>
    <p>P.S. Движок разработан - находится на стадии тестирования. Ознакомится с информацией вы можете на <a target="_blank" href="http://mscms.com.ua">официальном сайте mscms.com.ua</a></p>
    <br/>
</div>


</body>
</html>

