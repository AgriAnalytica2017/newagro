<?php
header('Content-type: text/html; charset=utf-8');
error_reporting(0);

if(!empty($_POST['send'])) {

    $name = substr(htmlspecialchars(trim($_POST['name'])), 0, 300);
    $tel = substr(htmlspecialchars(trim($_POST['tel'])), 0, 100);
    $total_qty = substr(htmlspecialchars(trim($_POST['total_qty'])), 0, 10);
    $total_sum = substr(htmlspecialchars(trim($_POST['total_sum'])), 0, 100);
    $email = substr(htmlspecialchars(trim($_POST['email'])), 0, 100);
    $message = substr(htmlspecialchars(trim($_POST['message'])), 0, 3000);

    $ip = $_SERVER['REMOTE_ADDR'];
    $Nzakaz = rand(10000, 99999);

    $mess  = "Имя: <b>".$name."</b><br />";
    $mess .= "Телефон: <b>".$tel."</b><br />";
    $mess .= "Email: <b>".$email."</b><br />";
    $mess .= "Сообщение: <b>".$message."</b><br />";
    $mess .= "Заказали: MSCMS Corporate [v3.0] ".$total_qty."лицензий на сумму ".$total_sum." $";

    $theme = "Заявка Z".$Nzakaz;

    mail("your_email@mail.ru", $theme, $mess, "From: info@mail.ru <info@mail.ru>\nContent-Type: text/html;\n charset=utf-8\nX-Priority: 0");

    echo "<h3>Заявка удачно оформлена.</h3>";
    echo "<p>Заявке присвоен номер Z".$Nzakaz.". <br/>Наш менеджер свяжется с вами в ближайшее время.</p>";
    echo "<p> </p>";
    echo "<p>Вы заказали: MSCMS Corporate [v3.0] ".$total_qty."лицензий на сумму ".$total_sum." $</p>";
}
else {
    echo "<h2>Ошибка! Попробуйте еще раз.</h2>";
}
if(!empty($_POST['send']) && $_POST['order_payment'] == 1) {
    //указываем публичный ключ liqpay
    $public_key = '';
    //указываем приватный ключ liqpay
    $private_key = '';
    //подключаем библиотеку liqpay
    require("./LiqPay.php");
    //создаем обьект класса LiqPay
    $liqpay = new LiqPay($public_key, $private_key);
    //Обращаемся к методу cnb_form указывая необходимые настройки для создания формы с кнопкой оплатить
    $data = array();
    $data['form'] = $liqpay->cnb_form(array(
        'version'       => '3',
        'amount'        => $total_sum,
        'currency'      => 'USD',
        'description'   => 'Order MSCMS Corporate from '.$email,
        'order_id'      => $Nzakaz,
        'language'      => 'ru',
        'type'          => 'donate',
        'result_url'    => 'http://your-web.site/popup-liqpay/payment/success_payment.php',
        'server_url'    => 'http://your-web.site/popup-liqpay/payment/success_payment.php',
        'sandbox'       => 1
    ));
    echo $data['form'];
}

?>