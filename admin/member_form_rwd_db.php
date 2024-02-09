<?php
// condb
include('../condb.php');

$m_id = $_POST["m_id"];
$m_password = password_hash($_POST["m_password"], PASSWORD_DEFAULT);


// update data using prepared statement
$sql = "UPDATE tbl_member SET m_password = ? WHERE m_id = ?";
$stmt = mysqli_prepare($condb, $sql);
mysqli_stmt_bind_param($stmt, "si", $m_password, $m_id);
$result = mysqli_stmt_execute($stmt);

// close the prepared statement
mysqli_stmt_close($stmt);

// close database connection
mysqli_close($condb);

// JavaScript script to show an alert and redirect
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไข password สำเร็จ');";
    echo "window.location = 'member.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    // echo "alert('Error!!');";
    echo "window.location = 'member.php'; ";
    echo "</script>";
}
?>
