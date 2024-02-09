<h4> Form เพิ่มประเภทสินค้า </h4>
<form action="bank_form_add_db.php" method="post" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-4 control-label">
      ชื่อธนาคาร :
    </div>
    <div class="col-sm-7">
      <input type="text" name="bname" required class="form-control">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-4 control-label">
      เลขบัญชี :
    </div>
    <div class="col-sm-7">
      <input type="text" name="bnumber" required class="form-control">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-4 control-label">
      ชื่อ-นามสกุล :
    </div>
    <div class="col-sm-7">
      <input type="text" name="bowner" required class="form-control">
    </div>
  </div>
  <br>
  <div class="form-group">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-1">
      <button type="submit" class="btn btn-primary">บันทึก</button>
    </div>
  </div>
</form>