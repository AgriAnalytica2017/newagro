<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 28.09.2017
 * Time: 9:29
 */
class SettingCashFlow{
    public static function settingMaterial($db,$id_user){

        //Storage setting
        $ex_date=array();
        $result = $db->query("SELECT * FROM new_storage_material WHERE storage_id_user=$id_user and storage_material_status = '0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['storage_material'] = $result->fetchAll();
        foreach ($date['storage_material'] as $storage_material_arr){
            $ex_date['storage_material'][$storage_material_arr['storage_material']]+=$storage_material_arr['storage_quantity'];
        }

        $result = $db->query("SELECT * FROM new_lib_material as lib,new_material_price as price WHERE lib.id_material=price.id_lib_material AND price.id_user=$id_user AND price.statys_material=0 ORDER BY lib.id_type_material");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['price_material'] = $result->fetchAll();

        foreach ($date['price_material'] as $arr_price){
            $ex_date['price_material'][$arr_price['id_material_price']]=$arr_price;
        }
        $result = $db->query("SELECT * FROM new_cash_flow_material WHERE id_user='$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['cash_flow_material'] = $result->fetchAll();

        foreach ($date['cash_flow_material'] as $arr_cash_flow_material){
            $ex_date['cash_flow_material'][$arr_cash_flow_material['id_lib_material']]=$arr_cash_flow_material['cash_flow_material'];
        }


        return $ex_date;
    }
    public static function saveSettingMaterial($id_user,$id_material,$save_material){
        $db = Db::getConnection();
        $db->query("DELETE FROM new_cash_flow_material WHERE id_lib_material='$id_material' AND id_user='$id_user'");
        $db->query("INSERT INTO new_cash_flow_material (id_user,id_lib_material,cash_flow_material) VALUE ('$id_user','$id_material','$save_material')");

        return true;
    }
    public static function saveSales1($id,$name,$val,$id_user){
        $db = Db::getConnection();
        $res = $db->query("SELECT id_sales1 FROM new_cash_flow_sales1 WHERE id_user=$id_user AND id_crop=$id");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_1 = $res->fetchAll();

        if($res_1[0]['id_sales1'] == false) {
            $db->query("INSERT INTO new_cash_flow_sales1 (id_user,id_crop,$name) VALUE ('$id_user','$id','$val')");

        }else{
            $db->query("UPDATE new_cash_flow_sales1 SET $name='$val' WHERE id_user=$id_user AND id_crop=$id");
        }
        return true;
    }
    public static function getSales($id_user){
        $db = Db::getConnection();
        $res = $db->query("SELECT * FROM new_cash_flow_sales1 WHERE id_user=$id_user");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_1 = $res->fetchAll();
        foreach ($res_1 as $res_1_arr){
            $ex_date['1'][$res_1_arr['id_crop']]=$res_1_arr;
        }
        $res = $db->query("SELECT * FROM new_cash_flow_sales2 WHERE id_user=$id_user");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_2 = $res->fetchAll();
        foreach ($res_2 as $res_2_arr){
            $ex_date['2'][$res_2_arr['id_crop']]=$res_2_arr['sales2'];
        }

        $res = $db->query("SELECT product_now, product_type FROM new_product_incoming WHERE id_user=$id_user");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_3 = $res->fetchAll();
        foreach ($res_3 as $res_3_arr){
            $ex_date['storage'][$res_3_arr['product_type']]=$res_3_arr['product_now'];
        }


        return $ex_date;
    }
    public static function saveSales2($id_user,$id_material,$save_material){
        $db = Db::getConnection();
        $db->query("DELETE FROM new_cash_flow_sales2 WHERE id_user=$id_user AND id_crop='$id_material'");
        $db->query("INSERT INTO new_cash_flow_sales2 (id_user,id_crop,sales2) VALUE ('$id_user','$id_material','$save_material')");
        return true;
    }
}