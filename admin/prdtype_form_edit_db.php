<meta charset="utf-8">
<?php
// Include database connection
include('../condb.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $t_name = mysqli_real_escape_string($condb, $_POST["t_name"]);
    $t_id = mysqli_real_escape_string($condb, $_POST['t_id']);

    // Update data in the database
    $sql = "UPDATE tbl_prd_type SET t_name=? WHERE t_id=?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($condb, $sql);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "si", $t_name, $t_id);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the update was successful
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไขข้อมูลสำเร็จ');";
        echo "window.location = 'prdtype.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('เกิดข้อผิดพลาดในการแก้ไขข้อมูล');";
        echo "window.location = 'prdtype.php'; ";
        echo "</script>";
    }

    // Close the statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($condb);
} else {
    // Redirect to the appropriate page if the form is not submitted
    header("Location: prdtype.php");
    exit();
}
?>
