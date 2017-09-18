<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 15.09.2017
 * Time: 20:06
 */
class Forma50{
    public static function getMyCrop($id_user){
        $db = Db::getConnection();
        $result=$db->query("SELECT * FROM new_field as f, new_lib_crop as c   WHERE f.id_user='$id_user' AND f.field_status = '0' AND f.field_technology_status='1' AND NOT f.field_id_culture = 0 AND (c.id_user=0 or c.id_user=$id_user) AND c.id_crop=f.field_id_crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date  = $result->fetchAll();

        foreach ($date as $date_arr){
            $ex_date[$date_arr['id_crop']]=$date_arr['name_crop_ua'];
        }
        return $ex_date;

    }
    public static function getDateForm50($id_user,$year){
        $db = Db::getConnection();
        $result=$db->query("SELECT * FROM new_form50_date WHERE id_user=$id_user AND year_form=$year");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date  = $result->fetchAll();
        foreach ($date as $date_arr){
            for($x=1;$x<=7;$x++){
                $ex_date[$date_arr['id_crop']][$x]=$date_arr['f'.$x];
            }
        }
        return $ex_date;
    }
    public static function saveForm50($id_user, $year, $sql){
        $db = Db::getConnection();
        $db->query("DELETE FROM new_form50_date WHERE id_user=$id_user AND year_form=$year");
        $db->query("INSERT INTO new_form50_date (id_user, year_form, id_crop, f1, f2, f3, f4, f5, f6, f7) VALUE $sql");

        return true;
    }
}