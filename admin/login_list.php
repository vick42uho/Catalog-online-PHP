<meta charset="UTF-8">
<?php
// 1. เชื่อมต่อ database
include('../condb.php');

// 2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT l.*, m.m_fname, m.m_name, m.m_lname
FROM tbl_login_log as l
INNER JOIN tbl_member as m ON l.ref_m_id = m.m_id
ORDER BY l.log_id DESC" or die("Error:" . mysqli_error($condb));

// 3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($condb, $query);

// 4. แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
echo "<table id='example' class='display table table-bordered table-hover' cellspacing='0'>";
// หัวข้อตาราง
echo "
<thead>
<tr align='center' class='table-primary'>
  <th width='5%'>รหัส</th>
  <th width='75%'>ชื่อของผู้ใช้</th>
  <th width='20%'>ว/ด/ป</th>
</tr>
</thead>
";

while ($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td align='center'>" . $row["log_id"] . '.' . "</td> ";
  echo "<td>" 
  . $row["m_fname"] 
  . $row["m_name"] 
  .' '
  . $row["m_lname"] 
  .  "</td> ";
  echo "<td>" .date('d-m-Y H:i:s', strtotime($row["log_date"])).  "</td> ";
  echo "</tr>";
}

echo "</table>";

// 5. close connection
mysqli_close($condb);
?>
