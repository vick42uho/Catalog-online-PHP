<h4> กรุณาเลือกวันที่เริ่มต้นและวันที่สิ้นสุดในการเรียกดูรายงาน </h4>
<form action="" method="get" name="q" class="form-horizontal">
	<div class="form-group">
		<div class="col-sm-1 control-label">
			start
		</div>
		<div class="col-sm-3">
			<input type="date" name="ds" class="form-control" required>
		</div>
		<div class="col-sm-1 control-label">
			end
		</div>
		<div class="col-sm-3">
			<input type="date" name="de" class="form-control" required>
		</div>
		<div class="col-sm-1">
			<button type="submit" class="btn btn-primary" name="act" value="bydate">GET REPORT</button>
		</div>

	</div>

</form>

<?php
$ds = isset($_GET['ds']) ? mysqli_real_escape_string($condb, $_GET['ds']) : '';
$de = isset($_GET['de']) ? mysqli_real_escape_string($condb, $_GET['de']) : '';

if ($ds != '') {
    // ป้องกัน SQL Injection ด้วย mysqli_real_escape_string
    $ds = mysqli_real_escape_string($condb, $ds);
    $de = mysqli_real_escape_string($condb, $de);

    // ใช้ parameterized queries สำหรับความปลอดภัย
    $query = "SELECT l.ref_m_id, m.m_name, l.log_date
              FROM tbl_login_log AS l
              INNER JOIN tbl_member AS m ON l.ref_m_id = m.m_id
              WHERE l.log_date BETWEEN '$ds 00:00:00.000000' AND '$de 23:59:59.000000'
              ORDER BY l.log_date DESC";

    // ใช้ mysqli_query พร้อม error handling
    $result = mysqli_query($condb, $query) or die("Error: " . mysqli_error($condb));

    echo '<h4> ประวัติการ Login by Yearly  </h4>';
    echo "<table id='example1' class='display table table-bordered table-hover' cellspacing='0'>";
    echo "
    <thead>
    <tr align='center' class='danger'>
    <th width='10%'><center>ลำดับ</center></th>
    <th width='60%'>ผู้ใช้</th>
    <th width='30%'><center>ว/ด/ป</center></th>
    </tr>
    </thead>
    ";
    $i = 1; // เพิ่มตัวแปร $i และกำหนดค่าเริ่มต้นให้เป็น 1
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td align='center'>" . $i++ .  "</td> "; // เพิ่มแสดงลำดับ
        echo "<td>" . $row["m_name"] .  "</td> ";
        echo "<td align='center'>" . $row["log_date"] .  "</td> ";
        echo "</tr>";
    }
    echo "</table>";
}

// ปิด connection
mysqli_close($condb);
?>
