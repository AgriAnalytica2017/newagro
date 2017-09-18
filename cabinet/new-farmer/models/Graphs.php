<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 15.09.2017
 * Time: 10:37
 */
class Graphs{
    public static function getGraphs($db,$region,$crop,$crop_type){
        $res = $db->query("SELECT * FROM new_historical_ukraine WHERE id_crop='$crop' AND region='$region'");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $date = $res->fetchAll();

        if($date[0] == false) {
            $res = $db->query("SELECT * FROM new_historical_ukraine WHERE type_crop='$crop_type' AND region='$region'");
            $res->setFetchMode(PDO::FETCH_ASSOC);
            $date = $res->fetchAll();
        }
        foreach ($date as $date_arr){
            $his[$date_arr['type']]=$date_arr;
        }
        for ($x=2014;$x<=2016;$x++){
            $ex_date[$x]=array(
                1=>$his[2]['y'.$x],
                2=>($his[7]['y'.$x]/$his[5]['y'.$x])*10,
                3=>($his[6]['y'.$x]/$his[1]['y'.$x])*1000,
                4=>($his[6]['y'.$x]/$his[5]['y'.$x])*10,
                5=>(($his[7]['y'.$x]-$his[6]['y'.$x])/$his[1]['y'.$x])*1000,
                6=>(($his[7]['y'.$x]-$his[6]['y'.$x])/$his[5]['y'.$x])*10,
                7=>(($his[7]['y'.$x]-$his[6]['y'.$x])/$his[6]['y'.$x])*100,
            );
        }
        return $ex_date;
    }
    public static function getForm(){
        $db=Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $result=$db->query("SELECT * FROM new_form50_date WHERE id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date  = $result->fetchAll();

        foreach ($date as $date_arr){
            $ex_date[$date_arr['id_crop']][$date_arr['year_form']] = array(
                1=>$date_arr['f2']/$date_arr['f1'],
                2=>($date_arr['f7']/$date_arr['f4'])*10,
                3=>($date_arr['f6']/$date_arr['f1'])*1000,
                4=>($date_arr['f6']/$date_arr['f4'])* 10,
                5=>(($date_arr['f7']-$date_arr['f6'])/$date_arr['f1'])*1000,
                6=>(($date_arr['f7']-$date_arr['f6'])/$date_arr['f4'])*10,
                7=>(($date_arr['f7']-$date_arr['f6'])/$date_arr['f6'])*100,
            );
        }
        return $ex_date;
    }
}