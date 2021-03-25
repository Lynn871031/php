<?php
session_start();
unset($_SESSION['useraccount']);
require_once 'config.php';

$response = array();

$messageErr = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      $account = $_REQUEST['account'];
      $password = $_REQUEST['password'];
      
        if( preg_match('/^[\w\x80-\xff]{3,15}$/', $account) && strlen($password) >= 6){

              $sqlcheck="SELECT * FROM new_user WHERE account = '$account' AND password ='$password'";
            $result = $mysqli->query($sqlcheck);
                
            
            if(!empty(mysqli_fetch_array($result, MYSQLI_ASSOC))){

        
                  //-------------------------------------------------------------------取得帳號
                  $_SESSION['useraccount'] = $account;
            
              echo "<script>alert('登入成功'); location.href = 'index.php';</script>";
            }else{
                  $messageErr = "帳號不存在或密碼錯誤";

            } 
        }else{            
                $messageErr = "帳號不存在或密碼錯誤";      
        }   

}
?>
<!DOCTYPE html>
<html lang="en" style="height:100%">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <br><br><br>
    <title>登入系統</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.css" rel="stylesheet">
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
  right: 35px;
  }
}
    </style>
  </head>
  <body style="min-height: 100%;display: flex; flex-direction: column; ">
    <div style="flex: 1">
    <!-- Navigation -->
    

    <!--<header class="masthead">
    </header>-->

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid" src="https://s1.yimg.com/uu/api/res/1.2/ysB8R8R8TghNlC6zucCX9Q--/YXBwaWQ9eXRhY2h5b247cT03NTs-/http://media.zenfs.com/en/homerun/feed_manager_auto_publish_494/1a2f9713113898122904e1625068d072" alt="">
            </div>
          </div>
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
      </div>
    </nav>

          <div class="col-lg-6 order-lg-1">
            <div class="p-5 text-center">
              <h2 class="display-7"><span style="font-family:Microsoft JhengHei;">登入系統</span></h2>
            <br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="form1" method="post">

              <table  style="margin-bottom:15px;" width="100%" >
              <tr>
              <td style="width: 20%"><span style="font-family:Microsoft JhengHei;">帳號</span></td>
             <td style="width: 40%" ><Input  Type="text" id="account" Name="account" required></td>
             <td style="width: 40%" rowspan="2"><input class="btn rounded"  value="登入" name="submit" style="font-family:Microsoft JhengHei ;border:2px #404040 double; padding:20px 40px 20px 40px" type="submit" /></td>
              </tr>
              <tr>
             <td style="width: 20%" ><span style="font-family:Microsoft JhengHei;">密碼</span></td>
             <td style="width: 40%" ><Input  Type="text" id="password" Name="password" required></td>             
            </tr>
            <tr>
              <td colspan="2" style="height: 40px;" ><a href="create_Account.php"><span style="font-family:Microsoft JhengHei;">註冊帳號</span></a></td>
            </tr>
            </table>
             <span style="color:red "><?php echo $messageErr;?></span>  

            </form>

            </div>
          </div>
        </div>
      </div>
    </section>

    </div>

    <!-- Footer -->
<footer class="py-5" style="background-color: black">
  <div class="container">
    <p class="m-0 text-center text-white small">Copyright &copy; Ling 2019</p>
    <div class="m-0 text-center text-white small">
      <a href="tel:0978026759">
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
      </body>

</html>