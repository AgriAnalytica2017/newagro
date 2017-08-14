<?php


class Sales{

	public static function getAnalytica($id_user){
		$db= Db::getConnection();
		$result = $db->query("SELECT * FROM new_field WHERE id_user = '$id_user'");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$date['analytica'] = $result->fetchAll();

		$db= Db::getConnection();
		$result = $db->query("SELECT * FROM sm_crop_head");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$date['crop'] = $result->fetchAll();

		return $date;
	}


	public static function updateStock($id_user, $sale_material_id, $sale_quantity){
		$db = Db::getConnection();
		$db->query("UPDATE new_storage_material SET storage_quantity = storage_quantity - '$sale_quantity' WHERE storage_id_user = '$id_user' and storage_material_id = '$sale_material_id'");
		return true;
	}

	public static function createSale($id_user, $sale_material_id, $sale_date, $sale_quantity, $sale_sum_total, $sale_price_unit, $sale_comments){
		$db = Db::getConnection();
		$db->query("INSERT INTO new_sales (id_user, sale_material_id, sale_date,sale_quantity, sale_sum_total, sale_price_unit, sale_comments ) VALUES('$id_user', '$sale_material_id', '$sale_date', '$sale_quantity', '$sale_sum_total', '$sale_price_unit', '$sale_comments')");

		return true;
	}

	public static function getSale($id_user){
		$db = Db::getConnection();
		$result = $db->query("SELECT al.name_ua, al.name_en, ns.sale_date, ns.sale_quantity, ns.sale_sum_total, ns.sale_price_unit, ns.sale_comments, sm.storage_material, sm.storage_type_material
		 FROM  sm_action_lib al, new_storage_material sm, new_sales ns WHERE al.id_action = sm.storage_type_material and sm.storage_material_id = ns.sale_material_id and  ns.id_user = '$id_user' ORDER BY ns.sale_date DESC");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$date['sales'] = $result->fetchAll();

		$result = $db->query("SELECT DISTINCT al.id_action, al.name_ua FROM sm_action_lib al, new_storage_material sm, new_sales ns WHERE al.id_action = sm.storage_type_material and sm.storage_material_id = ns.sale_material_id and ns.id_user = '$id_user'");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$date['material'] = $result->fetchAll();


		$result = $db->query("SELECT ch.name_crop_ua, ch.name_crop_en, nf.field_number, nf.field_name, ps.plane_sale_expected_yield, ps.plane_sale_avr_price, ps.plane_sale_revenue FROM sm_crop_head ch, new_field nf, new_plane_sale ps WHERE ch.id_crop = ps.plane_sale_culture and nf.id_field = ps.plane_sale_field and ps.id_user = '$id_user'");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$date['plane_sale'] = $result->fetchAll();

		$result = $db->query("SELECT ch.name_crop_ua, ch.name_crop_en, ch.id_crop, nf.id_field, nf.field_number, nf.field_name, nf.field_size, nf.field_yield FROM new_field nf, sm_crop_head ch WHERE ch.id_crop = nf.field_id_crop and nf.field_sale_status = '0' and nf.id_user = '$id_user'");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$date['plane_sales'] = $result->fetchAll();
		return $date;
	}

	public static function planeSales($id_user, $plane_sale_field, $plane_sale_culture, $plane_sale_expected_yield, $plane_sale_avr_price, $plane_sale_revenue){
		$db = Db::getConnection();
		$db->query("INSERT INTO new_plane_sale(plane_sale_field, plane_sale_culture, plane_sale_expected_yield, plane_sale_avr_price, plane_sale_revenue, id_user) VALUES('$plane_sale_field','$plane_sale_culture','$plane_sale_expected_yield','$plane_sale_avr_price','$plane_sale_revenue','$id_user')");
		$db->query("UPDATE new_field SET field_sale_status = '1' WHERE id_field = '$plane_sale_field' and id_user = '$id_user'");
		return true;
	}
}