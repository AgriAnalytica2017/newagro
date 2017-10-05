<?php
$language=SRC::getLanguage('new-farmer');
$payment = SRC::getPayment();
if($payment == 1){
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
            'Ф. 1'=>'/new-farmer/forma/1',
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
            'економічні показники'=>array(
                'План'=>'/new-farmer/financial',
                'План/факт'=>'/new-farmer/fact_financial',
            ),
            'графіки, діаграми'=>'/new-farmer/graphs_plan',
            'бенчмаркінг'=>'/new-farmer/graphs',
        ),
    );
}else{
    $top_menu=array(
        $language['new-farmer']['1']=>array(
            $language['new-farmer']['4']=>'/new-farmer/employee',
            'СГ техніка'=>'/new-farmer/vehicles',
            'СГ обладнання'=>'/new-farmer/equipment',
            'Ф. 50'=>array(
                2014=>'#',
                2015=>'#',
                2016=>'#',
            ),
            'Ф. 1'=>'#',
            'Ф. 2'=>'#',
        ),
        'План'=>array(
            'Посівні площі'=>'/new-farmer/field_management',
            'Потреба в матеріалах'=>'/new-farmer/all_needed_material',
            'Реалізація'=>'/new-farmer/sales',
        ),
        'План/факт'=>array(
            'виробничі витрати'=>'/new-farmer/fact_tech_card',
            $language['new-farmer']['195']=>'/new-farmer/other_cost',
        ),
        $language['new-farmer']['8']=>'/new-farmer/storage',
        $language['new-farmer']['10']=>array(
            $language['new-farmer']['14']=>array(
                'План'=>'/new-farmer/budget',
            ),
            $language['new-farmer']['12']=>array(
                'План'=>'#',
            ),
            $language['new-farmer']['13']=>array(
                'План'=>'#',
            ),
            'Cash Flow'=>array(
                'План'=>'#',
            ),
            'графіки, діаграми'=>'/new-farmer/graphs_plan',
            'економічні показники'=>'#',
            'бенчмаркінг'=>'/new-farmer/graphs',
        ),
    );
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agri Anlytica</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/flag-icon/css/flag-icon.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/new-farmer/template/css/newstyle.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/new-farmer/template/css/payment.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/cabinet/new-farmer/template/js/jquery.easydropdown.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/jquery-3.2.0.js"></script>
    <script src="http://thecodeplayer.com/uploads/js/prefixfree-1.0.7.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/script.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/cabinet/new-farmer/template/js/script.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/cabinet/new-farmer/template/js/payment.js"></script>
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
                localStorage.setItem('sidebar', 'on');
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
                <a href="#" class="navibar-brand navi navibar-navn"><img src="<?php SRC::getSrc();?>/cabinet/new-farmer/template/img/logo-wh.png" width="100px"></a>

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
                            </a>
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
                        <li class="smalln user user-menun dropdown-togglen">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-togglen" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="../../dist/img/user2-160x160.jpg" class="user-imagen" alt="User Image">
                                <!-- hidden-xsn hides the username on smalln devices so only the image appears. -->
                                <span class="hidden-xsn"><?php echo  $_COOKIE['name_user'] .' ' .$_COOKIE['last_name_user'];?></span>
                            </a>
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
                                        <a href="<? echo SRC::getSRC();?>/farmer/profile" class="btn btn-default btn-flat">Профіль</a>
                                    </div>
                                    <div class="pull-rightn">
                                        <a href="/exit" class="btnn btn-defaultn btn-flatn">Вихід</a>
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
                                    <?if($payment == 0){?>
                                    <li><a href="#PaymentForm" data-toggle="modal">Повна версія програми</a></li>
                                    <?}?>
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
    <div id="PaymentForm" class="modal fade">
        <div class="modal-dialog modal-lg">
                <div class="modal-content wt">
                    <div class="box-bodyn">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <span class="box-title">Покупка повної версії програми</span>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="order_table">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Опис товару</th>
                                        <th>Кількість</th>
                                        <th>Вартість, грн</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <p class="payment_about">
                                                <img src="<?php SRC::getSrc();?>/cabinet/new-farmer/template/img/logo.png" class="payment_img">
                                                <span class="payment_header"><a href="http://test.agrianalytica.com/login" target="_blank">AgriAnalytica Online</a></span><br/>
                                                AgriAnalytica - онлайн програма, яка надає можливість аграрію більш
                                                ефективно управляти виробництвом, впевнено та легко
                                                моделювати ефективність використання матеріальних, технічних та фінансових ресурсів
                                                вносити зміни та коригування в плани, коли умови змінюються, відслідковувати план/факт, контролювати використання ресурсів,
                                                робити порівняльний аналіз ефективності свого підприємства з подібними по Україні
                                                <br/><br/>
                                            </p>
                                        </td>
                                        <td>
                                            <p id="qty_order"><span>1</span> шт</p>
                                        </td>
                                        <td><p><span class="payment_total">1000</span> ₴</p></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12" id="success_pay">
                                <form id="contact_form" role="form" method="post" action="/new-farmer/create_payment">
                                    <input type="hidden" name="send" value="1">
                                    <input type="hidden" name="total_sum" id="total_sum" value="1000">
                                    <input type="hidden" name="total_qty" id="total_qty" value="1">
                                    <label class="payment_label">Получатель</label>
                                    <input type="text" name="name"  class="required form-control inphead" value="<?php echo  $_COOKIE['name_user'] .' ' .$_COOKIE['last_name_user'];?>">
                                    <label class="payment_label">Ваш e-mail</label>
                                    <input type="text" name="email" class="required form-control inphead" value="<?=$_SESSION['user_email']?>" placeholder="">
                                    <label class="payment_label">Ваш телефон</label>
                                    <input type="text" name="tel" class="required form-control inphead" placeholder="">
                                    <label class="payment_label ">Комментарий</label>
                                    <textarea class="form-control inphead" name="message" placeholder="" rows="5"></textarea>
                                    <label>Форма оплати</label><br>
                                    <div>
                                        <label>
                                            <input type="radio" name="order_payment" id="order_payment_card" value="1"  checked="">
                                            <img src="<?php SRC::getSrc();?>/cabinet/new-farmer/template/img/master-card.png">
                                            <span>Оплата картою</span>
                                        </label>
                                    </div>
                                    <div class="payment_total">Загальна вартість: <b><span class="total_sum">1000</span> ₴</b></div>
                                    <button class="btn btn-success checkout" id="get_payment" type="submit"><i class="fa fa-shopping-cart"></i>Оформити замовлення</button>
                                </form>
                            </div>
                            <div class="col-lg-12" id="contact_form_info">

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- /.content-wrappern -->
    <footer class="main-footern">
        <div class="containern" style="text-align: center; color: #fffefe; margin-top: 7px;">
            <strong>Copyright © 2014-2016 <a href="https://#">A</a>.</strong> All rights
            reserved.
            <a href="/new-farmer/referral" style="color: #ffcb1a">Referral program</a>
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


<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        $('.right-siden').animate({-->
<!--            'background-blend-mode': 'hard-light',-->
<!--        }, 1000);-->
<!--    })-->
<!--</script>-->


</body>
<script>
    $(document).ready(function () {
        document.title='Agri: ' + $('.ribbon').text();
    });
</script>
</html>