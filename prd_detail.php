<?php
//query prd
$p_id = $_GET['p_id'];
$sql = "
SELECT *
FROM tbl_prd as p
LEFT JOIN tbl_prd_type as t ON p.ref_t_id=t.t_id
WHERE p.p_id=$p_id";
$result = mysqli_query($condb, $sql) or die("Error in query: $sql " . mysqli_error($condb));
$row = mysqli_fetch_array($result);
extract($row);
// echo $sql;
// echo '<pre>';
// print_r($row);
// echo '</pre>';
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
            <h4><img src="pimg/<?php echo $row['p_img']; ?>" width="100%"></h4>
        </div>
        <div class="col-md-9 col-xs-12">
            <h4><?php echo $row['p_name']; ?>
                <font color="red">
                    ราคา <?php echo number_format($row['p_price'], 2); ?> บาท
                </font>
            </h4>
            <p>
                <?php echo $row['p_detail']; ?>
                <br>
                จำนวนการเข้าชม <?php echo $row['p_view']; ?> ครั้ง
            </p>
            <p>
                <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=658c2e2effbcf100127cdc58&product=inline-share-buttons&source=platform" async="async"></script>
            <div class="sharethis-inline-share-buttons"></div>
            </p>
            <p>
                <h4> แสดงความคิดเห็นต่อสินค้า </h4>
                <form action="comment_save.php" method="post" class="form-horizontal">
                    <textarea name="c_detail" class="form-control" cols="30" rows="10" required></textarea>
                    <br>
                    <input type="hidden" name="ref_p_id" value="<?php echo $row['p_id'];?>">
                    <button type="submit" class="btn btn-primary">
                        แสดงความคิดเห็น
                    </button>
                </form>
            </p>
            <p>
                <h4>รายการแสดงความคิดเห็นต่อสินค้า</h4>
                <?php include('comment_list.php') ?>
            </p>
        </div>
    </div>
</div>