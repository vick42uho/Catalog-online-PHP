<?php
$queryorder = "SELECT * FROM order_head WHERE o_status = 1";
$rsorder = mysqli_query($condb, $queryorder);

?>

<h3>รายการรอชำระเงิน</h3>

<table id='example' class='display table table-bordered table-hover' cellspacing='0'>

    <thead>

        <tr align='center' class='table-primary'>
            <th width="5%">#</th>
            <th width="40%">ชื่อลูกค้า</th>
            <th width="20%">วันที่ / เวลา</th>
            <th width="10%">รวม</th>
            <th width="10%">ผ่านมา</th>
            <th width="10%">view</th>


        </tr>
    </thead>
    <tbody>
        <?php foreach ($rsorder as $row) { 
            $o_id = $row['o_id']; // order o_id
            ?>
            
            <tr>

                <td><?php echo $row['o_id']; ?></td>

                <td>
                    <?php
                    echo '<b>';
                    echo $row['o_name'];
                    echo '</b><br>';
                    echo $row['o_addr'];
                    echo '<br>';
                    echo 'เบอร์โทร. ' . $row['o_phone'] . ' email. ' . $row['o_email'];

                    ?>

                </td>
                <td><?php echo $row['o_dttm']; ?></td>
                <td align="right"><?php echo number_format($row['o_total'], 2); ?></td>
                <td align="center">

                    <?php
                    $o_dttm = date('Y-m-d', strtotime($row['o_dttm'])); //วันที่สั่งซื้อ
                    $datenow = date('Y-m-d');

                    // echo 'วันที่ซื้อ '.$o_dttm;
                    // echo '<br>';
                    // echo 'วันที่ปัจจุบัน '.$datenow;

                    $caldate = round(abs(strtotime("$o_dttm") - strtotime("$datenow")) / 60 / 60 / 24);
                    echo $caldate. 'วัน';
                    echo '<br>';
                    if ($caldate > 3) {
                        echo "<a href='order_detail.php?o_id=$o_id&do=order_cancel' class=' btn btn-danger btn-xs' target='_blank'> ยกเลิก </a>";
                    } else {
                        echo '';
                    }
                    ?>
                </td>
                <td align="center">

                    <?php
                    

                    echo "<a href='order_detail.php?o_id=$o_id&do=order_detail' class=' btn btn-success btn-xs' target='_blank'> เปิดดู </a>";

                    ?>



                </td>

            </tr>
        <?php } ?>
    </tbody>


</table>