<?php
//1. เชื่อมต่อ database
include('../condb.php');
//2. query ข้อมูลจากตาราง tb_member: 
$query = "
SELECT p.*, m.m_name, t.t_name
FROM tbl_prd as p
LEFT JOIN tbl_member as m ON p.ref_m_id = m.m_id
LEFT JOIN tbl_prd_type as t ON p.ref_t_id = t.t_id
ORDER BY p.p_id ASC
";
$result = mysqli_query($condb, $query) or die("Error: " . mysqli_error($condb));

// echo $query;
// exit; 

//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($condb, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 

echo "<table id='example' class='display table table-bordered table-hover' cellspacing='0'>";
//หัวข้อตาราง
echo "
<thead>
<tr align='center' class='table-primary'>
<th>รหัส</th>
<th>รูป</th>
<th>ประเภทสินค้า</th>
<th>ชื่อสินค้า</th>
<th>ราคา</th>
<th>View</th>
<th>เพิ่มโดย</th>
<th>ว/ด/ป</th>
<th>แก้ไข</th>
<th>ลบ</th>
</tr>
</thead>
";
while ($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td align='center'>" . $row["p_id"] . '.' . "</td> ";
  echo "<td>" . "<img src='../pimg/" . $row['p_img'] . "' width='100'>" . "</td>";
  echo "<td>" . $row["t_name"] .  "</td> ";
  echo "<td>" . $row["p_name"] .  "</td> ";
  echo "<td>" . $row["p_price"] .  "</td> ";
  echo "<td align='center'>" . $row["p_view"] .  "</td> ";
  //echo "<td>" .$row["m_name"] .  "</td> ";
  echo "<td>" 
  . $row["m_name"];
  if($row["p_m_name"]!=''){

    echo '<br>'
    .'แก้โดย '
    .$row["p_m_name"]
    .'<br>'
    .' ว/ด/ป '
    .date('d/m/Y H:i:s', strtotime($row["p_m_edit_date"]));
  }
   "</td> ";
  echo "<td>" . date('d-m-Y', strtotime($row["p_datesave"])) .  "</td> ";

  //แก้ไขข้อมูล
  echo "<td align='center'>
  <a href='prd.php?ID=$row[0]&act=edit' class='btn btn-warning btn-xs'>edit</a></td> ";

  //ลบข้อมูล
  echo "<td align='center'>
  <a href='prd_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>del</a></td> ";

  echo "</tr>";
}
echo "</table>";
//5. close connection
mysqli_close($condb);
