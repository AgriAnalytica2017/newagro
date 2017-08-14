<?php
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
include_once ROOT.'/cabinet/new-farmer/models/Equipment.php';
class EquipmentController{
    public function actionEquipment(){
        $id_user=$_SESSION['id_user'];
        $date['equipment_type']=DataBase::getTypeEquipment();
        $date['equipment']=Equipment::getEquipment($id_user);
        SRC::template('new-farmer','new', 'equipment', $date);
        return true;
    }
    public function actionCreateEquipment(){
        $id_user=$_SESSION['id_user'];
        $equipment_name=SRC::validator($_POST['equipment_name']);
        $equipment_type=SRC::validator($_POST['equipment_type']);
        $equipment_capacity=SRC::validatorPrice($_POST['equipment_capacity']);
        $equipment_width=SRC::validatorPrice($_POST['equipment_width']);
        Equipment::createEquipment($id_user,$equipment_name,$equipment_type,$equipment_capacity,$equipment_width);
        SRC::redirect('/new-farmer/equipment');
        return true;
    }
    public function actionEditEquipment(){
        $id_user=$_SESSION['id_user'];
        $id_equipment=SRC::validator($_POST['ed_id_equipment']);
        $equipment_name=SRC::validator($_POST['ed_equipment_name']);
        $equipment_type=SRC::validator($_POST['ed_equipment_type']);
        $equipment_capacity=SRC::validatorPrice($_POST['ed_equipment_capacity']);
        $equipment_width=SRC::validatorPrice($_POST['ed_equipment_width']);
        Equipment::editEquipment($id_equipment,$id_user,$equipment_name,$equipment_type,$equipment_capacity,$equipment_width);
        SRC::redirect('/new-farmer/equipment');
        return true;
    }
    public function actionRemoveEquipment($id_equipment){
        $id_equipment=SRC::validatorPrice($id_equipment);
        $id_user=$_SESSION['id_user'];
        Equipment::removeEquipment($id_equipment,$id_user);
        SRC::redirect('/new-farmer/equipment');
        return true;
    }
}