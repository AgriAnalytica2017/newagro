<style>
    .load{
        margin: 0px auto;
        width: 100px;
        display: block;
    }
</style>
<div class="box">
    <div class="box-bodyn">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content">Graphics benchmarking</strong>
            </h1>
        </div>
    </div>
</div>
<div class="rown" style="filter:blur(25px);">
    <!-- /.box-header -->

    <div class="box-body">
        <div class="row">
            <div class="form-group col-sm-4">
                <select class="form-control" id="crop">
                    <?php foreach ($date['crop'] as $id_crop=>$date_crop){?>
                    <option value="<?=$id_crop.'-'.$date_crop['type']?>"><?=$date_crop['name']?></option>
                    <?}?>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <select class="form-control" id="graf">
                    <?php foreach ($date['graphs_name'] as $graphs_id=>$graphs_name){ ?>
                        <option value="<?=$graphs_id?>"><?=$graphs_name?></option>
                    <? } ?>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <select class="form-control" id="region">
                    <?php foreach ($date['region'] as $region_id=>$region_name){ ?>
                        <option value="<?=$region_id?>"><?=$region_name?></option>
                    <? } ?>
                </select>
            </div>
        </div>
        <div class="text-center" id="remains"></div>
        <div  id="chart_div" style="width: 900px; min-height: 450px; margin: 0 auto;"></div>

        <table class="table" style="width: 900px; margin: 0 auto;">
            <thead>
            <tr>
                <th></th>
                <th>2014</th>
                <th>2015</th>
                <th>2016</th>
                <th>2017</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th><?php if($_COOKIE['lang']=="ua"){echo "Україна";}elseif ($_COOKIE['lang']=="gb") {
                        echo "Ukraine";
                    }?></th>
                <th id="tb_ua_2014"></th>
                <th id="tb_ua_2015"></th>
                <th id="tb_ua_2016"></th>
                <th id="tb_ua_2017"></th>
            </tr>
            <tr>
                <th id="region_table"></th>
                <th id="tb_rg_2014"></th>
                <th id="tb_rg_2015"></th>
                <th id="tb_rg_2016"></th>
                <th id="tb_rg_2017"></th>
            </tr>
            <tr>
                <th>my </th>
                <th id="tb_my_2014"></th>
                <th id="tb_my_2015"></th>
                <th id="tb_my_2016"></th>
                <th id="tb_my_2017"></th>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    $(document).ready(function (){
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(Graphs);
        var plan_json='<?=json_encode($date["plan_fin"])?>';
        var plan = JSON.parse ( plan_json );
        var form_json='<?=json_encode($date["form"])?>';
        var form = JSON.parse ( form_json );
        $("#crop, #graf, #region").change(Graphs);
        function Graphs() {
            $('#chart_div').html("<img class='load' src='<?=SRC::getSrcR()?>/cabinet/new-farmer/template/img/load.gif'>");
            var crop=$("#crop").val();
            var graf=$("#graf").val();
            var region=$("#region").val();
            var title=$("#graf option:selected").text();
            var region_name=$("#region option:selected").text();
            var cropList = crop.split('-');
            var p=plan[cropList[0]][graf];
            var aj_crop_id=cropList[0];
            var aj_crop_type=cropList[1];
            var aj_region=region;
            var r1, r2, r3, u1, u2, u3;
            var f1=0;
            var f2=0;
            var f3=0;
            if(form[cropList[0]]!=undefined){
                if(form[cropList[0]][2014]!=undefined) f1=parseInt(form[cropList[0]][2014][graf]);
                if(form[cropList[0]][2015]!=undefined) f2=parseInt(form[cropList[0]][2015][graf]);
                if(form[cropList[0]][2016]!=undefined) f3=parseInt(form[cropList[0]][2016][graf]);
            }
            ////
            $.ajax({
                type : 'post',
                url : '/new-farmer/load_his',
                data : {
                    'crop' :  aj_crop_id,
                    'region': aj_region,
                    'type_crop': aj_crop_type
                },
                response : 'text',
                success : function(html) {
                    var region_date=JSON.parse ( html );
                    r1=parseInt(region_date[2014][graf]);
                    r2=parseInt(region_date[2015][graf]);
                    r3=parseInt(region_date[2016][graf]);
                ////UA
                $.ajax({
                    type : 'post',
                    url : '/new-farmer/load_his',
                    data : {
                        'crop' :  aj_crop_id,
                        'region': 0,
                        'type_crop': aj_crop_type
                    },
                    response : 'text',
                    success : function(html) {
                        var UA_date=JSON.parse ( html );
                        u1=parseInt(UA_date[2014][graf]);
                        u2=parseInt(UA_date[2015][graf]);
                        u3=parseInt(UA_date[2016][graf]);
                        p=parseInt(p);
                        var data=google.visualization.arrayToDataTable([
                            ['роки', 	'Україна', region_name,   'my fact', '2017 plan'],
                            ['',  	    0,          0,          0,		    p],
                            ['2014',  	u1,         r1,         f1,	    p],
                            ['2015', 	u2,         r2,    	    f2,	    p],
                            ['2016', 	u3,         r3,    	    f3,	    p],
                            ['2017',  	    0,          0,          0,		p]
                            //['2017',	0,          0,          p,	    p]
                        ]);
                        var options = {
                            title : title,
                            hAxis: {title: 'роки'},
                            seriesType: 'bars',
                            series: {3: {
                                type: 'line',
                                lineWidth: 5,
                                pointSize: 20,
                                pointShape: { type: 'triangle', rotation: 90 }
                            }}
                        };
                        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                        chart.draw(data, options);
                        $("#region_table").text(region_name);
                        $("#tb_ua_2014").text(u1);
                        $("#tb_ua_2015").text(u2);
                        $("#tb_ua_2016").text(u3);

                        $("#tb_rg_2014").text(r1);
                        $("#tb_rg_2015").text(r2);
                        $("#tb_rg_2016").text(r3);

                        $("#tb_my_2014").text(f1);
                        $("#tb_my_2015").text(f2);
                        $("#tb_my_2016").text(f3);

//                        $("#tb_ua_s").text(cu);
//                        $("#tb_rg_s").text(cr);
//                        $("#tb_my_s").text(ch);

                        $("#tb_my_2017").text(p);

                    }
                });
                }
            });

        }
    });
</script>