<?php
$queryorder = "SELECT * FROM order_head WHERE o_status = 3";
$rsorder = mysqli_query($condb, $queryorder);

?>

<h3>รายการแจ้งเลข EMS</h3>

<table id='example' class='display table table-bordered table-hover' cellspacing='0'>

    <thead>

        <tr align='center' class='table-primary'>
            <th width="5%">#</th>
            <th width="40%">ชื่อลูกค้า</th>
            <th width="20%">วันที่ / เวลา</th>
            <th width="10%">รวม</th>
            <th width="10%">สลิป</th>
            <th width="10%">view</th>


        </tr>
    </thead>
    <tbody>
        <?php foreach ($rsorder as $row) { ?>
            <tr>

                <td><?php echo $row['o_id']; ?></td>

                <td>
                    <?php
                    echo '<b>';
                    echo $row['o_name'];
                    echo '</b><br>';
                    echo $row['o_addr'];
                    echo '<br>';
                    echo 'เบอร์โทร. ' . $row['o_phone'].' email. ' .$row['o_email'];

                    ?>

                </td>
                <td><?php echo $row['o_dttm']; ?></td>
                <td align="right"><?php echo number_format($row['o_total'], 2); ?></td>
                <td>
                    <a href="../imgslip/<?php echo $row['o_slip']?>" target="_blank">
                    <img src="../imgslip/<?php echo $row['o_slip']?>" width="100%">
                    </a>
            </td>
               
                <td>

                    <?php
                    $o_id = $row['o_id']; // order o_id

                    echo "<a href='ems_detail.php?o_id=$o_id&do=ems_detail' class=' btn btn-success btn-xs' target='_blank'> เปิดดู </a>";

                    ?>



                </td>

            </tr>
        <?php } ?>
    </tbody>


</table>