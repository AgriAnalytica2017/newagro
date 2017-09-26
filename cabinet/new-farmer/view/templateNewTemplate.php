<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 21.09.2017
 * Time: 10:52
<<<<<<< HEAD
 */?>

    <?php
$language=SRC::getLanguage('new-farmer');
$top_menu=array(
    $language['new-farmer']['1']=>array(
        $language['new-farmer']['4']=>'/new-farmer/employee',
        'СГ техніка'=>'/new-farmer/vehicles',
        'СГ обладнання'=>'/new-farmer/equipment',
        'Ф. 50'=>array(
            2014=>'/new-farmer/forma50/2014',
            2015=>'/new-farmer/forma50/2015',
            2016=>'/new-farmer/forma50/2016',
        ),
        'Ф. 1'=>'#',
        'Ф. 2'=>'#',
    ),
    'План'=>array(
        'Технології'=>'/new-farmer/list_technology_card',
        'Посівні площі'=>'/new-farmer/field_management',
        'Тех карти'=>'/new-farmer/field_management',
        'Потреба в матеріалах'=>'/new-farmer/all_needed_material',
        'Реалізація'=>'/new-farmer/sales',
        'БД Ціни'=>'/new-farmer/materials',
    ),
    'План/факт'=>array(
        'виробничі витрати'=>'/new-farmer/fact_tech_card',
        $language['new-farmer']['195']=>'/new-farmer/other_cost',
    ),
    $language['new-farmer']['8']=>'/new-farmer/storage',
    $language['new-farmer']['10']=>array(
        $language['new-farmer']['14']=>array(
                'План'=>'/new-farmer/budget',
                'План/факт'=>'/new-farmer/fact_budget_field',
        ),
        $language['new-farmer']['12']=>array(
                'План'=>'/new-farmer/budget_per_crop',
                'План/факт'=>'/new-farmer/fact_budget_crop',
        ),
        $language['new-farmer']['13']=>array(
                'План'=>'/new-farmer/budget_per_month',
                'План/факт'=>'/new-farmer/fact_budget_month',
        ),
        'Cash Flow'=>array(
                'План'=>'/new-farmer/budget_cash_flow',
                'План/факт'=>'/new-farmer/fact_cash_flow',
        ),
        'графіки, діаграми'=>'/new-farmer/graphs_plan',
        'економічні показники'=>'/new-farmer/financial',
        'бенчмаркінг'=>'/new-farmer/graphs',
    ),
);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Панель управління дистрибютор</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/flag-icon/css/flag-icon.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/new-farmer/template/css/new.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/cabinet/new-farmer/template/js/jquery.easydropdown.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/jquery-3.2.0.js"></script>
    <script src="http://thecodeplayer.com/uploads/js/prefixfree-1.0.7.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/script.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/cabinet/new-farmer/template/js/script.js"></script>
</head>
<!-- ADD THE CLASS layout-top-navn TO REMOVE THE SIDEBAR. -->
<body class="layout-top-navn skin-green-light bodyn" style="height: auto; min-height: 100%;">
<div class="wrappern" style="height: auto;">
    <script type="text/javascript">
         $(document).ready(function () {
            function setCookie(name, value) {
                document.cookie = name + "=" + value + "; path=/";
            }
            function getCookie(name) {
                var r = document.cookie.match("(^|;) ?" + name + "=([^;]*)(;|$)");
                if (r) return r[2];
                else return "";
            }
            var sidebar= getCookie("sidebar");
            if(sidebar==false){
                localStorage.setItem('sidebar', 'on')
                setCookie("sidebar", "ofe")
            }
            $('#sidebar-toggle').click(sidebar_toggle);
            function sidebar_toggle() {
                var sidebar= getCookie("sidebar");
                if(sidebar=='ofe'){
                    setCookie("sidebar", "sidebar-collapse")
                }
                if(sidebar=='sidebar-collapse'){
                    setCookie("sidebar", "ofe")
                }
            }
            $('.lang').click(sidebar_toggles);
            function sidebar_toggles() {
                var lang= getCookie("lang");
                if(lang=='ua'){
                    setCookie("lang", "ua")
                }
                if(lang=='gb'){
                    setCookie("lang", "gb")
                }
            }
        });
    </script>
    <header class="main-headern">
        <div class="navibar navibar-static-top">
            <div class="navibar-header">
                <a href="#" class="navibar-brand navi navibar-navn"><img src="<?php SRC::getSrc();?>/cabinet/new-farmer/template/img/logo-wh.png" width="90px"></a>

