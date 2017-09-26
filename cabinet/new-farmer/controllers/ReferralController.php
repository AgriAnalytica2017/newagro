<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 26.09.2017
 * Time: 10:55
 */
include_once ROOT.'/cabinet/new-farmer/models/Referral.php';
class ReferralController{
    public function actionReferral(){
        $id_user=$_SESSION['id_user'];
        $date['user']=Referral::getMyReferral($id_user);
        SRC::template('new-farmer', 'new', 'referral',$date);
        return true;
    }
}