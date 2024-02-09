<?php
// เชื่อมต่อกับฐานข้อมูล
include('../condb.php');

// ตรวจสอบว่าฟอร์มถูกส่งมาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // หากส่งมาให้กำหนดค่าตัวแปร
    $bname = mysqli_real_escape_string($condb, $_POST["bname"]);
    $bnumber = mysqli_real_escape_string($condb, $_POST["bnumber"]);
    $bowner = mysqli_real_escape_string($condb, $_POST["bowner"]);
    $bid = mysqli_real_escape_string($condb, $_POST['bid']);

    // สร้างคำสั่ง SQL สำหรับการแก้ไขข้อมูล
    $sql = "UPDATE tbl_bank SET bname=?, bnumber=?, bowner=? WHERE bid=?";

    // เตรียมคำสั่ง SQL
    $stmt = mysqli_prepare($condb, $sql);

    // ตรวจสอบว่าการเตรียมคำสั่งเสร็จสมบูรณ์หรือไม่
    if (!$stmt) {
        die("Error in preparing statement: " . mysqli_error($condb));
    }

    // ผูกพารามิเตอร์
    $bind_result = mysqli_stmt_bind_param($stmt, "sssi", $bname, $bnumber, $bowner, $bid);

    // ตรวจสอบว่าการผูกพารามิเตอร์เสร็จสมบูรณ์หรือไม่
    if (!$bind_result) {
        die("Error in binding parameters: " . mysqli_stmt_error($stmt));
    }

    // ประมวลผลคำสั่ง SQL
    $execute_result = mysqli_stmt_execute($stmt);

    // ตรวจสอบว่าการประมวลผลคำสั่ง SQL เสร็จสมบูรณ์หรือไม่
    if (!$execute_result) {
        die("Error in executing statement: " . mysqli_stmt_error($stmt));
    }

    // ปิดคำสั่ง
    mysqli_stmt_close($stmt);

    // ปิดการเชื่อมต่อกับฐานข้อมูล
    mysqli_close($condb);

    // กระโดดไปยังหน้าที่เหมาะสมตามผลลัพธ์
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขข้อมูลสำเร็จ');";
    echo "window.location = 'bank.php'; ";
    echo "</script>";
} else {
    // กระโดดไปยังหน้าที่เหมาะสมหากฟอร์มไม่ได้ส่งมา
    header("Location: bank.php");
    exit();
}
?>
