<h4> Form แก้ไขสมาชิก </h4>
<form action="member_form_edit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">

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
        address:
    </div>
    <div class="col-sm-4">
        <textarea class="form-control" name="m_address" rows="3"><?php echo $row['m_address'];?></textarea>
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