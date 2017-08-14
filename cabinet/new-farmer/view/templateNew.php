<?php
$top_menu=array(
    'farm'=>array(
        'equipment'=>'/new-farmer/equipment',
        'vehicles'=>'/new-farmer/vehicles',
        'employee'=>'/new-farmer/employee'
    ),
    'field'=>'/new-farmer/field_management',
    'technology card'=>'/new-farmer/technology_card',
    'storage'=>'/new-farmer/storage',
    'sales'=>'/new-farmer/sales',
    'analysis'=>array(
        'Income/Costs'=> array(
                'Income/Costs per culture'=>'',
                'Income/Costs per month'=>'',
                'Income/Costs per field'=>'/new-farmer/budget',),
        'Actual/Planner income/costs'=>'',
        'Graphs plan'=>'/new-farmer/graphs_plan',
        ),
    'budget'=>'/new-farmer/budget',
);
?>
<html style="height: auto; min-height: 100%;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Панель управління дистрибютор</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script type="text/javascript" src="<?php SRC::getSrc();?>/cabinet/new-farmer/template/js/jquery.easydropdown.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/new-farmer/template/css/newstyle.css">

    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/jquery-3.2.0.js"></script>
    <script src="http://thecodeplayer.com/uploads/js/prefixfree-1.0.7.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/script.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/cabinet/new-farmer/template/js/script.js"></script>
</head>
<!-- ADD THE CLASS layout-top-navn TO REMOVE THE SIDEBAR. -->
<body class="layout-top-navn skin-green-light bodyn" style="height: auto; min-height: 100%;">
<div class="wrappern" style="height: auto;">

    <header class="main-headern">
        <div class="navibar navibar-static-top">
            <div class="navibar-header">
                <a href="#" class="navibar-brand navi navibar-navn"><img src="<?php SRC::getSrc();?>/cabinet/new-farmer/template/img/logo-wh.png" width="100px"></a>

<!--                <button type="button" class="navibar-toggle collapsen" data-toggle="collapse" data-target="#navibar-collapse">-->
<!--                    <i class="fa fa-bars"></i>-->
<!--                </button>-->
                <div class="navibar-custom-menun">
                    <ul class="navi navibar-navn">
                        <!-- Messages: style can be found in dropdown.less-->
<<<<<<< HEAD
                        <li class="dropdownn messages-menu">
=======
                        <li class="messages-menu">
>>>>>>> 8657c9c113553c652f9279f0b56116a605310ad6
                            <!-- Menu toggle button -->
                            <a href="/language/ua" class="dropdown-togglen" data-toggle="dropdown" aria-expanded="false">
                                <span>Українська</span></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menun">
                                <li class="headern">Виберіть мову</li>
                                <li class="footern"><a href="/language/ua">Українська</a></li>
                                <li class="footern"><a href="/language/gb">English</a></li>
                                <li class="footern"><a href="#">Ru</a></li>
                            </ul>
                        </li>
                        <li class="messages-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-togglen" data-toggle="dropdown" aria-expanded="false">
                                <span>UAH</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menun">
                                <li class="headern" style="margin-right: -5px;">Виберіть валюту</li>
                                <li class="footern"><a href="#">UAH</a></li>
                                <li class="footern"><a href="#">USD</a></li>
                                <li class="footern"><a href="#">EUR</a></li>
                            </ul>
                        </li>
                        <!-- /.messages-menu -->

                        <!-- User Account Menu -->
                        <li class="smalln user user-menun dropdown-togglen" data-toggle="dropdown" aria-expanded="false">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-togglen" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="../../dist/img/user2-160x160.jpg" class="user-imagen" alt="User Image">
                                <!-- hidden-xsn hides the username on smalln devices so only the image appears. -->
                                <span class="hidden-xsn"><?php echo  $_COOKIE['name_user'] .' ' .$_COOKIE['last_name_user'];?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menun">
                                    <li>
                                        <a href="/farmer" ]="">
                                            <i class="menu-icon fa fa-line-chart bg-green"></i>Farmer</a>
                                    </li>
                                    <li>
                                        <a href="/farmer-small" ]="">
                                            <i class="menu-icon fa fa-globe bg-green right"></i>Farmer sm.
                                        </a>
                                    </li>
                                <!-- The user image in the menu -->
<!--                                <li class="user-headern">-->
<!--                                    <img src="../../dist/img/user2-160x160.jpg" class="img-circlen" alt="User Image">-->
<!---->
<!--                                    <p>-->
<!--                                        Alexander Pierce - Web Developer-->
<!--                                    </p>-->
<!--                                </li>-->
                                <!-- Menu Body -->
<!--                                <li class="user-bodyn">-->
<!--                                    <div class="rown">-->
<!---->
<!--                                        <div class="col-xs-4n text-centern">-->
<!--                                            <a href="#">Followers</a>-->
<!--                                        </div>-->
<!--                                        <div class="col-xs-4n text-centern">-->
<!--                                            <a href="#">Sales</a>-->
<!--                                        </div>-->
<!--                                        <div class="col-xs-4n text-centern">-->
<!--                                            <a href="#">Friends</a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <!-- /.rown -->
<!--                                </li>-->
                                <!-- Menu Footer-->
                                <li class="user-footern">
                                    <div class="pull-leftn">
                                        <a href="/new-farmer/profile" class="btnn btn-defaultn btn-flatn">Профіль</a>
                                    </div>
                                    <div class="pull-rightn">
                                        <a href="#" class="btnn btn-defaultn btn-flatn">Вихід</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="content-wrappern" style="min-height: 207px;">
        <div class="containern">
            <section class="contentn">
                <div class="boxn box-defaultn">
                    <div class="box-bodyn2">
                        <div class="containern">
                            <div class="collapsen navibar-collapse pull-leftn" id="navibar-collapse">
                                <ul class="navi navibar-navn">
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
                                                                    <i class="fa fa-angle-right pull-right" style="color: #fff; margin-top: 5px"></i>
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
                    <?php require_once ('cabinet/'.$cabinet.'/view/content'.ucfirst($content).'.php');?>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrappern -->
    <footer class="main-footern">
        <div class="containern" style="text-align: center; color: #fffefe; margin-top: 7px;">

            <strong>Copyright © 2014-2016 <a href="https://#">A</a>.</strong> All rights
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


</body></html>