<?php
// Include database connection
include('../condb.php');


// โค้ดนี้ใช้ $_POST เพื่อรับค่าที่ถูกส่งมาจากฟอร์ม HTML.
$ref_t_id = $_POST["ref_t_id"];
$p_name = $_POST["p_name"];
$p_detail = $_POST["p_detail"];
$p_price = $_POST["p_price"];
$ref_m_id = $_POST['ref_m_id'];


// โค้ดนี้จะทำการสร้างชื่อไฟล์ใหม่ในกรณีที่มีการอัปโหลดไฟล์ภาพ.
$date1 = date("Ymd_His");
$numrand = (mt_rand());
$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');

// Check if a file is uploaded
$upload = $_FILES['p_img']['name'];
$newname = '';

if ($upload != '') {
    $path = "../pimg/";
    $type = strrchr($_FILES['p_img']['name'], ".");
    $newname = $numrand . $date1 . $type;
    $path_copy = $path . $newname;
    $path_link = "../pimg/" . $newname;

    move_uploaded_file($_FILES['p_img']['tmp_name'], $path_copy);
}


// ในส่วนนี้ใช้ prepared statements เพื่อป้องกันการทำ SQL Injection โดยให้ทุกค่าที่ส่งไปยังฐานข้อมูลผ่าน bind parameters.
// Use prepared statements to prevent SQL Injection
$sql = "INSERT INTO tbl_prd (ref_t_id, p_name, p_detail, p_price, p_img, ref_m_id) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($condb, $sql);

if ($stmt) {
    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'issssi', $ref_t_id, $p_name, $p_detail, $p_price, $newname, $ref_m_id);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    $result = false;
}

// Close the database connection
mysqli_close($condb);

// Check if the execution was successful
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');";
    echo "window.location = 'prd.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error!!');";
    echo "window.location = 'prd.php'; ";
    echo "</script>";
}
?>
