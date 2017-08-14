<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 08.08.2017
 * Time: 15:07
 */

class Budget{
    public static function getTableBudget(){
        return array(
            array(
                'array'=>'budget_crop_name',
                'name'=>'crop name',
                'class'=>'',
            ),
            array(
                'array'=>'plane_revenues',
                'name'=>'plane revenues',
                'class'=>'',
                ),
            array(
                'array'=>'budget_cost',
                'name'=>'cost',
                'class'=>'',
            ),
            array(
                'array'=>'budget_seeds',
                'name'=>'seeds',
                'class'=>'level2',
            ),
            array(
                'array'=>'budget_fertilizers',
                'name'=>'fertilizers',
                'class'=>'level2',
            ),
            array(
                'array'=>'budget_ppa',
                'name'=>'PPA',
                'class'=>'level2',
            ),
            array(
                'array'=>'budget_equipment',
                'name'=>'budget equipment',
                'class'=>'level2',
            ),
            array(
                'array'=>'budget_pay',
                'name'=>'budget pay',
                'class'=>'level2',
            ),
            array(
                'array'=>'gross_profit',
                'name'=>'gross profit',
                'class'=>'',
            ),
            array(
                'array'=>'profitability',
                'name'=>'profitability %',
                'class'=>'',
                ),

        );
    }
    public static function getMyCulture($db,$id_user,$id_culture=false){
        $where='';
        if($id_culture!=false) $where.='AND field_id_culture='.$id_culture;

        $result=$db->query("SELECT * FROM new_field WHERE id_user='$id_user' $where");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date  = $result->fetchAll();

        return $date;
    }
    public static function getBudget($db,$id_user,$field,$table){
        $sql1='AND (';
        $sql2='AND (';
        $sql3='AND (';
        foreach ($field as $arr_field)if($arr_field['field_id_culture']==TRUE){
            $sql1.="action_id_culture ='".$arr_field['field_id_culture']."' or ";
            $sql2.="na.action_id_culture ='".$arr_field['field_id_culture']."' or ";
            $sql3.="plane_sale_field ='".$arr_field['id_field']."' or ";
        }
        $sql1=substr($sql1, 0, -4).')';
        $sql2=substr($sql2, 0, -4).')';
        $sql3=substr($sql3, 0, -4).')';
        $result = $db->query("SELECT * FROM new_action_employee nae, new_employee ne where ne.id_employee = nae.action_employee_id_employee and nae.action_employee_id_action IN(SELECT action_id FROM new_action WHERE id_user = '$id_user' $sql1)");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['employee'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_action_equipment nae, new_equipment ne, new_vehicles nv where ne.id_equipment = nae.action_equipment_id and nv.id_vehicles = nae.action_vehicles_id and nae.action_equipment_action_id IN(SELECT action_id FROM new_action WHERE id_user = '$id_user' $sql1)");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['equipment'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_action_material nam, new_storage_material nsm WHERE nsm.storage_material_id = nam.id_material and nam.id_action IN(SELECT action_id FROM new_action WHERE id_user = '$id_user' $sql1)");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_field nf, new_action na WHERE na.action_id_culture = nf.field_id_culture and  na.id_user = '$id_user' $sql2");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_action_lib");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['operation']=$result->fetchAll();

