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
                <h4>::จัดการ ความคิดเห็น::
                </h4>
                <?php
                $act = (isset($_GET['act']) ? $_GET['act'] : '');

                include('comment_list.php');


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