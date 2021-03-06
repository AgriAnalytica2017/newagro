<?php
$page=5;
$gr=array(
    1=>1,
    2=>6,
    3=>8,
    4=>12,
    5=>4,
    6=>16,
    7=>5,
    8=>7,
    9=>11,
    10=>2,
    11=>3,
    12=>17
);
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    $(document).ready(function (){
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(Graphs);

        var remains_json= '<?= json_encode($date['remains']) ?>';
        var remains = JSON.parse (remains_json);
        var forecast_json= '<?= json_encode($date['my_crop']) ?>';
        var forecast = JSON.parse (forecast_json);
        var historical_json='<?= json_encode($date["historical"])?>';
        var historical = JSON.parse ( historical_json );
        var historical_ukraine_json='<?= json_encode($date["historical_ukraine"])?>';
        var historical_ukraine = JSON.parse ( historical_ukraine_json );
        var gr_json= '<?= json_encode($gr) ?>';
        var gr = JSON.parse ( gr_json );

        $("#crop, #graf, #region").change(Graphs);
        function Graphs() {
            var crop=$("#crop").val();
            var graf=$("#graf").val();
            var region=$("#region").val();
            var title=$("#graf option:selected").text();
            var region_name=$("#region option:selected").text();


            var cropList = crop.split('-');


            if(cropList[1]!=3){
                u14=parseInt(historical_ukraine['2014'][crop][graf][0]);
                u15=parseInt(historical_ukraine['2015'][crop][graf][0]);
                u16=parseInt(historical_ukraine['2016'][crop][graf][0]);
                r14=parseInt(historical_ukraine['2014'][crop][graf][region]);
                r15=parseInt(historical_ukraine['2015'][crop][graf][region]);
                r16=parseInt(historical_ukraine['2016'][crop][graf][region]);
                h14=parseInt(historical['2014'][crop][graf]);
                h15=parseInt(historical['2015'][crop][graf]);
                h16=parseInt(historical['2016'][crop][graf]);
            }
            if(cropList[1]==3){
                var st=forecast[crop]['st'];
                if(st!=0){
                    u14=parseInt(historical_ukraine['2014'][st][graf][0]);
                    u15=parseInt(historical_ukraine['2015'][st][graf][0]);
                    u16=parseInt(historical_ukraine['2016'][st][graf][0]);
                    r14=parseInt(historical_ukraine['2014'][st][graf][region]);
                    r15=parseInt(historical_ukraine['2015'][st][graf][region]);
                    r16=parseInt(historical_ukraine['2016'][st][graf][region]);
                    h14=parseInt(historical['2014'][st][graf]);
                    h15=parseInt(historical['2015'][st][graf]);
                    h16=parseInt(historical['2016'][st][graf]);
                }
                if(st==0){
                    u14=0;
                    u15=0;
                    u16=0;
                    r14=0;
                    r15=0;
                    r16=0;
                    h14=0;
                    h15=0;
                    h16=0;
                }
            }

            m17=parseInt(forecast[crop][graf]);
            var ud=0;
            if(u14!=0) ud++;
            if(u15!=0) ud++;
            if(u16!=0) ud++;

            var rd=0;
            if(r14!=0) rd++;
            if(r15!=0) rd++;
            if(r16!=0) rd++;

            var hd=0;
            if(h14!=0) hd++;
            if(h15!=0) hd++;
            if(h16!=0) hd++;

            cu=parseInt((u14+u15+u16)/ud);
            cr=parseInt((r14+r15+r16)/rd);
            ch=parseInt((h14+h15+h16)/hd);

            //alert(remains[graf]);
            $('#remains').text(remains[graf]);
            var data = google.visualization.arrayToDataTable([
                ['роки', 	'Україна', region_name,   'tov', '2017'],
                ['',  	    0,          0,          0,		m17],
                ['2014',  	u14,       r14,    	    h14,	m17],
                ['2015', 	u15,       r15,    	    h15,	m17],
                ['2016', 	u16,       r16,    	    h16,	m17],
                ['<?php if($_COOKIE['lang']=="ua"){echo "середнє за 3 роки";}elseif ($_COOKIE['lang']=="gb") {
                   echo "Average for 3 years";
                }?>',	cu,         cr,   	    ch,	    m17],
                ['2017',	0,          0,          m17,	m17]
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
                }},
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            $("#region_table").text(region_name);
            $("#tb_ua_2014").text(u14);
            $("#tb_ua_2015").text(u15);
            $("#tb_ua_2016").text(u16);

            $("#tb_rg_2014").text(r14);
            $("#tb_rg_2015").text(r15);
            $("#tb_rg_2016").text(r16);

            $("#tb_my_2014").text(h14);
            $("#tb_my_2015").text(h15);
            $("#tb_my_2016").text(h16);

            $("#tb_ua_s").text(cu);
            $("#tb_rg_s").text(cr);
            $("#tb_my_s").text(ch);

            $("#tb_my_2017").text(m17);
        }
    });
</script>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo $language['farmer']['60'];?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="form-group col-sm-4">
                    <select class="form-control" id="crop">
                        <?php
                        for ($r=1; $r<=3; $r++){
                            for ($x=1; $x<=$date['date-'.$r]["crop_coll"]; $x++){ ?>
                            <option value="<?php echo $date['date-'.$r]['crop'][$x]."-".$r?>"><? echo $date['date-'.$r]['name'][$x]?></option>
                        <? }
                        } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <select class="form-control" id="graf">
                        <?php foreach ($gr as $Ex_name){ ?>
                            <option value="<?php echo $Ex_name?>"><?php foreach ($date["table2"] as $name)if($name["name_php"]==$Ex_name){if($_COOKIE['lang']=='ua'){ echo $name["name_ua"];}else {echo $name['name_en'];}}?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <select class="form-control" id="region">
                        <?php
                        foreach ($language['farmer']['region'] as $key => $item)
                        {?>
                            <option value="<?= $key;?>"><?=$item;?></option>
                        <?}?>
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
                        <th><?php if($_COOKIE['lang']=="ua"){echo "середнє за 3 роки";}elseif ($_COOKIE['lang']=="gb") {
                   echo "Average for 3 years";
                }?></th>
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
                        <th id="tb_ua_s"></th>
                        <th id="tb_ua_2017"></th>
                    </tr>
                    <tr>
                        <th id="region_table"></th>
                        <th id="tb_rg_2014"></th>
                        <th id="tb_rg_2015"></th>
                        <th id="tb_rg_2016"></th>
                        <th id="tb_rg_s"></th>
                        <th id="tb_rg_2017"></th>
                    </tr>
                    <tr>
                        <th>tov</th>
                        <th id="tb_my_2014"></th>
                        <th id="tb_my_2015"></th>
                        <th id="tb_my_2016"></th>
                        <th id="tb_my_s"></th>
                        <th id="tb_my_2017"></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</section>
