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
                'name_ua'=>'Назва культури',
                'name_en'=>'Crop name',
                'class'=>'',
            ),
            array(
                'array'=>'plane_revenues',
                'name_ua'=>'Планові доходи',
                'name_en'=>'Plane revenues',
                'class'=>'',
                ),
            array(
                'array'=>'budget_cost',
                'name_ua'=>'Загальні витрати',
                'name_en'=>'Total costs',
                'class'=>'',
            ),
            array(
                'array'=>'budget_seeds',
                'name_ua'=>'Насіння',
                'name_en'=>'Seeds',
                'class'=>'level2',
                'href'=>'/new-farmer/budget/materials/1/'
            ),
            array(
                'array'=>'budget_fertilizers',
                'name_ua'=>'Добрива',
                'name_en'=>'Fertilizers',
                'class'=>'level2',
                'href'=>'/new-farmer/budget/materials/2/'
            ),
            array(
                'array'=>'budget_ppa',
                'name_ua'=>'ЗЗР',
                'name_en'=>'PPA',
                'class'=>'level2',
                'href'=>'/new-farmer/budget/materials/3/'
            ),
            array(
                'array'=>'budget_equipment',
                'name_ua'=>'Витрати на пальне',
                'name_en'=>'Fuel costs',
                'class'=>'level2',
                'href'=>'/new-farmer/budget/fuel/'
            ),
            array(
                'array'=>'budget_pay',
                'name_ua'=>'Зарплата',
                'name_en'=>'Salary',
                'class'=>'level2',
                'href'=>'/new-farmer/budget/salary/',
            ),
            array(
                'array'=>'other_costs',
                'name_ua'=>'Інші витрати',
                'name_en'=>'Other costs',
                'class'=>'level2',
            ),
            array(
                'array'=>'budget_repairs',
                'name_ua'=>'Витрати на ремонт',
                'name_en'=>'Repairs costs',
                'class'=>'level2',
            ),
            array(
                'array'=>'rent_pay',
                'name_ua'=>'Орендна плата',
                'name_en'=>'Rent pay',
                'class'=>'level2',
            ),
            array(
                'array'=>'budget_services',
                'name_ua'=>'services',
                'name_en'=>'services',
                'class'=>'level2',
            ),
            array(
                'array'=>'gross_profit',
                'name_ua'=>'Валовий прибуток',
                'name_en'=>'Gross profit',
                'class'=>'',
            ),
            array(
                'array'=>'profitability',
                'name_ua'=>'Рентабільність %',
                'name_en'=>'Profitability %',
                'class'=>'',
                ),

        );
    }
    public static function getTableCashFlow(){
        return array(
            array(
                'name_ua'=>'Стаття',
                'name_en'=>'Item',
                'array'=>'action',
                'class'=>''
            ),
            array(
                'name_ua'=>'1. Рух коштів в результаті операційної діяльності',
                'name_en'=>'1. Cash flow as a result of operating activities',
                'array'=>'cf_operating_activities',
                'class'=>''
            ),
            array(
                'name_ua'=>'Операційна діяльність - надходження',
                'name_en'=>'Operating activities - supply',
                'array'=>'revenue',
                'class'=>'level2'
            ),
            array(
                'name_ua'=>'Операційна діяльність - витрати',
                'name_en'=>'Operating activities - expenses',
                'array'=>'activities_costs',
                'class'=>'level2'
            ),
            array(
                'array'=>'budget_seeds',
                'name_ua'=>'Seeds',
                'class'=>'level3',
            ),
            array(
                'array'=>'budget_fertilizers',
                'name_ua'=>'Fertilizers',
                'class'=>'level3',
            ),
            array(
                'array'=>'budget_ppa',
                'name_ua'=>'PPA',
                'class'=>'level3',
            ),
            array(
                'array'=>'budget_equipment',
                'name_ua'=>'Fuel costs',
                'class'=>'level3',
            ),
            array(
                'array'=>'budget_pay',
                'name_ua'=>'Salary',
                'class'=>'level3',
            ),
            array(
                'array'=>'other_costs',
                'name'=>'Other costs',
                'class'=>'level2',
            ),
            array(
                'array'=>'rent_pay',
                'name_ua'=>'Rent pay',
                'class'=>'level3',
            ),
            array(
                'name_ua'=>'Чистий рух коштів від операційної діяльності',
                'name_en'=>'Net cash flow from operating activities',
                'array'=>'net_cash_flow',
                'class'=>''
            ),
            /*array(
                'name_ua'=>'2. Рух коштів у результаті інвестиційної діяльності',
                'name_en'=>'2. Cash flow as a result of investment activity',
                'php'=>'',
                'class'=>''
            ),
            array(
                'name_ua'=>'Інвестиційна діяльність - надходження',
                'name_en'=>'Cash flow as a result of investment activity',
                'php'=>'',
                'class'=>'level2'
            ),
            array(
                'name_ua'=>'Інвестиційна діяльність - витрати',
                'name_en'=>'Investment activity - expenses',
                'php'=>'',
                'class'=>'level2'
            ),
            array(
                'name_ua'=>'Чистий рух коштів від інвестиційної діяльності',
                'name_en'=>'Net cash flow from investing activities',
                'php'=>'',
                'class'=>''
            ),
            array(
                'name_ua'=>'3. Рух коштів у результаті фінансової діяльності',
                'name_en'=>'3. Cash flow as a result of financial activity',
                'php'=>'',
                'class'=>''
            ),
            array(
                'name_ua'=>'Фінансова діяльність - надходження',
                'name_en'=>'Financial activities - supply',
                'php'=>'',
                'class'=>'level2'
            ),
            array(
                'name_ua'=>'Фінансова діяльність - витрати',
                'name_en'=>'Financial activity - expenses',
                'php'=>'',
                'class'=>'level2'
            ),
            array(
                'name_ua'=>'Чистий рух коштів від фінансової діяльності',
                'name_en'=>'Net cash flow from financial activities',
                'php'=>'',
                'class'=>''
            ),*/
            array(
                'name_ua'=>'Всього надходження',
                'name_en'=>'Total supply',
                'array'=>'revenue2',
                'class'=>''
            ),
            array(
                'name_ua'=>'Всього витрати',
                'name_en'=>'Total costs',
                'array'=>'activities_costs',
                'class'=>''
            ),
            array(
                'name_ua'=>'Чистий рух грошових коштів за звітний період',
                'name_en'=>'Net cash flows for reporting period',
                'array'=>'net_cash_flow',
                'class'=>''
            ),
            /*array(
                'name_ua'=>'Залишок коштів на початок періоду',
                'name_en'=>'Balance at the beginning of the period',
                'php'=>'',
                'class'=>''
            ),
            array(
                'name_ua'=>'Залишок коштів на кінець періоду',
                'name_en'=>'Balance at the end of the period',
                'php'=>'',
                'class'=>''
            ),*/
        );
    }
    public static function getMyCulture($db,$id_user,$id_culture=false,$id_field=false){
        $where='';
        if($id_culture!=false) $where.='AND f.field_id_culture='.$id_culture;
        if($id_field!=false) $where.='AND f.id_field='.$id_field;

        $result=$db->query("SELECT * FROM new_field as f WHERE f.id_user='$id_user' AND f.field_status = '0' $where AND NOT f.field_id_culture = 0");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date  = $result->fetchAll();
        if($date==false){
            SRC::addAlert(true,1,'aa');
            SRC::redirect('/new-farmer/technology_card');
        }

        return $date;
    }
    public static function getNewBudget($db,$id_user,$field,$table,$remains=false){

        $sql1='AND (';
        $sql2='AND (';
        $sql3='AND (';
        foreach ($field as $arr_field)if($arr_field['field_id_culture']==TRUE){
            $sql1.="action_id_culture ='".$arr_field['field_id_culture']."' or ";
        }
        $sql1=substr($sql1, 0, -4).')';

        $result = $db->query("SELECT * FROM new_action_lib");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['operation']=$result->fetchAll();
        foreach ($date['operation'] as $lib_arr){
            $lib['operation'][$lib_arr['action_id']]=$lib_arr;
        }

        //операции
        $result = $db->query("SELECT * FROM new_action WHERE id_user='$id_user' $sql1 ORDER BY action_date_start ASC");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date['new_action'] = $result->fetchAll();

        //Материалы
        $result = $db->query("SELECT * FROM new_lib_material lm, new_material_price pm WHERE pm.id_user='$id_user' AND pm.id_lib_material=lm.id_material");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $materials = $result->fetchAll();
        $date['new_material']=array();
        foreach ($materials as $material){
            $date['new_material'][$material['id_material_price']]=$material;
        }

        //Рабочие
        $result = $db->query("SELECT * FROM new_employee WHERE id_user='$id_user' AND employee_status='0'");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $materials = $result->fetchAll();
        $employee=array();
        foreach ($employee as $employee_arr){
            $date['new_employee'][$employee_arr['id_employee']]=$employee_arr;
        }

        //Машины
        $result = $db->query("SELECT * FROM new_vehicles WHERE id_user=$id_user AND vehicles_status = '0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $vehicles= $result->fetchAll();
        $date['vehicles']=array();
        foreach ($vehicles as $vehicle){
            $date['vehicles'][$vehicle['id_vehicles']]=$vehicle;
        }

        //Оборудование
        $result = $db->query("SELECT * FROM new_equipment WHERE id_user=$id_user AND equipment_status = '0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $equipments= $result->fetchAll();
        $date['equipment']=array();
        foreach ($equipments as $equipment){
            $new_equipment['equipment'][$equipment['id_equipment']]=$equipment;
        }


        $result = $db->query("SELECT * FROM new_plane_sale WHERE id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['plane_revenues'] = $result->fetchAll();


        $result = $db->query("SELECT * FROM new_lib_crop WHERE id_user = '$id_user' or id_user = 0");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data['crop_name'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_rent WHERE id_user = '$id_user' and costs_type = '1'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['rent_pay'] = $result->fetch();
        //var_dump($date['rent_pay']['value']);die;

        $result = $db->query("SELECT * FROM new_plane_sale WHERE id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['plane_sale'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_other_costs WHERE id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['other_costs'] = $result->fetchAll();
        /*echo "<pre>";
        var_dump($date['other_costs']);die;*/
        foreach ($date['plane_sale'] as $plane_sale){
            $ex_plane_sale[$plane_sale['plane_sale_culture']]=$plane_sale;
        }

        foreach ($data['crop_name'] as $value){
            $crop_name[$value['id_crop']]= $value['name_crop_ua'];
        }
        $ex_date=array();
        $summ_area=0;
        $rev_m_c_summ=array();
        foreach ($field as $arr_field){
            $summ_area += $arr_field['field_size'];
            $rev_m_c_summ[$arr_field['field_id_crop']]+=$arr_field['field_size']*$arr_field['field_yield']*100;
        }
        foreach ($date['other_costs'] as $other_cost){
            if($other_cost['costs_type']=='3'){
                $others = $other_cost['costs_plan'];
            }
            elseif($other_cost['costs_type']=='2'){
                $repairs = $other_cost['costs_plan'];
            }
        }
        /*$others=100000;*/
        /*$repairs=200;*/
        foreach ($field as $arr_field) {
            $rent_pay[$arr_field['id_field']]=$arr_field['field_rent'];
            foreach ($table as $item) {
                $ex_date[$item['array']][$arr_field['id_field']] = 0;
                if ($ex_date['crop_' . $item['array']][$arr_field['field_id_crop']] == false) $ex_date['crop_' . $item['array']][$arr_field['field_id_crop']] = 0;
            }
            $rev_m_f[$arr_field['id_field']] = $arr_field['field_size'] * $arr_field['field_yield'] * 100;
            $proc_rew_mass[$arr_field['id_field']] = $rev_m_f[$arr_field['id_field']] / $rev_m_c_summ[$arr_field['field_id_crop']];
            $ex_date['plane_revenues'][$arr_field['id_field']] = $proc_rew_mass[$arr_field['id_field']] * $ex_plane_sale[$arr_field['field_id_crop']]['plane_sale_now'] * $ex_plane_sale[$arr_field['field_id_crop']]['plane_sale_avr_price'];
            $ex_date['crop_plane_revenues'][$arr_field['field_id_crop']] += $ex_date['plane_revenues'][$arr_field['id_field']];
            $proc_area[$arr_field['field_id_culture']] = $arr_field['field_size'] / $summ_area * 100;
            $ex_date['budget_crop_name'][$arr_field['id_field']] = $arr_field['field_name'] . '/' . $crop_name[$arr_field['field_id_crop']];

            $ex_date['crop_budget_crop_name'][$arr_field['field_id_crop']] = $crop_name[$arr_field['field_id_crop']];
            //Операции
            foreach ($date['new_action'] as $action)if($action['action_id_culture']==$arr_field['field_id_culture']){
                $act_data = explode('-', $action['action_date_start']);
                $act_data[1]=intval($act_data[0].$act_data[1]);

                $ex_date['month_active'][$act_data[1]]=true;
                //мaтериалы
                if(unserialize($action['action_materials'])!=false) foreach(unserialize($action['action_materials']) as $action_materials){
                    $price_material[$action['action_id']] = $action_materials['norm'] * $date['new_material'][$action_materials['id']]['price_material'] * $arr_field['field_size'];
                    $ex_date['budget_material'][$arr_field['id_field']][$date['new_material'][$action_materials['id']]['id_type_material']] += $price_material[$action['action_id']];

                    $ex_date['budget_material_month'][$act_data[1]][$date['new_material'][$action_materials['id']]['id_type_material']] += $price_material[$action['action_id']];

                    switch ($date['new_material'][$action_materials['id']]['id_type_material']){
                        case 1:
                            $ex_date['budget_seeds_month'][$act_data[1]]+=$price_material[$action['action_id']];
                            break;
                        case 2:
                            $ex_date['budget_fertilizers_month'][$act_data[1]]+=$price_material[$action['action_id']];
                            break;
                        case 3:
                            $ex_date['budget_ppa_month'][$act_data[1]]+=$price_material[$action['action_id']];
                            break;
                    }
                    if($remains==1){
                        $ex_date['remains'][$date['new_material'][$action_materials['id']]['id_type_material']][]=array(
                            'action'=>$lib['operation'][$action['action_action_id']]['name_en'],
                            'name'=>$date['new_material'][$action_materials['id']]['name_material'],
                            'norm'=>$action_materials['norm'],
                            'area'=>$arr_field['field_size'],
                            'summ_mass'=>$action_materials['norm']*$arr_field['field_size'],
                            'price'=>$date['new_material'][$action_materials['id']]['price_material'],
                            'summ_price'=>$price_material[$action['action_id']],
                        );
                    }
                }
                //Топливо
                if(unserialize($action['action_machines'])!=false){
                    if($remains==3) $ex_date['remains'][$action['action_id']]=array(
                        'id'=>$action['action_id'],
                        'action'=>$lib['operation'][$action['action_action_id']]['name_en'],
                    );
                    $row=0;
                    $row2=0;
                    foreach(unserialize($action['action_machines']) as $action_machines){
                        $price_equipment = $action_machines['fuel'] * ($action['action_work']) * 22;
                        $ex_date['budget_equipment'][$arr_field['id_field']] += $price_equipment;
                        $ex_date['crop_budget_equipment'][$arr_field['field_id_crop']] += $price_equipment;
                        $ex_date['budget_equipment_month'][$act_data[1]] += $price_equipment;
                        if($remains==3){
                            $row2++;
                            $ex_date['remains'][$action['action_id']]['equipment'][$row2]=array(
                                'id_v'=>$action_machines['id_veh'],
                                'vehicles_name'=>$date['vehicles'][$action_machines['id_veh']]['vehicles_name'],
                                'vehicles_manufacturer'=>$date['vehicles'][$action_machines['id_veh']]['vehicles_manufacturer'],
                                'vehicles_fuel'=>$date['vehicles'][$action_machines['id_veh']]['vehicles_fuel'],
                                'rate'=>$action_machines['fuel'],
                                'summ_price'=>$price_equipment,
                            );
                            $equipments[$row2] = explode(',', $action_machines['id_equ']);

                            foreach ($equipments[$row2] as $equipments_arr){
                                $row++;
                                $ex_date['remains'][$action['action_id']]['equipment'][$row2]['eq'][$row]=array(
                                    'equipment_name'=>$new_equipment['equipment'][$equipments_arr]['equipment_name'],
                                    'equipment_type'=>$new_equipment['equipment'][$equipments_arr]['equipment_type'],
                                    'equipment_kind'=>$new_equipment['equipment'][$equipments_arr]['equipment_kind'],
                                );
                            }
                        }
                        if($row>=$row2) $ex_date['remains'][$action['action_id']]['row']=$row;
                        if($row2>=$row) $ex_date['remains'][$action['action_id']]['row']=$row2;

                        if($row==false and $row2==false) $ex_date['remains'][$action['action_id']]['row']=0;
                    }
                }
                    //Зарплата
                    if(unserialize($action['action_employee'])!=false) foreach(unserialize($action['action_employee']) as $action_employee){
                        $pay_employee = $action_employee['pay'] * $action['action_work'];
                        $ex_date['budget_pay'][$arr_field['id_field']] += $pay_employee;
                        $ex_date['crop_budget_pay'][$arr_field['field_id_crop']] += $pay_employee;
                        $ex_date['budget_pay_month'][$act_data[1]] += $pay_employee;
                        if($remains==2){
                            $ex_date['remains'][]=array(
                                'action'=>$lib['operation'][$action['action_action_id']]['name_en'],
                                'name'=>$action_employee['id'],
                                'surname'=>$action_employee['id'],
                                'position'=>$action_employee['id'],
                                'pay'=>$action_employee['pay'],
                                'summ_pay'=>$pay_employee
                            );
                        }
                    }
                //Услуги
                if($action['action_services']!=false) foreach(unserialize($action['action_services']) as $action_service){
                    $pay_services=$action_service['amount']*$action_service['price'];
                    $ex_date['budget_services'][$arr_field['id_field']] += $pay_services;
                    $ex_date['crop_budget_services'][$arr_field['field_id_crop']] += $pay_services;
                    $ex_date['budget_services_month'][$act_data[1]] += $pay_services;
                }
                if($action['action_action_type_id']==27) $rev_data[$arr_field['id_field']]=$act_data[1];
            }

            $ex_date['budget_seeds'][$arr_field['id_field']] = $ex_date['budget_material'][$arr_field['id_field']][1];
            $ex_date['crop_budget_seeds'][$arr_field['field_id_crop']] += $ex_date['budget_seeds'][$arr_field['id_field']];

            $ex_date['budget_fertilizers'][$arr_field['id_field']] = $ex_date['budget_material'][$arr_field['id_field']][2];
            $ex_date['crop_budget_fertilizers'][$arr_field['field_id_crop']] += $ex_date['budget_fertilizers'][$arr_field['id_field']];

            $ex_date['budget_ppa'][$arr_field['id_field']] = $ex_date['budget_material'][$arr_field['id_field']][3];
            $ex_date['crop_budget_ppa'][$arr_field['field_id_crop']] += $ex_date['budget_ppa'][$arr_field['id_field']];

            $ex_date['rent_pay'][$arr_field['id_field']] = $rent_pay[$arr_field['id_field']]*$arr_field['field_size'];
            $ex_date['crop_rent_pay'][$arr_field['field_id_crop']] += $rent_pay[$arr_field['id_field']]*$arr_field['field_size'];
            $ex_date['rent_pay_all']+=$ex_date['rent_pay'][$arr_field['id_field']];
            $ex_date['budget_cost'][$arr_field['id_field']] = $ex_date['rent_pay'][$arr_field['id_field']]+$ex_date['budget_seeds'][$arr_field['id_field']] + $ex_date['budget_fertilizers'][$arr_field['id_field']] + $ex_date['budget_ppa'][$arr_field['id_field']] +
                $ex_date['budget_equipment'][$arr_field['id_field']] + $ex_date['budget_pay'][$arr_field['id_field']];
            $ex_date['crop_budget_cost'][$arr_field['field_id_crop']]+=$ex_date['budget_cost'][$arr_field['id_field']];
            $ex_date['budget_cost_total']+=$ex_date['budget_cost'][$arr_field['id_field']];

            $ex_date['plane_revenues_month'][$rev_data[$arr_field['id_field']]] += $ex_date['plane_revenues'][$arr_field['id_field']];
            $ex_date['plane_revenues_month_crop'][$arr_field['field_id_crop']][$rev_data[$arr_field['id_field']]] += $ex_date['plane_revenues'][$arr_field['id_field']];
            $ex_date['plane_name_crop'][$arr_field['field_id_crop']]=$crop_name[$arr_field['field_id_crop']];

        }

        foreach ($field as $arr_field) {
            $proc_cost[$arr_field['id_field']]=$ex_date['budget_cost'][$arr_field['id_field']]/$ex_date['budget_cost_total'];

            $ex_date['other_costs'][$arr_field['id_field']]=$others*$proc_cost[$arr_field['id_field']];
            $ex_date['crop_other_costs'][$arr_field['field_id_crop']]+=$ex_date['other_costs'][$arr_field['id_field']];
            $ex_date['other_costs_all']+=$ex_date['other_costs'][$arr_field['id_field']];

            $ex_date['budget_repairs'][$arr_field['id_field']]=$repairs*$proc_cost[$arr_field['id_field']];
            $ex_date['crop_budget_repairs'][$arr_field['field_id_crop']]+=$ex_date['budget_repairs'][$arr_field['id_field']];
            $ex_date['budget_repairs_all']+=$ex_date['budget_repairs'][$arr_field['id_field']];

            $ex_date['budget_cost'][$arr_field['id_field']]+=$ex_date['other_costs'][$arr_field['id_field']]+$ex_date['budget_repairs'][$arr_field['id_field']];

            $ex_date['crop_budget_cost'][$arr_field['field_id_crop']]+=$ex_date['other_costs'][$arr_field['id_field']]+$ex_date['budget_repairs'][$arr_field['id_field']];

            $ex_date['gross_profit'][$arr_field['id_field']] = $ex_date['plane_revenues'][$arr_field['id_field']] - $ex_date['budget_cost'][$arr_field['id_field']];
            $ex_date['crop_gross_profit'][$arr_field['field_id_crop']]+=$ex_date['gross_profit'][$arr_field['id_field']];
            if ($ex_date['budget_cost'][$arr_field['id_field']] != 0) $ex_date['profitability'][$arr_field['id_field']] = (($ex_date['plane_revenues'][$arr_field['id_field']] - $ex_date['budget_cost'][$arr_field['id_field']]) / $ex_date['budget_cost'][$arr_field['id_field']]) * 100;
            if ($ex_date['crop_budget_cost'][$arr_field['field_id_crop']] != 0) $ex_date['crop_profitability'][$arr_field['field_id_crop']] = (($ex_date['crop_plane_revenues'][$arr_field['field_id_crop']] - $ex_date['crop_budget_cost'][$arr_field['field_id_crop']]) / $ex_date['crop_budget_cost'][$arr_field['field_id_crop']]) * 100;
        }
        /*for ($x=1;$x<=9;$x++){
            $ex_date['month_active']['20170'.$x]=true;
        }
        for ($x=10;$x<=12;$x++){
            $ex_date['month_active']['2017'.$x]=true;
        }*/
        $coll_month=count($ex_date['month_active']);
        foreach ($ex_date['month_active'] as $x=>$true){
            $ex_date['rent_pay_month'][$x]+= $ex_date['rent_pay_all']/$coll_month;
            $ex_date['other_costs_month'][$x]=$ex_date['other_costs_all']/$coll_month;
            $ex_date['budget_repairs_month'][$x]=$ex_date['budget_repairs_all']/$coll_month;

            $ex_date['budget_cost_month'][$x]=$ex_date['rent_pay_month'][$x]+$ex_date['other_costs_month'][$x]+$ex_date['budget_repairs_month'][$x]+
                $ex_date['budget_pay_month'][$x]+$ex_date['budget_equipment_month'][$x]+$ex_date['budget_material_month'][$x][1]+$ex_date['budget_material_month'][$x][2]+$ex_date['budget_material_month'][$x][3]+
                $ex_date['budget_services_month'][$x];

            $ex_date['gross_profit_month'][$x] = $ex_date['plane_revenues_month'][$x]-$ex_date['budget_cost_month'][$x];
        }
        ksort($ex_date['month_active']);
        return $ex_date;
    }
    //
    public static function getBudget($db,$id_user,$field,$table,$remains=false){
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

        $result = $db->query("SELECT * FROM new_action_equipment nae, new_vehicles nv where nv.id_vehicles = nae.action_vehicles_id and nae.action_equipment_action_id IN(SELECT action_id FROM new_action WHERE id_user = '$id_user' $sql1)");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['equipment'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_equipment where id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['new_equipment'] = $result->fetchAll();
        foreach ( $date['new_equipment'] as $new_equipment_arr){
            $new_equipment[$new_equipment_arr['id_equipment']]=$new_equipment_arr;
        }

        $result = $db->query("SELECT * FROM new_action_material nam, new_storage_material nsm WHERE nsm.storage_material_id = nam.id_material and nam.id_action IN(SELECT action_id FROM new_action WHERE id_user = '$id_user' $sql1)");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_planing_material WHERE id_user=$id_user ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['planing_material'] = $result->fetchAll();

        foreach ($date['planing_material'] as $value){
            $planing_material[$value['planing_id_material']]=$value;
        }

        $result = $db->query("SELECT * FROM  new_action na WHERE na.id_user = '$id_user' $sql2 ORDER BY na.action_date_start ASC");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_action_lib");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['operation']=$result->fetchAll();
        foreach ($date['operation'] as $lib_arr){
            $lib['operation'][$lib_arr['action_id']]=$lib_arr;
        }

        $result = $db->query("SELECT * FROM new_plane_sale WHERE id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['plane_revenues'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_lib_crop WHERE id_user = '$id_user' or id_user = 0");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data['crop_name'] = $result->fetchAll();

       /* $result = $db->query("SELECT * FROM new_rent WHERE id_user = '$id_user' and costs_type = '1'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['rent_pay'] = $result->fetch();
        //var_dump($date['rent_pay']['value']);die;*/

        $result = $db->query("SELECT * FROM new_plane_sale WHERE id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['plane_sale'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_other_costs WHERE id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['other_costs'] = $result->fetchAll();
        /*echo "<pre>";
        var_dump($date['other_costs']);die;*/
        foreach ($date['plane_sale'] as $plane_sale){
            $ex_plane_sale[$plane_sale['plane_sale_culture']]=$plane_sale;
        }

        foreach ($data['crop_name'] as $value){
            $crop_name[$value['id_crop']]= $value['name_crop_ua'];
        }

        $ex_date=array();
        $summ_area=0;
        $rev_m_c_summ=array();
        foreach ($field as $arr_field){
            $summ_area += $arr_field['field_size'];
            $rev_m_c_summ[$arr_field['field_id_crop']]+=$arr_field['field_size']*$arr_field['field_yield']*100;
        }

        foreach ($field as $arr_field) {
            foreach ($table as $item) {
                $ex_date[$item['array']][$arr_field['id_field']] = 0;
                if($ex_date['crop_'.$item['array']][$arr_field['field_id_crop']]==false)$ex_date['crop_'.$item['array']][$arr_field['field_id_crop']] = 0;
            }
            $rev_m_f[$arr_field['id_field']]=$arr_field['field_size']*$arr_field['field_yield']*100;
            $proc_rew_mass[$arr_field['id_field']]=$rev_m_f[$arr_field['id_field']]/$rev_m_c_summ[$arr_field['field_id_crop']];
            $ex_date['plane_revenues'][$arr_field['id_field']]=$proc_rew_mass[$arr_field['id_field']]*$ex_plane_sale[$arr_field['field_id_crop']]['plane_sale_now']*$ex_plane_sale[$arr_field['field_id_crop']]['plane_sale_avr_price'];
            $ex_date['crop_plane_revenues'][$arr_field['field_id_crop']]+=$ex_date['plane_revenues'][$arr_field['id_field']];
            //var_dump($proc_rew_mass);
            $proc_area[$arr_field['field_id_culture']] = $arr_field['field_size'] / $summ_area * 100;
            $ex_date['budget_crop_name'][$arr_field['id_field']] = $arr_field['field_name'] . '/' . $crop_name[$arr_field['field_id_crop']];

            $ex_date['crop_budget_crop_name'][$arr_field['field_id_crop']] = $crop_name[$arr_field['field_id_crop']];

            foreach ($date['action'] as $action) if ($action['action_id_culture'] == $arr_field['field_id_culture']) {
                //Плановые материалы
                //var_dump($action['action_id']);
                $materials[$action['action_id']] = explode(',', $action['action_materials']);
                $act_data = explode('-', $action['action_date_start']);
                $act_data[1]=intval($act_data[1]);
                foreach ($materials[$action['action_id']] as $key) if ($action['action_materials'] != 0) {
                    $price_material[$action['action_id']] = $planing_material[$key]['planing_norm'] * $planing_material[$key]['planing_price'] * $arr_field['field_size'];
                    if($remains==1){
                        $ex_date['remains'][$planing_material[$key]['planing_type_material']][]=array(
                            'action'=>$lib['operation'][$action['action_action_id']]['name_en'],
                            'name'=>$planing_material[$key]['planing_material_name'],
                            'norm'=>$planing_material[$key]['planing_norm'],
                            'area'=>$arr_field['field_size'],
                            'summ_mass'=>$planing_material[$key]['planing_norm']*$arr_field['field_size'],
                            'price'=>$planing_material[$key]['planing_price'],
                            'summ_price'=>$price_material[$action['action_id']],
                        );
                    }
                    $ex_date['action_material'][$action['action_id']] += $price_material[$action['action_id']];
                    $ex_date['budget_material'][$arr_field['id_field']][$planing_material[$key]['planing_type_material']] += $price_material[$action['action_id']];
                    $ex_date['budget_material_month'][$act_data[1]][$planing_material[$key]['planing_type_material']] += $price_material[$action['action_id']];
                    $ex_date['crop_budget_material'][$arr_field['field_id_crop']][$planing_material[$key]['planing_type_material']] += $price_material[$action['action_id']];
                    $price_material[$action['action_id']] = 0;
                    $ex_date['needed_material'][$key]['planing_norm'] += $planing_material[$key]['planing_norm']*$arr_field['field_size'];
                    $ex_date['needed_material'][$key]['name'] = $planing_material[$key]['planing_material_name'];
                    $ex_date['needed_material'][$key]['type'] = $planing_material[$key]['planing_type_material'];
                    $ex_date['needed_material'][$key]['subtype_material'] = $planing_material[$key]['planing_subtype_material'];
                    $ex_date['needed_material'][$key]['planing_unit'] = $planing_material[$key]['planing_unit_material'];
                    $ex_date['needed_material_field'][$key][] = array(
                        'action' => $lib['operation'][$action['action_action_id']]['name_en'],
                        'field_name' => $arr_field['field_name'],
                        'planing_norm' => $planing_material[$key]['planing_norm'] * $arr_field['field_size'],
                        'crop' => $crop_name[$arr_field['field_id_crop']]
                    );
                }
                foreach ($date['employee'] as $employee) if ($action['action_id'] == $employee['action_employee_id_action']) {
                    $pay = $employee['action_employee_pay'] * ($action['action_work']*$arr_field['field_size']);
                    $ex_date['action_pay'][$employee['action_employee_id_action']] += $pay;
                    $ex_date['budget_pay'][$arr_field['id_field']] += $pay;
                    $ex_date['budget_pay_month'][$act_data[1]] += $pay;
                    $ex_date['crop_budget_pay'][$arr_field['field_id_crop']] += $pay;
                    if($remains==2){
                        $ex_date['remains'][]=array(
                            'action'=>$lib['operation'][$action['action_action_id']]['name_en'],
                            'name'=>$employee['employee_name'],
                            'surname'=>$employee['employee_surname'],
                            'position'=>$employee['employee_position'],
                            'pay'=>$employee['action_employee_pay'],
                            'summ_pay'=>$pay
                        );
                    }
                    $pay=0;
                }
                $price_equipment = $lib['operation'][$action['action_action_id']]['rate'] * ($action['action_work']*$arr_field['field_size']) * 22;
                $ex_date['budget_equipment'][$arr_field['id_field']] += $price_equipment;
                $ex_date['budget_equipment_month'][$act_data[1]] += $price_equipment;
                $ex_date['crop_budget_equipment'][$arr_field['field_id_crop']] += $price_equipment;

                $price_equipment=0;
                $row=0;
                $row2=0;
                foreach ($date['equipment'] as $equipment) if ($equipment['action_equipment_action_id'] == $action['action_id']) {
                    if($remains==3){
                        $row2++;
                        $ex_date['remains'][$action['action_id']]['equipment'][$equipment['id_action_equipment']]=array(
                            'id_v'=>$equipment['id_action_equipment'],
                            'vehicles_name'=>$equipment['vehicles_name'],
                            'vehicles_manufacturer'=>$equipment['vehicles_manufacturer'],
                            'vehicles_fuel'=>$equipment['vehicles_fuel'],

                        );
                        $equipments[$equipment['id_action_equipment']] = explode(',', $equipment['action_equipment_id']);
                        foreach ($equipments[$equipment['id_action_equipment']] as $equipments_arr){
                            $row++;
                            $ex_date['remains'][$action['action_id']]['equipment'][$equipment['id_action_equipment']]['eq'][]=array(
                                'equipment_name'=>$new_equipment[$equipments_arr]['equipment_name'],
                                'equipment_type'=>$new_equipment[$equipments_arr]['equipment_type'],
                                'equipment_kind'=>$new_equipment[$equipments_arr]['equipment_kind'],

                            );
                        }
                    }
                }
                if($row>=$row2) $ex_date['remains'][$action['action_id']]['row']=$row;
                if($row2>=$row) $ex_date['remains'][$action['action_id']]['row']=$row2;

                if($row==false and $row2==false) $ex_date['remains'][$action['action_id']]['row']=0;
                //$ex_date['action_equipment'][$equipment['action_equipment_action_id']] += $price_equipment;
                //
                if($action['action_action_type_id']==27) $rev_data[$arr_field['id_field']]=intval($act_data[1]);
            }
            $plane_sales = 0;
            foreach ($date['plane_sale'] as $plane_sale){
                $plane_sales += $plane_sale['plane_sale_revenue'];
            }
            $ex_date['plane_revenues_month'][$rev_data[$arr_field['id_field']]] += $ex_date['plane_revenues'][$arr_field['id_field']];
            $ex_date['plane_revenues_month_crop'][$arr_field['field_id_crop']][$rev_data[$arr_field['id_field']]] += $ex_date['plane_revenues'][$arr_field['id_field']];
            $ex_date['plane_name_crop'][$arr_field['field_id_crop']]=$crop_name[$arr_field['field_id_crop']];

            foreach ($date['action'] as $action){
                $act_data = explode('-', $action['action_date_start']);
                $data_action=intval($act_data[1]);
                //var_dump($data_action);
                if($action['action_action_id']==27) $rev_data[$arr_field['id_field']]=$data_action;
                $ex_date['crop_budget_seeds_month'][$data_action] = $ex_date['budget_material_month'][$data_action][17];
                $ex_date['crop_budget_fertilizers_month'][$data_action] += $ex_date['budget_material_month'][$data_action][18];
                $ex_date['crop_budget_ppa_month'][$data_action] = $ex_date['budget_material_month'][$data_action][19];
                /*$ex_date['crop_budget_cost_month'][$act_data[1]] = $ex_date['crop_budget_seeds_month'][$act_data[1]]+$ex_date['budget_equipment_month'][$act_data[1]]+
                    $ex_date['budget_pay_month'][$act_data[1]] + $ex_date['crop_budget_fertilizers_month'][$act_data[1]] + $ex_date['crop_budget_ppa_month'][$act_data[1]]+$ex_date['rent_pay_all']/12;
                */
                /*if ($ex_date['crop_budget_cost_month'][$data_action] != 0) $ex_date['profitability_month'][$act_data[1]] =
                    (($ex_date['plane_revenues_month'][$data_action] - $ex_date['crop_budget_cost_month'][$act_data[1]]) / $ex_date['crop_budget_cost_month'][$act_data[1]]) * 100;
            */
            }
            //var_dump($ex_date['crop_budget_seeds_month']);
            for($x=0;$x<=12;$x++){
                $ex_date['crop_budget_cost_month'][$x]=$ex_date['crop_budget_seeds_month'][$x]+$ex_date['budget_equipment_month'][$x]+
                    $ex_date['budget_pay_month'][$x] + $ex_date['crop_budget_fertilizers_month'][$x] + $ex_date['crop_budget_ppa_month'][$x]+$ex_date['rent_pay_all']/12;
                $ex_date['gross_profit_month'][$x] = $ex_date['plane_revenues_month'][$x]-$ex_date['crop_budget_cost_month'][$x];
            }

            $ex_date['rent_pay'][$arr_field['id_field']] = $arr_field['field_rent']*$arr_field['field_size'];
//            var_dump($ex_date['rent_pay'][$arr_field['id_field']] );
            $ex_date['crop_rent_pay'][$arr_field['field_id_crop']] += $arr_field['field_rent']*$arr_field['field_size'];
            $ex_date['rent_pay_all'] += $ex_date['crop_rent_pay'][$arr_field['field_id_crop']];
            //$ex_date['rent_pay'][$arr_field['field_id_crop']] =  $ex_date['crop_rent_pay'][$arr_field['field_id_crop']];
            $ex_date['budget_seeds'][$arr_field['id_field']] = $ex_date['budget_material'][$arr_field['id_field']][17];
            $ex_date['crop_budget_seeds'][$arr_field['field_id_crop']] += $ex_date['budget_seeds'][$arr_field['id_field']];

            $ex_date['budget_fertilizers'][$arr_field['id_field']] = $ex_date['budget_material'][$arr_field['id_field']][18];
            $ex_date['crop_budget_fertilizers'][$arr_field['field_id_crop']] += $ex_date['budget_material'][$arr_field['id_field']][18];

            $ex_date['budget_ppa'][$arr_field['id_field']] += $ex_date['budget_material'][$arr_field['id_field']][19];
            $ex_date['crop_budget_ppa'][$arr_field['field_id_crop']] += $ex_date['budget_ppa'][$arr_field['id_field']];

            $ex_date['budget_cost'][$arr_field['id_field']] = $ex_date['rent_pay'][$arr_field['id_field']]+$ex_date['budget_seeds'][$arr_field['id_field']] + $ex_date['budget_fertilizers'][$arr_field['id_field']] + $ex_date['budget_ppa'][$arr_field['id_field']] +
                $ex_date['budget_equipment'][$arr_field['id_field']] + $ex_date['budget_pay'][$arr_field['id_field']];

            $ex_date['budget_cost_total']+=$ex_date['budget_cost'][$arr_field['id_field']];

            $ex_date['crop_budget_cost'][$arr_field['field_id_crop']] += $ex_date['budget_cost'][$arr_field['id_field']];

            //$ex_date['plane_revenues'] += $date['plane_sale'][0]['plane_sale_revenue'];
        }
        if($date['other_costs'][0]['costs_fact'] == 0){
            $repairs=$date['other_costs'][0]['costs_plan'];
        }else{
            $repairs=$date['other_costs'][0]['costs_fact'];
        }

        $others=$date['other_costs'][1]['costs_plan'];


        foreach ($field as $arr_field) {
            $proc_cost[$arr_field['id_field']]=$ex_date['budget_cost'][$arr_field['id_field']]/$ex_date['budget_cost_total'];

            $ex_date['other_costs'][$arr_field['id_field']]=$others*$proc_cost[$arr_field['id_field']];
            $ex_date['crop_other_costs'][$arr_field['field_id_crop']]+=$ex_date['other_costs'][$arr_field['id_field']];

            $ex_date['budget_repairs'][$arr_field['id_field']]=$repairs*$proc_cost[$arr_field['id_field']];
            $ex_date['crop_budget_repairs'][$arr_field['field_id_crop']]+=$ex_date['budget_repairs'][$arr_field['id_field']];


            $ex_date['budget_cost'][$arr_field['id_field']]+=$ex_date['other_costs'][$arr_field['id_field']]+$ex_date['budget_repairs'][$arr_field['id_field']];

            $ex_date['crop_budget_cost'][$arr_field['field_id_crop']]+=$ex_date['other_costs'][$arr_field['id_field']]+$ex_date['budget_repairs'][$arr_field['id_field']];

            $ex_date['gross_profit'][$arr_field['id_field']] = $ex_date['plane_revenues'][$arr_field['id_field']] - $ex_date['budget_cost'][$arr_field['id_field']];
            $ex_date['crop_gross_profit'][$arr_field['field_id_crop']]+=$ex_date['gross_profit'][$arr_field['id_field']];
            if ($ex_date['budget_cost'][$arr_field['id_field']] != 0) $ex_date['profitability'][$arr_field['id_field']] = (($ex_date['plane_revenues'][$arr_field['id_field']] - $ex_date['budget_cost'][$arr_field['id_field']]) / $ex_date['budget_cost'][$arr_field['id_field']]) * 100;
            if ($ex_date['crop_budget_cost'][$arr_field['field_id_crop']] != 0) $ex_date['crop_profitability'][$arr_field['field_id_crop']] = (($ex_date['crop_plane_revenues'][$arr_field['field_id_crop']] - $ex_date['crop_budget_cost'][$arr_field['field_id_crop']]) / $ex_date['crop_budget_cost'][$arr_field['field_id_crop']]) * 100;

        }
        die;
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