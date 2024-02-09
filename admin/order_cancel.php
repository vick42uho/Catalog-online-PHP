<meta charset="utf-8">
<?php
// Include database connection
include('../condb.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $o_id = mysqli_real_escape_string($condb, $_POST["o_id"]);
    $o_status = 4; // Assuming o_status is an integer

    // Update data in the database
    $sql = "UPDATE order_head SET 
    o_status=?
    WHERE o_id=?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($condb, $sql);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "ii", $o_status, $o_id);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the update was successful
    $message = ($result) ? 'ยกเลิกการสั่งซื้อสำเร็จ' : 'เกิดข้อผิดพลาดในการแก้ไขยกเลิกการสั่งซื้อ';

    // Close the statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($condb);

    // Redirect to index.php with the appropriate message
    echo "<script type='text/javascript'>";
    echo "alert('$message');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    // Redirect to the appropriate page if the form is not submitted
    header("Location: index.php");
    exit();
}
?>
