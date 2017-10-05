<?php

include_once ROOT.'/cabinet/new-farmer/models/Payment.php';

class PaymentController{
    public function actionCreatePayment(){

        if(!empty($_POST['send'])) {

            $id_user = $_SESSION['id_user'];
            $name = substr(htmlspecialchars(trim($_POST['name'])), 0, 300);
            $tel = substr(htmlspecialchars(trim($_POST['tel'])), 0, 100);
            $total_qty = substr(htmlspecialchars(trim($_POST['total_qty'])), 0, 10);
            $total_sum = substr(htmlspecialchars(trim($_POST['total_sum'])), 0, 100);
            $email = substr(htmlspecialchars(trim($_POST['email'])), 0, 100);
            $message = substr(htmlspecialchars(trim($_POST['message'])), 0, 3000);

            $ip = $_SERVER['REMOTE_ADDR'];
            $Nzakaz = rand(0, 99999);

            Payment::createOrder($Nzakaz,$id_user,$name,$email,$message);

            $mess  = "Имя: <b>".$name."</b><br />";
            $mess .= "Телефон: <b>".$tel."</b><br />";
            $mess .= "Email: <b>".$email."</b><br />";
            $mess .= "Сообщение: <b>".$message."</b><br />";
            $mess .= "Ви замовили:  AgriAnalytica ".$total_qty." ліцензію на суму ".$total_sum." ₴";

            $theme = "Заявка Z".$Nzakaz;
            mail("your_email@mail.ru", $theme, $mess, "From: info@mail.ru <info@mail.ru>\nContent-Type: text/html;\n charset=utf-8\nX-Priority: 0");

            echo "<h3>Заявка вдало оформлена.</h3>";
            echo "<p>Заявці присвоїний номер Z".$Nzakaz.". <br/>Наш менеджер звяжеться з вами найближчим часом.</p>";
            echo "<p> </p>";
            echo "<p>Ви замовили: AgriAnalytica ".$total_qty." ліцензію на суму ".$total_sum." ₴</p>";
        }
        else {
            echo "<h2>Ошибка! Попробуйте еще раз.</h2>";
        }
        if(!empty($_POST['send']) && $_POST['order_payment'] == 1) {
            //указываем публичный ключ liqpay
            $public_key = 'i60739578245';
            //указываем приватный ключ liqpay
            $private_key = 'Zx6manNbxLiqrwrbdgmgCrpfYN7bzQCYjFyYDwtc';
            //подключаем библиотеку liqpay
            require("./lib/LiqPay/LiqPay.php");
            //создаем обьект класса LiqPay
            $liqpay = new LiqPay($public_key, $private_key);
            //Обращаемся к методу cnb_form указывая  необходимые настройки для создания формы с кнопкой оплатить
            $data = array();
            $data['form'] = $liqpay->cnb_form(array(
                'version'       => '3',
                'amount'        => $total_sum,
                'currency'      => 'UAH',
                'description'   => 'Order AgriAnalytica Corporate from '.$email,
                'order_id'      => $Nzakaz,
                'language'      => 'ua',
                'type'          => 'donate',
                'result_url'    => 'http://newagros.ru/new-farmer/success_payment',
                'server_url'    => 'http://newagros.ru/new-farmer/success_payment',
                'sandbox'       => 1
            ));
            echo $data['form'];
        }
    }

    public function actionAddPayment(){

        if(!empty($_POST)) {
            $result['api'] = $_POST;
            //$api_callback = json_decode(base64_decode($result['api']['data']));
            $payment = array();
            foreach($result['api'] as $key=>$value)
            {
                if($key == 'data'){
                    $api_callbacks = json_decode(base64_decode($value));
                    $api_callback = (array)$api_callbacks;
                }
            }

            $payment['status'] = $api_callback['status'];
            $payment['order_id'] = $api_callback['order_id'];
            $payment['create_date'] = date('Y-m-d',$api_callback['create_date']);
            $payment['end_date'] = $api_callback['end_date'];
            $payment['name']  = 'LiqPAY';
        }
        if($payment['status']=='sandbox'){
            Payment::updateOrderStatus($payment['order_id'],$payment['create_date']);
            SRC::template('new-farmer','new','successPayment');
        }else{
            $_SESSION['payment_status'] = 0;
            SRC::template('new-farmer','new','failedPayment');
        }

        return true;
    }
}
?>