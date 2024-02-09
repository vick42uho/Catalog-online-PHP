<?php 
include('condb.php');
$p_id = $_GET['p_id'];
$sql1 = "SELECT *, COUNT(p.p_id) as ptotal
FROM tbl_prd as p
INNER JOIN tbl_prd_type as t ON p.ref_t_id=t.t_id
WHERE p.p_id=$p_id";
$result1 = mysqli_query($condb, $sql1) or die ("Error in query: $sql1 " . mysqli_error($condb));
$row1 = mysqli_fetch_array($result1);
extract($row1);
// echo $sql1;

// echo '<pre>';
// print_r($row1);
// echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="../fontawesome/css/brands.css">
    <link rel="stylesheet" href="../fontawesome/css/solid.css">

    <title><?php echo $row1['p_name'];?></title>
   <meta property="og:title" content="<?php echo $row1['p_name'];?>" />
<meta property="og:url" content="http://127.0.0.1/shoppri/detail.php?p_id=<?php echo $row1['p_id'];?>" />
<meta property="og:site_name" content="DEVBANBAN.COM =  คู่มือทำเว็บ" />
<meta property="og:image" content="http://127.0.0.1/shoppri/pimg/<?php echo $row1['p_img'];?>" />
<meta property="og:image:secure_url" content="http://127.0.0.1/shoppri/pimg/<?php echo $row1['p_img'];?>" />
<meta property="og:image:width" content="960" />
<meta property="og:image:height" content="720" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="<?php echo $row1['p_name'];?>" />
<meta name="twitter:image" content="http://127.0.0.1/shoppri/pimg/<?php echo $row1['p_img'];?>" />

  <meta name="theme-color" content="#712cf9">
  
  </head>
  <body>

  <nav class="nav">
        <div class="container"></div>
        <a class="logo" href="#">Shoppri Online</a>
        <ul class="nav-list">
            <li class="link"><a href="../index.php">หน้าแรก</a></li>
            <li class="link"><a href="../index.php">สินค้า</a></li>
            <li class="link"><a href="report_problem.php">แจ้งปัญหา</a></li>
            <!-- <li class="link"><a href="shoppri/login.php">Login</a></li> -->

            <li class="link"><a href="login.php">
                    <?php

                    if (!empty($_SESSION['m_name'])) {
                    } else {
                        echo 'Login';
                    }
                    ?>
                </a>
            </li>

            <li class="link"><a href="shoppri/member">
                    <?php

                    if (!empty($_SESSION['m_name'])) {
                        echo 'สวัสดีคุณ ' . $_SESSION['m_name'];
                    } ?>
                </a>
            </li>

            <li class="link"><a href="shoppri/logout.php">
                    <?php

                    if (!empty($_SESSION['m_name'])) {
                        echo 'Logout';
                    } ?>
                </a>
            </li>

        </ul>
        </div>
    </nav>
    <br><br><br><br><br>
<?php include('prd_detail.php') ?>
<?php include('../footer.php'); ?>







