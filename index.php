<?php
include 'includes/dbconn.php';
 ?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta charset="utf-8" /><meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Property Listing</title>
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

    
          <!-- Slider Area-->
        <div class="slider-area">
            <div class="bend niceties preview-2">
                <div id="ensign-nivoslider" class="slides"> 
                    <img src="home/images/slider/1.jpg" alt="" title="#slider-direction-1"  />
                    <img src="home/images/slider/2.jpg" alt="" title="#slider-direction-2"  />
                    <img src="home/images/slider/3.jpg" alt="" title="#slider-direction-3"  />
                </div>
                <!-- direction 2 -->
                <div id="slider-direction-1" class="slider-direction">
                    <div class="slider-content t-cn s-tb slider-2">
                        <div class="title-container s-tb-c">
                            <div class="title2">We are offering the</div>
                            <h1 class="title1">Best <span>Property</span>  Deals</h1>
                            <p>Property Listing is a plateform where you can easily sale out your property.It perovide multipale resoursers for your property </p>
                            <div class="slider-botton" >
                                <ul>
                                    <li class="acitve"><a class="button btn btn-danger btn-lg" href="about_us.php">About Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>  
                </div>
                <!-- direction 2 -->
                <div id="slider-direction-2" class="slider-direction">
                    <div class="slider-content t-cn s-tb slider-2">
                        <div class="title-container s-tb-c">
                            <h1 class="title1">Find Your <span>Dream</span> House</h1>
                            <p>Property listing website dream is that every one can sale out his own property easily with out any extra charges.</p>
                            <div class="slider-botton" >
                                <ul>
                                    
                                    <li><a class="button btn btn-danger btn-lg" href="contactus.php">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>  
                </div>
                <!-- direction 2 -->
                <div id="slider-direction-3" class="slider-direction">
                    <div class="slider-content t-cn s-tb slider-2">
                        <div class="title-container s-tb-c">
                            <div class="title2">We are helping you</div>
                            <h1 class="title1">To Find Your<span> Dream Home</span></h1>
                            <p>Property listing website dream is that every one can sale out his own property easily with out any extra charges.</p>
                           
                        </div>
                    </div>  
                </div>
            </div>
        </div>
       <!-- Find Your Home Start Here -->
        <div class="find-your-home-area">
            <div class="container">
                <div class="row">
                    <div class="info-form">
                        <h2>Find Your Dream Home</h2>
                      
                            <div class="form-fields">                      
                                                     
                                                    
                                       <form method="post" action="search_results.php">             
                                                    
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="single-field">
                                        <p>Property Type</p>
                                        <div class="input-box">
                                            <select name="type" required>
                                            <option value="">Select Type Here</option>
                                             <?php
                                              $sql1="SELECT * FROM category";
                                              $result1=mysqli_query($conn,$sql1);
                                              while ($row1=mysqli_fetch_assoc($result1)) { ?>
                                                <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                                                 <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>                      
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="single-field">
                                        <p>City</p>
                                        <div class="input-box">
                                             <select name="city" required>
                                            <option value="">Select City Here</option>
                                             <?php
                                              $sql1="SELECT * FROM city";
                                              $result1=mysqli_query($conn,$sql1);
                                              while ($row1=mysqli_fetch_assoc($result1)) { ?>
                                                <option value="<?php echo $row1['id']; ?>"><?php echo $row1['c_name']; ?></option>
                                                 <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>                      
                                                     
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="read-more" style="    padding-top: 24px;">
                                        
                                        <input type="submit" name="search" class="button btn btn-danger btn-lg" style="background: #c9180b; color: white; border: 0; width: 150px !important; font-size: 16px !important; padding: 10px 16px !important; border-radius: 0 !important; transition: all 0.5s ease 0s;font-weight: 700; text-transform: capitalize; height: 50px !important; line-height: 28px !important;"  value="Search">
                                    </div>
                                </div>
                            </form>
                            </div>
                      
                    </div>
                    <div class="shadow text-center" >
                        <img style="    padding-top: 10px;" src="home/images/shadow.png" alt="shadow">
                    </div>
                </div>
            </div>
        </div>
        <!-- Find Your Home End Here -->
          <!-- Feature Property Area Start Here -->
        <div class="feature-property-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="section-title">
                            <h2>Featured <span>Property Post</span></h2>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="property-menu">
                            <ul>
                                <li data-filter="*" class="active">Property listing website dream is that every one can sale out his own property easily with out any extra charges.!</li>
                              
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="grid">
                        <?php 
                          $sql="SELECT * FROM posts WHERE status='1'";
                          $result=mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result)>0) {
                      while ($row=mysqli_fetch_assoc($result)) {
                        ?>
                   
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 grid-item office">
                            <div class="single-property">
                                <div class="images">
                                    <img src="images/postthumb/<?php echo $row['cover_image'];?>" style="    height: 241px;" alt="Property Images"/>
                                    <div class="icons-area">
                                        <ul>
                                            <li><a class="fancybox" href="images/postthumb/<?php echo $row['cover_image'];?>" data-fancybox-group="gallery" title="Featured"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    <span>Featured</span>
                                </div>
                            
                                <div class="property-details">
                                    <h3><a href="property_detail.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['p_name']; ?><img src="home/images/property/star.png" alt=""/></a></h3>
                                    <p> <span><i class="fa fa-money"></i> PKR:  <?php echo $row['category_id']; ?></span></p>
                                    
                                   <p> <span><i class="fa fa-map-marker"></i> <?php echo $row['city_id']; ?></span>  

                                       <span><i class="fa fa-clock-o"></i> <?php echo $row['created_at']; ?></span> 
                                   </p>

                                </div>
                            </div>
                        </div>
                        
    <?php } } else { ?>

                         <p>There Is No Featured Property Available</p>

                        <?php } ?>
                        
                        
                       
                       
                       
                        
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
     <!-- Feature Property Area End Here -->

    
 
      <?php include 'footer.php';  ?>

    


        
</body>
</html>
