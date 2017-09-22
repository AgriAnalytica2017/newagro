<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 21.09.2017
 * Time: 10:52
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
        }
    </style>
</head>
<? //var_dump($date['rent_pay']);die;?>
<div class="box-bodyn col-lg-12">
        <div class="non-semantic-protector col-sm-3">
           <?=$language['new-farmer']['4']?>
        </div>
        
        <div data-toggle="modal" href="#myModal"  class="col-sm-3" style="margin-left: -7%;">
        <div class="col-sm-3 add-ico"><img src="/cabinet/new-farmer/template/img/add.png" class="user-imagen" alt="User Image" style="    width: 35px; height: 35px;"></div>
            <div class="non-semantic-protector col-sm-9"><?=$language['new-farmer']['36']?></div>
            </div>
            </div>

<div class="rown">
    <div class="table-responsive">
        <table class="table">
            <thead >
            <tr class="tabletop">
                <th>П.І.Б</th>
                <th>Посада/Професія</th>
                <th><?=$language['new-farmer']['39']?></th>
                <th>Оплата праці, грн/міс.</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <tr class="for_search">
                    <td><? echo $employee['employee_surname']." ".$employee['employee_name']." ".$employee['employee_father_name'];?></td>
                    <td><?=$employee['employee_position'];?></td>
                    <td><?=$employee['employee_phone_number'];?></td>
                    <td><? if($employee['employee_salary']!=0){echo $employee['employee_salary'];}else{echo '';}?></td>
                    <td><a href="#editModal"data-toggle="modal"] data-data='<?=json_encode($employee); ?>'>
                    <img src="/cabinet/new-farmer/template/img/edit.png" class="user-imagen add-ico" style="width: 35px; height: 35px;">
                           
                        </a></td>
                    <td><a href="/new-farmer/remove_employee/<?echo $employee['id_employee']?>">
                    <img src="/cabinet/new-farmer/template/img/del.ico" class="user-imagen add-ico" style="width: 35px; height: 35px;">
                    </a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form action="/new-farmer/create_employee" method="post">
            <div class="modal-content wt">
                <div class="box-bodyn">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <span class="box-title"><?=$language['new-farmer']['193']?></span>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <label><?=$language['new-farmer']['38']?></label>
                            <input class="form-control inphead" type="text" name="employee_surname">
                        </div>
                        <div class="col-lg-4">
                            <label><?=$language['new-farmer']['37']?></label>
                            <input class="form-control inphead" type="text" name="employee_name">
                        </div>
                        <div class="col-lg-4">
                            <label>По-батькові</label>
                            <input class="form-control inphead" type="text" name="employee_father_name">
                        </div>
                        <div class="col-lg-4">
                            <label><?=$language['new-farmer']['40']?></label>
                            <input class="form-control inphead" type="text" name="employee_position">
                        </div>
                        <div class="col-lg-4">
                            <label>Оплата праці, грн/міс.</label>
                            <input class="form-control inphead" type="text" name="employee_salary">
                        </div>
                        <div class="col-lg-4">
                            <label><?=$language['new-farmer']['39']?></label>
                            <input class="form-control inphead" type="text" name="employee_phone_number">
                        </div>
                        <div class="col-lg-4">
                            <label>Дата прийому на роботу</label>
                            <input type="date" class="form-control inphead" name="date_start">
                        </div>
                        <div class="col-lg-4">
                            <label>Дата звільнення</label>
                            <input type="date" class="form-control inphead" name="date_end">
                        </div>
                        <div class="col-lg-4">
                            <label>Примітки</label>
                            <textarea class="form-control inphead" name="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                    <button type="submit" class="btn btn-primaryn"><?=$language['new-farmer']['27']?></button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="editModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form action="/new-farmer/edit_employee" method="post">
            <div class="modal-content wt">
                <div class="box-bodyn">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <span class="box-title"><?=$language['new-farmer']['193']?></span>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <label><?=$language['new-farmer']['38']?></label>
                            <input class="form-control inphead" type="text" name="edit_employee_surname" id="edit_employee_surname">
                        </div>
                        <div class="col-lg-4">
                            <label><?=$language['new-farmer']['37']?></label>
                            <input type="hidden" name="edit_id_employee" id="edit_id_employee">
                            <input class="form-control inphead" type="text" name="edit_employee_name" id="edit_employee_name">
                        </div>
                        <div class="col-lg-4">
                            <label>По-батькові</label>
                            <input class="form-control inphead" type="text" name="edit_employee_father_name" id="edit_employee_father_name">
                        </div>
                        <div class="col-lg-4">
                            <label><?=$language['new-farmer']['40']?></label>
                            <input class="form-control inphead" type="text" name="edit_employee_position" id="edit_employee_position">
                        </div>
                        <div class="col-lg-4">
                            <label>Оплата праці, грн/міс.</label>
                            <input class="form-control inphead" type="text" name="edit_employee_salary" id="edit_employee_salary">
                        </div>
                        <div class="col-lg-4">
                            <label><?=$language['new-farmer']['39']?></label>
                            <input class="form-control inphead" type="text" name="edit_employee_phone_number" id="edit_employee_phone_number">
                        </div>
                        <div class="col-lg-4">
                            <label>Дата прийому на роботу</label>
                            <input class="form-control inphead" type="date" name="edit_date_start" id="edit_date_start">
                        </div>
                        <div class="col-lg-4">
                            <label>Дата звільнення</label>
                            <input class="form-control inphead" type="date" name="edit_date_end" id="edit_date_end">
                        </div>
                        <div class="col-lg-4">
                            <label>Примітки</label>
                            <textarea class="form-control inphead" name="edit_description" id="edit_description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                    <button type="submit" class="btn btn-primaryn editEmployee"><?=$language['new-farmer']['27']?></button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.editEmploye').click(edit);
        function edit(){
            var json_employee = $(this).attr('data-data');
            var employee = JSON.parse(json_employee);
            $('#edit_id_employee').val(employee['id_employee']);
            $('#edit_employee_name').val(employee['employee_name']);
            $('#edit_employee_surname').val(employee['employee_surname']);
            $('#edit_employee_father_name').val(employee['employee_father_name']);
            $('#edit_employee_phone_number').val(employee['employee_phone_number']);
            $('#edit_employee_position').val(employee['employee_position']);
            $('#edit_employee_salary').val(employee['employee_salary']);
            $('#edit_date_start').val(employee['employee_date_start']);
            $('#edit_date_end').val(employee['employee_date_end']);
            $('#edit_description').val(employee['employee_description']);
        }
        (function( $ ){
            $.fn.jSearch = function( options ) {

                var defaults = {
                    selector: null,
                    child: null,
                    minValLength: 3,
                    Found: function(elem, event){},
                    NotFound: function(elem, event){},
                    Before: function(t){},
                    After: function(t){},
                };

                var options = $.extend(defaults, options);
                var $this = $(this);

                if ( options.selector == null || options.child === null || typeof options.NotFound != "function" || typeof options.Found != "function" || typeof options.After != "function" || typeof options.Before != "function" )
                { console.error( 'One of the parameters is incorrect.' ); return false; }


                $this.on( 'keyup', function(event){

                    options.Before($this);

                    if ( $(this).val().length >= options.minValLength ) {
                        console.clear();

                        $( options.selector ).find( options.child ).each(function( event ){
                            if ( this.innerText.toLowerCase().indexOf( $this.val().toLowerCase() ) == -1 ) {
                                options.NotFound( this, event );
                            } else {
                                options.Found( this, event );
                            }

                        });

                    }
                    options.After($this);

                });

            };
        })( jQuery );

        $('#search').jSearch({
            selector  : 'table',
            child : 'tr > td',
            minValLength: 0,
            Before: function(){
                $('table tr').data('find','');
            },
            Found : function(elem){
                $(elem).parent().data('find','true');
                $(elem).parent().show();
            },
            NotFound : function(elem){
                if (!$(elem).parent().data('find'))
                    $(elem).parent().hide();
            },
            After : function(t){
                if (!t.val().length) $('table tr').show();
            }
        });

    });
</script>
                   
                   
                    
                    <?php require_once ('cabinet/'.$cabinet.'/view/content'.ucfirst($content).'.php');?>
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