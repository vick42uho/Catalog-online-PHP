<?php include('hder.php'); //css 
//query status =1
$querystatus1 = "SELECT o_status, COUNT(o_id) as s1total
FROM order_head
WHERE o_status = 1
GROUP BY o_status";
$rs1 = mysqli_query($condb, $querystatus1);
$rows1 = mysqli_fetch_array($rs1);
// echo $querystatus1

//query status =2
$querystatus2 = "SELECT o_status, COUNT(o_id) as s2total
FROM order_head
WHERE o_status = 2
GROUP BY o_status";
$rs2 = mysqli_query($condb, $querystatus2);
$rows2 = mysqli_fetch_array($rs2);
// echo $querystatus2

//query status =3
$querystatus3 = "SELECT o_status, COUNT(o_id) as s3total
FROM order_head
WHERE o_status = 3
GROUP BY o_status";
$rs3 = mysqli_query($condb, $querystatus3);
$rows3 = mysqli_fetch_array($rs3);
// echo $querystatus1

//query status =4
$querystatus4 = "SELECT o_status, COUNT(o_id) as s4total
FROM order_head
WHERE o_status = 4
GROUP BY o_status";
$rs4 = mysqli_query($condb, $querystatus4);
$rows4 = mysqli_fetch_array($rs4);
// echo $querystatus1
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
        <h3 align="center"> Admin Page
          <br>
          ยินดีต้อนรับคุณ
          <?php echo $m_name; ?>
        </h3>
        <a href="index.php" class="btn btn-warning">รอชำระเงิน <span class="badge text-bg-danger"><?php echo isset($rows1['s1total']) ? $rows1['s1total'] : 0; ?></span></a>
        <a href="index.php?act=paid" class="btn btn-success">ชำระเงินแล้ว <span class="badge text-bg-light"><?php echo isset($rows2['s2total']) ? $rows2['s2total'] : 0; ?></span></a>
        <a href="index.php?act=ems" class="btn btn-info">แจ้ง EMS แล้ว <span class="badge text-bg-light"><?php echo isset($rows3['s3total']) ? $rows3['s3total'] : 0; ?></span></a>
        <a href="index.php?act=cancel" class="btn btn-danger">ยกเลิก <span class="badge text-bg-light"><?php echo isset($rows4['s4total']) ? $rows4['s4total'] : 0; ?></span></a>
<br><br>

        <?php
        $act = (isset($_GET['act']) ? $_GET['act'] : '');
        if ($act == 'paid') {
          include 'list_order_paid.php';
        } elseif ($act == 'ems') {
          include 'list_order_ems.php';
        } elseif ($act == 'cancel') {
          include 'list_order_cancel.php';
        } elseif ($act == 'log_login') {
          include 'login_list.php';
        } else {
          include 'list_order_new.php';
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