<?php
// Assuming $condb is a valid database connection

// 2. Query data from the tbl_login_log table
$query = "
SELECT DATE_FORMAT(log_date, '%Y') AS mydate, 
       COUNT(ref_m_id) AS total 
FROM tbl_login_log
GROUP BY DATE_FORMAT(log_date, '%Y')
";

// 3. Execute the query and store the result in the $result variable
$result = mysqli_query($condb, $query) or die("Error: " . mysqli_error($condb));

// 4. Display the results in a table
echo '<h4>ประวัติการ Login by Yearly</h4>';
echo "<table id='example1' class='display table table-bordered table-hover' cellspacing='0'>";
// Table header
echo "
<thead>
<tr align='center' class='table-danger'>
<th width='20%'>ปี</th>
<th width='80%'><center>รวม (ครั้ง)</center></th>
</tr>
</thead>
";
// Table data
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row["mydate"] . "</td> ";
    echo "<td align='center'>" . $row["total"] . "</td> ";
    echo "</tr>";
}

echo "</table>";

// 5. Close connection
mysqli_close($condb);
?>
