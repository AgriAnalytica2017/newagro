<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03.10.2017
 * Time: 15:16
 */

class Payment{

    public static function createOrder($Nzakaz,$id_user,$name,$email,$message){

        $db = Db::getConnection();
        $db->query("INSERT INTO new_order_buy(order_number,order_user_id,order_user_name_sur,order_user_email,order_message,order_status) 
                           VALUES ('$Nzakaz','$id_user','$name','$email','$message',0)");
        return true;
    }

    public static function updateOrderStatus($order_number, $order_date){
        $db = Db::getConnection();
        $db->query("UPDATE new_order_buy SET order_create_date='$order_date', order_status='1' WHERE order_number = '$order_number'");

        $result = $db->query("SELECT order_user_id FROM new_order_buy WHERE order_number='$order_number'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date= $result->fetch();

        $id_user = $date['order_user_id'];
        $db->query("UPDATE users SET payment_status ='1' WHERE id_user = '$id_user'");
        $_SESSION['payment_status'] = 1;
    }

}