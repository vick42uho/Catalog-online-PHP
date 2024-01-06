<?php
$t_id = mysqli_real_escape_string($condb, $_GET['ID']);
$sql = "SELECT * FROM tbl_prd_type WHERE t_id=?";
$stmt = mysqli_prepare($condb, $sql);
mysqli_stmt_bind_param($stmt, "i", $t_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die("Error in query: $sql " . mysqli_error($condb));
}

$row = mysqli_fetch_array($result);
extract($row);

// mysqli_prepare เพื่อสร้าง statement และใช้ 
// mysqli_stmt_bind_param เพื่อกำหนดค่าให้กับ parameter 
// ใน query และใช้ mysqli_stmt_execute และ mysqli_stmt_get_result 
// ในการทำงานกับ prepared statement ที่สร้างขึ้น.

// echo $sql;
// echo '<pre>';
// print_r($row);
// echo '</pre>';

mysqli_stmt_close($stmt);
?>

<h4> Form แก้ไขประเภทสินค้า </h4>
<form action="prdtype_form_edit_db.php" method="post" class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-4 control-label">
            ชื่อประเภทสินค้า :
        </div>
        <div class="col-sm-7">
            <input type="text" name="t_name" required class="form-control" value="<?php echo $row['t_name']; ?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-1">
            <input type="hidden" name="t_id" value="<?php echo $row['t_id']; ?>">
            <button type="submit" class="btn btn-primary">บันทึก</button>
        </div>
    </div>
</form>