<?php
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
include_once ROOT.'/cabinet/new-farmer/models/FieldManagement.php';
class FieldManagementController{

	public function actionFieldManagement(){
        $id_user=$_SESSION['id_user'];
	    $date['usage']=DataBase::getFieldUsage();
        $date['field']=FieldManagement::getFieldManagement($id_user);
        $date['crop_us']=FieldManagement::getCrop($id_user);
        $date['crop_culture']=FieldManagement::getCropCulture($id_user);

		SRC::template('new-farmer','new','fieldManagement', $date);
		return true;
	}

	public function actionCreateFieldManagement(){
        $id_user=$_SESSION['id_user'];
        $field_number=SRC::validator($_POST['field_number']);
        $field_name=SRC::validator($_POST['field_name']);
        $field_size=SRC::validator($_POST['field_area']);
        $id_culture = SRC::validator($_POST['crop']);

        FieldManagement::createFieldManagement($id_user, $id_culture, $field_number, $field_name, $field_size);

        SRC::redirect('/new-farmer/field_management');
	    return true;
    }
    public function actionRemoveFieldManagement(){

        return true;
    }
    public function actionEditField(){
        $id_user=$_SESSION['id_user'];
        $id_field=SRC::validatorPrice($_POST['id']);
        $table=SRC::validatorPrice($_POST['table']);
        $value=SRC::validatorPrice($_POST['value']);
        switch ($table){
            case 1:
                $table_name='field_size';
                break;
            case 2:
                $table_name='field_usage';
                break;
            case 3:
                $table_name='field_yield';
                break;
        }
        if($table_name!=false)FieldManagement::editField($id_user,$id_field,$table_name,$value);
	    return true;
    }
}