<!--                <button type="button" class="navibar-toggle collapsen" data-toggle="collapse" data-target="#navibar-collapse">-->
<!--                    <i class="fa fa-bars"></i>-->
<!--                </button>-->
                <div class="navibar-custom-menun">
                    <ul class="navi navibar-navn">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="messages-menu">
                            <!-- Menu toggle button -->
                            <a href="/language/ua" class="dropdown-togglen" data-toggle="dropdown" aria-expanded="false">
                                <span class="flag-icon flag-icon-<?php echo SRC::validator($_COOKIE['lang']);?>"></span></span>
                            <span class="caretn"></span></a>
                            <ul class="dropdown-menu dropdown-menun">
                                <li class="headern">Виберіть мову</li>
                                <li class="footern"><a href="/language/ua" value="ua" class="lang">Українська</a></li>
                                <li class="footern"><a href="/language/gb" value="gb" class="lang">English</a></li>
                                
                            </ul>
                        </li>
                        <li class="messages-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-togglen" data-toggle="dropdown" aria-expanded="false">
                                <span>UAH</span>
                           <span class="caretn"></span> </a>
                            <ul class="dropdown-menu dropdown-menun">
                                <li class="headern" style="margin-right: -5px;">Виберіть валюту</li>
                                <li class="footern"><a href="#">UAH</a></li>
                                <li class="footern"><a href="#">USD</a></li>
                                <li class="footern"><a href="#">EUR</a></li>
                            </ul>
                        </li>
                        <!-- /.messages-menu -->
                        <!-- User Account Menu -->
                        <li class="smalln user user-menun dropdown-togglen messages-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-togglen" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="/cabinet/new-farmer/template/img/user.png" class="user-imagen" alt="User Image">
                                <!-- hidden-xsn hides the username on smalln devices so only the image appears. -->
                                <span class="hidden-xsn"><?php echo  $_COOKIE['name_user'] .' ' .$_COOKIE['last_name_user'];?></span>
                            ПРОФІЛЬ<span class="caretn"></span></a>
                            <ul class="dropdown-menu dropdown-menun">
                                <?php $cabinet_item = SRC::viewCab();
                                foreach ($_SESSION['cabinet'] as $item)if($item!=false){?>
                                    <li>
                                        <a href="<?=SRC::getSRC();?>/<?=$cabinet_item[$item]['id']?>/">
                                            <i class="menu-icon fa <?php echo $cabinet_item[$item]['item'];?>"></i><?if($_COOKIE['lang']=='gb'){echo $cabinet_item[$item]['name_en'];} else{echo $cabinet_item[$item]['name_ua'];}?>
                                        </a>
                                    </li>
                                <?}?>
                        
                                <!-- Menu Footer-->
                                <li class="user-footern">
                                    <div class="pull-leftn">
                                        <a href="<? echo SRC::getSRC();?>/farmer/profile" class="btn btn-default">Профіль</a>
                                    </div>
                                    <div class="pull-rightn">
                                        <a href="/exit" class="btn btn-default">Вихід</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="box-bodyn2">
                        <div class="containern">
                            <div class="collapsen navibar-collapse pull-leftn" id="navibar-collapse">
                                <ul class="navi navibar-navn" id="top_menu">
                                    <?php foreach ($top_menu as $menu_text=>$menu_href){
                                        if(is_string($menu_href)) {?>
                                            <li><a href="<?=$menu_href?>"><?=$menu_text?></a></li>
                                        <?}else{?>
                                            <li class="dropdownn">
                                                <a href="#" class="dropdown-togglen" data-toggle="dropdown" aria-expanded="false"><?=$menu_text?><span class="caretn"></span></a>
                                                <ul class="dropdown-menu dropdown-menun" role="menu">
                                                    <?foreach ($menu_href as $menu_text_1=>$menu_href_1){
                                                        if(is_string($menu_href_1)){?>
                                                            <li><a href="<?=$menu_href_1 ?>"><?=$menu_text_1 ?></a></li>
                                                        <?}else{?>
                                                            <li class="dropdownn dropdown2">
                                                                <a href="#" class="dropdown-togglen" data-toggle="dropdown" aria-expanded="false"><?=$menu_text_1 ?>
                                                                    <i class="fa fa-angle-right pull-right" style="color: #7b7e1e; margin-top: 5px"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menun2">
                                                                    <?foreach ($menu_href_1 as $menu_text_1_1=>$menu_href_1_1){?>
                                                                        <li><a href="<?=$menu_href_1_1 ?>"><?=$menu_text_1_1 ?></a></li>
                                                                    <?}?>
                                                                </ul>
                                                            </li>
                                                        <?}}?>
                                                </ul>
                                            </li>
                                        <?}} ?>

                                </ul>
                            </div>
                        </div>
                    </div>
    </header>
    <div class="content-wrappern" style="min-height: 207px;">
        <div class="containern">
            <section class="contentn">
                <div class="boxn box-defaultn">
                   

           
            
