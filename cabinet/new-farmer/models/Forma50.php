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
    //загрузка заголовков
    public static function getForm1Title($table){
        $db = Db::getConnection();
        if($table==1) $sql="type=1 or type=2";
        if($table==2) $sql="type=3 or type=4 or type=5 or type=6";
        $result = $db->query("SELECT b, UA, EN, type  FROM new_form_title WHERE $sql");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }
    public static function getForm1Date($id_user, $table){
        $db = Db::getConnection();
        $result = $db->query("SELECT *  FROM new_form_date WHERE id_user=$id_user AND table_id=$table");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        foreach ($date as $ex){
            $ex_date[$ex["b"]]["s14"]=$ex["s2014"];
            $ex_date[$ex["b"]]["e14"]=$ex["e2014"];
            $ex_date[$ex["b"]]["e15"]=$ex["e2015"];
            $ex_date[$ex["b"]]["e16"]=$ex["e2016"];
        }

        return $ex_date;
    }
    //сохранение формы 1, 2
    public static function saveForm1($id_user, $sql_save, $table){
        $db = Db::getConnection();

        $db->query("DELETE FROM new_form_date WHERE id_user=$id_user AND table_id=$table");
        if($sql_save!=false)$db->query("INSERT INTO new_form_date (id_user, table_id, b, s2014, e2014, e2015, e2016) VALUE $sql_save");

        return true;
    }








}