<?php

include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
include_once ROOT.'/cabinet/new-farmer/models/Storage.php';


class StorageController{

	public function actionStorage(){
		$id_user = $_SESSION['id_user'];
		$date['material_type'] = DataBase::getActionLib($id_user);
		$date['material_types'] = DataBase::getActionLibs($id_user);
		$date['storage'] = Storage::getStorage($id_user);
		$date['incoming_material'] = Storage::getIncomingMaterial($id_user);
		SRC::template('new-farmer','new','storage',$date);
		return true;
	}

	public function actionCreateStorage(){
		$id_user = $_SESSION['id_user'];
		$storage_type_material = SRC::validatorPrice($_POST['storage_type_material']);
		$storage_material = SRC::validator($_POST['storage_material']);
		$storage_quantity = SRC::validatorPrice($_POST['storage_quantity']);
		$storage_sum_total = SRC::validatorPrice($_POST['storage_sum_total']);
		$storage_sum_unit = SRC::validatorPrice($_POST['storage_sum_unit']);
		$storage_date = SRC::validator($_POST['storage_date']);
		$storage_name = SRC::validator($_POST['storage_location']);
		$storage_comments = SRC::validator($_POST['storage_comments']);
		$storage_id = Storage::saveStorage($id_user,$storage_name);

		Storage::createStorage($id_user,$storage_type_material,$storage_material,$storage_quantity,$storage_sum_total,$storage_sum_unit,$storage_date, $storage_id, $storage_comments);
		SRC::redirect('/new-farmer/storage');
		return true;
	}


	public function actionIncomingStorage(){
		$id_user = $_SESSION['id_user'];
		$incoming_date = SRC::validator($_POST['incoming_date']);
		$incoming_type_material = SRC::validator($_POST['incoming_type_material']);
		$incoming_material = SRC::validator($_POST['incoming_material']);
		$incoming_quantity = SRC::validator($_POST['incoming_quantity']);
		$incoming_sum_total = SRC::validator($_POST['incoming_sum_total']);
		$incoming_price_unit = SRC::validator($_POST['incoming_price_unit']);
		$incoming_comments = SRC::validator($_POST['incoming_comments']);
		
		Storage::changeStorageStock($id_user, $incoming_material, $incoming_quantity);
		Storage::createIncomingMaterial($id_user, $incoming_date, $incoming_type_material, $incoming_material, $incoming_quantity, $incoming_sum_total, $incoming_price_unit, $incoming_comments);
		SRC::redirect('/new-farmer/storage');
		return true;
	}
}