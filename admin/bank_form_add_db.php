<?php
// Include database connection
include('../condb.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Escape user inputs for security
  $bname = mysqli_real_escape_string($condb, $_POST["bname"]);
  $bnumber = mysqli_real_escape_string($condb, $_POST["bnumber"]);
  $bowner = mysqli_real_escape_string($condb, $_POST["bowner"]);

  // Check for duplicate data
  $check_query = "SELECT * FROM tbl_bank WHERE bnumber = ?";
  $check_stmt = mysqli_prepare($condb, $check_query);
  mysqli_stmt_bind_param($check_stmt, "s", $bnumber);
  mysqli_stmt_execute($check_stmt);
  mysqli_stmt_store_result($check_stmt);

  if (mysqli_stmt_num_rows($check_stmt) > 0) {
    echo "<script type='text/javascript'>";
    echo "alert('ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
    exit();
  }

  // Close the check statement
  mysqli_stmt_close($check_stmt);

  // Insert data into the database
  $insert_query = "INSERT INTO tbl_bank (bname, bnumber, bowner) VALUES (?, ?, ?)";
  $insert_stmt = mysqli_prepare($condb, $insert_query);
  
  // Check if the statement is prepared successfully
  if ($insert_stmt === FALSE) {
    die("Error in preparing statement: " . mysqli_error($condb));
  }

  mysqli_stmt_bind_param($insert_stmt, "sss", $bname, $bnumber, $bowner);

  // Execute the prepared statement
  $result = mysqli_stmt_execute($insert_stmt);

  // Check if the statement is executed successfully
  if ($result === FALSE) {
    die("Error in executing statement: " . mysqli_error($condb));
  }

  // Close the insert statement
  mysqli_stmt_close($insert_stmt);

  // Close the database connection
  mysqli_close($condb);

  // Redirect to the appropriate page based on the result
  if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');";
    echo "window.location = 'bank.php'; ";
    echo "</script>";
  } else {
    echo "<script type='text/javascript'>";
    echo "alert('เกิดข้อผิดพลาดในการเพิ่มข้อมูล');";
    echo "window.location = 'bank.php'; ";
    echo "</script>";
  }
} else {
  // Redirect to the appropriate page if the form is not submitted
  header("Location: bank.php");
  exit();
}
?>
