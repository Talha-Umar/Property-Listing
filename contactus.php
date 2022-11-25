<?php
include 'includes/dbconn.php';
if (isset($_POST['contact'])) {
 $name=$_POST['name'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $subject=$_POST['subject'];
 $message=$_POST['message'];
date_default_timezone_set('Asia/Karachi');
    $date = date('d-m-Y / H:i:s A');
 $query = "INSERT INTO admin_contact_us (name, email, phone, subject, message, send_date) VALUES ('$name', '$email', '$phone', '$subject', '$message', '$date' )";
 
 if (mysqli_query($conn, $query)) {

   echo'<script type="text/javascript">alert("Message has been send...!");</script>';
   echo "<script type='text/javascript'>location.replace(contactus.php')</script>";
}
}

 ?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" /><meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Contact Us</title>
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
                            <h1> Contact Us</h1>
                            <ul>
                                <li> <a href="index.php">Home</a> </li>
                                <li>Contact Us</li>
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
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <!--google map start section -->
               <iframe src = "https://maps.google.com/maps?q=30.0317465,72.3143464&hl=es;z=20&amp;output=embed" style="    width: 581px;
    height: 390px;"></iframe>

                
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="contact-form">                   
                  
                    <fieldset>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Name*" class="form-control" required="true">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="email" name="email" placeholder="E-mail*" class="form-control" required="true">

                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          
                        <input type="phone" name="phone" placeholder="Your Phone*" class="form-control" required="true" maxlength="12">

                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                      <input type="text" name="subject" placeholder="Subject*" class="form-control" required="true" maxlength="30">

                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                      <textarea cols="40" rows="7" name="message" class="form-control" placeholder="Your Message*" maxlength="100"></textarea>

                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                            <input type="submit" name="contact" class="button btn btn-danger btn-lg" value="Send Us" style="background-color: #c9180b;">
                        </div>
                      </div>
                    </fieldset>
                 
                </div>
              </div>
            </div>
            <?php
              $sql3="SELECT * FROM users WHERE user_type='1'";
             $result3=mysqli_query($conn,$sql3);
            $row3=mysqli_fetch_assoc($result3);
             ?>
            <div class="row">                
                <div class="contact-info">
                  <div class="col-sm-4 text-center">
                    <div class="single-contact">
                      <i class="fa fa-phone" aria-hidden="true"></i>
                      <h3>Contact Number</h3>
                      <p> <?php echo $row3['mobile']; ?></p>
                   
                    </div>
                  </div>
                  <div class="col-sm-4 text-center">
                    <div class="single-contact">
                      <i class="fa fa-envelope-o" aria-hidden="true"></i>
                      <h3>Email Address</h3>
                      <p><?php echo $row3['email']; ?></p>
                    
                    </div>
                  </div>
                  <div class="col-sm-4 text-center">
                    <div class="single-contact">
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                      <h3>Official Address</h3>
                      <p><?php echo $row3['address']; ?></p>
                     
                    </div>
                  </div>                  
                </div>
            </div>
          </div>
        </div>
        <!-- Contact Page End Here -->

<?php include 'footer.php';?>
    
</body>
</html>