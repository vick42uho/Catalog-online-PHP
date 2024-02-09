<meta charset="utf-8">
<?php
//condb
include('../condb.php');

// echo '<pre>';
// print_r($_POST);
// echo $_FILES['o_slip']['name'];
// echo '</pre>';

// exit();



$bid = mysqli_real_escape_string($condb, $_POST["bid"]);
$o_slip_date = mysqli_real_escape_string($condb, $_POST["o_slip_date"]);
$o_slip_total = mysqli_real_escape_string($condb, $_POST["o_slip_total"]);
$o_id = mysqli_real_escape_string($condb, $_POST["o_id"]);


$date1 = date("Ymd_His");
$numrand = (mt_rand());
$o_slip = (isset($_POST['o_slip']) ? $_POST['o_slip'] : '');
$upload = $_FILES['o_slip']['name'];
if ($upload != '') {
  //โฟลเดอร์ที่เก็บไฟล์
  $path = "../imgslip/";
  //ตัวขื่อกับนามสกุลภาพออกจากกัน
  $type = strrchr($_FILES['o_slip']['name'], ".");
  //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
  $newname = 'slip' . $numrand . $date1 . $type;
  $path_copy = $path . $newname;
  $path_link = "../mimg/" . $newname;
  //คัดลอกไฟล์ไปยังโฟลเดอร์
  move_uploaded_file($_FILES['o_slip']['tmp_name'], $path_copy);
} else {
  $newname = '';
}

$sql = "UPDATE order_head SET
bid='$bid',
o_slip_date='$o_slip_date',
o_slip_total='$o_slip_total',
o_status=2,
o_slip='$newname'
WHERE o_id = $o_id
";

$result = mysqli_query($condb, $sql) or die("Error in query: " . $sql . mysqli_error($condb));

mysqli_close($condb);
if ($result) {
  echo "<script type='text/javascript'>";
  echo "alert('แจ้งชำระเงินสำเร็จ');";
  echo "window.location = 'payment_detail.php?o_id=$o_id'; ";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  //echo "alert('Error!!');";
  echo "window.location = 'index.php'; ";
  echo "</script>";
}
?>