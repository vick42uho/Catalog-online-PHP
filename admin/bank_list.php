<meta charset="UTF-8">
<?php
// 1. เชื่อมต่อ database
include('../condb.php');

// 2. query ข้อมูลจากตาราง tb_member: 
$query = "SELECT * FROM tbl_bank ORDER BY bid ASC" or die("Error:" . mysqli_error($condb));

// 3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($condb, $query);

// 4. แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
echo "<table id='example' class='display table table-bordered table-hover' cellspacing='0'>";
// หัวข้อตาราง
echo "
<thead>
<tr align='center' class='table-primary'>
  <th width='5%'>รหัส</th>
  <th width='25%'>ชื่อธนาคาร</th>
  <th width='25%'>เลขบัญชี</th>
  <th width='25%'>ชื่อ-นามสุล</th>
  <th width='10%'>แก้ไข</th>
  <th width='10%'>ลบ</th>
</tr>
</thead>
";

while ($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td align='center'>" . $row["bid"] . '.' . "</td> ";
  echo "<td>" . $row["bname"] .  "</td> ";
  echo "<td>" . $row["bnumber"] .  "</td> ";
  echo "<td>" . $row["bowner"] .  "</td> ";
  // แก้ไขข้อมูล
  echo "<td align='center'>
  <a href='bank.php?ID=$row[0]&act=edit' class='btn btn-warning btn-xs'>edit</a></td> ";
  
  // ลบข้อมูล
  echo "<td align='center'>
  <a href='bank_del_db.php?ID=$row[0]' onclick=\"return confirm('ยืนยันการลบ?')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
  echo "</tr>";
}

echo "</table>";

// 5. close connection
mysqli_close($condb);
?>
