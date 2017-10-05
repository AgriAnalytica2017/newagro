<?php
return array(
    'new-farmer/referral'=>'referral/referral',
    'new-farmer/success_payment'=>'payment/addPayment',
    'new-farmer/create_payment'=>'payment/createPayment',



    'new-farmer/test_react'=>'plan/index',
    'new-farmer/graphs'=>'graphs/getGraphs',
    'new-farmer/load_his'=>'graphs/jsonHis',

    'new-farmer/forma50/([0-9]+)'=>'forma50/getForma/$1',
    'new-farmer/saveForma50'=>'forma50/saveForma50',
    'new-farmer/forma/([0-9]+)'=>'forma50/getForm/$1',
    'new-farmer/save-form/([0-9]+)'=>'forma50/saveForm/$1',



    'new-farmer/other_cost'=>'otherCosts/getOtherCost',
    'new-farmer/save_other_cost'=>'otherCosts/savePlanOther',
    'new-farmer/create_other_fact'=>'otherCosts/createOtherFact',
    'new-farmer/edit_other_costs_plan'=>'otherCosts/editOtherPlan',
    'new-farmer/edit_other_costs_fact'=>'otherCosts/editOtherFact',
    'new-farmer/remove_other_costs/([0-9]+)'=>'otherCosts/removeOtherCosts/$1',
    'new-farmer/remove_other_costs_fact/([0-9]+)'=>'otherCosts/removeOtherCostsFact/$1',

    'new-farmer/materials'=>'material/getMaterials',
    'new-farmer/save_material_bd'=>'material/createMaterial',
    'new-farmer/save_edit_material_bd'=>'material/saveEditMaterial',
    'new-farmer/remove_material/([0-9]+)'=>'material/removeMaterial/$1',
    'new-farmer/all_needed_material'=>'material/getAllNeedMaterial',
    'new-farmer/change_price_material'=>'material/changeMaterialPrice',

    'new-farmer/save_rent'=>'fieldManagement/saveRentPay',
    'new-farmer/save_costs'=>'fieldManagement/saveCosts',

    'new-farmer/sales_price'=>'sales/addSalePrice',
    'new-farmer/add_price'=>'sales/addPrice',
    'new-farmer/sales'=>'sales/sales',
    'new-farmer/create_sales'=>'sales/createSales',
    'new-farmer/plane_sale'=>'sales/planeSale',
    'new-farmer/create_actual_sale'=>'sales/actualSale',

    'new-farmer/storage'=>'storage/storage',
    'new-farmer/create_storage'=>'storage/createStorage',
    'new-farmer/incoming_storage'=>'storage/incomingStorage',
    'new-farmer/incoming_products'=>'storage/incomingProducts',

    'new-farmer/create_material'=>'technologyCard/createMaterial',
    'new-farmer/costs_technology_card/([0-9]+)'=>'technologyCard/costsTechnologyCard/$1',
    'new-farmer/update_action'=>'technologyCard/updateActionPlan',
    'new-farmer/edit_technology_card'=>'technologyCard/editTechnologyCard',
    'new-farmer/save_edit_technology_card'=>'technologyCard/saveEditTechnologyCard',
    'new-farmer/create_technology_card'=>'technologyCard/createTechnologyCard',
    'new-farmer/list_technology_card'=>'technologyCard/listTechnologyCard',
    'new-farmer/technology_card/([0-9]+)'=>'technologyCard/technologyCard/$1',
    'new-farmer/technology_card'=>'technologyCard/technologyCard/0',
    'new-farmer/change_tech_cart'=>'technologyCard/changeTechCart',
    'new-farmer/create_new_tech_cart'=>'technologyCard/createNewTech',
    'new-farmer/remove_technology_card/([0-9]+)'=>'technologyCard/removeTech/$1',
    'new-farmer/remove_operation/([0-9]+)'=>'technologyCard/removeOperation/$1',
    'new-farmer/copy_technology_card/([0-9]+)'=>'technologyCard/copyTech/$1',
    'new-farmer/copy_technology_template'=>'technologyCard/copyTechTemplate',
    'new-farmer/copy_tech_field/([0-9]+)/([0-9]+)/([0-9]+)'=>'technologyCard/copyTechField/$1/$2/$3',

    'new-farmer/equipment'=>'equipment/equipment',
    'new-farmer/create_equipment'=>'equipment/createEquipment',
    'new-farmer/edit_equipment'=>'equipment/editEquipment',
    'new-farmer/remove_equipment/([0-9]+)'=>'equipment/removeEquipment/$1',


    'new-farmer/vehicles'=>'vehicles/vehicles',
    'new-farmer/create_vehicles'=>'vehicles/createVehicles',
    'new-farmer/edit_vehicles'=>'vehicles/editVehicles',
    'new-farmer/remove_vehicles/([0-9]+)'=>'vehicles/removeVehicles/$1',

	'new-farmer/employee'=>'employee/Employee',
	'new-farmer/create_employee'=>'employee/createEmployee',
	'new-farmer/edit_employee'=>'employee/editEmployee',
	'new-farmer/remove_employee/([0-9]+)'=>'employee/removeEmployee/$1',

    'new-farmer/edit_field'=>'fieldManagement/editField',
	'new-farmer/field_management'=>'fieldManagement/fieldManagement',
    'new-farmer/create_new_field'=>'fieldManagement/createFieldManagement',
    'new-farmer/remove_field/([0-9]+)'=>'fieldManagement/removeField/$1',
    'new-farmer/edit_all_field'=>'fieldManagement/editAllField',

    'new-farmer/budget/materials/([0-9]+)/([0-9]+)'=>'budget/remainsMaterial/$1/$2',
    'new-farmer/budget/salary/([0-9]+)'=>'budget/remainsSalary/$1',
    'new-farmer/budget/fuel/([0-9]+)'=>'budget/remainsFuel/$1',
    'new-farmer/budget/services/([0-9]+)'=>'budget/remainsServices/$1',

    'new-farmer/budget/fact_materials/([0-9]+)/([0-9]+)'=>'budget/factRemainsMaterials/$1/$2',
    'new-farmer/budget/fact_salary/([0-9]+)'=>'budget/factEmployeeSalary/$1',
    'new-farmer/budget/fact_services/([0-9]+)'=>'budget/factRemainsServices/$1',
    'new-farmer/budget/fact_fuel/([0-9]+)'=>'budget/factRemainsFuel/$1',
    'new-farmer/budget/fact_revenues/([0-9]+)'=>'budget/factRevenues/$1',

    'new-farmer/budget/crop_materials/([0-9]+)/([0-9]+)'=>'budget/cropRemainsMaterials/$1/$2',
    'new-farmer/budget/crop_services/([0-9]+)'=>'budget/cropRemainsServices/$1',
    'new-farmer/budget/crop_salary/([0-9]+)'=>'budget/cropEmployeeSalary/$1',
    'new-farmer/budget/crop_fuel/([0-9]+)'=>'budget/cropFuelRemains/$1',

    'new-farmer/budget/crop_fact_materials/([0-9]+)/([0-9]+)'=>'budget/cropFactRemainsMaterials/$1/$2',
    'new-farmer/budget/crop_fact_services/([0-9]+)'=>'budget/cropFactRemainsServices/$1',
    'new-farmer/budget/crop_fact_salary/([0-9]+)'=>'budget/cropFactRemainsSalary/$1',

    'new-farmer/budget/([0-9]+)'=>'budget/getBudget/$1',
    'new-farmer/budget_per_crop'=>'budget/getBudgetPerCrop',
    'new-farmer/budget_cash_flow'=>'budget/budgetCashFlow',
    'new-farmer/budget_per_month'=>'budget/getBudgetPerMonth',
    'new-farmer/budget'=>'budget/getBudget',
    'new-farmer/remains'=>'budget/remainsMaterial',
    'new-farmer/save_budget'=>'budget/saveBudget',
    'new-farmer/financial'=>'budget/financial',
    'new-farmer/fact_financial'=>'budget/factFinancial',

    'new-farmer/fact_tech_card/([0-9]+)'=>'fact/factTechCard/$1',
    'new-farmer/fact_tech_card'=>'fact/factTechCard/0',
    'new-farmer/add_fact'=>'fact/fact',
    'new-farmer/create_fact'=>'fact/createFact',
    'new-farmer/save_fact'=>'fact/saveFact',
    'new-farmer/fact_budget_crop'=>'budget/getBudgetFactPerCrop',
    'new-farmer/fact_budget_field'=>'budget/getBudgetFactPerField',
    'new-farmer/fact_budget_month'=>'budget/getBudgetFactPerMonth',
    'new-farmer/fact_cash_flow'=>'budget/budgetCashFlowFact',

    'new-farmer/graphs_plan'=>'budget/getGraphsPlan',
    'new-farmer/edit_technology_card_list'=>'technologyCard/editTechCardList',

    'new-farmer/change_status'=>'fieldManagement/changeStatus',
    'new-farmer/change_date_fact'=>'fact/changeDate',
    'new-farmer/setting_cash_flow_material'=>'settingCashFlow/settingMaterial',
    'new-farmer/save_material_date'=>'settingCashFlow/saveSettingMaterial',
    'new-farmer/setting_cash_flow_sales'=>'settingCashFlow/settingSales',
    'new-farmer/save_sales1'=>'settingCashFlow/saveSales1',
    'new-farmer/save_sales2'=>'settingCashFlow/saveSales2',

    'new-farmer/404'=>'budget/page404',
    'new-farmer'=>'fieldManagement/fieldManagement',

);