<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 28.09.2017
 * Time: 9:29
 */
include_once ROOT.'/cabinet/new-farmer/models/Budget.php';
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
include_once ROOT.'/cabinet/new-farmer/models/SettingCashFlow.php';
class SettingCashFlowController{
    public function actionSettingMaterial(){
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table']);
        $ex_date['need_material']=$date['budget']['need_material'];
        $ex_date['material']=SettingCashFlow::settingMaterial($db,$id_user);
        $ex_date['crop_list']=DataBase::getCropName($id_user);
        $ex_date['type_material']=DataBase::getTypeMaterial();
        $ex_date['ppa_material']=DataBase::getTypePPA();
        $ex_date['fert_material']=DataBase::getTypeFert();
        $ex_date['material_lib']=DataBase::getMaterial($id_user);
        SRC::template('new-farmer', 'new', 'settingCashFlowMaterial', $ex_date);
    }
    public function actionSaveSettingMaterial(){
        $id_user=$_SESSION['id_user'];
        $id_material=SRC::validatorPrice($_POST['save_id_material']);
        $save_date_material= json_decode($_POST['save_date_material']);
        $save_material = array();
        if($save_date_material!=false) {
            foreach ($save_date_material as $ex_date_material) {
                $save_material[]=array(
                    'm'=>SRC::validatorPrice($ex_date_material->{'m'}),
                    'p'=>SRC::validatorPrice($ex_date_material->{'p'}),
                    'd'=>SRC::validator($ex_date_material->{'d'})
                );
            }
        }
        $save_material = serialize($save_material);
        SettingCashFlow::saveSettingMaterial($id_user,$id_material,$save_material);
        SRC::redirect();
        return true;
    }
    public function actionSettingSales(){
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table']);
        $ex_date['products']=$date['budget']['products'];
        $ex_date['sales']=SettingCashFlow::getSales($id_user);

        SRC::template('new-farmer', 'new','settingSales',$ex_date);
        return true;
    }
    public function actionSaveSales1(){
        $name=SRC::validator($_POST['name']);
        $id=SRC::validatorPrice($_POST['id']);
        $val=SRC::validatorPrice($_POST['val']);
        $id_user=$_SESSION['id_user'];
        SettingCashFlow::saveSales1($id,$name,$val,$id_user);
        return true;
    }
    public function actionSaveSales2(){
        $id_user=$_SESSION['id_user'];
        $id_material=SRC::validatorPrice($_POST['save_id_material']);
        $save_date_material= json_decode($_POST['save_date_material']);
        $save_material = array();
        if($save_date_material!=false) {
            foreach ($save_date_material as $ex_date_material) {
                $save_material[]=array(
                    'm'=>SRC::validatorPrice($ex_date_material->{'m'}),
                    'p'=>SRC::validatorPrice($ex_date_material->{'p'}),
                    'd'=>SRC::validator($ex_date_material->{'d'})
                );
            }
        }
        $save_material = serialize($save_material);
        SettingCashFlow::saveSales2($id_user,$id_material,$save_material);
        SRC::redirect();
        return true;
    }
}