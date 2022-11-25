<<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" /><meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Forget - Password</title>
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
                            <h1>FORGET PASSWORD</h1>
                            <ul>
                                <li> <a href="index.php">Home</a> </li>
                                <li>FORGET PASSWORD</li>
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
                 
                    <fieldset>
                     
                      <div class="col-sm-12">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="E-mail*" required="true">
                        </div>
                      </div>
                          
                      
                      <div class="col-sm-12">
                        <div class="form-group">
                            <input type="submit" name="signup" value="Forget Password" class="button btn btn-danger btn-lg" style="background-color: #c9180b">
                        </div>
                          
                      </div>
                        <div class="col-sm-12"> 
                              <div  class="col-sm-2"><p>Click To</p></div>
                            <div class="col-sm-2"> <a href="login.php"><p>Login</p></a></div>
                            <div  class="col-sm-4"><p>If Don't Have Account</p></div>
                          <div class="col-sm-2"><a href="signup.php">Sign Up</a></div>
                            </div>
                    </fieldset>
                 
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- Contact Page End Here -->
        <?php include 'footer.php'; ?>
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