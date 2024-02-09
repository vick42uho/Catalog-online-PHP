<?php
// Include database connection
include('../condb.php');

// Check if the ID parameter is passed through the URL
if (isset($_GET['ID'])) {
    // Escape user input for security
    $bid = mysqli_real_escape_string($condb, $_GET['ID']);

    // Delete data from the database
    $sql = "DELETE FROM tbl_bank WHERE bid = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($condb, $sql);

    // Check if the preparation succeeded
    if (!$stmt) {
        die("Error in preparing statement: " . mysqli_error($condb));
    }

    // Bind the parameters
    $bind_result = mysqli_stmt_bind_param($stmt, "i", $bid);

    // Check if the binding succeeded
    if (!$bind_result) {
        die("Error in binding parameters: " . mysqli_stmt_error($stmt));
    }

    // Execute the statement
    $execute_result = mysqli_stmt_execute($stmt);

    // Check if the execution succeeded
    if (!$execute_result) {
        die("Error in executing statement: " . mysqli_stmt_error($stmt));
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($condb);

    // Redirect to the appropriate page based on the result
    echo "<script type='text/javascript'>";
    echo "alert('ลบข้อมูลสำเร็จ');";
    echo "window.location = 'bank.php'; ";
    echo "</script>";
} else {
    // Redirect to the appropriate page if the ID parameter is not passed
    header("Location: bank.php");
    exit();
}
?>
