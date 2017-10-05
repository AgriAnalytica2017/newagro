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
    //Загрузка страницы формы 1
    public function actionGetForm($table){
        if($table!=1 and $table!=2){
            SRC::redirect();
            exit();
        }
        $id_user = SRC::validator($_SESSION['id_user']);
        $date["title"] = Forma50::getForm1Title($table);
        $date["date"] = Forma50::getForm1Date($id_user, $table);
        $date["table"]= $table;
        SRC::template('new-farmer', 'new', 'form'.$table, $date);
        return true;
    }
    //сохранение формы 1
    public function actionSaveForm($table){
        if($table!=1 and $table!=2){
            SRC::redirect();
            exit();
        }
        $id_user = $_SESSION['id_user'];
        $title = Forma50::getForm1Title($table);
        $sql_save="";
        foreach ($title as $item){
            if($item["b"]!=false) {
                $date[$item["b"]]["s2014"] = SRC::validatorPrice($_POST["s2014-" . $item["b"]]);
                $date[$item["b"]]["e2014"] = SRC::validatorPrice($_POST["e2014-" . $item["b"]]);
                $date[$item["b"]]["e2015"] = SRC::validatorPrice($_POST["e2015-" . $item["b"]]);
                $date[$item["b"]]["e2016"] = SRC::validatorPrice($_POST["e2016-" . $item["b"]]);
                if ($date[$item["b"]]["s2014"] == false) $date[$item["b"]]["s2014"] = 0;
                if ($date[$item["b"]]["e2014"] == false) $date[$item["b"]]["e2014"] = 0;
                if ($date[$item["b"]]["e2015"] == false) $date[$item["b"]]["e2015"] = 0;
                if ($date[$item["b"]]["e2016"] == false) $date[$item["b"]]["e2016"] = 0;
                if($date[$item["b"]]["s2014"] != 0 or $date[$item["b"]]["e2014"] != 0 or $date[$item["b"]]["e2015"] != 0 or $date[$item["b"]]["e2016"] != 0){
                    $sql_save = $sql_save . "($id_user, $table, " . $item["b"] . ", " . $date[$item["b"]]["s2014"] . ", " . $date[$item["b"]]["e2014"] . ", " . $date[$item["b"]]["e2015"] . ", " . $date[$item["b"]]["e2016"] . "), ";
                }
            }
        }

        $sql_save=substr($sql_save, 0, -2);
        $result=Forma50::saveForm1($id_user, $sql_save, $table);
        SRC::addAlert($result, 1, 'Збережено!');
        SRC::redirect();
        return true;
    }
}