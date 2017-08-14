<?php
class DataBase{
    public static function getUnits(){
        return array(
            'ua'=>array(
                '1'=>'га',
                '2'=>'т',
            ),
            'gb'=>array(
                '1'=>'ha',
                '2'=>'tonns',
            )
        );
    }
    public static function getTypeEquipment(){
        return array(
            'ua'=>array(
                '1'=>'a',
                '2'=>'b',
                '3'=>'c',
                '4'=>'d'
            ),
            'gb'=>array(
                '1'=>'a',
                '2'=>'b',
                '3'=>'c',
                '4'=>'d'
            )
        );
    }
    public static function getTypeFuel(){
        return array(
            'ua'=>array(
                '1'=>'fuel1',
                '2'=>'fuel2',
                '3'=>'fuel3',
                '4'=>'fuel4'
            ),
            'gb'=>array(
                '1'=>'a',
                '2'=>'b',
                '3'=>'c',
                '4'=>'d'
            )
        );
    }
    public static function getFieldUsage(){
        return array(
            'ua'=>array(
                '1'=>'field',
                '2'=>'grassland',
                '3'=>'fallow',
                '4'=>'pasture',
                '5'=>'forest',
            ),
            'gb'=>array(
                '1'=>'field',
                '2'=>'grassland',
                '3'=>'fallow',
                '4'=>'pasture',
                '5'=>'forest',
            )
        );
    }
    public static function getCropHead($id_user){
        $db=Db::getConnection();
        $result = $db->query("SELECT * FROM sm_crop_head WHERE id_user = '$id_user' or id_user = 0");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data = $result->fetchAll();
        return $data;
    }

    public static function getActionLib($id_user){
        $db=Db::getConnection();
        $result = $db->query("SELECT * FROM new_action_lib");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data = $result->fetchAll();
        return $data;
    }


    public static function getActionLibs($id_user){
        $db=Db::getConnection();
        $result = $db->query("SELECT * FROM sm_action_lib");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data = $result->fetchAll();
        return $data;
    }


    public static function saveLib($id_user, $name_ua, $type){
        $db=Db::getConnection();
        $res = $db->query("SELECT id_action FROM sm_action_lib WHERE name_ua = '$name_ua' AND type=$type  AND (user_id=$id_user or user_id=0)");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_1 = $res->fetchAll();

        if($res_1[0]['id_action'] == false) {
            $db->query("INSERT INTO sm_action_lib (name_ua, type, user_id) VALUE ('$name_ua','$type','$id_user')");
            $id = $db->lastInsertId();
        }else{
            $id=$res_1[0]['id_action'];
        }
        return $id;
    }

}