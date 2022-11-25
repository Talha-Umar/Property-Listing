<?php
if(!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION["username"])) {
  echo "<script type='text/javascript'>location.replace('../login.php')</script>";
}
include '../includes/dbconn.php';
 $user_id=$_SESSION["userid"]; ?>
<!-- Header Section Start -->
    <section class="content">

        <!-- Sidebar Start -->
        <div class="sidebar">

            <!-- Logo Start -->
            <a href="company_active_post.php">
                <div class="logo-container" id="step1">
                    <h1>Property Listing</h1>

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
                     
                     <a href="profile.php"><?php echo $row['name']; ?></a>

                    
                </div>
            </div>
          

            <div class="responsive-menu">
                <a href="#"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Sidebar User Profile End -->

            <!-- Menu Start  company_agency-->
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
                           
                            <a  href="company_contact.php"> Messages </a>
                        </li>
                            </ul>
                        </li>
                          
                         <li class="parent lightred">
                            <a href="#">
                                <span class="menu-icon"><i class="fa fa-edit"></i></span>
                                <span class="menu-text">Timeline</span>
                            </a>
                            <ul class="child">
                                 <li>
                                    <a href="company_active_post.php">Active Posts</a>
                                </li>
                                
                              
                            </ul>
                        </li>
                        <li class="parent lightred">
                            <a href="#">
                                <span class="menu-icon"><i class="fa fa-share-square"></i></span>
                                <span class="menu-text">Post Now</span>
                            </a>
                            <ul class="child">
                                
                                <li>
                                    <a href="createposts.php">Create Posts</a>
                                </li>
                                <li>
                                    <a href="pending_cmp_list.php">Pending Posts List</a>
                                </li>
                                
                                 <li>
                                    <a href="in_review_company_post.php">In Admin Review Posts</a>
                                </li>
                             
                            </ul>
                        </li>
                         <li class="parent lightred">
                            <a href="#">
                                <span class="menu-icon"><i class="fa fa-tags"></i></span>
                                <span class="menu-text">Featured Post</span>
                            </a>
                            <ul class="child">
                                 
                                <li>
                                    <a href="cmp_featured_request.php">Featured Request</a>
                                </li>
                              
                            </ul>
                        </li>
                        <li class="parent lightred">
                            <a href="#">
                                <span class="menu-icon"><i class="fa fa-bookmark"></i></span>
                                <span class="menu-text">Company</span>
                            </a>
                            <ul class="child">
                                 
                                <li>
                                    <a href="company_agency.php">Edit Detail</a>
                                </li>
                              
                            </ul>
                        </li>
                       
                         <li class="parent lightred">
                            <a href="#">
                                <span class="menu-icon"><i class="fa fa-user"></i></span>
                                <span class="menu-text">Profile</span>
                            </a>
                            <ul class="child">
                                
                                <li>
                                    <a href="profile.php">Profile Detail</a>
                                </li>
                                <li>
                                    <a href="edit_company_profile.php">Edit Profile Detail</a>
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
                                   
                                    <li><a href="profile.php"><i class="fa fa-user"></i>My Profile</a></li>
                                    <li>
                                        <a href="../logout.php" ID="signout" class="fa fa-sign-out">Sign Out</a>
                                        </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
         <!-- Header Bar End -->
        </section>
                <!-- Header Section End -->