<head>
    <style>
        .searchs{
            height: 35px;
            width: 300px;
            border-radius:3px;
            margin-top: -0.2% !important;
        }
    </style>
</head>

  
       
       
       
         <style>
    .with-border{
        border-top: 2px solid #c0c0c0;
        margin-top: 20px;
    }

    .panel{
    margin-top: -20px;
     }
                   .nav-tabs{
                       padding-left: 0px;
                   }          
</style>
<? //var_dump($date['rent_pay']);die;?>
<div class="box-bodyn col-lg-12">
        <div class="non-semantic-protector col-sm-4">
        Накладні витрати
        </div>
        
<!--
        <div class="col-sm-8" style="margin-left: -6%;">
                    
                      <div class="col-sm-4">
                      <select onchange="window.location.href=this.options[this.selectedIndex].value" style="width:300px; margin: 0 auto" class="searchs inphead" id="select_crop" required>
        <?php if($date['id']==0){?><option selected value="0"><?=$language['new-farmer']['163']?></option><?php }?>
        <?php foreach ($date['field'] as $field){?>
            <option <?php if($field['id_field']==$date['id']) echo "selected"?> value="<?php SRC::getSrc();?>/new-farmer/fact_tech_card/<?php echo $field['id_field']?>" ><?='#  '.$field['field_number']."_".$field['field_name'];?></option>
        <?php }?>
    </select>
            </div>
            </div>
-->
            </div>

              
