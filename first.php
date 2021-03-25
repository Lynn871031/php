<?php
session_start(); 
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en" style="height:100%">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Account</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/freelancer.min.css" rel="stylesheet">

  <!-- footer icon -->
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	
	<!-- slider-->
<link rel="stylesheet" href="flexslider.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="jquery.flexslider.js"></script>
<!-- Place in the <head>, after the three links -->
<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
         $('.flexslider').flexslider({
          animation: "slide",
          slideshowSpeed: 2000,
          directionNav: true,
          pauseOnHover: false,
          });
        });
</script>


<!-- footer icon -->
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>



	<title></title>
	<style type="text/css">
		.overlay {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0, 0.9);
      overflow-x: hidden;
      transition: 0.5s;
    }
    .overlay-content {
      position: relative;
      top: 25%;
      width: 100%;
      text-align: center;
      margin-top: 30px;
    }
    .overlay a {
      padding: 8px;
      text-decoration: none;
      font-size: 36px;
      color: white;
      display: block;
      transition: 0.3s;
    }
    .overlay a:hover, .overlay a:focus {
      color: #f1f1f1;
    }
    .overlay .closebtn {
      position: absolute;
      top: 20px;
      right: 45px;
      font-size: 60px;
    }
    @media screen and (max-height: 450px) {
      .overlay a {font-size: 20px}
      .overlay .closebtn {
        font-size: 40px;
        top: 15px;
        right: 35px;<
      }
    }
		
    .button{
      width:100px;
      text-align: center;
      color:#fff;
      font-size:3em;
    }
    .button:hover .hover{
      display:block;
    }
    .hover{
      display:none;
      background-color:#ffb2b2;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tr:hover {background-color:#f5f5f5;}
    .toTop-arrow {
          width: 3rem;
          height: 3rem;
          padding: 0;
          margin: 0;
          border: 0;
          border-radius: 33%;
          opacity: 0.6;
          background: #000;
          cursor: pointer;
          position:fixed;
          right: 1rem;
          bottom: 1rem;
          display: none;
        }
    .toTop-arrow::before, .toTop-arrow::after {
      width: 25px;
      height: 6px;
      border-radius: 3px;
      background: #f90;
      position: absolute;
      content: "";
    }
    .toTop-arrow::before {
      transform: rotate(-45deg) translate(0, -50%);
      left: 0.42rem;
    }
    .toTop-arrow::after {
      transform: rotate(45deg) translate(0, -50%);
      right: 0.42rem;
    }
    .toTop-arrow:focus {outline: none;}

      .vertical-menu {
        width: 600px;
        margin-bottom: 10px;
      }
    .bg{
      opacity: 0.5;
    }
	</style>
</head>
<body id="page-top">
<embed src="music.mp3" autostart="true" loop="2" width="1" height="1" volume="10"></embed>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <span style="font-size:30px;cursor:pointer;color: white;" onclick="openNav()">&#9776;</span>
    <div id="myNav" class="overlay">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="overlay-content">
        <a href="first.php">First</a>
        <a href="login.php">Login</a>
      </div>
    </div>

    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="first.php">Account</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="news.php">News</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="about.php">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<body>
<!-- slider -->
  <div style="width: 600px;max-height: 500px;margin-top: 6%;margin-left:26%" >
  <div class="flexslider">
    <ul class="slides" >
      <br><br>
    <li>
      <a href="news1.php"><img src="https://www.twtainan.net/image/72443/1024x768" /></a>
    </li>
    <li>
      <a href="news2.php"><img src="https://www.erv-nsa.gov.tw/image/10670/1024x768" /></a>
    </li>
    <li>
      <a href="news3.php"><img src="https://cnews.com.tw/wp-content/uploads/20170722a01.jpg" /></a>
    </li>
  </ul>
</div>
</div>



 <!-- Footer -->
  <footer class="py-5" style="background-color: black ;">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Ling 2019</p>
      <div class="m-0 text-center text-white small">
        <a href="tel:0938180089">
          <i class='fas fa-phone' style='font-size:24px;color:white;'></i>
          <span style="font-size: 15px;color: white;">0938180089</span>
        </a>
      </div>
      <div class="m-0 text-center text-white small">
        <a href="mailto:ling871031@gmail.com">
          <i class='far fa-envelope' style='font-size:24px;color:#FFFFFF;'></i>
          <span style="font-size: 15px;color: white;">ling871031@gmail.com</span>
        </a>
      </div>
      <div class="m-0 text-center text-white small" style="">
        <a href="https://www.google.com.tw/maps/place/708%E5%8F%B0%E5%8D%97%E5%B8%82%E5%AE%89%E5%B9%B3%E5%8D%80%E8%82%B2%E5%B9%B3%E4%BA%8C%E8%A1%97103%E8%99%9F/@22.985783,120.1654304,17z/data=!3m1!4b1!4m5!3m4!1s0x346e75fd0bb2d189:0xf5254133b409f4ba!8m2!3d22.985783!4d120.1676191?hl=zh-TW">
          <i class='fas fa-map-marked-alt' style='font-size:24px;color:#FFFFFF;'></i>
          <span style="font-size: 15px;color: white;">台南市安平區育平二街103號</span>
        </a>
      </div>
      <!-- /.container -->
    </footer>

     <script type="text/javascript">
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }
    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
  </script>
</body>
</html>