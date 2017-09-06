<?php


class Storage{

	public static function getStorage($id_user){
		$db=Db::getConnection();
        $res = $db->query("SELECT * FROM new_storage WHERE id_user=$id_user");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $date['storage'] = $res->fetchAll();


        $res = $db->query("SELECT * FROM new_storage_material WHERE storage_id_user=$id_user and storage_material_status = '0'");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $date['storage_material_fact'] = $res->fetchAll();

        /*$res = $db->query("SELECT * FROM new_storage_material WHERE storage_id_user=$id_user and storage_material_status = '1'");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $date['storage_material_plan'] = $res->fetchAll();*/

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

	public static function createStorage($id_user,$storage_type_material,$storage_material,$storage_quantity,$storage_sum_total,$storage_date, $storage_id, $storage_comments){

		$db=Db::getConnection();
        $res = $db->query("INSERT INTO new_storage_material(storage_type_material,storage_material,storage_quantity,storage_sum_total,storage_date,storage_location,storage_comments,storage_id_user, storage_start) 
                           VALUES( '$storage_type_material','$storage_material','$storage_quantity','$storage_sum_total','$storage_date','$storage_id','$storage_comments','$id_user','$storage_quantity')");
		$id = $db->lastInsertId();
        return $id;
	}


	public static function changeStorageStock($id_user, $incoming_material, $incoming_quantity,$incoming_sum_total){

		$db=Db::getConnection();

		$db->query("UPDATE new_storage_material SET storage_quantity = storage_quantity + '$incoming_quantity',  storage_sum_total = storage_sum_total + '$incoming_sum_total' WHERE storage_material_id = '$incoming_material' and storage_id_user = '$id_user'");
		return true;
	}


	public static function createIncomingMaterial($id_user, $incoming_date, $incoming_material, $incoming_quantity, $incoming_sum_total, $incoming_type, $incoming_comments){
			$db = Db::getConnection();
			$db->query("INSERT INTO new_come_out(id_user, come_out_date, come_out_material_id, come_out_quantity, come_out_sum_total,  come_out_type, come_out_comments) 
                VALUES('$id_user','$incoming_date','$incoming_material','$incoming_quantity','$incoming_sum_total','$incoming_type','$incoming_comments')");
		return  true;
	}


	public static function getIncomingMaterial($id_user){
		$db = Db::getConnection();
		$result = $db->query("SELECT * FROM new_come_out WHERE id_user = '$id_user' ORDER BY come_out_date ASC");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$date = $result->fetchAll();
		foreach ($date as $value)if($value['come_out_type']=='2'){
		    $date['come_material'][$value['come_out_material_id']] += $value['come_out_quantity'];
        }
        foreach ($date as $item)if($item['come_out_type'] == '1'){
		    $date['out_material'][$item['come_out_material_id']] += $item['come_out_quantity'];
        }
        /*echo "<pre>";
        var_dump($date);*/

		return $date;
	}

    public static function saveIncomingProducts($product_date,$product_type,$product_storage_location,$product_quantity,$product_comments,$id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT product_type FROM new_product_incoming WHERE id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $type_prod = $result->fetchAll();

        foreach ($type_prod as $value) {
            $type[$value['product_type']] = $value;
        }

        if($type[$product_type]['product_type'] == $product_type){
                $db->query("UPDATE new_product_incoming SET product_quantity = product_quantity+$product_quantity, product_now =product_now + $product_quantity WHERE product_type = '$product_type'");
            }
        else{
            $db->query("INSERT INTO new_product_incoming(product_date, product_type, product_storage_location, product_quantity, product_now, product_comments, id_user) VALUES ('$product_date','$product_type','$product_storage_location','$product_quantity','$product_quantity','$product_comments','$id_user')");
                }
        return true;
    }

    public static function getProducts($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_product_incoming WHERE id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }

}