<div class="rown">
    <div class="col-lg-8 col-lg-offset-2">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" class="tabs" data-toggle="tab">Ремонт техніки та обладнання</a></li>
            <li><a href="#tab_2" class="tabs" data-toggle="tab">Інші витрати</a></li>
            <li><a href="#tab_3" class="tabs" data-toggle="tab">Операційні витрати</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel box box-primary box-bodyn">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_1" aria-expanded="false" class="collapsed">
                                        <h3 class="text-center">План: <b id="p_1"><?=$date['other_costs']['plan']['2']['costs_plan']?></b></h3>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <form action="/new-farmer/save_other_cost" method="post">
                                    <input type="hidden" name="costs_type" value="2">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Планові витрати на ремонт</label>
                                            <input class=" inphead plan_costs_fix" type="text" name="costs_plan" value="<?=$date['other_costs']['plan']['2']['costs_plan']?>">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Коментар</label>
                                            <textarea name="costs_comments" id="comments_fix" class=" inphead"><?=$date['other_costs']['plan']['2']['costs_comments']?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                     <div class="text-centern">
                                    <input type="submit" class="btn btn-primaryn" value="Зберегти план">
                                    </div>
                                </form>
                            </div>

                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_2" aria-expanded="false" class="collapsed">
                                        <h3 class="text-center">Факт: <b id="f_1">20</b></h3>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse_2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <form action="/new-farmer/create_other_fact" method="post">
                                    <input type="hidden" name="cost_fact_type" value="2" class=" inphead">
                                    <table class="table">
                                        <tr>
                                            <th>
                                                <label>Ціна, грн</label>
                                                <input class=" inphead" type="text" name="cost_fact">
                                            </th>
                                            <th>
                                                <label>Дата</label>
                                                <input class=" inphead" type="date" name="cost_fact_date">
                                            </th>
                                            <th>
                                                <label>Коментар</label>
                                                <textarea class=" inphead" type="text" name="cost_fact_note"></textarea>
                                            </th>
                                        </tr>
                                       
                                        <?if($date['other_costs']['fact']['2']!=false) foreach ($date['other_costs']['fact']['2'] as $fact_other){?>
                                            <tr>
                                                <th class="f_price_1"><?=$fact_other['cost_fact']?></th>
                                                <th><?=$fact_other['cost_fact_date']?></th>
                                                <th><?=$fact_other['cost_fact_note']?></th>
                                            </tr>
                                        <?}?>
                                    </table>
                                     <div class="text-centern">
                                         <input class="btn btn-primaryn" type="submit" value="Додати до факту">
                                        </div>
                                </form>
                            </div>
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="false" class="collapsed">
                                        <h3 class="text-center">Різниця: <b id="d_1">20</b></h3>
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_2">
                <br>
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="panel box box-primary box-bodyn">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_1_1" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">План: <b id="p_2"><?=$date['other_costs']['plan']['3']['costs_plan']?></b></h3>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_1_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/save_other_cost" method="post">
                                        <input type="hidden" name="costs_type" value="3" class=" inphead">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label>Планові інші витрати</label>
                                                <input class="inphead form-control inphead plan_other_costs" type="text" name="costs_plan" value="<?=$date['other_costs']['plan']['3']['costs_plan']?>">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Коментар</label>
                                                <textarea name="costs_comments" id="comments" class=" inphead"><?=$date['other_costs']['plan']['3']['costs_comments']?></textarea>
                                            </div>
                                        </div>
                                         <br>
                                         <div class="text-centern">
                                        <input type="submit" class="btn btn-primaryn" value="Зберегти план">
                                        </div>
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_1_2" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Факт: <b id="f_2">20</b></h3>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_1_2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/create_other_fact" method="post">
                                        <input type="hidden" name="cost_fact_type" value="3" class="inphead">
                                        <table class="table">
                                            <tr>
                                                <th>
                                                    <label>Ціна, грн</label>
                                                    <input class="inphead" type="text" name="cost_fact">
                                                </th>
                                                <th>
                                                    <label>Дата</label>
                                                    <input class="inphead" type="date" name="cost_fact_date">
                                                </th>
                                                <th>
                                                    <label>Коментар</label>
                                                    <textarea class="inphead" type="text" name="cost_fact_note"></textarea>
                                                </th>
                                            </tr>
                                            <?if($date['other_costs']['fact']['3']!=false) foreach ($date['other_costs']['fact']['3'] as $fact_other){?>
                                                <tr>
                                                    <th class="f_price_2"><?=$fact_other['cost_fact']?></th>
                                                    <th><?=$fact_other['cost_fact_date']?></th>
                                                    <th><?=$fact_other['cost_fact_note']?></th>
                                                </tr>
                                            <?}?>
                                        </table>
                                        <div class="text-centern">
                                                    <input class="btn btn-primaryn" type="submit" value="Додати до факту">
                                                    </div>
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Різниця: <b id="d_2">20</b></h3>
                                        </a>
                                    </h4>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_3">
                <br>
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="panel box box-primary  box-bodyn">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_2_1" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">План: <b id="p_3"><?=$date['other_costs']['plan']['1']['costs_plan']?></b></h3>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_2_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/save_other_cost" method="post">
                                        <input type="hidden" name="costs_type" value="1" class="inphead">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label>Операційні витрати, %</label>
                                                <input class="form-control inphead plan_other_costs" type="text" name="costs_plan" value="<?=$date['other_costs']['plan']['1']['costs_plan']?>">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Коментар</label>
                                                <textarea name="costs_comments" id="comments" class=" inphead"><?=$date['other_costs']['plan']['1']['costs_comments']?></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="text-centern">
                                        <input type="submit" class="btn btn-primaryn" value="Зберегти план">
                                        </div>
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_2_2" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Факт: <b id="f_3">10</b></h3>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_2_2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/create_other_fact" method="post">
                                        <input type="hidden" name="cost_fact_type" value="1">
                                        <table class="table">
                                            <tr>
                                                <th>
                                                    <label>Ціна</label>
                                                    <input class="form-control inphead" type="text" name="cost_fact">
                                                </th>
                                                <th>
                                                    <label>Дата</label>
                                                    <input class="inphead" type="date" name="cost_fact_date">
                                                </th>
                                                <th>
                                                    <label>Коментар</label>
                                                    <textarea class="inphead" type="text" name="cost_fact_note"></textarea>
                                                </th>
                                            </tr>
                                            <?if($date['other_costs']['fact']['1']!=false)foreach ($date['other_costs']['fact']['1'] as $fact_other){?>
                                                <tr>
                                                    <th class="f_price_3"><?=$fact_other['cost_fact']?></th>
                                                    <th><?=$fact_other['cost_fact_date']?></th>
                                                    <th><?=$fact_other['cost_fact_note']?></th>
                                                </tr>
                                            <?}?>
                                        </table>
                                        <div class="text-centern">
                                                    <input class="btn btn-primaryn" type="submit" value="Додати до факту">
                                                    </div>
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Різниця: <b id="d_3">20</b></h3>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        fact_price();
        function fact_price() {
            var f1=0, f2=0, f3=0;

            $('.f_price_1').each(function () {
                f1+=parseFloat($(this).text());
            });
            $('.f_price_2').each(function () {
                f2+=parseFloat($(this).text());
            });
            $('.f_price_3').each(function () {
                f3+=parseFloat($(this).text());
            });
            $('#f_1').text(f1);
            $('#f_2').text(f2);
            $('#f_3').text(f3);
            $('#d_1').text(parseFloat($('#p_1').text())-f1);
            $('#d_2').text(parseFloat($('#p_2').text())-f2);
            $('#d_3').text(parseFloat($('#p_3').text())-f3);
        }
    });
</script>

   
  
   
                          
                   
                    
<!--                    <?php require_once ('cabinet/'.$cabinet.'/view/content'.ucfirst($content).'.php');?>-->
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrappern -->
    <footer class="main-footern">
        <div class="container-footer">

            <strong>Copyright © 2014-2016 <a href="https://#"></a></strong> All rights
            reserved.
        </div>
        <!-- /.container -->
    </footer>
</div>
<!-- ./wrappern -->
<!-- jQuery 3 -->
<!-- jQuery 2.2.3 -->
<script src="<?php SRC::getSrc(); ?>/lib/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php SRC::getSrc(); ?>/lib/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php SRC::getSrc(); ?>/lib/dist/js/app.min.js"></script>


</body>
</html>