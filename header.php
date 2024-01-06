<?php
include('condb.php');

//insert counter
$c_ipadr =  $_SERVER['REMOTE_ADDR'];

$sqlc = "INSERT INTO tbl_counter
	(c_ipadr)
	VALUES
	('$c_ipadr')";
$resultc = mysqli_query($condb, $sqlc) or die("Error in query: $sqlc " . mysqli_error($condb));
?>
<!DOCTYPE html>
<html lang="en">
<!-- Start Header -->

<head>

  <script src="./assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>เว็บขายสินค้า</title>
  <meta name="description" content="ขายสินค้าไอที">
  <meta name="keywords" content="โทรศัพท์, ไอโฟน, ขาย, โทรศัทพ์">
  <meta name="author" content="Wick.com">



  <title>Shoppri</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/css@3.css">
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

  <!-- Custom styles for this template -->
  <link href="./css/headers.css" rel="stylesheet">
  <style>
    .osSwitch {
      position: relative;
      display: inline-block;
      width: 34px;
      height: 15.3px
    }

    .osSwitch input {
      opacity: 0;
      width: 0;
      height: 0
    }

    .osSlider {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      border-radius: 34px;
      background-color: #93a0b5;
      transition: 0.4s
    }

    .osSlider:before {
      position: absolute;
      content: '';
      height: 13px;
      width: 13px;
      left: 2px;
      bottom: 1px;
      border-radius: 50%;
      background-color: white;
      transition: 0.4s
    }

    input:checked+.sliderGreen {
      background-color: #04d289
    }

    input:checked+.sliderRed {
      background-color: #ff3b30
    }

    input:not(:checked)+.defaultGreen {
      background-color: #04d289
    }

    input:checked+.osSlider:before {
      transform: translateX(17px)
    }
  </style>
  <style>
    @font-face {
      font-family: 'SegoeUI_online_security';
      src: url(chrome-extension://llbcnfanfmjhpedaedhbcnpgeepdnnok/segoe-ui.woff);
    }

    @font-face {
      font-family: 'SegoeUI_bold_online_security';
      src: url(chrome-extension://llbcnfanfmjhpedaedhbcnpgeepdnnok/segoe-ui-bold.woff);
    }
  </style>
  <style>
    @font-face {
      font-family: 'SegoeUI_online_security';
      src: url(chrome-extension://llbcnfanfmjhpedaedhbcnpgeepdnnok/segoe-ui.woff);
    }

    @font-face {
      font-family: 'SegoeUI_bold_online_security';
      src: url(chrome-extension://llbcnfanfmjhpedaedhbcnpgeepdnnok/segoe-ui-bold.woff);
    }
  </style>
  <style>
    @font-face {
      font-family: 'SegoeUI_online_security';
      src: url(chrome-extension://llbcnfanfmjhpedaedhbcnpgeepdnnok/segoe-ui.woff);
    }

    @font-face {
      font-family: 'SegoeUI_bold_online_security';
      src: url(chrome-extension://llbcnfanfmjhpedaedhbcnpgeepdnnok/segoe-ui-bold.woff);
    }
  </style>
  <style>
    .av-extension {
      --dark-blue-background: #183360;
      --active-blue-font-color: #183360;
      --modal-header-darkblue-background: #05153f;
      --grey-font-color: #93a0b5;
      --background-color: #f1f4f8;
      --foreground-color: #ffffff;
      --tertiary-color: #05153f;
      --primary-font-color: #183360;
      --green-font-color: #04d289;
      --red-font-color: #ff3b30;
      --purple-font-color: #6726ff;
      --orange-color: #ff8f11;
      --default-font-size: 18px;
      --modal-header-background: #f2f2f2;
      --hover-orange-color: #d97a0e
    }

    .av-extension h1 {
      font-family: 'Segoe UI Bold';
      font-size: 50px;
      font-weight: 700;
      line-height: 66.5px
    }

    .av-extension h2 {
      font-size: 30px;
      padding: 0px;
      margin: 5px 0px;
      margin-top: 0px
    }

    .av-extension h3 {
      font-size: 20px;
      font-weight: normal;
      white-space: pre-line
    }

    .av-extension p {
      padding: 0px;
      margin: 5px 0px
    }

    .av-extension a {
      text-decoration: none
    }

    .av-extension .flex {
      display: flex
    }

    .av-extension .grid {
      display: grid
    }

    .av-extension .fwrap {
      flex-wrap: wrap
    }

    .av-extension .ait {
      align-items: top
    }

    .av-extension .aic {
      align-items: center
    }

    .av-extension .jcl {
      justify-content: left
    }

    .av-extension .jcc {
      justify-content: center
    }

    .av-extension .jcr {
      justify-content: right
    }

    .av-extension .tac {
      text-align: center
    }

    .av-extension .w100 {
      width: 100%
    }

    .av-extension .sb {
      font-weight: 600
    }

    .av-extension .borderButtonColor {
      color: var(--orange-color);
      border: 3px solid var(--orange-color)
    }

    .av-extension .paddinglr {
      padding: 100px 50px
    }

    .av-extension .redColor {
      color: var(--red-font-color);
      fill: var(--red-font-color)
    }

    .av-extension .greenColor {
      color: var(--green-font-color);
      fill: var(--green-font-color)
    }

    .av-extension .purpleColor {
      color: var(--purple-font-color)
    }

    .av-extension .orangeColor {
      color: var(--orange-color)
    }

    .av-extension .content {
      color: var(--primary-font-color);
      margin: auto;
      max-width: 85%;
      padding-top: 30px;
      padding-bottom: 20px
    }

    .av-extension .sectionContent {
      margin-top: 80px;
      margin-bottom: 40px;
      font-size: 22px;
      color: var(--primary-font-color)
    }

    .av-extension .btnAction {
      min-width: 170px;
      padding: 10px 25px;
      color: var(--orange-color);
      border: 2.5px solid var(--orange-color);
      border-radius: 39px;
      font-weight: 600;
      background-color: transparent
    }

    .av-extension .btnAction:hover {
      background-color: var(--orange-color);
      color: white
    }

    .av-extension .btnDwm {
      background: linear-gradient(#fff, #fff) padding-box, linear-gradient(to right, #8526ff, #2a26ff) border-box;
      border: 2.5px solid transparent;
      color: #7644ff
    }

    .av-extension .btnDwm:hover {
      background: linear-gradient(to right, #8526ff, #2a26ff) padding-box, linear-gradient(to right, #8526ff, #2a26ff) border-box;
      border: 2.5px solid transparent
    }

    .av-extension .btnBuy {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      min-width: 170px;
      padding: 15px 40px;
      color: #fff;
      border-radius: 39px;
      font-weight: 600;
      background-color: var(--tertiary-color);
      border: none;
      cursor: pointer
    }

    .av-extension .btnBuy:hover {
      background-color: #0f3cb0
    }

    .av-extension .btnBuy:active {
      background-color: #0f3391
    }

    .av-extension .btnBuyOrange {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      min-width: 170px;
      padding: 15px 40px;
      color: #fff;
      border-radius: 39px;
      font-weight: 600;
      background-color: var(--orange-color);
      border: none;
      cursor: pointer
    }

    .av-extension .btnBuyOrange:hover {
      background-color: #ffa846
    }

    .av-extension .btnBuyOrange:active {
      background-color: #d97a0e
    }

    .av-extension .sectionTitle {
      font-weight: bold;
      font-size: 20px;
      margin-bottom: 25px
    }

    .av-extension .sectionTitle img {
      margin-left: 5px;
      margin-right: 13px
    }

    .av-extension .fullHeadContent {
      height: 400px;
      background: var(--tertiary-color);
      box-shadow: -3px 0px 3px rgba(0, 0, 0, 0.1);
      border-radius: 0px 0px 22px 22px;
      color: var(--foreground-color)
    }

    .av-extension .fullHeadContent img {
      width: 442px
    }

    .av-extension .fullHeadContent p {
      margin: 10px
    }

    .av-extension .spinner {
      width: 120px;
      height: 120px
    }

    @media screen and (min-width: 1500px) {
      .av-extension .content {
        max-width: 70%
      }
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg)
      }

      100% {
        transform: rotate(360deg)
      }
    }
  </style>
  <style>
    .checkboxContainer {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      user-select: none
    }

    .checkboxContainer input {
      position: absolute;
      opacity: 0;
      height: 0;
      width: 0
    }

    .checkboxContainer .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 18px;
      width: 18px;
      border: 1px solid #cad0dd;
      border-radius: 100%
    }

    .checkboxContainer .checkmark.greenColor {
      border: 2.5px solid #cad0dd;
      border-radius: 8px
    }

    .checkboxContainer:hover input~.checkmark {
      background-color: #cad0dd
    }

    .checkboxContainer input:checked~.checkmark {
      background-color: var(--primary-font-color)
    }

    .checkboxContainer input:checked~.purpleColor {
      background-color: var(--purple-font-color)
    }

    .checkboxContainer input:checked~.greenColor {
      background-color: var(--green-font-color);
      border: 2px solid var(--green-font-color);
      border-radius: 8px
    }

    .checkmark:after {
      content: '';
      position: absolute;
      display: none
    }

    .checkboxContainer input:checked~.checkmark:after {
      display: block
    }

    .checkboxContainer .checkmark:after {
      left: 6px;
      top: 3px;
      width: 3px;
      height: 7px;
      border: solid white;
      border-width: 0 3px 3px 0;
      transform: rotate(45deg)
    }

    .checkboxContainer .uncheckAll:after {
      left: 7.5px;
      top: 4px;
      width: 0px;
      height: 9px;
      border-width: 0 3px 0 0;
      transform: rotate(90deg)
    }

    .sectionSelectRadio {
      display: none
    }

    .sectionSelectRadio+label {
      padding: 7px 2px;
      font-size: 20px;
      font-weight: 700;
      margin-right: 50px;
      color: var(--primary-font-color);
      border: 0px;
      background-color: transparent
    }

    .sectionSelectRadio:checked+label {
      border-bottom: 4px solid var(--purple-font-color)
    }
  </style>



</head>
<!-- End Header -->
<!-- Start Body -->

<body>