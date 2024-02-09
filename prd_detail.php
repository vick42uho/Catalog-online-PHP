<?php
session_start();


// print_r($_SESSION);

//query prd
// echo $sql1;

// echo '<pre>';
// print_r($row1);
// echo '</pre>';
// exit;
//update view
$sql2 = "UPDATE tbl_prd SET
	p_view=p_view+1
	WHERE p_id=$p_id
	";
$result2 = mysqli_query($condb, $sql2) or die("Error in query: $sql2 " . mysqli_error($condb));
?>

<div class="container">
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <h4><img src="pimg/<?php echo $row1['p_img']; ?>" width="100%"></h4>
        </div>
        <div class="col-md-9 col-xs-12">
            <h4><?php echo $row1['p_name']; ?>
                <font color="red">
                    ราคา <?php echo number_format($row1['p_price'], 2); ?> บาท
                </font>
            </h4>
            <p>
                <?php echo $row1['p_detail']; ?>
                <br>
                จำนวนการเข้าชม <?php echo $row1['p_view']; ?> ครั้ง
            </p>
            <p>
                <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=658c2e2effbcf100127cdc58&product=inline-share-buttons&source=platform" async="async"></script>
            <div class="sharethis-inline-share-buttons"></div>
            </p>
            <p>
            <h4> แสดงความคิดเห็นต่อสินค้า </h4>
            <form action="comment_save.php" method="post" class="form-horizontal">
                <?php
                //checkLogin
                if (!empty($_SESSION['m_name'])) {
                    echo '<textarea name="c_detail" class="form-control" cols="30" rows="10" required></textarea>';
                    echo '<br>';
                    echo '<input type="hidden" name="ref_p_id" value="' . $row1['p_id'] . '">';
                    echo '<button type="submit" class="btn btn-primary">แสดงความคิดเห็น</button>';
                } else {
                    echo '<p>กรุณา <a href="login.php">เข้าสู่ระบบ</a> เพื่อแสดงความคิดเห็น</p>';
                }
                ?>
            </form>
            </p>
            <p>
            <h4>รายการแสดงความคิดเห็นต่อสินค้า</h4>
            <?php include('comment_list.php') ?>
            </p>
        </div>
    </div>
</div>