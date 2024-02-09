<?php
$query = "SELECT 
            SUM(o_total) AS total,
            DATE_FORMAT(o_dttm, '%Y-%m') AS o_dttm
        FROM order_head
        WHERE o_status IN (2,3)
        GROUP BY DATE_FORMAT(o_dttm, '%Y-%m')
        ORDER BY o_dttm DESC";  // เปลี่ยน ORDER BY ตามคำแนะนำ

$result = mysqli_query($condb, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($condb));
}

// For chart
$o_dttm = array();
$total = array();

while ($rs = mysqli_fetch_assoc($result)) { // เปลี่ยนเป็น mysqli_fetch_assoc สำหรับให้ข้อมูลเป็นแอส๊อซิเอทีฟ
    $o_dttm[] = "\"" . $rs['o_dttm'] . "\"";
    $total[] = "\"" . $rs['total'] . "\"";
}

$o_dttm = implode(",", $o_dttm);
$total = implode(",", $total);

?>

<h3 align="center">รายงานในรูปแบบกราฟ</h3>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
<hr>
<p align="center">
    <canvas id="myChart" width="800px" height="300px"></canvas>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php echo $o_dttm; ?>],
                datasets: [{
                    label: 'รายงานรายได้ แยกตามเดือน (บาท)',
                    data: [<?php echo $total; ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</p>

<div class="col-sm-12">
    <h3>List</h3>
    <table class="table table-striped" border="1" cellpadding="0" cellspacing="0" align="center">
        <thead>
            <tr class="table-primary">
                <th width="20%">ว/ด/ป</th>
                <th width="10%"><center>รายได้</center></th>
            </tr>
        </thead>

        <?php
        $o_total = 0;
        mysqli_data_seek($result, 0); // รีเซ็ตตัวชี้ผลลัพธ์ของ Query เพื่อให้สามารถวนลูปข้อมูลได้ใหม่
        
        while ($row2 = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row2['o_dttm']; ?></td>
                <td align="right"><?php echo number_format($row2['total'], 2); ?></td>
            </tr>
        <?php
            $o_total += $row2['total'];
        } // while ($row2 = mysqli_fetch_assoc($result))
        ?>
        
        <tr class="table-danger">
            <td align="center">รวม</td>
            <td align="right"><b><?php echo number_format($o_total, 2); ?></b></td>
        </tr>
    </table>
</div>

<?php mysqli_close($condb); ?>
