<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 31.07.2017
 * Time: 11:20
 */
include_once ROOT.'/cabinet/new-farmer/models/TechnologyCard.php';
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
class TechnologyCardController{
    public function actionTechnologyCard($id){
    	$id_user = $_SESSION['id_user'];
    	$date['field_management'] = TechnologyCard::getFieldManagement($id_user,$id);
        $id_crop= $date['field_management'][0]['field_id_crop'];
        if($id_crop==true){
            $date['crop_culture'] = TechnologyCard::getTechnologyCard($id_user,$id_crop);
        };
        $date['field'] = TechnologyCard::getField($id_user);
    	$date['id'] = $id; 
        SRC::template('new-farmer','new', 'TechnologyCard', $date);
        return true;
    }

    public function actionListTechnologyCard(){
        $id_user = $_SESSION['id_user'];
        $date['new_crop_culture']=TechnologyCard::getTechnologyCard($id_user);
        $date['crop']=DataBase::getCropHead($id_user);
        SRC::template('new-farmer','new','ListTechnologyCard',$date);
        return true;
    }

    public function actionCreateTechnologyCard(){

        $id_user=$_SESSION['id_user'];
        $techCard=SRC::validator($_POST['optionsRadios']);
        $id_field=SRC::validator($_POST['id_field']);
        if($techCard=='new'){
            $name=SRC::validator($_POST['name_tech_cart']);
            $id_crop=SRC::validator($_POST['id_crop']);
            $id_culture =  TechnologyCard::createTechnologyCard($id_user,$name,$id_crop);
        }else{
            $id_culture = $techCard;
        }
        TechnologyCard::editField($id_user,$id_field,$id_culture);
        SRC::redirect('/new-farmer/edit_technology_card/'.$id_culture);
        return true;
    }
    public function actionEditTechnologyCard($id){
        $id=SRC::validator($id);
        $id_user = $_SESSION['id_user'];
        $date['action']=DataBase::getActionLib($id_user);
        $date['units']=DataBase::getUnits();

        foreach ($date['action'] as $action){
            $date['lib'][$action['action_id']]=$action['name_en'];
        }

        $date['employe'] = TechnologyCard::getEmploye($id_user);
        $date['storage'] = TechnologyCard::getStorage($id_user);
        $date['equipment'] = TechnologyCard::getEquipment($id_user);
        $date['TC']=TechnologyCard::getNewAction($id_user,$id);
        $date['id'] = $id;
        SRC::template('new-farmer', 'new','editTechnologyCard',$date);
        return true;
    }

    public function actionSaveEditTechnologyCard($id){
        $id_user = $_SESSION['id_user'];
        $crop_id=SRC::validator($_POST['crop_id']);
        $id_action_type =  SRC::validator($_POST['id_action_type']);
        $id_action =  SRC::validator($_POST['action_id']);
        //$id_action_type = DataBase::saveLib($id_user,$action_type_name,1);
        //$id_action = DataBase::saveLib($id_user,$action_name,2);
        $start_date =  SRC::validator($_POST['strat_data']);
        $end_date =  SRC::validator($_POST['end_data']);
        $unit =  SRC::validator($_POST['id_action_unit']);
        $action_id=TechnologyCard::createAction($id_user,$id_action,$id_action_type,$start_date,$end_date,$unit,$crop_id);
        ////employee////
        $employee= json_decode($_POST['ex_employe']);
        if($employee!=false){
        $save_employee='';
        foreach ($employee as $ex_employee){
            $id_employee=SRC::validator($ex_employee->{'id'});
            $pay_employe=SRC::validator($ex_employee->{'pay'});
            $save_employee=$save_employee."('$id_user','$action_id','$id_employee','$pay_employe'), ";
        }
        $save_employee=substr($save_employee, 0, -2);
       TechnologyCard::createActionEmployee($save_employee);}
        ////////////////
        ////material////
        $materiale= json_decode($_POST['ex_material']);
        if($materiale!=false){
            $save_material='';
            foreach ($materiale as $ex_material){
                $id_material=SRC::validator($ex_material->{'id'});
                $norm_material=SRC::validator($ex_material->{'norm'});
                $save_material=$save_material."('$id_user','$action_id','$id_material','$norm_material'), ";
            }
            $save_material=substr($save_material, 0, -2);
            TechnologyCard::createActionMaterial($save_material);}
        ////////////////
        ////material////
        $vehicles= json_decode($_POST['ex_vehicles']);
        if($vehicles!=false){
            $save_vehicles='';
            foreach ($vehicles as $ex_vehicles){
                $id_vehicles=SRC::validator($ex_vehicles->{'id_vehicles'});
                $id_equipment=SRC::validator($ex_vehicles->{'id_equipment'});
                $save_vehicles=$save_vehicles."('$id_user','$action_id','$id_vehicles','$id_equipment'), ";
            }
            $save_vehicles=substr($save_vehicles, 0, -2);
            TechnologyCard::createActionVehicles($save_vehicles);
        }
        ////////////////
//            var_dump($action_type_name);
//            var_dump($action_name);
//            var_dump($id_action_type);
//            var_dump($id_action);
//            var_dump($start_date);
//            var_dump($end_date);
//            var_dump($unit);
//            var_dump($save_employee);

        SRC::redirect();
        return true;
    }
    public function actionCostsTechnologyCard($id){

        $id_culture = $id;
        $id_user = $_SESSION['id_user'];
        $date = TechnologyCard::costsTechnologyCard($id_culture, $id_user);
        
        SRC::template('new-farmer','new','costsTechnologyCard',$date);
    }

}