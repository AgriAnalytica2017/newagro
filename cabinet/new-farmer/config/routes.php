<?php

return array(
    'new-farmer/sales'=>'sales/sales',
    'new-farmer/create_sales'=>'sales/createSales',
    'new-farmer/plane_sale'=>'sales/planeSale',

    'new-farmer/storage'=>'storage/storage',
    'new-farmer/create_storage'=>'storage/createStorage',
    'new-farmer/incoming_storage'=>'storage/incomingStorage',

    'new-farmer/costs_technology_card/([0-9]+)'=>'technologyCard/costsTechnologyCard/$1',
    'new-farmer/update_action'=>'technologyCard/updateActionPlan',
    'new-farmer/edit_technology_card'=>'technologyCard/editTechnologyCard',
    'new-farmer/save_edit_technology_card'=>'technologyCard/saveEditTechnologyCard',
    'new-farmer/create_technology_card'=>'technologyCard/createTechnologyCard',
    'new-farmer/list_technology_card'=>'technologyCard/listTechnologyCard',
    'new-farmer/technology_card/([0-9]+)'=>'technologyCard/technologyCard/$1',
    'new-farmer/technology_card'=>'technologyCard/technologyCard/0',

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


    'new-farmer/budget/([0-9]+)'=>'budget/getBudget/$1',
    'new-farmer/budget'=>'budget/getBudget',
    'new-farmer/save_budget'=>'budget/saveBudget',

    'new-farmer/graphs_plan'=>'budget/getGraphsPlan',

    'new-farmer'=>'fieldManagement/fieldManagement',


);