<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 31.07.2017
 * Time: 11:19
 */
class TechnologyCard{
    public static function editAction($action_id,$id_user,$id_action,$id_action_type,$start_date,$end_date,$unit){
        $db = Db::getConnection();

        $db->query("UPDATE new_action SET action_action_id='$id_action',action_action_type_id='$id_action_type',
  action_date_start='$start_date',action_date_end='$end_date',action_unit='$unit'
 WHERE id_user ='$id_user' AND action_id='$action_id'");

        return true;
    }
    public static function removeActionAdd($action_id,$id_user){
        $db = Db::getConnection();
        $db->query("DELETE FROM new_action_employee WHERE action_employee_id_action='$action_id' AND action_employee_id_user='$id_user'");
        $db->query("DELETE FROM new_action_equipment WHERE action_equipment_action_id='$action_id' AND id_user='$id_user'");
        $db->query("DELETE FROM new_action_material WHERE id_action='$action_id' AND id_user='$id_user'");



        return true;
    }
    public static function getNewAction($id_user,$id_culture){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM new_action WHERE id_user='$id_user' AND action_id_culture=$id_culture");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date['new_action'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_action_employee ac,new_employee em WHERE ac.action_employee_id_user='$id_user' AND ac.action_employee_id_employee=em.id_employee");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $action_employee = $result->fetchAll();

        foreach ($action_employee as $employee){
            $date['new_action_employee'][$employee['action_employee_id_action']][]=$employee;
        }


        $result = $db->query("SELECT * FROM new_action_material am, new_storage_material st WHERE am.id_user='$id_user' AND am.id_material=st.storage_material_id");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $action_material = $result->fetchAll();

        foreach ($action_material as $material){
            $date['new_action_material'][$material['id_action']][]=$material;
        }


        $result = $db->query("SELECT * FROM new_action_equipment eq WHERE eq.id_user='$id_user' ");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $action_equipment = $result->fetchAll();

        foreach ($action_equipment as $equipment){
            $date['new_action_equipment'][$equipment['action_equipment_action_id']][]=$equipment;
        }
        return $date;

    }
	public static function getTechnologyCard($id_user, $id_crop=false){
        $db = Db::getConnection();
        $crop=false;
        if($id_crop!=false)$crop='AND c.id_crop='.$id_crop;
        $result = $db->query("SELECT * FROM sm_crop_head h, new_crop_culture c WHERE c.id_user = '$id_user' AND c.id_crop=h.id_crop $crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
	}

	public static function getFieldManagement($id_user,$id){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM sm_crop_head ch, new_field nf WHERE ch.id_crop = nf.field_id_crop and  nf.id_user = '$id_user' and nf.id_field = '$id'");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }

    public static function getField($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_field WHERE id_user = '$id_user'");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }

    public static function createTechnologyCard($id_user,$name,$id_crop){
        $db = Db::getConnection();
        $db->query("INSERT INTO new_crop_culture (id_user,id_crop, tech_name) VALUES ('$id_user','$id_crop','$name')");
        $id_culture = $db->lastInsertId();
        return $id_culture;
    }
    public static function editField($id_user,$id_field,$id_culture){
        $db = Db::getConnection();
        $db->query("UPDATE new_field SET field_id_culture='$id_culture' WHERE id_user ='$id_user' AND id_field='$id_field'");
        return true;
    }

    public static function getEmploye($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_employee WHERE id_user = '$id_user' and employee_status ='0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }
    public static function getStorage($id_user){
        $db= Db::getConnection();
        $result = $db->query("SELECT * FROM new_storage_material as m, new_storage as s WHERE storage_id_user=$id_user AND m.storage_location=s.storage_id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date= $result->fetchAll();
        return $date;
    }

    public static function getEquipment($id_user){
        $db= Db::getConnection();
        $result = $db->query("SELECT * FROM new_vehicles WHERE id_user=$id_user AND vehicles_status = '0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['vehicles']= $result->fetchAll();

        foreach ($date['vehicles'] as $vehicle){
            $date['TC']['vehicles'][$vehicle['id_vehicles']]=$vehicle;
        }

        $result = $db->query("SELECT * FROM new_equipment WHERE id_user=$id_user AND equipment_status = '0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['equipment']= $result->fetchAll();

        foreach ($date['equipment'] as $equipment){
            $date['TC']['equipment'][$equipment['id_equipment']]=$equipment;
        }

        return $date;
    }




    public static function createAction($id_user,$id_action,$id_action_type,$start_date,$end_date,$unit,$crop_id){
        $db = Db::getConnection();
        $db->query("INSERT INTO new_action (id_user,action_action_id,action_action_type_id,action_date_start,action_date_end,action_unit,action_id_culture) 
                                  VALUES ('$id_user','$id_action','$id_action_type','$start_date','$end_date','$unit','$crop_id')");
        $action_id = $db->lastInsertId();
        return $action_id;
    }
    public static function createActionEmployee($save_employee){
        $db = Db::getConnection();
        $db->query("INSERT INTO new_action_employee (action_employee_id_user,action_employee_id_action,action_employee_id_employee, action_employee_pay) 
        VALUES $save_employee");

        return true;
    }
    public static function createActionMaterial($save_material){
        $db = Db::getConnection();
        $db->query("INSERT INTO new_action_material (id_user,id_action,id_material,action_material_norm)
        VALUES $save_material");
        return true;
    }
    public static function createActionVehicles($save_vehicles){
        $db = Db::getConnection();
        $db->query("INSERT INTO new_action_equipment (id_user, action_equipment_action_id, action_vehicles_id, action_equipment_id) 
        VALUES $save_vehicles");
    }


    public static function costsTechnologyCard($id_culture, $id_user){
        
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM new_action_employee nae, new_employee ne where ne.id_employee = nae.action_employee_id_employee and nae.action_employee_id_action IN(SELECT action_id FROM new_action WHERE action_id_culture = '$id_culture' and id_user = '$id_user')");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['employee'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_action_equipment nae, new_equipment ne, new_vehicles nv where ne.id_equipment = nae.action_equipment_id and nv.id_vehicles = nae.action_vehicles_id and nae.action_equipment_action_id IN(SELECT action_id FROM new_action WHERE action_id_culture = '$id_culture' and id_user = '$id_user')");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['equipment'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_action_material nam, new_storage_material nsm WHERE nsm.storage_material_id = nam.id_material and nam.id_action IN(SELECT action_id FROM new_action WHERE action_id_culture = '$id_culture' and id_user = '$id_user')");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material'] = $result->fetchAll();


        $result = $db->query("SELECT * FROM new_field nf, new_action na WHERE na.action_id_culture = nf.field_id_culture and na.action_id_culture = '$id_culture' and na.id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action'] = $result->fetchAll();
    
        $result = $db->query("SELECT * FROM new_action_lib");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['operation']=$result->fetchAll();

/*        foreach ($date['operation'] as $operation){
            $date['operation'][$operation['action_id']]=$operation['name_en'];
        }*/



        foreach ($date['action'] as $action) {
            foreach ($date['employee'] as $employee)if($action['action_id'] == $employee['action_employee_id_action']) {
                  $date['sum_pay'][$employee['action_employee_id_action']] += $employee['action_employee_pay'];    
            }


            foreach ($date['material'] as $material)if($action['action_id'] == $material['id_action']) {
                  $date['sum_material'][$material['id_action']] += $material['action_material_norm']*$material['storage_sum_unit']*$action['field_size'];    
            }

            foreach ($date['operation'] as $operation)if($action['action_action_id']==$operation['action_id']){
                foreach ($date['equipment'] as $equipment)if($equipment['action_equipment_action_id']==$action['action_id']) {
                    $date['sum_equipment'][$equipment['action_equipment_action_id']] += $operation['rate']*$action['field_size'];
                }
            }
        }

        foreach ($date['material'] as $material){
            $date['sum_type_material'][$material['storage_type_material']] += $material['action_material_norm']*$material['storage_sum_unit']*$action['field_size'];    
        }

    
        return $date;
    }


    

}