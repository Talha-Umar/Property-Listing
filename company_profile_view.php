<?php
include 'includes/dbconn.php';
if (isset($_POST['save'])) {
 $name=$_POST['name'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $message=$_POST['message'];
date_default_timezone_set('Asia/Karachi');
    $date = date('d-m-Y / H:i:s A');
 $query = "INSERT INTO company_contact_us (name, email, phone, message, send_date) VALUES ('$name', '$email', '$phone', '$message', '$date' )";
 
 if (mysqli_query($conn, $query)) {

   echo'<script type="text/javascript">alert("Message has been send...!");</script>';
   echo "<script type='text/javascript'>location.replace('company_profile_view.php')</script>";
}
}

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
                            <h1>Company Details</h1>
                            <ul>
                                <li> <a href="index-2.html">Home</a> </li>
                                <li> Company Details </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header Section breadcumb End Here -->
        <!-- Agent Details Area Start Here -->
        <div class="agent-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                        <div class="single-agent">
                          <?php
                          $cid=$_REQUEST['id'];
                          $sql="SELECT * FROM company_agency WHERE id='$cid'";
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_assoc($result);
                        $userid=$row['user_id'];

                        $sql1="SELECT * FROM users WHERE id='$userid'";
                        $result1=mysqli_query($conn,$sql1);
                        $row1=mysqli_fetch_assoc($result1);
                          if ($row1['img']!=NULL || $row1['img']!='') {

                           ?>
                              
                            <div class="images">
                               <div class="image-frame" >
                                    <img style="height:220px; width:220px; margin-bottom: -23px;" src="images/company/<?php echo $row1['img']; ?>" alt="Profile">                             
                               </div>
                               
                            </div>
                             <?php } else { ?>
                               <div class="images">
                               <div class="image-frame">
                                    <img src="images/agent/1.jpg" alt="Profile">                             
                               </div>
                               
                            </div>
                            <?php } ?>
                            <div class="agent-details">
                                 
                                <h3> <a href="agent-details.html"><?php echo $row['company_name']; ?></a></h3>
                                <span>Founder:<?php echo $row['founded']; ?></span>
                                 
                                <div class="social-media">
                                    <ul>
                                        <li><a href="facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="linkedin.com"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="skype.com"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                      
                      
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="agent-details">
                            
                            <h3>About Us</h3>
                            <p><?php echo $row['about']; ?></p>
                        </div>
                        
                        <div class="contact-form">
                          <h3>Send Us Message</h3>                           
                          <div class="main-contact-form">                   
                            <form action="" method="post">
                                  <fieldset>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                 <input type="text" name="name" placeholder="Name*" maxlength="20" class="form-control" required>
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                            <input type="email" name="email" placeholder="Email*" class="form-control" required>
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                          <input type="phone" name="phone" placeholder="You Phone*" maxlength="11" class="form-control" required>
                                      </div>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="form-group">
                      <textarea class="textarea form-control" cols="40" rows="7" placeholder="Your Message*" maxlength="100" required name="message"></textarea>
                                      </div>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="form-group acurate">
                            <input type="submit" name="save" class="button btn btn-danger btn-lg" value="Send Us" style="background-color: #c9180b">
                                      </div>
                                    </div>
                                  </fieldset>
                                  </form>
                               
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="agent-contact-area">
                            
                            <h3>Contact Us</h3>
                            <div class="contact-list">
                                <ul>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i><?php echo $row['mobile'];?></li>
                                    <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $row['email'];?> </li>
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row['created_at'];?> </li>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $row['address'];?></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          
                        <div class="search-from ">
                            <h3  style="    background-color: #c9180b;
    color: white; text-align: center; padding-top: 10px; padding-bottom: 10px;">Company Properties Post</h3>
                            
                        </div>
                        <div class="row acurate search-property-show">
                             <?php
                
                         
                       $sql2="SELECT * FROM posts WHERE status='1' AND user_id='$userid'";
                        $result2=mysqli_query($conn,$sql2);
                         if (mysqli_num_rows($result2)>0) {
                       while ($row2=mysqli_fetch_assoc($result2)) {
                        $pid=$row2['p_id'];
                             ?>        
                          
                                                   
                           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="single-property">
                                    <div class="images">
                                        <img src="images/postthumb/<?php echo $row2['cover_image'];?>"  alt="Thumbnail">
                                        <div class="icons-area">
                                            <ul>
                                                <li><a class="fancybox" href="images/postthumb/<?php echo $row2['cover_image']; ?>" data-fancybox-group="gallery" title="<?php echo $row2['p_name']; ?>"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <span><?php
                                         $ptid=$row2['post_type_id'];
                                         $sql3="SELECT * FROM post_type WHERE id='$ptid'";
                                          $result3=mysqli_query($conn,$sql3);
                                          $row3=mysqli_fetch_assoc($result3);
                                          echo $row3['name'];
                                            
                                          ?></span>
                                    </div>
                                    <div class="property-details">
                                          <h3><a href="property_detail.php?id=<?php echo $row2['p_id']; ?>"><?php echo $row2['p_name']; ?><img src="" alt=""></a></h3>
                                        <p> <span><i class="fa fa-money"></i> PKR:  <?php 

                                          $cid= $row2['category_id'];
                                         $sql4="SELECT * FROM category WHERE id='$cid'";
                                          $result4=mysqli_query($conn,$sql4);
                                          $row4=mysqli_fetch_assoc($result4);

                                          if ($row4['name']=='Sale') {
                                          $sql3="SELECT * FROM sale WHERE p_id='$pid'";
                                          $result3=mysqli_query($conn,$sql3);
                                          $row3=mysqli_fetch_assoc($result3);
                                         echo $row3['price'];
                                          }

                                          if ($row4['name']=='Lease') {
                                         $sql3="SELECT * FROM lease WHERE p_id='$pid'";
                                        $result3=mysqli_query($conn,$sql3);
                                         $row3=mysqli_fetch_assoc($result3);
                                          echo $row3['price'];
                                          }

                                          if ($row4['name']=='Rent') {
                                         $sql3="SELECT * FROM rent WHERE p_id='$pid'";
                                         $result3=mysqli_query($conn,$sql3);
                                         $row3=mysqli_fetch_assoc($result3);
                                          echo $row3['month_rent'];
                                          }

                                         ?></span></p>
                                         <p> <span><i class="fa fa-map-marker"></i> <?php 
                                          $ctid=$row2['city_id'];
                                         $sql5="SELECT * FROM city WHERE id='$ctid'";
                                         $result5=mysqli_query($conn,$sql5);
                                          $row5=mysqli_fetch_assoc($result5);
                                          echo $row5['c_name'];
                                          ?></span>  
                                              <span><i class="fa fa-clock-o"></i> <?php echo $row2['created_at']; ?></span> 
                                   
                                    </div>
                                </div>
                            </div>
         <?php }} else { ?>

                         <p>There Is No Property Available</p>

                        <?php } ?>
                            
                           
                        </div>
                    </div>
               
                </div>
            </div>
        </div>
</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
     