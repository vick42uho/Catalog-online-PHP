<?php include('hder.php'); //css 
?>
<script src="../ckeditor/ckeditor.js"></script>
<script src="../ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="../ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

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
        <h4>::จัดการสินค้า::
          <a href="prd.php?act=add" class="btn btn-success"> +ADD </a>
        </h4>
        <?php
        $act = (isset($_GET['act']) ? $_GET['act'] : '');
        if ($act == 'add') {
          include('prd_form_add.php');
        }elseif($act == 'edit'){
          include('prd_form_edit.php');
        } 
        else {
          include('prd_list.php');
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