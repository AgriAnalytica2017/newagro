<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 08.09.2017
 * Time: 14:56
 */
include_once ROOT.'/cabinet/new-farmer/models/Budget.php';
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
include_once ROOT.'/cabinet/new-farmer/models/Material.php';
class MaterialController{
    public function actionGetMaterials(){
        $id_user=$_SESSION['id_user'];
        $date['material']=Material::getMaterial($id_user);
        $date['type_material']=DataBase::getTypeMaterial();
        $date['ppa_material']=DataBase::getTypePPA();
        $date['fuel_material']=DataBase::getTypeFuel();
        $date['fert_material'] = DataBase::getTypeFert();
        $date['material_lib']=DataBase::getMaterial($id_user);
        $date['crop_list']=DataBase::getCropName($id_user);
        SRC::template('new-farmer','new','material',$date);
        return true;
    }
    public function actionCreateMaterial(){
        $id_user=$_SESSION['id_user'];
        $name_material=SRC::validator($_POST['name_material']);
        $id_type_material=SRC::validator($_POST['type_material']);
        $key_material=SRC::validator($_POST['sub_type_material']);
        $id_lib_material=DataBase::saveLibMaterial($id_user,$name_material,$id_type_material,$key_material);
        $price_material=SRC::validator($_POST['price_material']);
        Material::createMaterial($id_user,$id_lib_material,$price_material);
        SRC::redirect();
        return true;
    }
    public function actionSaveEditMaterial(){
        $id_user=$_SESSION['id_user'];
        $id_material_price=SRC::validator($_POST['id_material_price']);
        $name_material=SRC::validator($_POST['name_material']);
        $id_type_material=SRC::validator($_POST['type_material']);
        if($id_type_material == '1'){
            $key_material=SRC::validator($_POST['sub_type_material_seed']);
        }elseif($id_type_material=='2'){
            $key_material=SRC::validator($_POST['sub_type_material_fert']);
        }else{
            $key_material=SRC::validator($_POST['sub_type_material_ppa']);
        }
        $id_lib_material=DataBase::saveLibMaterial($id_user,$name_material,$id_type_material,$key_material);
        $price_material=SRC::validatorPrice($_POST['price_material']);
        Material::saveEditMaterial($id_user,$id_material_price,$id_lib_material,$price_material);
        SRC::redirect();
        return true;
    }
    public function actionRemoveMaterial($id_material_price){
        $id_material_price=SRC::validatorPrice($id_material_price);
        $id_user=$_SESSION['id_user'];
        Material::removeMaterial($id_user,$id_material_price);
        SRC::redirect();
        return true;
    }
    public function actionGetAllNeedMaterial(){
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table']);

        $date['crop_list']=DataBase::getCropName($id_user);
        $date['material']= Material::getMaterial($id_user);
        $date['type_material']=DataBase::getTypeMaterial();
        $date['ppa_material']=DataBase::getTypePPA();
        $date['fert_material']=DataBase::getTypeFert();
        $date['material_lib']=DataBase::getMaterial($id_user);

        SRC::template('new-farmer','new','allNeedMaterial',$date);
        return true;
    }

    public function actionChangeMaterialPrice(){
        $id_user = $_SESSION['id_user'];
        $id_material_price = SRC::validatorPrice($_POST['id_material_price']);
        $change_price = SRC::validatorPrice($_POST['change_price']);
        Material::changePrice($id_user,$id_material_price,$change_price);

        return true;
    }
}