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
            a.download = 'AgriAnalytica(RemainsFuel).xls';
            a.click();
        }   );
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
                    <th></th>
                    <th><?=$language['farmer']['220']?></th>
                    <th><?=$language['farmer']['228']?></th>
                    <th><?=$language['farmer']['229']?></th>
                    <th><?=$language['farmer']['230']?></th>
                    <th><?=$language['farmer']['231']?></th>
                    <th><?=$language['farmer']['232']?></th>
                    <th><?=$language['farmer']['233']?></th>
                    <th><?=$language['farmer']['234']?></th>
                    <th><?=$language['farmer']['235']?></th>
                    <th><?=$language['farmer']['236']?></th>
                    <th><?=$language['farmer']['237']?></th>
                    <th><?=$language['farmer']['238']?></th>
                    <th><?=$language['farmer']['239']?></th>
                    <th><?=$language['farmer']['240']?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($date["remains"] as $Remains){?>
                        <tr>
                            <td></td>
                            <td><?php echo $Remains["name_action"] ?></td>
                            <td><?php echo $Remains["name_working_ua"] ?></td>
                            <td><?php echo $Remains["name_power_ua"] ?></td>
                            <td><?php echo $Remains["name_fuel"]?></td>
                            <td><?php echo number_format($Remains["productivity"], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["total_work"], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["shifts"], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["fuel"], 2, ',', ' ') ?></td>
                            <td><?php echo number_format($Remains["total_fuel_amnt"], 2, ',', ' ') ?></td>
                            <td><?php echo number_format($Remains["price_fuel"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["total_fuel_cost"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["total_oil_amnt"], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["total_oil_cost"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["fuel_lubes_cost"]/$_COOKIE['currency_val'], 3, ',', ' ')?></td>
                        </tr>
                <? } ?>
                <tr>
                    <td colspan="14"></td>
                    <td><? echo number_format($date["total"]['fuel'], 2, ',', ' ')?></td>
                </tr>
                <tr>
                    <td><button id="btnExport" class="btn btn-primary" ><?=$language['farmer']['11']?></button></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
