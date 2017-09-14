<?php
include_once ROOT.'/cabinet/new-farmer/models/Budget.php';
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
class BudgetController{
    public function actionGetBudget(){
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getBudget($db,$id_user,$field,$date['table']);
        $date['save_budget']=Budget::getSaveBudget($db,$id_user);

        var_dump(unserialize($date['save_budget'][0]['budget']));

        SRC::template('new-farmer','new','budget',$date);
        return true;
    }

    public function getTechnologyCard($id_crop){

    }

    public function actionGetGraphsPlan(){

    	SRC::template('new-farmer', 'new','graphsPlan');
    }

    public function actionSaveBudget(){
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getBudget($db,$id_user,$field,$date['table']);
        $save=array(
                'plane_revenues'=>$date['budget']['plane_revenues'],
                'budget_seeds'=>$date['budget']['budget_seeds'],
                'budget_fertilizers'=>$date['budget']['budget_fertilizers'],
                'budget_ppa'=>$date['budget']['budget_ppa'],
                'budget_equipment'=>$date['budget']['budget_equipment'],
                'budget_pay'=>$date['budget']['budget_pay'],
        );
        $array = serialize($save);
        $current_date = date("m.d.y");
        $current_time = date("H:i:s");
        $test = "На сьогоднішній день основною ідеєю розвитку інфокомунікаційної системи в світі, що дозволяє вийти за межі можливостей традиційних мереж зв’язку, прийнята концепція мережі зв’язку наступного покоління - NextGenerationNetwork (NGN) . Ця концепція з’явилась в результаті корінного перетворення всієї мережевої телекомунікаційної структури, зумовлена характером мультимедійного трафіку та потребами в його мультисервісному обслуговуванні.
Широке розповсюдження інформаційних технологій та перехід на технології пакетної передачі даних дозволяє операторам зв’язку створювати додаткові джерела отримання прибутків, розширюючи спектр послуг, що надаються, та клієнтську базу. Мультисервісні мережі зв’язку, або іншими словами NGN, дозволяють представляти практично будь-який набір послуг фіксованого зв’язку: від телефонії до інтерактивного телебачення та телебачення високої чіткості та забезпечити стовідсоткове захоплення абонентів. Ядром NGN є опорна ІР- мережа, що підтримує пакетну передачу даних та забезпечує повну або часткову інтеграцію (конвергенцію) послуг передачі мови, даних та мультимедіа.
Мережа NGN – це відкрита, стандартна пакетна інфраструктура, що здатна ефективно підтримувати всю гамму існуючих додатків та послуг, забезпечуючи необхідну масштабованість та гнучкість, дозволяючи реагувати на нові вимоги по функціональності та пропускній здатності.";
        Budget::saveBudget($db, $id_user,$current_date,$current_time, $array);
        return true;
    }
}