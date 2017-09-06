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
                '1'=>'soil cultivation',
                '2'=>'sowing',
                '3'=>'plant protection',
                '4'=>'fertilization',
                '5'=>'harvest',
                '6'=>'transport',
                '7'=>'others'
            ),
            'gb'=>array(
                '1'=>'soil cultivation',
                '2'=>'sowing',
                '3'=>'plant protection',
                '4'=>'fertilization',
                '5'=>'harvest',
                '6'=>'transport',
                '7'=>'others'
            )
        );
    }
    public static function getEquipmentKind(){
        return array(
                1=>'Sprayer',
                2=>'Field cultivator',
                3=>'Cutters and Shredders',
                4=>'Planters',
                5=>'Plow',
                6=>'Baler',
                7=>'Reaper- binder',
                8=>'Harrow',
                9=>'Disc harrow',
                10=>'Grain cart',
                11=>'Drill',
                12=>'Spreader',
                13=>'Cultivator',
                14=>'Cultipacker',
                15=>'Destoner',
                16=>'Mower',
                17=>'Mixer- wagon',
                18=>'Hay rake',
                19=>'Potato planter',
                20=>'Stone picker',
                21=>'Subsoiler',
                22=>'Tedder',
                23=>'Trailer',
                24=>'Other',
                );
    }

    public static function getTypeFuel(){
        return array(
            'ua'=>array(
                '1'=>'Дизель',
                '2'=>'Бензин',
            ),
            'gb'=>array(
                '1'=>'Diesel',
                '2'=>'Gasoline',
            )
        );
    }
    public static function getFieldUsage(){
        return array(
            'ua'=>array(
                '1'=>'поле',
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
        $result = $db->query("SELECT * FROM new_lib_crop WHERE id_user = '$id_user' or id_user = 0");
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

    public static function getCropName($id_user){
        $db=Db::getConnection();
        $result = $db->query("SELECT * FROM new_lib_crop WHERE id_user = '$id_user' or id_user = 0");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();

        foreach ($res as  $value) {
           $date[$value['id_crop']] = $value;
        }
        return $date;
    }

    public static function getMaterial($id_user){
        $db=Db::getConnection();
        $result = $db->query("SELECT * FROM new_lib_material WHERE id_user = '$id_user' or id_user = 0");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();

        foreach ($res as  $value) {
            $date[$value['id_material']] = $value;
        }
        return $date;
    }
    public static function saveLibMaterial($id_user,$name_material,$type_material,$key_material=false){
        $db=Db::getConnection();
        $res = $db->query("SELECT * FROM new_lib_material WHERE name_material = '$name_material' AND id_type_material=$type_material  AND (id_user=$id_user or id_user=0)");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_1 = $res->fetchAll();

        if($res_1[0]['id_material'] == false) {
            $db->query("INSERT INTO new_lib_material (name_material, id_type_material, key_material, id_user) VALUE ('$name_material','$type_material','$key_material','$id_user')");
            $id = $db->lastInsertId();
        }else{
            $id=$res_1[0]['id_material'];
        }
        return $id;
    }
    public static function getCropType(){
        $date=array(
            'ua'=>array(
                1=>'Зерно-бобові ',
                2=>'Зернові ',
                3=>'Технічні',
                4=>'Кормові',
                5=>'Овочеві та баштанні',
                6=>'Плодові',
                7=>'Ягодні'
            ),
            'gb'=>array(
                1=>'Зерно-бобові ',
                2=>'Зернові ',
                3=>'Технічні',
                4=>'Кормові',
                5=>'Овочеві та баштанні',
                6=>'Плодові',
                7=>'Ягодні'
            ),
        );
        return $date[SRC::validator($_COOKIE['lang'])];
    }

    public static function getEmployee($id_user){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM new_employee WHERE id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $employee = $result->fetchAll();

        foreach ($employee as $value){
            $date[$value['id_employee']] = $value;
        }
        return $date;
    }

}