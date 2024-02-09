<?php include('hder.php'); //css 
// print_r($_SESSION);
$o_id = mysqli_real_escape_string($condb, $_GET['o_id']);

$querycartdetail = "SELECT d.*,p.p_name, p.p_price, p.p_img, h.*, b.bname, b.bnumber
 FROM order_detail as d
 INNER JOIN order_head as h ON d.o_id = h.o_id
 INNER JOIN tbl_prd as p ON d.p_id = p.p_id
 INNER JOIN tbl_bank as b ON h.bid = b.bid
 WHERE d.o_id = $o_id
 ";
$rscartdetail = mysqli_query($condb, $querycartdetail);
$rowdetail = mysqli_fetch_array($rscartdetail);



$querybank = "SELECT * FROM tbl_bank";
$rsorder = mysqli_query($condb, $querybank);


// echo '<pre>';
// print_r($rowdetail);
// echo '</pre>';
?>

<body>
    <?php include('nav.php'); //menu
    ?>
    <!-- content -->
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?php include('menu_l.php'); ?>
            </div>
            <div class="col-md-10">
                <h3 align="center"> รายละเอียดการแจ้งชำระเงิน </h3>
                <?php
                // โค้ดที่อาจทำให้เกิด error ในบรรทัดต่าง ๆ
                if (!empty($rowdetail)) {
                    echo "OrderId: " . $rowdetail['o_id'] . "<br>";
                    echo "ชื่อ-สกุล: " . $rowdetail['o_name'] . "<br>";
                    echo "ที่อยู่: " . $rowdetail['o_addr'] . "<br>";
                    echo "เบอร์โทร: " . $rowdetail['o_phone'] . ", Email: " . $rowdetail['o_email'] . "<br>";
                    echo "วันที่สั่งซื้อ: " . $rowdetail['o_dttm'] . "<br>";
                    echo "สถานะ: ";

                    $st = $rowdetail['o_status'];
                    if ($st == 1) {
                        echo '<font color="indigo">รอชำระเงิน</font>';
                    } elseif ($st == 2) {
                        echo '<font color="green">ชำระเงินแล้ว</font>';
                    } elseif ($st == 3) {
                        echo '<font color="blue">ตรวจสอบเลข EMS</font>';
                    } else {
                        echo '<font color="red">ยกเลิก</font>';
                    }
                } else {
                    echo "ไม่พบข้อมูลการสั่งซื้อ";
                }
                ?>
                </h4>
                <table class="table table-bordered table-hover table-striped">

                    <tr class='table-dark'>
                        <th width="5%">#</th>
                        <th width="10%">รูปภาพ</th>
                        <th width="55%">สินค้า</th>
                        <th width="10%" align="center">ราคา</th>
                        <th width="10%" align="center">จำนวน</th>
                        <th width="5%" align="center">รวม(บาท)</th>

                    </tr>
                    <?php



                    $total = 0;
                    foreach ($rscartdetail as $row) {

                        $total += $row["d_subtotal"];
                        echo "<tr>";
                        echo "<td >" . @$i += 1 . "</td>";
                        echo "<td>" . "<img src='../pimg/" . $row['p_img'] . "' width='100'>" . "</td>";
                        echo "<td >" . $row["p_name"] . "</td>";
                        echo "<td  align='left'>" . number_format($row["p_price"], 2) . "</td>";
                        echo "<td  align='left'>" . number_format($row["d_qty"]) . "</td>";
                        echo "<td  align='right'>" . number_format($row["d_subtotal"], 2) . "</td>";
                        echo "</tr>";
                    } //close foreach
                    echo "<tr>";
                    echo "<td colspan='5' class='table-dark' align='center'><b>ราคารวม</b></td>";
                    echo "<td align='right' class='table-dark'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";

                    echo "</tr>";


                    ?>

                </table>
                <h4>แสดงรายละเอียด EMS</h4>
                <div class="row">
                    <div class=" col-sm-6">
                        <?php if (!empty($rowdetail)) : ?>
                            ธนาคารที่โอนเงิน : <?php echo isset($rowdetail['bname']) ? $rowdetail['bname'] : ''; ?><br>
                            เลขบัญชี : <?php echo isset($rowdetail['bnumber']) ? $rowdetail['bnumber'] : ''; ?><br>
                            จำนวนเงินที่โอน : <?php echo isset($rowdetail['o_slip_total']) ? $rowdetail['o_slip_total'] : ''; ?><br>
                            วัน/เดือน/ปี : <?php echo isset($rowdetail['o_slip_date']) ? $rowdetail['o_slip_date'] : ''; ?><br>
                            สลิป
                            <br>
                            <img src="../imgslip/<?php echo isset($rowdetail['o_slip']) ? $rowdetail['o_slip'] : ''; ?>" width="100%">
                        <?php else : ?>
                            <p>No payment details available.</p>
                        <?php endif; ?>
                    </div>

                    <div class=" col-sm-6">

                        <h3>แจ้งเลข EMS <font color="blue"><?php echo $rowdetail['o_ems']; ?></font></h3>
                        <br>
                        <h3>วัน/เดือน/ปี <?php echo date('d/m/Y H:i:s',strtotime($rowdetail['o_ems_date'])); ?>น.</h3>
                        
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
    <?php include('footer.php'); //footer
    ?>
</body>
<?php include('js.php'); //js
?>
<?php include('button.php'); //button
?>