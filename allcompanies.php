<?php
include 'includes/dbconn.php';
 ?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" /><meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Companies</title>
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
                            <h1>All Companies</h1>
                            <ul>
                                <li> <a href="index.php">Home</a> </li>
                                <li> Companies</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header Section breadcumb End Here -->
     <!-- Property Area Start Here -->
        <div class="propery-area">
            <div class="container">
                <div class="row">
                     
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="property-content-area">                         
                            <div class="row">
                              <div class="property-topbar">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 acurate">
                                  <div class="show-result">
                                    <p>All Compenies Available Here</p>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                        </div> 
                        </div>                      
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 acurate">
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="grid">
                                <div class="show-property-area">
                                   
                                    <div class="row">
                                     <?php
                
                         
                       $sql="SELECT * FROM company_agency";
                        $result=mysqli_query($conn,$sql);
                         if (mysqli_num_rows($result)>0) {
                       while ($row=mysqli_fetch_assoc($result)) {
                     
                             ?>           
                    
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="single-property">
                                                <div class="images">
                                                    <?php if ($row['imagepath']!=NULL && $row['imagepath']!='') { ?>
                                                     <img style="height: 200px;" src="<?php echo $row['imagepath']; ?>" alt="Db Picture">
                                                    <div class="icons-area">
                                                        <ul>
                                                            <li><a class="fancybox" href="<?php echo $row['imagepath']; ?>" data-fancybox-group="gallery" title="<?php echo $row['company_name'];?>"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                   <?php } else { ?>
                                                  <img src="images/company/demo.jpg" alt="Company Image">
                                                    <div class="icons-area">
                                                        <ul>
                                                            <li><a class="fancybox" href="images/company/demo.jpg" data-fancybox-group="gallery" title="<?php echo $row['company_name'];?>"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                  <?php } ?>
                                                    
                                                   
                                                </div>
                                            
                                                <div class="property-details">
                                    <h3><a href="company_profile_view.php?id=<?php echo $row['id']; ?>"><?php echo $row['company_name']; ?><img src="home/images/property/star.png" alt=""/></a></h3>
                                                
                                                <?php if ($row['verified_status']=='1') { ?>    
                                                    <p> <span><i class="fa fa-check" style="color:forestgreen"></i> Verified</span> </p>
                                                  
                                               <?php } if ($row['verified_status']=='0') { ?> 
                                                     <p> <span><i class="fa fa-times-circle" style="color:#c9180b;"></i>  Un-Verified</span></p>
                                                 <?php } ?>

                                                   
                                   

                                       <span><i class="fa fa-clock-o"></i> <?php echo $row['created_at']; ?></span> 

                                                </div>
                                            </div>
                                        </div>
                                            
                                             <?php } }  else {?>

                         <p>There Is No Company Available</p>
                          <?php }?>
                                       </div>

                                        </div>
                                        
                                    
                                        
                                       
                                       
                            
                                   
                                      
                                                                         
                                    </div>
                                </div>
                            </div>
                          
                          </div>
                        </div>                      
                       
                    </div>
 <?php include 'footer.php';?>
</body>
</html>
