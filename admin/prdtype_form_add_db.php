<meta charset="utf-8">
<?php
// Include database connection
include('../condb.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Escape user inputs for security
  $t_name = mysqli_real_escape_string($condb, $_POST["t_name"]);

  // Check for duplicate data
  $check_query = "SELECT t_name FROM tbl_prd_type WHERE t_name = ?";
  $check_stmt = mysqli_prepare($condb, $check_query);
  mysqli_stmt_bind_param($check_stmt, "s", $t_name);
  mysqli_stmt_execute($check_stmt);
  mysqli_stmt_store_result($check_stmt);

  if (mysqli_stmt_num_rows($check_stmt) > 0) {
    echo "<script type='text/javascript'>";
    echo "alert('ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
    exit(); // ออกจากการทำงานเพื่อป้องกันการทำงานต่อที่ไม่จำเป็น

    // การปรับปรุง:

    // ใช้ mysqli_stmt_bind_param ในการ bind parameters เพื่อป้องกัน SQL Injection ใน query.
    // ใช้ prepared statements ในการดึงข้อมูลและเพิ่มข้อมูลเข้าฐานข้อมูล.
    // ตรวจสอบค่าจาก mysqli_stmt_num_rows เพื่อดูว่าข้อมูลซ้ำหรือไม่.
    // การปิด statements และการปิดการเชื่อมต่อฐานข้อมูลถูกทำทุกรอบ.
    // โปรดทราบว่า mysqli_stmt_store_result ไม่จำเป็นต้องใช้ในกรณีนี้ เนื่องจากมีการใช้ mysqli_stmt_num_rows แล้ว.

  }

  // Insert data into the database
  $insert_query = "INSERT INTO tbl_prd_type (t_name) VALUES (?)";
  $insert_stmt = mysqli_prepare($condb, $insert_query);
  mysqli_stmt_bind_param($insert_stmt, "s", $t_name);
  $result = mysqli_stmt_execute($insert_stmt);

  // Close the statements
  mysqli_stmt_close($check_stmt);
  mysqli_stmt_close($insert_stmt);

  // Close the database connection
  mysqli_close($condb);

  // Redirect to the appropriate page based on the result
  if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');";
    echo "window.location = 'prdtype.php'; ";
    echo "</script>";
  } else {
    echo "<script type='text/javascript'>";
    echo "alert('เกิดข้อผิดพลาดในการเพิ่มข้อมูล');";
    echo "window.location = 'prdtype.php'; ";
    echo "</script>";
  }
} else {
  // Redirect to the appropriate page if the form is not submitted
  header("Location: prdtype.php");
  exit();
}
