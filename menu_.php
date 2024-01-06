<?php
$query = "
SELECT t.*, COUNT(p.p_id) as ptotal
FROM tbl_prd_type as t
LEFT JOIN tbl_prd as p ON t.t_id=p.ref_t_id
GROUP BY t.t_id" or die("Error:" . mysqli_error());
$result = mysqli_query($condb, $query);
?>

<!-- start menu -->
<div class="vh-100 d-flex align-items-center position-fixed start-0 top-0" role="navigation">
  <div class="p-2">
    <div id="mainNav">
      <ul class="list-unstyled rounded ms-2">
        <li><a class="vlink rounded border-0" href="index.php"><svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#home"></use></svg> <span>หน้าแรก</span></a></li>
        <li><a class="vlink rounded" href="report_problem.php"><svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#people-circle"></use></svg> <span>สมากชิก</span></a></li>
        <li><a class="vlink rounded" href="report_problem2.php"><svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#grid"></use></svg> <span>ประเภทสินค้า</span></a></li>
        <li><a class="vlink rounded" href="login.php"><svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#table"></use></svg> <span>สินค้า</span></a></li>
        <li><a class="vlink rounded" href="#"><svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#speedometer2"></use></svg> <span>ออกจากระบบ</span></a></li>
<!--         <li><a class="vlink rounded" href="#"><svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#home"></use></svg> <span>News</span></a></li>
        <li><a class="vlink rounded" href="#"><svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#home"></use></svg> <span>Gallery</span></a></li> -->
<!-- <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">เลือกประเภทสินค้า <span class="caret"></span></a>
  <ul class="dropdown-menu">
    <?php while($row = mysqli_fetch_array($result)) { ?>
    <li>
      <a href="index.php?act=showbytype&t_id=<?php  echo $row["t_id"];?>&name=<?php  echo $row["t_name"];?>">
        <?php  echo $row["t_name"];?>
      (<?php  echo $row["ptotal"];?>) </a></li>
      <?php } ?>
    </ul>
  </li> -->
      </ul>
    </div>
  </div>
</div>
<!-- end menu -->
