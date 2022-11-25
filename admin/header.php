<?php
if(!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION["username"])) {
  echo "<script type='text/javascript'>location.replace('../login.php')</script>";
}
$user_id=$_SESSION["userid"];
include '../includes/dbconn.php';
 ?>
<!-- Header Section Start -->
    <section class="content">

        <!-- Sidebar Start -->
        <div class="sidebar">

            <!-- Logo Start -->
            <a href="post_in_admin_review.php">
                <div class="logo-container" id="step1">
                    <h1>Propeerty Listing</h1>

                </div>
            </a>
            <!-- Logo End -->

            <!-- Sidebar User Profile Start -->
             <div class="sidebar-profile">
                <div class="user-avatar">
                     
                     <?php
               $sql="SELECT * FROM users WHERE id='$user_id'";
               $result=mysqli_query($conn,$sql);
               $row=mysqli_fetch_assoc($result);
               $imgpath=$row['img_path'];
               $img=$row['img'];
                  
               if ($imgpath != null && $imgpath != "" && $img!="" && $img!= null)
                        { ?> 
                  <div class="profile-avatar">
                    <img src="<?php echo $imgpath; ?>" style=" height: 60px !important; width: 60px !important;" alt="Profile Picture" />
                  </div>
                    <?php  } 
                    else { ?>
                  <div class="profile-avatar">
                    <img src="../images/admin/profile-60x60.jpg" alt="Profile Picture" />
                  </div>
                  
                   <?php  } ?>
                    
                </div>
                <div class="user-info">
                     
                    <a href="admin_profile_view.php"> <?php echo $row['name']; ?></a>
                     
                </div>
            </div>

            <div class="responsive-menu">
                <a href="#"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Sidebar User Profile End -->

            <!-- Menu Start -->
            <ul class="menu">
                <li class="parent lightred">
                     <ul class="parent">
                        <li class="parent lightred">
                            <a href="#">
                                <span class="menu-icon"><i class="fa fa-envelope"></i></span>
                                <span class="menu-text">Inbox</span>
                            </a>
                            <ul class="child">
                                  <li>
                           
                            <a  href="admin_contact.php"> Messages </a>
                        </li>
                            </ul>
                        </li>
                    </ul>
                    
                    
                    
                      <ul class="parent">
                        <li class="parent lightred">
                            <a href="#">
                                <span class="menu-icon"><i class="fa fa-star"></i></span>
                                <span class="menu-text">Post Review</span>
                            </a>
                            <ul class="child">
                                  <li>
                            <a  href="admin_reviewed.php">Active </a>
                            <a  href="post_in_admin_review.php">In Review </a>
                        </li>
                            </ul>
                        </li>
                    </ul>
                   
                     <ul class="parent">
                         <li class="parent lightred">
                            <a href="#">
                                <span class="menu-icon"><i class="fa fa-tags"></i></span>
                                <span class="menu-text">Featured</span>
                            </a>
                            <ul class="child">
                        <li>
                            <a  href="admin_featured.php">Featured</a>
                        </li>                     
                         </ul>
                             </li>   
                    </ul>
                    <ul class="parent">
                         <li class="parent lightred">
                            <a href="#">
                                <span class="menu-icon"><i class="fa fa-users"></i></span>
                                <span class="menu-text">Category</span>
                            </a>
                            <ul class="child">
                        <li>
                            <a  href="category.php">Category</a>
                        </li>                     
                         </ul>
                             </li>   
                    </ul>
                    <ul class="parent">
                        <li class="parent lightred">
                            <a href="#">
                                <span class="menu-icon"><i class="fa fa-home"></i></span>
                                <span class="menu-text">City</span>
                            </a>
                            <ul class="child">
                                  <li>
                            <a  href="city.php">City </a>
                        </li>
                            </ul>
                        </li>
                    </ul>

                     <ul class="parent">
                        <li class="parent lightred">
                            <a href="#">
                                <span class="menu-icon"><i class="fa fa-share-square"></i></span>
                                <span class="menu-text">Post</span>
                            </a>
                            <ul class="child">
                        <li>
                            <a href="post_type.php">Post Type </a>
                        </li>
                            </ul>
                        </li>
                    </ul>

                      <ul class="parent">
                        <li class="parent lightred">
                            <a href="#">
                                <span class="menu-icon"><i class="fa fa-bookmark"></i></span>
                                <span class="menu-text">Company</span>
                            </a>
                            <ul class="child">
                            
                        <li>
                            <a href="all_available_companies.php"> All Companies </a>
                        </li>
                         <li>
                            <a href="verified_companies.php"> Verified Companies </a>
                        </li>
                                <li>
                            <a href="unverified_companies.php"> Un-Verified Companies </a>
                        </li>
                            </ul>
                        </li>
                    </ul>
                      
                </li>
                
            </ul>

            <!-- Menu End -->

        </div>
        <!-- Sidebar End -->


        <div class="content-liquid-full">
            <div class="container">

                <!-- Header Bar Start -->
                <div class="row header-bar" id="step2">

                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-xs hidden-sm">
                       
                    </div>

                  
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <ul class="right-icons" id="step3">
                            <li style="    padding-right: 37px !important;">
                                <a href="#" class="user"><i class="fa fa-user"></i></a>
                                <ul class="dropdown">
                                   
                                    <li><a href="admin_profile_view.php"><i class="fa fa-user"></i>My Profile</a></li>
                                    <li>
                                        <a id="LinkButton1" class="fa fa-sign-out" href="../logout.php">Sign Out</a></li>
                                </ul>
                            </li>
                            
                          
                           
                         
                        </ul>
                    </div>
                </div>
                <div>
         <!-- Header Bar End -->
        </section>
                <!-- Header Section End -->