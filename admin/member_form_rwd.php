<?php 
// รับค่า ID จาก URL
$ID = (isset($_GET['ID']) && is_numeric($_GET['ID'])) ? $_GET['ID'] : 0;

// เชื่อมต่อกับฐานข้อมูล
include('../condb.php');

// ตรวจสอบค่า ID ที่ได้รับ
if ($ID > 0) {
    // ใช้ Prepared Statement กับ Parameterized Query
    $sql = "SELECT * FROM tbl_member WHERE m_id=?";
    $stmt = mysqli_prepare($condb, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID);
    mysqli_stmt_execute($stmt);

    // ดึงข้อมูล
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);

    // ปิด Prepared Statement
    mysqli_stmt_close($stmt);

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($condb);

    // ตรวจสอบว่ามีข้อมูลหรือไม่
    if ($row) {
        // นำข้อมูลไปใส่ในตัวแปร
        extract($row);

        // แสดงข้อมูลหรือใช้ตามที่ต้องการ
        // echo '<pre>';
        // print_r($row);
        // echo '</pre>';
    } else {
        echo 'ไม่พบข้อมูล ID ' . $ID;
    }
} else {
    echo 'Invalid ID';
}
?>

<h4> Form Reset Password </h4>
<form action="member_form_rwd_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Username :
    </div>
    <div class="col-sm-4">
      <input type="text" name="m_username" required class="form-control" autocomplete="off" value="<?php echo $row['m_username'];?>" disabled>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Password :
    </div>
    <div class="col-sm-4">
      <input type="password" name="m_password" required class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-4">
      <input type="hidden" name="m_id" value="<?php echo $row['m_id'];?>">
      <button type="submit" class="btn btn-primary">Reset Password</button>
    </div>
  </div>
</form>