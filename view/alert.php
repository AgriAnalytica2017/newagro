<?php if(isset($_SESSION['alert_status']) and $_SESSION['alert_status'] == 1){ ?>
    <div class="alertInfo alert alert-success"><?php echo $_SESSION['alert_msg'];?></div>
<?php }elseif(isset($_SESSION['alert_status']) and $_SESSION['alert_status'] == 0){?>


    <div class="alertInfo alert alert-info">


    </div>
    <script>
        var msg = ' <?php echo $_SESSION['alert_msg'];?>';
        alert(msg);
    </script>


<?php }

elseif(isset($_SESSION['alert_status']) and $_SESSION['alert_status'] == -1){ ?>
    <div class="alertInfo alert alert-danger"><?php echo $_SESSION['alert_msg'];?></div>
<?php } ?>




