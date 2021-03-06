<script>
    $(document).ready(function (){
        $("#btnExport").click(function(e) {
            e.preventDefault();
            var data_type = 'data:application/vnd.ms-excel';
            var table_div = document.getElementById('table_wrapper');
            var table_html = table_div.outerHTML.replace(/ /g, '%20');
            var meta ="<meta http-equiv='content-type' content='text/plain; charset=UTF-8'>";
            var a = document.createElement('a');
            a.href = data_type + ', ' + meta +  table_html;
            a.download = 'AgriAnalytica(RemainsRevenue).xls';
            a.click();
        });
    });
</script>
<style>
    #btnExport{
        display: none;
    }
</style>
<section class="content">
    <div class="box" id="table_wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th><?=$language['farmer']['125']?></th>
                    <th><?=$language['farmer']['127']?></th>
                    <th><?=$language['farmer']['241']?></th>
                    <th><?=$language['farmer']['242']?></th>
                    <th><?=$language['farmer']['243']?></th>
                    <th><?=$language['farmer']['244']?></th>
                    <th><?=$language['farmer']['45']?></th>
                    <th><?=$language['farmer']['245']?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($date["remains"] as $Remains){?>
                    <tr>
                        <td><?php echo number_format($Remains["area"], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["yaled"], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["gross_weight"], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["weight_cleaning"], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["weight_drying"], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["mass"], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["price"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["revenue"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                    </tr>
                <? } ?>
            </tbody>
        </table>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th></th>
               <?php for ($x=1; $x<=12; $x++){?>
                   <th><?php echo $x?></th>
              <?php } ?>
                <th>Всього</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th><?=$language['farmer']['244']?>/th>
                    <?php for ($x=1; $x<=12; $x++){?>
                        <td><?php echo number_format($date["mont-revenue-mass"][$x], 2, ',', ' ')?></td>
                    <?php } ?>
                    <td><?php echo number_format($Remains["mass"], 2, ',', ' ')?></td>
                </tr>
                <tr>
                    <th><?=$language['farmer']['45']?></th>
                    <?php for ($x=1; $x<=12; $x++){?>
                        <td><?php echo number_format($date["mont-revenue-price"][$x], 2, ',', ' ')?></td>
                    <?php } ?>
                    <td><?php echo number_format($Remains["price"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                </tr>
                <tr>
                    <th><?=$language['farmer']['245']?></th>
                    <?php for ($x=1; $x<=12; $x++){?>
                        <td><?php echo number_format($date["mont-revenue"][$x], 2, ',', ' ')?></td>
                    <?php } ?>
                    <td><?php echo number_format($Remains["revenue"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                </tr>
                <tr>
                    <td><button id="btnExport" class="btn btn-primary" >Експорт в XLS</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
