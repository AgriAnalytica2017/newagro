<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 15.09.2017
 * Time: 20:07
 */
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
include_once ROOT.'/cabinet/new-farmer/models/Forma50.php';

class Forma50Controller{
    public function actionGetForma($year){
        $year=SRC::validator($year);
        if($year!=2014 AND $year!=2015 AND $year!=2016){
            SRC::redirect('/new-farmer');
            exit();
        }
        $id_user=$_SESSION['id_user'];
        $date['year']=$year;
        $date['crop']=Forma50::getMyCrop($id_user);
        $date['form_date']=Forma50::getDateForm50($id_user,$year);

        SRC::template('new-farmer','new','forma50',$date);
        return true;
    }
    public function actionSaveForma50(){
        $year=SRC::validator($_POST['yaer']);
        if($year!=2014 AND $year!=2015 AND $year!=2016){
            SRC::redirect();
            exit();
        }
        $id_user=$_SESSION['id_user'];
        $date['crop']=Forma50::getMyCrop($id_user);
        $sql_2='';
        foreach ($date['crop'] as $crop_id=>$crop_name){
            $sql_1[$crop_id]="('$id_user','$year','$crop_id',";
            for ($x=1;$x<=7;$x++){
                $sql_1[$crop_id].="'".SRC::validatorPrice($_POST['forma-'.$crop_id.'-'.$x])."', ";
            }
            $sql_1[$crop_id] = substr($sql_1[$crop_id], 0, -2).")";
            $sql_2.=$sql_1[$crop_id].", ";
        }
        $sql_2 = substr($sql_2, 0, -2);
        Forma50::saveForm50($id_user,$year,$sql_2);
        SRC::redirect();




        return true;


    }
}