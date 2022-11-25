<?php 
if(!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION["username"])) {
  echo "<script type='text/javascript'>location.replace('../login.php')</script>";
}
$user_id=$_SESSION["userid"];
include '../includes/dbconn.php';
if (isset($_POST['update'])) {
  $password=$_POST['password'];
   $sql1="UPDATE users SET password='$password' WHERE id='$user_id'  ";
    if (mysqli_query($conn,$sql1)) {
     echo'<script type="text/javascript">alert("Password Updated...!");</script>';
     echo "<script type='text/javascript'>location.replace('profile.php')</script>";
    }
}

?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Property Listing-Company</title>
<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="../assets/weather-icons/weather-icons.min.css" />
<link rel="stylesheet" type="text/css" href="../assets/effects/menu-effects.css" />

    <!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css" /><link href="http://fonts.googleapis.com/css?family=Lato:400,100italic,100,300italic,300,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css" />

    <!-- Assets -->
    <link rel="stylesheet" type="text/css" href="../assets/jquery-ui/ui-lightness/jquery-ui-1.10.3.custom.css" />
    <link rel="stylesheet" type="text/css" href="../assets/morrischarts/morris.css" />
    <link rel="stylesheet" type="text/css" href="../assets/fullcalendar/fullcalendar.css" />
    <link rel="stylesheet" type="text/css" href="../assets/datatables/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="../assets/icheck/flat/_all.css" />

    <!-- Theme Styles -->
    <link rel="stylesheet" type="text/css" href="../css/styles-less.css" />
    <link rel="stylesheet" type="text/css" href="../css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="../css/animate.css" />
    <link rel="stylesheet" type="text/css" href="../_demo/demo.css" />


    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

    <link rel="shortcut icon" href="../images/favicon.png" type="image/png" />
    <script src="../jquery/jquery-1.10.2.js"></script>
    <script src="../jquery/jquery-1.11.1.min.js"></script>
    
    
</head>
<body>
  <?php include 'header.php'; ?>
    <!-- Main Content Start -->
<div class="content-liquid-full">
<div class="container">   
        <div class="row">
    
    
      <!-- Dark Profile Start -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <div class="boxed profile dark">
            <div class="inner">

              <!-- Profile Title Start -->
              <div class="title">
                <h3>My profile</h3>
               
              </div>
              <!-- Profile Title End -->

              <div class="row profile-data">
                <!-- Left Side Start -->
                <div class="col-lg-5 col-md-5 col-sm-3 col-xs-4 text-center">

                  <!-- Profile Avatar Start -->
               <?php
               $sql="SELECT * FROM users WHERE id='$user_id'";
               $result=mysqli_query($conn,$sql);
               $row=mysqli_fetch_assoc($result);
               $imgpath=$row['img_path'];
               $img=$row['img'];
                  
               if ($imgpath != null && $imgpath != "" && $img!="" && $img!= null)
                        { ?> 
                  <div class="profile-avatar">
                    <img src="<?php echo $imgpath; ?>" style=" height: 131px !important; width: 131px !important;" alt="Profile Picture" />
                  </div>
                    <?php  } 
                    else { ?>
                  <div class="profile-avatar">
                    <img src="../images/admin/profile-130x130.jpg" alt="Profile Picture" />
                  </div>
                  
                   <?php  } ?>
                  <!-- Profile Avatar End -->

                  <!-- Send Message Start -->
                  <div class="send-msg">
                   <a href="edit_profile.php"> <button class="btn btn-sm btn-default" type="button">Edit Profile</button></a>
                  </div>
                  <!-- Send Message End -->
         
                </div>
                <!-- Left Side End -->

                <!-- Right Side Start -->
                <div class="col-lg-7 col-md-7 col-sm-9 col-xs-8">

                  <h3  class="fa fa-user">
                <span><?php echo $row['name']; ?></span>

                  </h3>
                  <ul class="icon-list">
                       
                     <li><i class="fa fa-envelope"></i>
                    <span><?php echo $row['email']; ?></span></li>
                    <li><i class="fa fa-mobile"></i>
                    <span><?php echo $row['mobile']; ?></span></li>
                    <li><i class="fa fa-map-marker"></i>
                    <span><?php echo $row['address']; ?></span></li>
                    <li><i class="fa fa-suitcase"></i>
                     <span><?php
                            if ($row['user_type']=='0') {
                             echo "company";
                            }
                            else{
                              echo "undefined!";
                            }
                      ?></span></li>
                    <li><i class="fa fa-clock-o"></i>
                     <span><?php echo $row['created_at']; ?></span></span></li>
                      
                  </ul>
                    <br/>
                     <h3  class="fa fa-key">
                     <label>Change Password Here</label>
                  </h3>  
  
                     <form action="profile.php" method="post">
                <input type="text" name="password" class="form-control" placeholder="PLEASE TYPE NEW PASSWORD" maxlength="8" required="true">
                <input type="submit" name="update" value="Change Password" class="btn btn-sm btn-default" style="background-color: #36495e;color: white;width: 176px;">
            </form>

                </div>
                <!-- Right Side End -->
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