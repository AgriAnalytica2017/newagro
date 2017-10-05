<style>
    .with-border{
        border-top: 2px solid #c0c0c0;
        margin-top: 20px;
    }
    .nav li {
        font-size: 22px;
    }
</style>
<div class="box">
    <div class="box-bodyn">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content">Накладні витрати</strong>
            </h1>
        </div>
    </div>
</div>
<br>
<div class="rown">
    <div class="col-lg-8 col-lg-offset-2">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Ремонт техніки та обладнання</a></li>
            <li><a href="#tab_2" data-toggle="tab">Інші виробничі витрати</a></li>
            <li><a href="#tab_3" data-toggle="tab">Операційні витрати</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_1" aria-expanded="false" class="collapsed">
                                        <h3 class="text-center">План: <b id="p_1"><?=$date['other_costs']['plan']['2']['costs_plan']?></b>, грн</h3>
                                    </a>
                                </h4>
                            </div>
                            <div <?if($_SESSION['payment_status']==1){echo "id='collapse_1'";}?> class="panel-collapse collapse" aria-expanded="false" style="height: 0px;" disabled>
                                <form action="/new-farmer/save_other_cost" method="post">
                                    <input type="hidden" name="costs_type" value="2">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label>Дата</label>
                                                    <input class="form-control edit_cost_plan_date_2" type="date"  name="cost_plan_date">
                                                </th>
                                                <th>
                                                    <label>Сума, грн</label>
                                                    <input class="form-control edit_cost_plan_2" type="text"  name="cost_plan">
                                                </th>
                                                <th>
                                                    <label>Коментар</label>
                                                    <textarea class="form-control edit_cost_plan_note_2" name="cost_plan_note"></textarea>
                                                </th>
                                                <th class="adding_plan">
                                                    <br>
                                                    <input class="btn" type="submit" value="Додати до плану">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?if($date['other_costs']['plan']['2']!=false) foreach ($date['other_costs']['plan']['2'] as $fact_other){?>
                                            <tr>
                                                <th><?=$fact_other['costs_date']?></th>
                                                <th class="p_price_1"><?=$fact_other['costs_plan']?></th>
                                                <th><?=$fact_other['costs_comments']?></th>
                                                <th><a data-type="2" data-data='<?=json_encode($fact_other)?>' class="btn btn-warning edit_other_plan"><span class="glyphicon glyphicon-pencil"></span></a>
                                                <a href="/new-farmer/remove_other_costs/<?=$fact_other['id_costs']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></th>
                                            </tr>
                                        <?}?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>

                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_2" aria-expanded="false" class="collapsed">
                                        <h3 class="text-center">Факт: <b id="f_1">20</b>, грн</h3>
                                    </a>
                                </h4>
                            </div>
                            <div <?if($_SESSION['payment_status']==1){echo "id='collapse_2'";}?> class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <form action="/new-farmer/create_other_fact" method="post">
                                    <input type="hidden" name="cost_fact_type" value="2">
                                    <table class="table">
                                        <tr>
                                            <th>
                                                <label>Дата</label>
                                                <input class="form-control edit_cost_fact_date_2" type="date" name="cost_fact_date">
                                            </th>
                                            <th>
                                                <label>Сума, грн</label>
                                                <input class="form-control edit_cost_fact_2" type="text" name="cost_fact">
                                            </th>
                                            <th>
                                                <label>Коментар</label>
                                                <textarea class="form-control edit_cost_fact_note_2" name="cost_fact_note"></textarea>
                                            </th>
                                            <th class="adding_fact">
                                                <br>
                                                <input class="btn" type="submit" value="Додати до факту">
                                            </th>
                                        </tr>
                                        <?if($date['other_costs']['fact']['2']!=false) foreach ($date['other_costs']['fact']['2'] as $fact_other){?>
                                            <tr>
                                                <th><?=$fact_other['cost_fact_date']?></th>
                                                <th class="f_price_1"><?=$fact_other['cost_fact']?></th>
                                                <th><?=$fact_other['cost_fact_note']?></th>
                                                <th><a data-type="2" data-data='<?=json_encode($fact_other)?>' class="btn btn-warning edit_other_fact"><span class="glyphicon glyphicon-pencil"></span></a>
                                                    <a href="/new-farmer/remove_other_costs_fact/<?=$fact_other['id_cost_fact']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                                </th>
                                            </tr>
                                        <?}?>
                                    </table>
                                </form>
                            </div>
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="false" class="collapsed">
                                        <h3 class="text-center">Різниця: <b id="d_1">20</b>, грн</h3>
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_2">
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_1_1" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">План: <b id="p_2"><?=$date['other_costs']['plan']['3']['costs_plan']?></b>, грн</h3>
                                        </a>
                                    </h4>
                                </div>
                                <div <?if($_SESSION['payment_status']==1){echo "id='collapse_1_1'";}?> class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/save_other_cost" method="post">
                                        <input type="hidden" name="costs_type" value="3">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>
                                                    <label>Дата</label>
                                                    <input class="form-control edit_cost_plan_date_3" type="date" name="cost_plan_date">
                                                </th>
                                                <th>
                                                    <label>Сума, грн</label>
                                                    <input class="form-control edit_cost_plan_3" type="text" name="cost_plan">
                                                </th>
                                                <th>
                                                    <label>Коментар</label>
                                                    <textarea class="form-control edit_cost_plan_note_3" type="text" name="cost_plan_note"></textarea>
                                                </th>
                                                <th class="adding_plan">
                                                    <br>
                                                    <input class="btn" type="submit" value="Додати до плану">
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?if($date['other_costs']['plan']['3']!=false) foreach ($date['other_costs']['plan']['3'] as $fact_other){?>
                                                <tr>
                                                    <th><?=$fact_other['costs_date']?></th>
                                                    <th class="p_price_2"><?=$fact_other['costs_plan']?></th>
                                                    <th><?=$fact_other['costs_comments']?></th>
                                                    <th><a data-type="3" data-data='<?=json_encode($fact_other)?>' class="btn btn-warning edit_other_plan"><span class="glyphicon glyphicon-pencil"></span></a>
                                                        <a href="/new-farmer/remove_other_costs/<?=$fact_other['id_costs']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></th>
                                                </tr>
                                            <?}?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_1_2" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Факт: <b id="f_2">20</b>, грн</h3>
                                        </a>
                                    </h4>
                                </div>
                                <div <?if($_SESSION['payment_status']==1){echo "id='collapse_1_2'";}?> class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/create_other_fact" method="post">
                                        <input type="hidden" name="cost_fact_type" value="3">
                                        <table class="table">
                                            <tr>
                                                <th>
                                                    <label>Дата</label>
                                                    <input class="form-control edit_cost_fact_date_3" type="date" name="cost_fact_date">
                                                </th>
                                                <th>
                                                    <label>Сума, грн</label>
                                                    <input class="form-control edit_cost_fact_3" type="text" name="cost_fact">
                                                </th>
                                                <th>
                                                    <label>Коментар</label>
                                                    <textarea class="form-control edit_cost_fact_note_3" type="text" name="cost_fact_note"></textarea>
                                                </th>
                                                <th class="adding_fact">
                                                    <br>
                                                    <input class="btn" type="submit" value="Додати до факту">
                                                </th>
                                            </tr>
                                            <?if($date['other_costs']['fact']['3']!=false) foreach ($date['other_costs']['fact']['3'] as $fact_other){?>
                                                <tr>
                                                    <th><?=$fact_other['cost_fact_date']?></th>
                                                    <th class="f_price_2"><?=$fact_other['cost_fact']?></th>
                                                    <th><?=$fact_other['cost_fact_note']?></th>
                                                    <th><a data-type="3" data-data='<?=json_encode($fact_other)?>' class="btn btn-warning edit_other_fact"><span class="glyphicon glyphicon-pencil"></span></a>
                                                        <a href="/new-farmer/remove_other_costs_fact/<?=$fact_other['id_cost_fact']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></th>
                                                </tr>
                                            <?}?>
                                        </table>
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Різниця: <b id="d_2">20</b>, грн</h3>
                                        </a>
                                    </h4>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_3">
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_2_1" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">План: <b id="p_3"><?=$date['other_costs']['plan']['1']['costs_plan']?></b>, грн</h3>
                                        </a>
                                    </h4>
                                </div>
                                <div <?if($_SESSION['payment_status']==1){echo "id='collapse_2_1'";}?> class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/save_other_cost" method="post">
                                        <input type="hidden" name="costs_type" value="1">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>
                                                    <label>Дата</label>
                                                    <input class="form-control edit_cost_plan_date_1" type="date" name="cost_plan_date">
                                                </th>
                                                <th>
                                                    <label>Сума, грн</label>
                                                    <input class="form-control edit_cost_plan_1" type="text" name="cost_plan">
                                                </th>
                                                <th>
                                                    <label>Коментар</label>
                                                    <textarea class="form-control edit_cost_plan_note_1" type="text" name="cost_plan_note"></textarea>
                                                </th>
                                                <th class="adding_plan">
                                                    <br>
                                                    <input class="btn" type="submit" value="Додати до плану">
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?if($date['other_costs']['plan']['1']!=false) foreach ($date['other_costs']['plan']['1'] as $fact_other){?>
                                                <tr>
                                                    <th><?=$fact_other['costs_date']?></th>
                                                    <th class="p_price_3"><?=$fact_other['costs_plan']?></th>
                                                    <th><?=$fact_other['costs_comments']?></th>
                                                    <th><a data-type="1" data-data='<?=json_encode($fact_other)?>' class="btn btn-warning edit_other_plan"><span class="glyphicon glyphicon-pencil"></span></a>
                                                        <a href="/new-farmer/remove_other_costs/<?=$fact_other['id_costs']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></th>
                                                </tr>
                                            <?}?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_2_2" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Факт: <b id="f_3">10</b>, грн</h3>
                                        </a>
                                    </h4>
                                </div>
                                <div <?if($_SESSION['payment_status']==1){echo "id='collapse_2_2'";}?> class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/create_other_fact" method="post">
                                        <input type="hidden" name="cost_fact_type" value="1">
                                        <table class="table">
                                            <tr>
                                                <th>
                                                    <label>Дата</label>
                                                    <input class="form-control edit_cost_fact_date_1" type="date" name="cost_fact_date">
                                                </th>
                                                <th>
                                                    <label>Сума, грн</label>
                                                    <input class="form-control edit_cost_fact_1" type="text" name="cost_fact">
                                                </th>
                                                <th>
                                                    <label>Коментар</label>
                                                    <textarea class="form-control edit_cost_fact_note_1" type="text" name="cost_fact_note"></textarea>
                                                </th>
                                                <th class="adding_fact">
                                                    <br>
                                                    <input class="btn" type="submit" value="Додати до факту">
                                                </th>
                                            </tr>
                                            <?if($date['other_costs']['fact']['1']!=false)foreach ($date['other_costs']['fact']['1'] as $fact_other){?>
                                                <tr>
                                                    <th><?=$fact_other['cost_fact_date']?></th>
                                                    <th class="f_price_3"><?=$fact_other['cost_fact']?></th>
                                                    <th><?=$fact_other['cost_fact_note']?></th>
                                                    <th><a data-type="1" data-data='<?=json_encode($fact_other)?>' class="btn btn-warning edit_other_fact"><span class="glyphicon glyphicon-pencil"></span></a>
                                                        <a href="/new-farmer/remove_other_costs_fact/<?=$fact_other['id_cost_fact']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                                    </th>
                                                </tr>
                                            <?}?>
                                        </table>
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Різниця: <b id="d_3">20</b>, грн</h3>
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
            var f1=0, f2=0, f3=0, p1=0, p2=0, p3=0;

            $('.f_price_1').each(function () {
                f1+=parseFloat($(this).text());
            });
            $('.f_price_2').each(function () {
                f2+=parseFloat($(this).text());
            });
            $('.f_price_3').each(function () {
                f3+=parseFloat($(this).text());
            });
            $('.p_price_1').each(function () {
                p1+=parseFloat($(this).text());
            });
            $('.p_price_2').each(function () {
                p2+=parseFloat($(this).text());
            });
            $('.p_price_3').each(function () {
                p3+=parseFloat($(this).text());
            });
            $('#f_1').text(f1);
            $('#f_2').text(f2);
            $('#f_3').text(f3);
            $('#p_1').text(p1);
            $('#p_2').text(p2);
            $('#p_3').text(p3);
            $('#d_1').text(p1-f1);
            $('#d_2').text(p2-f2);
            $('#d_3').text(p3-f3);
        }

        $('.edit_other_plan').click(edit_plan);
        function edit_plan() {
            var json_data = $(this).attr('data-data');
            var other_plan = JSON.parse(json_data);
            var type = $(this).attr('data-type');
            $('.edit_cost_plan_date_'+type).val(other_plan['costs_date']);
            $('.edit_cost_plan_'+type).val(other_plan['costs_plan']);
            $('.edit_cost_plan_note_'+type).val(other_plan['costs_comments']);
            var id = other_plan['id_costs'];
            $('.adding_plan').html('');
            $('.adding_plan').append("<a class='btn btn-primary edit_other_costs_plan' data-type='"+type+"' data-id='"+id+"'>Зберегти</a>");
        }

        $('.adding_plan').on('click','.edit_other_costs_plan',save_edit_plan);
        function save_edit_plan() {
            var type = $(this).attr('data-type');
            var date = $('.edit_cost_plan_date_'+type).val();
            var costs_plan = $('.edit_cost_plan_'+type).val();
            var costs_comments = $('.edit_cost_plan_note_'+type).val();
            var id = $(this).attr('data-id');
            $.ajax({
                type : 'post',
                url : '/new-farmer/edit_other_costs_plan',
                data : {
                    'id': id,
                    'date' : date,
                    'costs_plan' : costs_plan,
                    'costs_comments' : costs_comments
                },
                success: function () {
                    location.reload();
                }
            });
        }

        $('.edit_other_fact').click(edit_fact);
        function edit_fact() {
            var json_data_fact = $(this).attr('data-data');
            var other_fact = JSON.parse(json_data_fact);
            var type = $(this).attr('data-type');
            $('.edit_cost_fact_date_'+type).val(other_fact['cost_fact_date']);
            $('.edit_cost_fact_'+type).val(other_fact['cost_fact']);
            $('.edit_cost_fact_note_'+type).val(other_fact['cost_fact_note']);
            var id = other_fact['id_cost_fact'];
            $('.adding_fact').html('');
            $('.adding_fact').append("<a class='btn btn-primary edit_other_costs_fact' data-type='"+type+"' data-id='"+id+"'>Зберегти</a>");
        }
        $('.adding_fact').on('click','.edit_other_costs_fact', save_edit_fact);
        function save_edit_fact() {
            var type = $(this).attr('data-type');
            var date = $('.edit_cost_fact_date_'+type).val();
            var cost_fact = $('.edit_cost_fact_'+type).val();
            var cost_comments = $('.edit_cost_fact_note_'+type).val();
            var id = $(this).attr('data-id');
            $.ajax({
                type: 'post',
                url: '/new-farmer/edit_other_costs_fact',
                data: {
                    'id_fact': id,
                    'date_fact': date,
                    'cost_fact': cost_fact,
                    'cost_comments': cost_comments
                },
                success: function () {
                    location.reload();
                }
            });
        }
    });
</script>

