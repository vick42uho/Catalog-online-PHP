<?php
// condb
include('../condb.php');

$ID = $_GET["ID"];

// delete data using prepared statement
$sql = "DELETE FROM tbl_prd_type WHERE t_id = ?";
$stmt = mysqli_prepare($condb, $sql);
mysqli_stmt_bind_param($stmt, "i", $ID);
$result = mysqli_stmt_execute($stmt);

// close the prepared statement
mysqli_stmt_close($stmt);

// close database connection
mysqli_close($condb);

// JavaScript script to redirect
echo "<script type='text/javascript'>";
if ($result) {
    // Deleted successfully
    echo "window.location = 'prdtype.php'; ";
} else {
    // Error occurred
    echo "alert('Error!!');";
    echo "window.location = 'prdtype.php'; ";
}
echo "</script>";
?>