        $result = $db->query("SELECT * FROM new_plane_sale WHERE id_user = '$id_user' $sql3");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['plane_revenues'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM sm_crop_head WHERE id_user = '$id_user' or id_user = 0");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data['crop_name'] = $result->fetchAll();
        foreach ($data['crop_name'] as $value){
            $crop_name[$value['id_crop']]=$value['name_crop_ua'];
        }
        $ex_date=array();
        $summ_area=0;
        foreach ($field as $arr_field){
            $summ_area+=$arr_field['field_size'];
        }
        foreach ($field as $arr_field){
            foreach ($table as $item){
                $ex_date[$item['array']][$arr_field['field_id_culture']]=0;
            }
            $proc_area[$arr_field['field_id_culture']]= $arr_field['field_size']/$summ_area*100; ;
            $ex_date['budget_crop_name'][$arr_field['field_id_culture']]=$arr_field['field_name'].'/'.$crop_name[$arr_field['field_id_crop']];

            foreach ($date['plane_revenues'] as $plane_revenues)if($arr_field['id_field']==$plane_revenues['plane_sale_field']) {
                $ex_date['plane_revenues'][$arr_field['field_id_culture']] = $plane_revenues['plane_sale_revenue'];
            }
            foreach ($date['action'] as $action)if($action['action_id_culture']==$arr_field['field_id_culture']) {
                foreach ($date['employee'] as $employee)if($action['action_id'] == $employee['action_employee_id_action']) {
                    $pay=$employee['action_employee_pay']*$action['field_size'];
                    $ex_date['action_pay'][$employee['action_employee_id_action']] += $pay;
                    $ex_date['budget_pay'][$arr_field['field_id_culture']]+=$pay;
                }
                foreach ($date['material'] as $material)if($action['action_id'] == $material['id_action']) {
                    $price_material=$material['action_material_norm']*$material['storage_sum_unit']*$action['field_size'];
                    $ex_date['action_material'][$material['id_action']] += $price_material;
                    $ex_date['budget_material'][$arr_field['field_id_culture']][$material['storage_type_material']] += $price_material;
                }
                foreach ($date['operation'] as $operation)if($action['action_action_id']==$operation['action_id']){
                    foreach ($date['equipment'] as $equipment)if($equipment['action_equipment_action_id']==$action['action_id']) {
                        $price_equipment = $operation['rate']*$action['field_size']*22;
                        $ex_date['action_equipment'][$equipment['action_equipment_action_id']] += $price_equipment;
                        $ex_date['budget_equipment'][$arr_field['field_id_culture']] += $price_equipment;
                    }
                }
            }
            $ex_date['budget_seeds'][$arr_field['field_id_culture']]=$ex_date['budget_material'][$arr_field['field_id_culture']][17];
            $ex_date['budget_fertilizers'][$arr_field['field_id_culture']]=$ex_date['budget_material'][$arr_field['field_id_culture']][18];
            $ex_date['budget_ppa'][$arr_field['field_id_culture']]=$ex_date['budget_material'][$arr_field['field_id_culture']][19];
            $ex_date['budget_cost'][$arr_field['field_id_culture']]=$ex_date['budget_seeds'][$arr_field['field_id_culture']]+ $ex_date['budget_fertilizers'][$arr_field['field_id_culture']]+$ex_date['budget_ppa'][$arr_field['field_id_culture']]+
                $ex_date['budget_equipment'][$arr_field['field_id_culture']]+$ex_date['budget_pay'][$arr_field['field_id_culture']];
                $ex_date['gross_profit'][$arr_field['field_id_culture']] = $ex_date['plane_revenues'][$arr_field['field_id_culture']]-$ex_date['budget_cost'][$arr_field['field_id_culture']];
                if($ex_date['budget_cost'][$arr_field['field_id_culture']]!=0) $ex_date['profitability'][$arr_field['field_id_culture']] = (($ex_date['plane_revenues'][$arr_field['field_id_culture']]-$ex_date['budget_cost'][$arr_field['field_id_culture']])/$ex_date['budget_cost'][$arr_field['field_id_culture']])*100;
        }
        return $ex_date;
    }




    public static function saveBudget($db, $id_user,$current_date,$current_time, $test){
        $db->query("INSERT INTO new_budget (id_user, data_save, time_save, budget) VALUES ('$id_user','$current_date','$current_time','$test')");
        return true;
    }

    public static function getSaveBudget($db,$id_user,$id_budget){
        $result = $db->query("SELECT * FROM new_budget WHERE id_user = '$id_user' AND id_budget=$id_budget");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }
    public static function getSaveBudgetList($db,$id_user){
        $result = $db->query("SELECT id_budget,data_save,time_save FROM new_budget WHERE id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }
}