<?php 
include 'includes/dbconn.php';
if (isset($_POST['signup'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    date_default_timezone_set('Asia/Karachi');
    $date = date('d-m-Y / H:i:s A');
               $sql1="SELECT email FROM users WHERE email='$email'";
               $result1=mysqli_query($conn,$sql1);
               $row1=mysqli_fetch_assoc($result1);
               $gemail=@$row1['email'];
  if ($gemail != $email) {

    $sql = "INSERT INTO users (name, email, address, mobile, created_at, user_type, password) VALUES ('$name', '$email', '$address', '$mobile', '$date', '0', '$password' )";

  if (mysqli_query($conn, $sql)) {
    $sql2 = "SELECT * FROM users WHERE email='$email'";
   $result2 = $conn->query($sql2);
   $row2 = $result2->fetch_assoc();
    $uid=$row2['id'];
     $sql3 = "INSERT INTO company_agency (owner_name, company_name, email, mobile, address, verified_status, created_at,user_id) VALUES ('$name', '$name', '$email','$mobile', '$address', '0', '$date','$uid')";
   if (mysqli_query($conn, $sql3)) {

   echo'<script type="text/javascript">alert("Account Created...!");</script>';
   echo "<script type='text/javascript'>location.replace('login.php')</script>";
}
  }
 
  } else{
echo'<script type="text/javascript">alert("This Email is already register...!");</script>';
     echo "<script type='text/javascript'>location.replace('signup.php')</script>";
  }

}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" /><meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Signup</title>
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
                            <h1> Sign Up</h1>
                            <ul>
                                <li> <a href="index.php">Home</a> </li>
                                <li> Sign Up Now</li>
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
                 <form action="signup.php" method="post"> 
                    <fieldset>
                        <div class="col-sm-12"> <p class="success">
                        <label id="Label1">Create Account</label></p> </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            
                        <input type="text" name="name" class="form-control" placeholder="Name*" required="true" maxlength="30">
                          
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">

                    <input type="email" name="email" class="form-control" placeholder="E-mail*" required="true" maxlength="30">
                         
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                        <input type="Phone" name="mobile" class="form-control" placeholder="Mobile No*" required="true" maxlength="11">

                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                  
                       <input type="text" name="address" class="form-control" placeholder="Address*" required="true" maxlength="100">  

                        </div>
                      </div>
                        
                      <div class="col-sm-12">
                        <div class="form-group">
                              
                              <input type="password" id="password" name="password" class="form-control" placeholder="Password*" required="true" maxlength="12" minlength="8">    
                         
                        </div>
                      </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                             
                             <input type="password" id="repassword" class="form-control" placeholder="Conform Password*" required="true" maxlength="12" minlength="8">   
                          
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                           
                            <input type="submit" name="signup" class="button btn btn-danger btn-lg" onclick="return confirm('Are you sure to create account?')" style="background-color: #c9180b;">
                        </div>
                                                    <a href="login.php"><p> Have Already Account Click Here To Login</p></a>
                        

                      </div>
                         
                    </fieldset>
                    </form>
                 
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- Contact Page End Here -->
        <?php include 'footer.php';?>
        <script>


        $(".input_btn").click(function () {
            var dat = "ddddd";
            $.ajax({
               
                type: "POST",
                url: "email.aspx/email_sent_to",
                data: '{id: "' + $('input[data-id="email_to"]').val() + '" }',
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (response) {
                    alert(response.d);
                    location.reload();
                },

                failure: function (response) {
                    alert(response.d);
                }
            });
        });

 
</script>
 </body>
 </html>
