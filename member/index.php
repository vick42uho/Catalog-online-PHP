<?php include('hder.php'); //css ?>
<body>
  <?php include('nav.php'); //menu?>
  <!-- content -->
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <?php include('menu_l.php');?>
      </div>
      <div class="col-md-10">
        
        <?php 
        $act = (isset($_GET['act']) ? $_GET['act'] : '');
        if ($act=='edit'){
          include('member_form_edit.php');
        } elseif ($act=='password'){
          include('member_form_rwd.php');
        } else {
          include('list_order.php');
        }
        ?>
      </div>
    </div>
  </div>
  <?php include('footer.php'); //footer?>
</body>
<?php include('js.php'); //js?>
<?php include('button.php'); //button?>