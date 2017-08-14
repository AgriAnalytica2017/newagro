<?php 


class FieldManagement{

   public static function getFieldManagement($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM sm_crop_head ch, new_field nf WHERE ch.id_crop=nf.field_id_crop and  nf.id_user = '$id_user'");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }


    public static function createCropCulture($id_user,$id_crop, $name_tech_cart){
        $db = Db::getConnection();
        $db->query("INSERT INTO new_crop_culture (id_user,id_crop, tech_name) VALUES ('$id_user','$id_crop','$name_tech_cart')");
        $id_culture = $db->lastInsertId();

        return $id_culture;
    }
     public static function createFieldManagement($id_user, $id_culture, $field_number, $field_name, $field_size){
        $db= Db::getConnection();
        $db->query("INSERT INTO new_field (field_number, field_name, field_size, field_id_crop, field_status, id_user) VALUES ('$field_number','$field_name','$field_size','$id_culture','0','$id_user')");
        return true;
    }

    public static function getCrop($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM sm_crop_head WHERE id_user = '$id_user' or id_user = 0");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }
    public static function getCropCulture($id_user){

        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM sm_crop_head h, new_crop_culture c WHERE c.id_user = '$id_user' AND c.id_crop=h.id_crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;

    }
    public static function editField($id_user,$id_field,$table,$value){

        $db = Db::getConnection();
        $db->query("UPDATE new_field SET $table='$value' WHERE id_user ='$id_user' AND id_field='$id_field'");
        return true;
    }

}