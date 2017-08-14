<?php
include_once ROOT.'/cabinet/new-farmer/models/Budget.php';
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
class BudgetController{
    public function actionGetBudget($id_budget=false){
        $id_budget=SRC::validatorPrice($id_budget);
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getBudget($db,$id_user,$field,$date['table']);
        if($id_budget==true)$date['save_budget']=Budget::getSaveBudget($db,$id_user,$id_budget);
        $date['save_budget_list']=Budget::getSaveBudgetList($db,$id_user);

        $date['return_budget'] = unserialize($date['save_budget'][0]['budget']);
        $date['id_budget']=$id_budget;
        SRC::template('new-farmer','new','budget',$date);
        return true;
    }

    public function getTechnologyCard($id_crop){

    }

    public function actionGetGraphsPlan(){

    	SRC::template('new-farmer', 'new','graphsPlan');
    }

    public function actionSaveBudget(){
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getBudget($db,$id_user,$field,$date['table']);
        $save=array(
                'plane_revenues'=>$date['budget']['plane_revenues'],
                'budget_seeds'=>$date['budget']['budget_seeds'],
                'budget_fertilizers'=>$date['budget']['budget_fertilizers'],
                'budget_ppa'=>$date['budget']['budget_ppa'],
                'budget_equipment'=>$date['budget']['budget_equipment'],
                'budget_pay'=>$date['budget']['budget_pay'],
        );
        $array = serialize($save);
        $current_date = date("Y.m.d");
        $current_time = date("H:i:s");
        Budget::saveBudget($db, $id_user,$current_date,$current_time, $array);
        SRC::redirect('/new-farmer/budget');
        return true;
    }
}