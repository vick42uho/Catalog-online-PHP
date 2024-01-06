<?php
// condb
include('../condb.php');

$m_id = $_POST["m_id"];
$m_password1 = $_POST["m_password1"];
$m_password2 = $_POST["m_password2"];

// Check password
if ($m_password1 != $m_password2) {
    echo "<script type='text/javascript'>";
    echo "alert('Password ไม่ตรงกัน กรุณาใส่ใหม่อีกครั้ง');";
    echo "window.location = 'index.php?act=pwd'; ";
    echo "</script>";
} else {
    // Update data
    $hashed_password = password_hash($m_password1, PASSWORD_DEFAULT);
    $sql = "UPDATE tbl_member SET m_password=? WHERE m_id=?";
    $stmt = mysqli_prepare($condb, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $hashed_password, $m_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไข password สำเร็จ');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error!!');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    }
}

// ปิดการเชื่อมต่อ database
mysqli_close($condb);
?>
