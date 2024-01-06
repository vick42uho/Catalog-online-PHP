<?php
// Include database connection
include('../condb.php');

// Get values from the form
$ref_m_id = $_POST["ref_m_id"];
$ref_t_id = $_POST["ref_t_id"];
$p_name = $_POST["p_name"];
$p_detail = $_POST["p_detail"];
$p_price = $_POST["p_price"];
$p_id = $_POST["p_id"];
$p_m_name = $_POST["p_m_name"];
$p_m_edit_date = $_POST["p_m_edit_date"];

$p_img2 = $_POST["p_img2"];

$date1 = date("Ymd_His");
$numrand = (mt_rand());
$p_img = (isset($_FILES['p_img']['name']) ? $_FILES['p_img']['name'] : '');
$upload = $_FILES['p_img']['name'];

if (!empty($upload)) {
    // Folder to store the files
    $path = "../pimg/";
    // Get file extension
    $type = strrchr($_FILES['p_img']['name'], ".");
    // Set a new name for the file
    $newname = $numrand . $date1 . $type;
    $path_copy = $path . $newname;
    $path_link = "../pimg/" . $newname;
    // Copy the file to the folder
    move_uploaded_file($_FILES['p_img']['tmp_name'], $path_copy);
} else {
    $newname = $p_img2;
}

// Update product
$sql = "UPDATE tbl_prd SET 
    ref_t_id=?,
    p_name=?,
    p_detail=?,
    p_price=?,
    p_img=?,
    p_m_name=?,
    p_m_edit_date=?
    WHERE p_id=?";
$stmt = mysqli_prepare($condb, $sql);
mysqli_stmt_bind_param($stmt, "issssssi", $ref_t_id, $p_name, $p_detail, $p_price, $newname, $p_m_name, $p_m_edit_date, $p_id);
$result = mysqli_stmt_execute($stmt);

// Close the statement
mysqli_stmt_close($stmt);

if ($result) {
    // INSERT update log
    $sql2 = "INSERT INTO tbl_prd_update_log (ref_p_id, ref_m_id) VALUES (?, ?)";
    $stmt2 = mysqli_prepare($condb, $sql2);
    mysqli_stmt_bind_param($stmt2, "ii", $p_id, $ref_m_id);
    $result2 = mysqli_stmt_execute($stmt2);

    // Close the statement
    mysqli_stmt_close($stmt2);
}

// Close the database connection
mysqli_close($condb);

// Show a message and redirect
if ($result && $result2) {
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขข้อมูลสำเร็จ');";
    echo "window.location = 'prd.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('เกิดข้อผิดพลาดในการแก้ไขข้อมูล');";
    echo "window.location = 'prd.php'; ";
    echo "</script>";
}
?>
