<meta charset="UTF-8">
<?php
$query = "SELECT t.*, COUNT(p.p_id) as ptotal
FROM tbl_prd_type as t 
LEFT JOIN tbl_prd as p ON t.t_id=p.ref_t_id
GROUP BY t.t_id" or die("Error:" . mysqli_error($condb));
$result = mysqli_query($condb, $query);
?>

<!-- start menu -->
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">HOME</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">หน้าแรก</a>
                            </li>

                            <!-- <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="prdtype.php">เพิ่มประเภทสินค้า</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="prd.html">เพิ่มสินค้า</a>
                            </li> -->

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    เลือกประเภทสินค้า
                                </a>
                                <ul class="dropdown-menu">
                                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                                        <li><a class="dropdown-item" href="index.php?act=showbytype&t_id=<?php echo $row["t_id"]; ?>&name=<?php echo $row["t_name"]; ?>"><?php echo $row["t_name"]; ?>(<?php echo $row["ptotal"]; ?>)</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="report_problem.php">แจ้งปัญหา</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="register_form.php">สมัครสมาชิก</a>
                            </li> -->
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    หน่วยงานภายใน
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">.</a></li>
                                </ul>
                            </li> -->
                        </ul>
                        <form class="d-flex" role="search" method="get" action="index.php">
                            <input class="form-control me-2" type="text" placeholder="Search" name="search" aria-label="Search" required>
                            <button class="btn btn-outline-success" type="submit" name="act" value="q">ค้นหา</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
  
    </div>
</div>
<!-- end menu -->