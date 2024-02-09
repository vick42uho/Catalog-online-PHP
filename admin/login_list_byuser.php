<?php

// 2. query ข้อมูลจากตาราง tb_member: 
$query = "
SELECT l.ref_m_id, m.m_fname, m.m_name, m.m_lname, COUNT(l.ref_m_id) as total 
FROM tbl_login_log as l 
INNER JOIN tbl_member as m ON l.ref_m_id=m.m_id
GROUP BY l.ref_m_id
ORDER BY total DESC
";

// 3. เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($condb, $query);

// 4. แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
echo '<h4> ประวัติการ Login by user  </h4>';
echo "<table id='example1' class='display table table-bordered table-hover' cellspacing='0'>";
// หัวข้อตาราง
echo "
<thead>
<tr align='center' class='table-danger'>
<th width='5%'>รหัส</th>
<th width='75%'>ชื่อของผู้ใช้</th>
<th width='20%'><center>รวม (ครั้ง)</center></th>
</tr>
</thead>
";
$i = 0;
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td align='center'>" . ++$i . '.' . "</td> ";
    echo "<td>" 
    . $row["m_fname"] 
    . $row["m_name"] 
    . " " 
    . $row["m_lname"] 
    . "</td> ";
    echo "<td align='center'>" . $row["total"] . "</td> ";
    echo "</tr>";
}
echo "</table>";

// 5. close connection
mysqli_close($condb);
?>
