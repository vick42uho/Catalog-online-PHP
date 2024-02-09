<?php
$t_id = mysqli_real_escape_string($condb, $_GET['ID']);
$sql = "SELECT * FROM tbl_bank WHERE bid=?";
$stmt = mysqli_prepare($condb, $sql);

if (!$stmt) {
    die("Error in preparing statement: " . mysqli_error($condb));
}

mysqli_stmt_bind_param($stmt, "i", $t_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die("Error in query: $sql " . mysqli_error($condb));
}

$row = mysqli_fetch_array($result);
extract($row);

mysqli_stmt_close($stmt);
?>


<h4> Form แก้ไขประเภทสินค้า </h4>
<form action="bank_form_edit_db.php" method="post" class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-4 control-label">
            ชื่อธนาคาร :
        </div>
        <div class="col-sm-7">
            <input type="text" name="bname" required class="form-control" value="<?php echo $row['bname']; ?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 control-label">
            เลขที่บัญชี :
        </div>
        <div class="col-sm-7">
            <input type="text" name="bnumber" required class="form-control" value="<?php echo $row['bnumber']; ?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 control-label">
            ชื่อเจ้าของบัญชี :
        </div>
        <div class="col-sm-7">
            <input type="text" name="bowner" required class="form-control" value="<?php echo $row['bowner']; ?>">
        </div>
    </div>
    <br>
    <div class="form-group">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-1">
            <input type="hidden" name="bid" value="<?php echo $row['bid']; ?>">
            <button type="submit" class="btn btn-primary">บันทึก</button>
        </div>
    </div>
</form>
