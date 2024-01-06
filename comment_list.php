<meta charset="UTF-8">
<?php
// 1. เชื่อมต่อ database
include('condb.php');

// 2. query ข้อมูลจากตาราง tb_member: 
$query = "SELECT * FROM tbl_comment 
WHERE ref_p_id=$p_id
AND c_status=1
ORDER BY c_id DESC" or die("Error:" . mysqli_error($condb));

// 3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($condb, $query);

// 4. แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
echo "<table id='example' class='display table table-bordered table-hover' cellspacing='0'>";
// หัวข้อตาราง
echo "
<thead>
<tr align='center' class='table-primary'>
  <th width='5%'>รหัส</th>
  <th width='75%'>ความคิดเห็น</th>
  <th width='20%'>ว/ด/ป</th>

</tr>
</thead>
";

while ($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td align='center'>" . $i += 1 . '.' . "</td> ";
//   echo "<td align='center'>" . $row["c_id"] . '.' . "</td> ";
  echo "<td>" . $row["c_detail"] .  "</td> ";
  echo "<td>" .date('d/m/Y H:i:s',strtotime($row["c_date"]))  .  "</td> ";

}

echo "</table>";

// 5. close connection
mysqli_close($condb);
?>
