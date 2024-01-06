<meta charset="utf-8">
<?php
// เชื่อมต่อฐานข้อมูล
include('../condb.php'); 

// ตรวจสอบว่ามีการส่งข้อมูลมาหรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าที่ส่งมา
    $m_fname = $_POST["m_fname"];
    $m_name = $_POST["m_name"];
    $m_lname = $_POST["m_lname"];
    $m_email = $_POST["m_email"];
    $m_phone = $_POST["m_phone"];
    $m_level = $_POST["m_level"];
    $m_img2 = $_POST["m_img2"];
    $m_id  = $_POST["m_id"];

    // ตรวจสอบว่ามีการอัปโหลดไฟล์ภาพหรือไม่
    $upload = $_FILES['m_img']['name'];
    if ($upload != '') { 
        // กำหนดที่เก็บไฟล์
        $path = "../mimg/";
        // สุ่มชื่อไฟล์ใหม่
        $newname = $numrand . $date1 . '.' . pathinfo($_FILES['m_img']['name'], PATHINFO_EXTENSION);
        // ตั้งที่เก็บของไฟล์
        $path_copy = $path . $newname;
        $path_link = "../mimg/" . $newname;
        // ย้ายไฟล์ไปยังโฟลเดอร์
        move_uploaded_file($_FILES['m_img']['tmp_name'], $path_copy);  
    } else {
        $newname = $m_img2;
    }

    // ใช้ Prepared Statement กับ Parameterized Query
    $sql = "UPDATE tbl_member SET 
        m_fname=?,
        m_name=?,
        m_lname=?,
        m_email=?,
        m_phone=?,
        m_img=?,
        m_level=?
        WHERE m_id=?";
    $stmt = mysqli_prepare($condb, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssi", $m_fname, $m_name, $m_lname, $m_email, $m_phone, $newname, $m_level, $m_id);
    $result = mysqli_stmt_execute($stmt);

    // ปิด Prepared Statement
    mysqli_stmt_close($stmt);

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($condb);

    // แสดงข้อความและเปลี่ยนเส้นทางไปหน้าฟอร์ม
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไขข้อมูลสำเร็จ');";
        echo "window.location = 'member.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error!!');";
        echo "window.location = 'member.php'; ";
        echo "</script>";
    }
} else {
    // ถ้าไม่มีการส่งข้อมูลมา
    echo "Invalid Request";
}
?>
