<?php
session_start();
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
include('../condb.php');

//สร้างตัวแปรจาก session 
$m_id = $_SESSION['m_id'];
$m_name = $_SESSION['m_name'];
$m_level = $_SESSION['m_level'];



// echo $m_level;

// exit;


if ($m_level != 'ADMIN') {
  Header("Location: ../logout.php");
}

//query member login 
$sql = "SELECT m_name, m_img FROM tbl_member WHERE m_id=$m_id";
$result = mysqli_query($condb, $sql) or die("Error in query: $sql " . mysqli_error($condb));
$row = mysqli_fetch_array($result);
extract($row);


// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

$m_img = $row['m_img'];
$m_name = $row['m_name'];

// echo 'my image = '.$m_img;
// echo '<br>';

// echo 'login by '.$m_name;
// echo '<br>';

// echo $sql;


// echo '<pre>';
// print_r($row);
// echo '</pre>';







// echo 'm_id = ' .$m_id;
// echo '<br>';
// echo 'name = '.$m_name;
// echo '<br>';
// echo 'level = '.$m_level;


//เงื่อนไขการตรวจสิทธิ์  admin 



?>
<!DOCTYPE html>
<html lang="en">
<!-- Start Header -->

<head>

  <script src="../assets/js/color-modes.js"></script>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เว็บขายสินค้า</title>
    <meta name="description" content="ขายสินค้าไอที">
    <meta name="keywords" content="โทรศัพท์, ไอโฟน, ขาย, โทรศัทพ์">
    <meta name="author" content="Wick.com">

  <title>Shoppri</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/css@3.css">
  <!-- Favicons -->
  <meta name="theme-color" content="#712cf9">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }
  </style>


  <!-- End style munu -->

  <!--start data table-->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
  <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js">
  </script>
  <!-- <script>
		$(document).ready(function() {
		$('#example').DataTable( {
		"aaSorting" :[[0,'desc']],
		//"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
		});
		} );
		</script> -->
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
      $('#example').dataTable({
        "aaSorting": [
          [0, 'desc']
        ],
        "oLanguage": {
          "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
          "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
          "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
          "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
          "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
          "sSearch": "ค้นหา :",
          "aaSorting": [
            [0, 'desc']
          ],
          "oPaginate": {
            "sFirst": "หน้าแรก",
            "sPrevious": "ก่อนหน้า",
            "sNext": "ถัดไป",
            "sLast": "หน้าสุดท้าย"
          },
        }
      });
    });
  </script>
  <!-- end data table -->