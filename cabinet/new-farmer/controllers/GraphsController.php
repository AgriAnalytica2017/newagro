<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 15.09.2017
 * Time: 10:36
 */
include_once ROOT.'/cabinet/new-farmer/models/Budget.php';
include_once ROOT.'/cabinet/new-farmer/models/Graphs.php';
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';

class GraphsController{
    public function actionGetGraphs(){
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table'],5);
        $ex_date['region']=DataBase::getRegion();
        $ex_date['graphs_name']=DataBase::getGraphsName();
        $date['fin_table']=array(
            'yaled'=>'1',
            'price'=>'2',
            'total_cost_area'=>'3',
            'total_cost_mass'=>'4',
            'net_profit_area'=>'5',
            'net_profit_mass'=>'6',
            'profitability'=>'7',
        );
        $crop=false;
        $type_crop=false;
        foreach ($date['budget']['remains']['fin'] as $fin_arr){
            if($crop==false)$crop=$fin_arr['id_crop'];
            if($type_crop==false)$type_crop=$fin_arr['id_crop_type'];
            $ex_date['crop'][$fin_arr['id_crop']]=array(
                'name'=>$fin_arr['crop_name'],
                'type'=>$fin_arr['id_crop_type'],
            );
            foreach ($date['fin_table'] as $fin_table_arr=>$fin_table_id){
                $ex_date['plan_fin'][$fin_arr['id_crop']][$fin_table_id]=$fin_arr[$fin_table_arr];
            }
        }
        $region=0;
        $ex_date['form']=Graphs::getForm();

        SRC::template('new-farmer','new','graphs',$ex_date);
        return true;
    }

    public function actionJsonHis(){
        $db = Db::getConnection();
        $region=SRC::validator($_POST['region']);
        $crop=SRC::validator($_POST['crop']);
        $type_crop=SRC::validator($_POST['type_crop']);
        $ex_date['historical']=Graphs::getGraphs($db,$region,$crop,$type_crop);
        echo json_encode($ex_date['historical']);
        return true;
    }
}