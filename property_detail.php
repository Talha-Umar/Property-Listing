<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" /><meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Property Detail</title>
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
    
    <!-- Page Header div breadcumb Start Here -->
        <div class="page-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <div class="header-page">
                            <h1>Property Details</h1>
                            <ul>
                                <li> <a href="index.php">Home</a> </li>
                                <li> Property Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header div breadcumb End Here -->
        <!-- single property page start here -->
        <div class="property-page-area">
          <div class="container">
            <div class="row">               
                <div class="col-lg-12 col-md-12 col-sm-11 col-xs-12"> 
                    
                    <?php
                    include 'includes/dbconn.php';
                     $id=$_REQUEST['id'];
                     $sql="SELECT * FROM posts WHERE p_id='$id'";
                     $result=mysqli_query($conn,$sql);
                     $row=mysqli_fetch_assoc($result);
                     $userid=$row['user_id'];
                     ?>
                       
                     <div class="property-image-slider">
                          
                         <img style="height: 400px" src="images/postthumb/<?php echo $row['cover_image']; ?>" alt="Property Images"/>
                       
                     </div>   

                    <div class="property-details">
                        <h3><?php echo $row['p_name']; ?></h3>
                       <?php
                     $sql2="SELECT * FROM company_agency WHERE user_id='$userid'";
                     $result2=mysqli_query($conn,$sql2);
                     $row2=mysqli_fetch_assoc($result2);
                        ?>
                         <h6>Company Name: <?php echo $row2['company_name']; ?></h6>
                         <h6>Email: <?php echo $row2['email']; ?></h6>
                         <h6>Mobile: <?php echo $row2['mobile']; ?></h6>
                       
                        <p class="address"><?php echo $row['address']; ?></p>
                        <p><?php echo $row['description']; ?></p>
                        <div class="single-property-details">
                            <h4>Essential Information:</h4>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="single-informations">
                                    <ul>
                                        <li>Property ID: <?php echo $row['p_id']; ?></li>
                                        <li>Price:  <?php 
                                         
                                      $cid= $row['category_id'];
                                      $sql2="SELECT * FROM category WHERE id='$cid'";
                                      $result2=mysqli_query($conn,$sql2);
                                      $row2=mysqli_fetch_assoc($result2);

                                      if ($row2['name']=='Sale') {
                                      $sql3="SELECT * FROM sale WHERE p_id='$id'";
                                      $result3=mysqli_query($conn,$sql3);
                                      $row3=mysqli_fetch_assoc($result3);
                                      echo $row3['price'];
                                       }

                                      if ($row2['name']=='Lease') {
                                      $sql3="SELECT * FROM lease WHERE p_id='$id'";
                                      $result3=mysqli_query($conn,$sql3);
                                      $row3=mysqli_fetch_assoc($result3);
                                      echo $row3['price'];
                                       }

                                      if ($row2['name']=='Rent') {
                                      $sql3="SELECT * FROM rent WHERE p_id='$id'";
                                      $result3=mysqli_query($conn,$sql3);
                                      $row3=mysqli_fetch_assoc($result3);
                                      echo $row3['month_rent'];
                                       }

                                         ?></li>
                                        <?php 
                                        $sql3="SELECT * FROM post_details WHERE post_id='$id'";
                                         $result3=mysqli_query($conn,$sql3);
                                         $row3=mysqli_fetch_assoc($result3);
                                         ?>
                                        <li>Property Marlas: <?php echo $row3['area']; ?></li>
                                        <li>Construction Year: <?php echo $row3['c_year']; ?></li>
                                  
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="single-informations">
                                    <ul>
                                        <li>Bathrooms: <?php echo $row3['bed_rooms']; ?> </li>
                                        <li>Bedrooms:  <?php echo $row3['bath_rooms']; ?> </li>
                                        <li>kitchens: <?php echo $row3['kitchen']; ?> </li>
                                          <li>StoreRooms:  <?php echo $row3['store_rooms']; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="single-informations">
                                    <ul>
                                      
                                        <li>Car Parking:  <?php echo $row3['car_parking']; ?></li>
                                        <li>Other Features:  <?php echo $row3['other_features']; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                         <div class="single-property-details">
                            <h4>Others Information:</h4>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="single-informations">
                                    <ul>
                                       
                                         <li>Dining Rooms: <?php echo $row3['dinning_rooms']; ?></li>
                                        <li>.Gym Rooms: <?php echo $row3['gym_rooms']; ?> </li>
                                        <li>Other Rooms:  <?php echo $row3['other_rooms']; ?> </li>
                                  
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="single-informations">
                                    <ul>
                                        
                                        <li>Powder Rooms: <?php echo $row3['powder_rooms']; ?> </li>
                                         <li>Sitting Rooms:  <?php echo $row3['sitting_rooms']; ?></li>
                                        <li>Study Rooms:  <?php echo $row3['study_rooms']; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="single-informations">
                                    <ul>
                                        
                                        <li>Steaming Rooms:  <?php echo $row3['steaming_rooms']; ?></li>
                                        <li>Servant Rooms:  <?php echo $row3['servant_rooms']; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-property-details margin-top">
                           
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                 <h4>Acessories:</h4>
                                <div class="single-informations">
                                    <ul>
                                        <li>Centrel Air Conditioner: <?php echo $row3['air_conditioner']; ?></li>
                                        <li>Centrel Heating: <?php echo $row3['heating']; ?></li>
                                        <li>Double Glazed Window: <?php echo $row3['window']; ?></li>
                                        <li>Electricty Backup: <?php echo $row3['electricity_backup']; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <h4>Basic:</h4>
                                <div class="single-informations">
                                    <ul>
                                      <li>Flooring: <?php echo $row3['flooring']; ?></li>
                                      <li>No Of Floors: <?php echo $row3['no_floors']; ?></li>
                                      <li>Waste Deposal: <?php echo $row3['waste_deposal']; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                 <h4>Security:</h4>
                                <div class="single-informations">
                                    <ul>
                                        <li>Ficility For Disable: <?php echo $row3['disable']; ?></li>
                                        <li>Maintainence Staff: <?php echo $row3['maintenance_staff']; ?></li>
                                        <li>Security Staff: <?php echo $row3['security_staff']; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-property-details margin-top">
                            <h4>Near By:</h4>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                
                                <div class="single-informations">
                                    <ul>
                                        <li>Near By Resturant: <?php echo $row3['restaurant']; ?></li>
                                        <li>Other Nearby Mosque: <?php echo $row3['mosque']; ?></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                
                                <div class="single-informations">
                                    <ul>
                                      <li>Nearby Hospital: <?php echo $row3['hospital']; ?></li>
                                      <li>Nearby School: <?php echo $row3['school']; ?></li>
                                     
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            
                                <div class="single-informations">
                                    <ul>
                                        <li>Nearby Public Transport: <?php echo $row3['public_transport']; ?></li>
                                        <li>Nearby Shopping Malls: <?php echo $row3['shopping_mall']; ?></li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-property-details margin-top">
                            <h4>Availablity:</h4>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                
                                <div class="single-informations">
                                    <ul>
                                        <li>Internet Access: <?php echo $row3['internet']; ?></li>
                                        <li>Cabel TV: <?php echo $row3['cable']; ?></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                
                                <div class="single-informations">
                                    <ul>
                                      <li>Lawn: <?php echo $row3['lawn']; ?></li>
                                      <li>Jacuzzi: <?php echo $row3['jacuzzi']; ?></li>
                                     
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            
                                <div class="single-informations">
                                    <ul>
                                        <li>Distence From Airport,: <?php echo $row3['airport_distance']; ?> KM</li>
                                        <li>Sauna: <?php echo $row3['sauna']; ?></li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-property-details margin-top">
                            <h5>More Informations</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quod cum dixissent, ille contra. Multoque hoc melius nos veriusque quam Stoici. Qua ex cognitione facilior facta est investigatio rerum occultissimarum. Igitur neque stultorum quisquam beatus neque sapientium non beatus. Quae in controversiam veniunt, de iis, si placet, disseramus. Eam stabilem appellas. Quid ergo hoc loco intellegit honestum? Duo Reges: constructio interrete. Sit hoc ultimum bonorum, quod nunc a me defenditur; Quid enim est a Chrysippo praetermissum in Stoicis? Quae iam oratio non a philosopho aliquo, sed a censore opprimenda est. </p><p>Ita similis erit ei finis boni, atque antea fuerat, neque idem tamen; At modo dixeras nihil in istis rebus esse, quod interesset. Sed potestne rerum maior esse dissensio? Cur post Tarentum ad Archytam? Nam et complectitur verbis, quod vult, et dicit plane, quod intellegam;</p>
                        
                        </div>
                    </div>
                       
    

                

                       
                </div>
         
            </div>
          </div>
        </div>
        <?php include 'footer.php'; ?>
</body>
</html>