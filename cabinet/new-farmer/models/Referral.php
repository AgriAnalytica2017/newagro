<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 26.09.2017
 * Time: 10:56
 */
class Referral{
    public static function getMyReferral($id_user){
        $db=Db::getConnection();
        $result = $db->query("SELECT * FROM users WHERE id_ref='$id_user'");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }
}