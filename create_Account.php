<?php
require_once 'config.php';

$response = array();

//先將錯誤訊息設定為空
$user_nameErr = $accountErr = $passwordErr = $emailErr = $phoneErr = "";

$user_name = $account = $password = $email = $phone = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      //接收 form 表單 input 值
      $user_name = $_REQUEST['user_name'];
      $account = $_REQUEST['account'];
      $password = $_REQUEST['password'];
      $email = $_REQUEST['email'];
      $phone = $_REQUEST['phone'];
      $gender = $_REQUEST['gender'];

      $checkinput=100; $message=""; 
        if(!preg_match('/^(?!_|\s\')[A-Za-z0-9_\x80-\xff\s\']+$/',$user_name)){
          $checkinput=1;        
          $user_nameErr = " 名稱不符規定 ";
          $user_name = "";
           //--------------------------------------------名稱不符
        }
        if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $account)){
          $checkinput=2;            
          $accountErr = "帳號不符規定";
          $account = "";
          //--------------------------------------------帳號不符
        }
        if(strlen($password) < 6){
          $checkinput=3;            
          $passwordErr = "密碼不符規定 ";
          $password = "";
           //--------------------------------------------密碼不符
        }
        if(!preg_match('/^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/', $email)){
          $checkinput=4;            
          $emailErr = "電子郵件不符規定 ";
          $email = "";
           //--------------------------------------------郵件不符
        }
        if(!preg_match("/09[0-9]{2}[0-9]{6}/", $phone)){
          $checkinput=5;            
          $phoneErr = "手機不符規定 ";
          $phone = "";
           //--------------------------------------------手機不符
        }

          if($checkinput==100)
          {
               $sqlcheck="SELECT * FROM new_user WHERE account = '$account'";
               $result = $mysqli->query($sqlcheck);
                 if(!empty(mysqli_fetch_array($result, MYSQLI_ASSOC))){
                      $accountErr = "帳號已被使用";
                }else{
                
                  $sql = "INSERT INTO new_user(user_name, account, password, email, phone, gender) VALUES('$user_name', '$account', '$password', '$email','$phone','$gender')";


                  // check if row inserted or not
                  if ($result = $mysqli->query($sql)) {
                    // successfully inserted into database
                    //$_SESSION['User']=$_REQUEST['account'];
                    //$response["account"]=$_SESSION['User'];
                 echo "<script>alert('帳號創建成功'); location.href = 'login.php';</script>";
                    //當註冊帳號時 順便在通知資料表也新增帳號資料  
                    $sqltonotification = "INSERT INTO usernotification(account) VALUES('$account')";
                    $resultnotification = $mysqli->query($sqltonotification);
                  } else {
                    // failed to insert row
                 echo "<script>alert('發生未知錯誤'); location.href = 'create_Account.php';</script>";
                  }
                }
          }

}
?>
<!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>註冊資料</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.css" rel="stylesheet">

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
.error {color: #FF0000;}
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
</style>
  </head>
  <body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <span style="font-size:30px;cursor:pointer;color: white;" onclick="openNav()">&#9776;</span>
    <div id="myNav" class="overlay">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="overlay-content">
        <a href="teacher.php">Teacher</a>
        <a href="student.php">Student</a>
        <a href="lesson.php">Lesson</a>
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
  <body style="min-height: 100%;display: flex; flex-direction: column; ">
    <div style="flex: 1">

    <br><br><br><br>
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 order-lg-1">
            <div class="p-5 text-center">
              <h2 class="display-8 "><span style="font-family: Microsoft JhengHei;">帳號註冊</span></h2>
              <p style="font-family:Microsoft JhengHei;">請填入相關資料</p>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="form1" method="post">                
            <table class="d-flex justify-content-center" name="course" width="100%" >

              <tr>
                <td><span style="font-family: Microsoft JhengHei;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;姓名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                <td><Input  Type="text" id="user_name" Name="user_name" value="<?php echo $user_name;?>" required></td>
                <td><span class="error"><?php echo $user_nameErr;?></span></td>
              </tr>
              <tr>
                <td><span style="font-family: Microsoft JhengHei;">帳號</span></td>
                <td><Input  Type="text" id="account" Name="account" value="<?php echo $account;?>" required></td>
                <td><span class="error"><?php echo $accountErr;?></span></td>
              </tr>
              <tr>
                <td><span style="font-family: Microsoft JhengHei;">密碼</span></td>
                <td><Input  Type="text" id="password" Name="password" value="<?php echo $password;?>" required></td>
                <td><span class="error"><?php echo $passwordErr;?></span></td>
              </tr>   
              <tr>
                <td><span style="font-family: Microsoft JhengHei;">信箱</span></td>
                <td><Input  Type="text" id="email" Name="email" value="<?php echo $email;?>" required></td>
                <td><span class="error"><?php echo $emailErr;?></span></td>
              </tr> 
              <tr>
                <td><span style="font-family: Microsoft JhengHei;">電話</span></td>
                <td><Input  Type="text" id="phone" Name="phone" value="<?php echo $phone;?>" required></td>
                <td><span class="error"><?php echo $phoneErr;?></span></td>
              </tr> 
              <tr>
                <td><span style="font-family: Microsoft JhengHei;">性別</span></td>
                <td><select id="gender" Name="gender">
                  　<option value="boy">男</option>
                  　<option value="girl">女</option>
                  </select>
                </td>
              </tr>             
              </table>
              <br>
              <input class="btn col-6 rounded-pill"  value="註冊" name="submit"  type="submit"  style="font-family: Micorsoft JhengHei ; border:2px #404040 double" />
              </form>
               
            </div>
          </div>
        </div>
      </div>
</div>
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
  </body>

</html>




