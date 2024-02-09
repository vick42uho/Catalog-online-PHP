<?php
// ตรวจสอบว่ามีการส่ง ID มาหรือไม่
if (isset($_GET['ID'])) {
    $ID = mysqli_real_escape_string($condb, $_GET['ID']);

    // ใช้ prepared statement กับ parameterized query
    $sql = "SELECT * FROM tbl_member WHERE m_id=?";
    $stmt = mysqli_prepare($condb, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID); // "i" หมายถึง integer
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // ตรวจสอบว่ามีข้อมูลหรือไม่
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <!-- แสดงข้อมูลที่ดึงมาได้ -->

        <?php
    } else {
        // ถ้าไม่พบข้อมูล
        echo "ไม่พบข้อมูล";
    }

    // ปิด prepared statement
    mysqli_stmt_close($stmt);
} else {
    // ถ้าไม่ได้ระบุ ID
    echo "กรุณาระบุ ID";
}
?>


<h4> Form แก้ไขสมาชิก </h4>
<form action="member_form_edit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Level :
    </div>
    <div class="col-sm-2">
      <select name="m_level" class="form-control" required>
        <option value="<?php echo $row['m_level'];?>">
          -<?php echo $row['m_level'];?>-
        </option>
        <option value="">-เลือกข้อมูล-</option>
        <?php 
        $ml =  $row['m_level'];
        if($ml=='ADMIN'){
          echo '<option value="MEMBER">-STAFF-</option>';
        }else{
          echo '<option value="ADMIN">-ADMIN-</option>';
        }
        ?>
      </select>
    </div>
  </div>
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
      Fname :
    </div>
    <div class="col-sm-2">
      <select name="m_fname" class="form-control" required>
         <option value="<?php echo $row['m_fname'];?>">-<?php echo $row['m_fname'];?>-</option>
        <option value="">-เลือกข้อมูล-</option>
        <option value="นาย">-นาย-</option>
        <option value="นาง">-นาง-</option>
        <option value="นางสาว">-นางสาว-</option> 
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      name :
    </div>
    <div class="col-sm-4">
      <input type="text" name="m_name" required class="form-control" value="<?php echo $row['m_name'];?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      lname :
    </div>
    <div class="col-sm-4">
      <input type="text" name="m_lname" required class="form-control" value="<?php echo $row['m_lname'];?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      email :
    </div>
    <div class="col-sm-6">
      <input type="email" name="m_email" required class="form-control" value="<?php echo $row['m_email'];?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      phone :
    </div>
    <div class="col-sm-6">
      <input type="text" name="m_phone" required class="form-control" value="<?php echo $row['m_phone'];?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      img :
    </div>
    <div class="col-sm-6">
      ภาพเก่า <br>
      <img src="../mimg/<?php echo $row['m_img'];?>" width="200px">
      <br>
      เลือกภาพใหม่ <br>
      <input type="file" name="m_img"  class="form-control" accept="image/*">
    </div>
  </div>

<br>
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-4">
      <input type="hidden" name="m_img2" value="<?php echo $row['m_img'];?>">
      <input type="hidden" name="m_id" value="<?php echo $row['m_id'];?>">
      <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
    </div>
  </div>
</form>