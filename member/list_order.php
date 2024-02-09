<?php
$queryorder = "SELECT * FROM order_head WHERE m_id=$m_id";
$rsorder = mysqli_query($condb, $queryorder);

?>

<h3>ประวัติการสั่งซื้อ</h3>

<table id='example' class='display table table-bordered table-hover' cellspacing='0'>

    <thead>

        <tr align='center' class='table-primary'>
            <th width="5%">#</th>
            <th width="10%">สถานะ</th>
            <th width="10%">วันที่ / เวลา</th>
            <th width="10%">รวม</th>
            <th width="5%">สลิป</th>
            <th width="10%">EMS</th>
            <th width="10%">view</th>


        </tr>
    </thead>
    <tbody>
        <?php foreach ($rsorder as $row) { ?>
            <tr align='center'>

                <td><?php echo $row['o_id']; ?></td>
                <td><?php
                    $st = $row['o_status'];
                    if ($st == 1) {
                        echo '<font color="#cc5404">รอชำระเงิน</font>';
                    } elseif ($st == 2) {
                        echo '<font color="green">ชำระเงินแล้ว</font>';
                    } elseif ($st == 3) {
                        echo '<font color="blue">จัดส่งแล้ว</font>';
                    } else {
                        echo '<font color="red">ยกเลิก</font>';
                    }
                    ?></td>
                <td><?php echo $row['o_dttm']; ?></td>
                <td align="right"><?php echo number_format($row['o_total'], 2); ?></td>
                <td>
    <?php if (!empty($row['o_slip'])): ?>
        <img src="../imgslip/<?php echo $row['o_slip']; ?>" width="100%">
    <?php endif; ?>
</td>

                <td><?php echo $row['o_ems'] ?></td>
                <td>

                    <?php
                    $o_id = $row['o_id']; // order o_id
                    if ($st == 1) {
                        echo "<a href='payment.php?o_id=$o_id&do=payment' class=' btn btn-warning btn-xs'> ชำระเงิน </a>";
                    } elseif ($st == 2) {
                        echo "<a href='payment_detail.php?o_id=$o_id&do=payment_detail' class=' btn btn-success btn-xs'> เปิดดู </a>";
                    } elseif ($st == 3) {
                        echo "<a href='payment_detail.php?o_id=$o_id&do=payment_detail' class=' btn btn-bd-primary btn-xs'> ดูเลขEMS </a>";
                    } else {
                        echo "<a href='order_detail.php?o_id=$o_id&do=order_detail' class=' btn btn-danger btn-xs' target='_blank'> เปิดดู </a>";
                    }
                    ?>



                </td>

            </tr>
        <?php } ?>
    </tbody>


</table>