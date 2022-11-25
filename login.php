<?php
session_start();
if(count($_POST)>0) {
 include 'includes/dbconn.php';
$email = $_POST['email'];
$password = $_POST['password'];
$sql ="SELECT * FROM users WHERE email='$email' and BINARY password ='$password'";
$result = mysqli_query($conn, $sql);
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["username"] = $row['email'];
$_SESSION["password"] = $row['password'];
$type=@$row['user_type'];
$_SESSION["userid"]=$row['id'];
} else {
 echo "<script type='text/javascript'>alert('Invalid Username or Password!');</script>";
}


if(isset($_SESSION["username"])){
    if (@$type=="1") {
    echo "<script type='text/javascript'>location.replace('admin/post_in_admin_review.php')</script>";
    }
    else if (@$type=="0"){
        echo "<script type='text/javascript'>location.replace('company/company_active_post.php')</script>";
    }
    else{
        echo "<script type='text/javascript'>location.replace('login.php')</script>";
    }
     
    
}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" /><meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Login</title>
<meta name="description" /><meta name="viewport" content="width=device-width, initial-scale=1" /><link rel="apple-touch-icon" href="fav.html" />
        <!-- Place favicon.ico in the root directory -->
        <!-- favicon-->        
        <link rel="shortcut icon" type="image/x-icon" href="home/images/fav.png" />
     <script src="jquery/jquery-1.11.1.min.js"></script>
        <!-- all css here -->
        <!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="home/css/bootstrap.min.css" />
        <!-- animate css -->
        <link rel="stylesheet" href="home/css/animate.css" />
        <!-- jquery-ui.min css -->
        <link rel="stylesheet" href="home/css/jquery-ui.min.css" />
        <!-- meanmenu css -->
        <link rel="stylesheet" href="home/css/meanmenu.min.css" />
        <!-- owl.carousel css -->
        <link rel="stylesheet" href="home/css/owl.carousel.css" />
        <!-- font-awesome css -->
        <link rel="stylesheet" href="home/css/font-awesome.min.css" />
        <!-- Nivo slider CSS -->
        <link rel="stylesheet" href="home/inc/custom-slider/css/nivo-slider.css" type="text/css" /><link rel="stylesheet" href="home/inc/custom-slider/css/preview.css" type="text/css" media="screen" />
        <!-- slick CSS -->
        <link rel="stylesheet" href="home/css/slick.css" /><link rel="stylesheet" href="home/css/slick-theme.css" />
        <!-- jquery.fancybox.pack js -->
        <link rel="stylesheet" href="home/inc/fancybox/jquery.fancybox.css" />
        <!-- bxslider CSS -->
        <link rel="stylesheet" href="home/css/jquery.bxslider.css" />
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="home/css/nice-select.css" />
        <!-- style css -->
        <link rel="stylesheet" href="home/style.css" />
        <!-- responsive css -->
        <link rel="stylesheet" href="home/css/responsive.css" />
        <!-- modernizr css -->
        <script src="home/js/vendor/modernizr-2.8.3.min.js"></script>
     <script src="jquery/notify.js"></script>
    
</head>
<body>

<?php include 'header.php'; ?>        

     <!-- Page Header Section breadcumb Start Here -->
        <div class="page-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <div class="header-page">
                            <h1> LOGIN HERE</h1>
                            <ul>
                                <li> <a href="index.php">Home</a> </li>
                                <li>LOGIN NOW</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header Section breadcumb End Here -->
        <!-- Contact Page Start Here -->
        <div class="contact-page-area">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                
               
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="contact-form">                   
                 <form action="login.php" method="post"> 
                    <fieldset>
                     
                      <div class="col-sm-12">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="E-mail*" required="true">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <input type="password" name="password" class="form-control" placeholder="Password*" required="true">
                        </div>
                      </div>     
                      
                      <div class="col-sm-12">
                        <div class="form-group">
                          
                            <input type="submit" name="login" value="Login" class="button btn btn-danger btn-lg" style="background-color: #c9180b">
                        </div>
                          
                      </div>
                        <div class="col-sm-12"> 
                            <div class="col-sm-6"> <a href="forget_password.php"><p>Forget Password</p></a></div>
                            <div  class="col-sm-4"><p>If Don't Have Account</p></div>
                          <div class="col-sm-2"><a href="signup.php">Sign Up</a></div>
                            </div>
                    </fieldset>
                    </form>
                 
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <?php include 'footer.php'; ?>
        <!-- Contact Page End Here -->
</body>
</html>