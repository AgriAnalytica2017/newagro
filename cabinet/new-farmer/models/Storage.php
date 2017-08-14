<?php


class Storage{

	public static function getStorage($id_user){
		$db=Db::getConnection();
        $res = $db->query("SELECT * FROM new_storage WHERE id_user=$id_user");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $date['storage'] = $res->fetchAll();


        $res = $db->query("SELECT * FROM new_storage_material WHERE storage_id_user=$id_user");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $date['storage_material'] = $res->fetchAll();

        $res = $db->query("SELECT DISTINCT storage_type_material FROM new_storage_material WHERE storage_id_user=$id_user");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $date['storage_type_material'] = $res->fetchAll();

        return $date;
	}

	public static function saveStorage($id_user, $storage_name){
        $db=Db::getConnection();
        $res = $db->query("SELECT storage_id FROM new_storage WHERE storage_name = '$storage_name' AND id_user=$id_user");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_1 = $res->fetchAll();

        if($res_1[0]['storage_id'] == false) {
            $db->query("INSERT INTO new_storage (storage_name, id_user) VALUE ('$storage_name','$id_user')");
            $id = $db->lastInsertId();
        }else{
            $id=$res_1[0]['storage_id'];
        }
        return $id;
    }

    public static function saveMaterial($id_user, $storage_material){
        $db=Db::getConnection();
        $res = $db->query("SELECT storage_material FROM new_storage_material WHERE storage_material = '$storage_material' AND storage_id_user=$id_user");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_1 = $res->fetchAll();

        if($res_1[0]['storage_material'] == false) {
            $db->query("INSERT INTO new_storage_material (storage_material, storage_id_user) VALUE ('$storage_material','$id_user')");
            $id = $db->lastInsertId();
        }else{
            $id=$res_1[0]['storage_material'];
        }
        return $storage_material;
    }

	public static function createStorage($id_user,$storage_type_material,$storage_material,$storage_quantity,$storage_sum_total,$storage_sum_unit,$storage_date, $storage_id, $storage_comments){

		$db=Db::getConnection();
        $res = $db->query("INSERT INTO new_storage_material(storage_type_material,storage_material,storage_quantity,storage_sum_total,storage_sum_unit,storage_date,storage_location,storage_comments,storage_id_user ) VALUES( '$storage_type_material','$storage_material','$storage_quantity','$storage_sum_total','$storage_sum_unit','$storage_date','$storage_id','$storage_comments','$id_user')");
		return true;
	}


	public static function changeStorageStock($id_user, $incoming_material, $incoming_quantity){

		$db=Db::getConnection();
		$db->query("UPDATE new_storage_material SET storage_quantity = storage_quantity + '$incoming_quantity' WHERE storage_material_id = '$incoming_material' and storage_id_user = '$id_user'");
		return true;
	}


	public static function createIncomingMaterial($id_user, $incoming_date, $incoming_type_material, $incoming_material, $incoming_quantity, $incoming_sum_total, $incoming_price_unit, $incoming_comments){
			$db = Db::getConnection();
			$db->query("INSERT INTO new_incoming_material(incoming_date, incoming_type_material, incoming_material,incoming_quantity,incoming_sum_total,incoming_price_unit,incoming_comments, incoming_id_user) VALUES('$incoming_date','$incoming_type_material','$incoming_material','$incoming_quantity','$incoming_sum_total','$incoming_price_unit','$incoming_comments','$id_user')");
		return  true;
	}


	public static function getIncomingMaterial($id_user){
		$db = Db::getConnection();
		$result = $db->query("SELECT * FROM new_incoming_material WHERE incoming_id_user = '$id_user' ORDER BY incoming_date ASC");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$date = $result->fetchAll();
		return $date;
	}
}