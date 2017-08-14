<?php

include_once ROOT.'/cabinet/new-farmer/models/Sales.php';
class SalesController {

	public function actionSales(){
		$id_user = $_SESSION['id_user'];
		
		$date= Sales::getSale($id_user);

		SRC::template('new-farmer','new','sales',$date);
		return true;
	}

	public function actionCreateSales(){

		$id_user = $_SESSION['id_user'];
		$sale_material_id = SRC::validatorPrice($_POST['sale_id_material']);
		$sale_date = SRC::validator($_POST['sale_date']);
		$sale_quantity = SRC::validatorPrice($_POST['sale_quantity']);
		$sale_sum_total = SRC::validatorPrice($_POST['sale_sum_total']);
		$sale_price_unit = SRC::validatorPrice($_POST['sale_price_unit']);
		$sale_comments = SRC::validator($_POST['sale_comments']);
		$sale_stock = SRC::validatorPrice($_POST['sale_stock']);
		if($sale_quantity>$sale_stock){
			SRC::redirect('/new-farmer/storage');
		}else{
			Sales::updateStock($id_user, $sale_material_id, $sale_quantity);
			Sales::createSale($id_user, $sale_material_id, $sale_date, $sale_quantity, $sale_sum_total, $sale_price_unit, $sale_comments);
			SRC::redirect('/new-farmer/storage');
		}
		
		return true;
	}

	public function actionPlaneSale(){
		$id_user = $_SESSION['id_user'];
		$plane_sale_field = SRC::validatorPrice($_POST['field_id']);
		$plane_sale_culture = SRC::validatorPrice($_POST['culture']);
		$plane_sale_expected_yield = SRC::validatorPrice($_POST['expected_yield']);
		$plane_sale_avr_price = SRC::validatorPrice($_POST['avr_price']);
		$plane_sale_revenue = SRC::validatorPrice($_POST['revenue']);

		Sales::planeSales($id_user, $plane_sale_field, $plane_sale_culture, $plane_sale_expected_yield, $plane_sale_avr_price, $plane_sale_revenue);
	}
}