<?php include('hder.php'); //css 
// print_r($_SESSION);
$o_id = mysqli_real_escape_string($condb, $_GET['o_id']);

$querycartdetail = "SELECT d.*,p.p_name, p.p_price, p.p_img, h.*
 FROM order_detail as d
 INNER JOIN order_head as h ON d.o_id = h.o_id
 INNER JOIN tbl_prd as p ON d.p_id = p.p_id
 WHERE d.o_id = $o_id
 AND h.m_id = $m_id
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
        <h3 align="center"> แจ้งชำระเงิน </h3>
        <?php
        // โค้ดที่อาจทำให้เกิด error ในบรรทัดต่าง ๆ
        if (!empty($rowdetail)) {
          echo "OrderId: " . $rowdetail['o_id'] . "<br>";
          echo "ส่งไปที่: " . $rowdetail['o_name'] . "<br>";
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
        <h4>เลือกธนาคารที่ชำระเงิน/โอนเงิน</h4>
        <form action="payment_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
          <table class="table table-bordered table-hover table-striped">
            <tr class="table-dark">
              <th width="5%">เลือก</th>
              <th width="10%">ชื่อธนาคาร</th>
              <th width="30%">เลขที่บัญชี</th>
              <th width="30%">ชื่อบัญชี</th>
            </tr>
            <?php
            $i = 1;
            foreach ($rsorder as $rsb) {
              $bid = $rsb["bid"];
              echo '<tr>';
              echo "<td>" . "<input type='radio' name='bid' require value='$bid'>" . "</td>";
              echo "<td>" . $rsb["bname"] . "</td>";
              echo "<td>" . $rsb["bnumber"] . "</td>";
              echo "<td>" . $rsb["bowner"] . "</td>";
              echo '</tr>';
              $i++;
            }
            ?>

          </table>
          <div class="form-group">
            <div class="row" >
            <div class="col-md-4">
              วันที่ชำระเงิน <br>
              <input type="date" name="o_slip_date" class=" form-control" required>
            </div>
            <div class="col-md-3">
              จำนวนเงินที่โอน <br>
              <input type="text" name="o_slip_total" class="form-control" value="<?php echo number_format($total, 2, '.', ',');?>">

              
            </div>
          </div>

          <div class=" form-group">
          <div class="row" >
            <div class="col-md-4">
              อัพโหลดสลิป <br>
              <input type="file" name="o_slip" class=" form-control" accept="image/*" required>
            </div>
            <div class="col-md-2">
              <br>
              <input type="hidden" name="o_id" value="<?php echo $o_id ;?>">
              <button type="submit" class=" btn btn-bd-primary">แจ้งชำระเงิน</button>
            </div>
          </div>
          </div>
          </div>
        </form>
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