<?php include('hder.php'); //css 

?>



<body>
    <?php include('nav.php'); //menu
    ?>
    <!-- content -->
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?php include('menu_l.php'); ?>
            </div>
            <div class="col-md-10">
                <br><br>
                <h3 align="center"> Report

                </h3>
                <a href="report.php" class="btn btn-warning">รายวัน </a>
                <a href="report.php?act=month" class="btn btn-success">รายเดือน </a>
                <a href="report.php?act=year" class="btn btn-info">รายปี </a>
    

<br><br>
                <?php
                $act = (isset($_GET['act']) ? $_GET['act'] : '');
                if ($act == 'month') {
                    include 'report_month.php';
                } elseif ($act == 'year') {
                    include 'report_year.php';
                } elseif ($act == 'rangdate') {
                    include 'report_rangdate.php';
                }
                else {
                    include 'report_day.php';
                }

                ?>

            </div>
        </div>
    </div>
    <?php include('footer.php'); //footer
    ?>
</body>
<?php include('js.php'); //js
?>
<?php include('button.php'); //button
?>