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
        <br><br>
        <h4>::จัดการ ธนาคาร::
          <a href="bank.php?act=add" class="btn btn-success"> +ADD </a>
        </h4>
       <?php 
        $act = (isset($_GET['act']) ? $_GET['act'] : '');
        if ($act=='add') {
          include('bank_form_add.php');
        }elseif ($act=='edit') {
          include('bank_form_edit.php');
        }
        else{
          include('bank_list.php');
        }

       ?>
      </div>
    </div>
  </div>
  <?php include('footer.php'); //footer?>
</body>
<?php include('js.php'); //js?>
<?php include('button.php'); //button?>