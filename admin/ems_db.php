<meta charset="utf-8">
<?php
// Include database connection
include('../condb.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $o_id = mysqli_real_escape_string($condb, $_POST["o_id"]);
    $o_ems = mysqli_real_escape_string($condb, $_POST['o_ems']);
    $o_ems_date = date('Y-m-d H:i:s');
    $o_status = 3; // Assuming o_status is an integer

    // Update data in the database
    $sql = "UPDATE order_head SET 
    o_ems=?, o_ems_date=?, o_status=?
    WHERE o_id=?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($condb, $sql);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "ssii", $o_ems, $o_ems_date, $o_status, $o_id);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    

    // Check if the update was successful
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('บันทึกข้อมูลสำเร็จ');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('เกิดข้อผิดพลาดในการแก้ไขข้อมูล');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    }

    // Close the statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($condb);
} else {
    // Redirect to the appropriate page if the form is not submitted
    header("Location: index.php");
    exit();
}
?>
