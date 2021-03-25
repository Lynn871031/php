<?php
session_start();
  //connect DB
require_once("connect.php");
$link = connection();
$account = $_SESSION['useraccount'];

//item 
$item = $link->query("SELECT * FROM item");
//keeper
$keeper = $link->query("SELECT * FROM keeper");
//activity
$activity = $link->query("SELECT * FROM activity");
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <script language="JavaScript">
    function ShowTime(){
      var NowDate=new Date();
      var h=NowDate.getHours();
      var m=NowDate.getMinutes();
      var s=NowDate.getSeconds();　
      document.getElementById('showbox').innerHTML = h+'時'+m+'分'+s+'秒';
      setTimeout('ShowTime()',1000);
    }
  </script>
  <title>新增花費資料</title>

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
        <a href="login.php">Logout</a>
      </div>
    </div>

    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Account</a>

      <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <!-- time -->
          <body onload="ShowTime()">
            <div style="position: absolute; top:630px;left: 1230px; font-weight:bold; font-style:italic; opacity: 0.3;">
              <?php
              echo "<br>";
              echo "現在時間"."<br>";
              echo date("Y-m-d") . "<br>";
              ?>
            </div>
            <div id="showbox" style="position: absolute; top:700px;left: 1230px; font-weight:bold; font-style:italic; opacity: 0.3;">
            </div>
          </body>

          
        </ul>
      </div>
    </div>
  </nav>

  <section>

    <div style="background-color:#cbd0d3;padding:10px;5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
           <div class="p-5">
             <img class="img-fluid rounded-circle" src="https://ppt.cc/f1KpKx" alt="">
             <a ><img src="http://veganstrategist.org/wp-content/uploads/2018/02/money-heart.jpg" border="0" width="450px"></a>
           </div>
         </div>
         <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-4">  <span style="font-size:48px;font-family:Microsoft JhengHei;">Hi，<?php echo $account;?></span></h2>
            <form action="update_Account.php" name="form1" method="post">
              <button type="submit" value="修改帳號資料" name="action" class="icon" style="font-family:Microsoft JhengHei;width: 160px;height:40px;border:2px #404040 dashed">修改/刪除帳號</button></form><br>
              <form action="login.php">
                <button type="submit" value="登出" name="action" class="icon" style="font-family:Microsoft JhengHei;width: 160px;height:40px;border:2px #404040 dashed">登出</button></form>
                <h2 class="display-4">  <span style="font-family:Microsoft JhengHei; font-size: 30px;">Record your consumption.</span></h2>

                <table name="final" width="115%" >
                 <tr>
                  <td><span style="font-family:Microsoft JhengHei;">花費金額</span></td>
                  <td><span style="font-family:Microsoft JhengHei;">消費日期</span></td>
                  <td><span style="font-family:Microsoft JhengHei;">商品類別</span></td>
                  <td><span style="font-family:Microsoft JhengHei;">活動ID</span></td>
                  <td><span style="font-family:Microsoft JhengHei;">使用者ID</span></td>
                </tr>
                <?php
                for($i=1;$i<=mysqli_num_rows($item);$i++)
                  { $CS=mysqli_fetch_row($item);
                    ?>
                    <tr>
                      <td><?php echo $CS[0];?></td>
                      <td><?php echo $CS[1];?></td>
                      <td><?php echo $CS[2];?></td>
                      <td><?php echo $CS[3];?></td>
                      <td><?php echo $CS[4];?></td>  
                    </tr>
                    <?php 
                  }
                  ?>
                </table>
                <br><form action="item.php" name="form1" method="post">
                 <div class="row">
                  <table style="margin-bottom:18px">
                    <tr>
                     <td><Input class="col-12" Type="text" id="cost" Name="cost" style="border:2px #404040 double" required></td>
                     <td><Input class="col-12" Type="text" id="date" Name="date" style="border:2px #404040 double" required></td>
                     <td><Input class="col-12" Type="text" id="type" Name="type" style="border:2px #404040 double" required></td>
                     <td><Input class="col-12" Type="text" id="act_id" Name="act_id" style="border:2px #404040 double" required></td>
                     <td><Input class="col-12" Type="text" id="keeper_id" Name="keeper_id" style="border:2px #404040 double" required></td>

                   </tr>
                 </table>
                 <input class="btn col-4 rounded-pill"  value="新增" name="action" type="submit" 
                 span style="font-family:Microsoft JhengHei;width: 120px;height:40px;border:2px #404040 dashed" />
                 <input class="btn col-4 rounded-pill"  value="修改" name="action" type="submit"
                 span style="font-family:Microsoft JhengHei;width: 120px;height:40px;border:2px #404040 dashed" />
                 <input class="btn col-4 rounded-pill"  value="刪除" name="action" type="submit"
                 span style="font-family:Microsoft JhengHei;width: 120px;height:40px;border:2px #404040 dashed" />
                 <//form method="post"  action="update_Account.php">
                 <//button type="submit" class="icon"><//button>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </span>
</section>

<section>
  <div style="background-color:#cbd0d3;padding:10px;5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="p-5">
           <a><img src="https://jooinn.com/images/activity-1.jpg"  width="220" border="0"></a>
         </div>
       </div>
       <div class="col-lg-6">
        <div class="p-5">
          <h2 class="display-4"><span style="font-family:Microsoft JhengHei;">Activity</span></h2>
          <table width="100%" >
            <tr>
              <td><span style="font-family:Microsoft JhengHei;">Activity name</span></td>
              <td><span style="font-family:Microsoft JhengHei;">Activity ID</span></td>
            </tr>
            <?php
            for($i=1;$i<=mysqli_num_rows($activity);$i++)
              { $SD=mysqli_fetch_row($activity);
                ?>
                <tr>
                  <td><?php echo $SD[0];?></td>
                  <td><?php echo $SD[1];?></td>
                </tr>
                <?php 
              }
              ?>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</span>
</section>
<section>
  <div style="background-color:#cbd0d3;padding:10px;5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="p-5">
           <a><img src="https://cdn2.ettoday.net/images/1183/d1183267.jpg"  width="250" border="0"></a>
         </div>
       </div>
       <div class="col-lg-6">
        <div class="p-5">
          <h2 class="display-4"><span style="font-family:Microsoft JhengHei;">Owner</span></h2>
          <table width="100%" >
            <tr>
              <td><span style="font-family:Microsoft JhengHei;">Owner name</span></td>
              <td><span style="font-family:Microsoft JhengHei;">Owner account</span></td>
              <td><span style="font-family:Microsoft JhengHei;">Owner ID</span></td>
            </tr>
            <?php
            for($i=1;$i<=mysqli_num_rows($keeper);$i++)
              { $SY=mysqli_fetch_row($keeper);
                ?>
                <tr>
                  <td><?php echo $SY[0];?></td>
                  <td><?php echo $SY[1];?></td>
                  <td><?php echo $SY[2];?></td>
                </tr>
                <?php 
              }
              ?>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</span>
</section>

<!-- Footer -->
<footer class="py-5" style="background-color: black">
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

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }
    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
  </script>

  <!--to top-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <button type="button" id="BackTop" class="toTop-arrow"></button>
  <script>
    $(function(){
      $('#BackTop').click(function(){
        $('html,body').animate({scrollTop:0}, 333);
      });
      $(window).scroll(function() {
        if ( $(this).scrollTop() > 120 ){
          $('#BackTop').fadeIn(222);
        } else {
          $('#BackTop').stop().fadeOut(222);
        }
      }).scroll();
    });
  </script>

</body>

</html>