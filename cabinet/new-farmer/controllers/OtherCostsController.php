<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 13.09.2017
 * Time: 15:25
 */
include_once ROOT.'/cabinet/new-farmer/models/OtherCosts.php';
class OtherCostsController{
    public function actionGetOtherCost(){
        $id_user=$_SESSION['id_user'];
        $date['other_costs'] = OtherCosts::getCosts($id_user);
        SRC::template('new-farmer','new','otherCosts',$date);
        return true;
    }
    public function actionSavePlanOther(){
        $id_user=$_SESSION['id_user'];

        $cost_plan_type=SRC::validator($_POST['costs_type']);
        $cost_plan=SRC::validatorPrice($_POST['cost_plan']);
        $cost_plan_note=SRC::validator($_POST['cost_plan_note']);
        $cost_plan_date=SRC::validator($_POST['cost_plan_date']);

        OtherCosts::savePlanOther($id_user,$cost_plan_type,$cost_plan,$cost_plan_note,$cost_plan_date);
        SRC::redirect();
        return true;
    }
    public function actionCreateOtherFact(){
        $id_user=$_SESSION['id_user'];
        $cost_fact_type=SRC::validator($_POST['cost_fact_type']);
        $cost_fact=SRC::validatorPrice($_POST['cost_fact']);
        $cost_fact_note=SRC::validator($_POST['cost_fact_note']);
        $cost_fact_date=SRC::validator($_POST['cost_fact_date']);
        OtherCosts::createOtherFact($id_user,$cost_fact_type,$cost_fact,$cost_fact_note,$cost_fact_date);
        SRC::redirect();
        return true;
    }
    public function actionEditOtherPlan(){
        $id_user = $_SESSION['id_user'];
        $id_costs = SRC::validatorPrice($_POST['id']);
        $costs_date = SRC::validator($_POST['date']);
        $costs_plan = SRC::validatorPrice($_POST['costs_plan']);
        $costs_comments = SRC::validator($_POST['costs_comments']);
        OtherCosts::editPlan($id_user,$id_costs,$costs_date,$costs_plan,$costs_comments);
        return true;
    }

    public function actionEditOtherFact(){
        $id_user = $_SESSION['id_user'];
        $id_cost_fact = SRC::validatorPrice($_POST['id_fact']);
        $cost_date = SRC::validator($_POST['date_fact']);
        $cost_fact = SRC::validatorPrice($_POST['cost_fact']);
        $cost_comments = SRC::validator($_POST['cost_comments']);
        OtherCosts::editFact($id_user,$id_cost_fact,$cost_date,$cost_fact,$cost_comments);
        return true;
    }

    public function actionRemoveOtherCosts($id_costs){
        $id_user = $_SESSION['id_user'];
        $id_costs = SRC::validatorPrice($id_costs);
        OtherCosts::removeOtherCosts($id_user,$id_costs);
        SRC::redirect('/new-farmer/other_cost');
    }
    public function actionRemoveOtherCostsFact($id_costs){
        $id_user = $_SESSION['id_user'];
        $id_costs = SRC::validatorPrice($id_costs);
        OtherCosts::removeOtherCostsFact($id_user,$id_costs);
        SRC::redirect('/new-farmer/other_cost');
    }
}