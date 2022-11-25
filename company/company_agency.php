<?php 
include '../includes/dbconn.php';
if(!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION["username"])) {
  echo "<script type='text/javascript'>location.replace('../login.php')</script>";
}
$user_id=$_SESSION["userid"];
if (isset($_POST['update'])) {
   $ownername=$_POST['ownername'];
   $foundby=$_POST['foundby'];
   $companyname=$_POST['companyname'];
   $about=$_POST['about'];
   $address=$_POST['address'];
   $email=$_POST['email'];
   $city=$_POST['city'];
   $userid=$_POST['userid'];
   $uid=$_POST['uid'];

   $file_name=$_FILES['image']['name'];
  $file_type=$_FILES['image']['type'];
  $file_size=$_FILES['image']['size'];
  $file_temp_loc=$_FILES['image']['tmp_name'];
  $file_store="../images/company/".$file_name;
  move_uploaded_file($file_temp_loc, $file_store);

    $sql3="UPDATE company_agency SET address='$address', about='$about',owner_name='$ownername',city_id='$city',founded='$foundby',company_name='$companyname', email='$email', user_id='$userid', imagepath='$file_store' WHERE id='$uid'";
    if (mysqli_query($conn,$sql3)) {
     echo'<script type="text/javascript">alert("Profile Updated...!");</script>';
     echo "<script type='text/javascript'>location.replace('company_agency.php')</script>";
     
    }
   else {
  echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
}
}
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head runat="server">

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Property Listing-Company Deshboard</title>

    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css" />
    <!--<link rel="stylesheet" type="text/css" href="../assets/weather-icons/weather-icons.min.css" />-->

    <link rel="stylesheet" type="text/css" href="../assets/effects/menu-effects.css" />

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Lato:400,100italic,100,300italic,300,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css' />

    <!-- Assets -->
    <!--<link rel='stylesheet' type='text/css' href='../assets/jquery-ui/ui-lightness/jquery-ui-1.10.3.custom.css' />
    <link rel='stylesheet' type='text/css' href='../assets/morrischarts/morris.css' />
    <link rel='stylesheet' type='text/css' href='../assets/fullcalendar/fullcalendar.css' />
    <link rel='stylesheet' type='text/css' href='../assets/datatables/jquery.dataTables.css' /> 
    <link rel='stylesheet' type='text/css' href='../assets/icheck/flat/_all.css' /> -->

    <!-- Theme Styles -->
    <link rel="stylesheet" type="text/css" href="../css/styles-less.css" />
   <link rel="stylesheet" type="text/css" href="../css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="../css/animate.css" />
    <link rel="stylesheet" type="text/css" href="../_demo/demo.css" />


    <link rel="shortcut icon" href="favicon.ico" type="image/png" />
    <link rel="shortcut icon" type="../image/png" href="favicon.ico" />
   
</head>
<body>
    
<?php include 'header.php'; ?>
<!-- Main Content Start -->
<div class="content-liquid-full">
<div class="container">             


     <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

       

        <!-- Row Start -->
        
        <!-- Row End -->

        <!-- Row Start -->
        <div class="row">

          <!-- Inline Form Start -->
          <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="inner">

              <!-- Title Bar Start -->
              <div class="title-bar">
                <h4>EDIT COMPANY INFORMATION</h4>
              </div>
              <!-- Title Bar End -->
                <br/>
                <?php
               $sql="SELECT * FROM users WHERE id='$user_id'";
               $result=mysqli_query($conn,$sql);
               $row=mysqli_fetch_assoc($result);
               $useremail=$row['email'];
               $userid=$row['id'];

              $sql1="SELECT * FROM company_agency WHERE email='$useremail'";
               $result1=mysqli_query($conn,$sql1);
               $value=mysqli_fetch_assoc($result1);


                 ?>  
            <form action="company_agency.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="userid" value="<?php echo $userid ?>">
                 <input type="hidden" name="uid" value="<?php echo $value['id'] ?>">
                <div class="col-md-2"><label for="txt_ownername">Owner Name:</label></div>
                <div class="col-md-10">
                  <input type="text" name="ownername" maxlength="20" required="true" value="<?php echo $value['owner_name'] ?>">
                </div>
                <div class="col-md-2"><label for="txt_founded">Founded By:</label></div>
                <div class="col-md-10">
                    <input type="text" name="foundby" maxlength="30" required="true" placeholder="Write Here Founder Name" value="<?php
                        if ($value['founded']==null) {
               echo "Write Here Founder Name";
            }
            else{
                echo $value['founded'];
            }
                      ?>">
                </div>
                <div class="col-md-2"><label for="txt_name">Company Name:</label></div>
                <div class="col-md-10"> 
                    <input type="text" name="companyname" maxlength="20" required="true" value="<?php echo $value['company_name'] ?>">
                </div>
                <div class="col-md-2"><label for="txt_address">Address:</label></div>
                <div class="col-md-10">   
                    <input type="text" name="address" maxlength="100" required="true" value="<?php echo $value['address'] ?>">
                </div>
                <div class="col-md-2"><label for="txt_about"> About:</label></div>
                <div class="col-md-10"> 
                  <input type="text" name="about" maxlength="100" required="true" placeholder="Write about your company here" value="<?php
                        if ($value['about']==null) {
               echo "Write about your company here";
            }
            else{
                echo $value['about'];
            }
                      ?>">
              </div>
                 <div class="col-md-2"><label for="txt_email"> Email:</label></div>
                <div class="col-md-10">  
                    <input type="email" name="email" maxlength="100" required="true" value="<?php echo $value['email'] ?>"> 
                </div>
                <div class="col-md-2"><label for="DD_cityid">City:</label></div>
                <div class="col-md-10"> 
                   <select name="city" required="true">
            <?php 
            if ($value['city_id']==null) {
               echo "Select City";
               ?>
                <option>Select City</option>
               <?php
            }
            else{
                       $cityid=$value['city_id'];
                       $sql2="SELECT * FROM city WHERE id='$cityid'";
               $result2=mysqli_query($conn,$sql2);
               $row2=mysqli_fetch_assoc($result2);
               echo $row2['c_name'];
            ?>
            <option value="<?php echo $row2['id']; ?>"><?php echo $row2['c_name']; ?></option>
                       <?php }
                           $sql1="SELECT * FROM city";
               $result1=mysqli_query($conn,$sql1);
               if (mysqli_num_rows($result1)>0) {
                
               
               while ($row1=mysqli_fetch_assoc($result1)) {

                        ?>
                        <option value="<?php echo $row1['id']; ?>"><?php echo $row1['c_name']; ?></option>
                        <?php
                              }
                          }
                         ?>
                   </select>
                  </div>
                  <div class="col-md-2"><label for="txt_email"> Profile Image:</label></div>
                <div class="col-md-10">  
                    <input type="file" name="image"  required="true" class="btn btn-danger btn-small"> 
                </div>

                <div class="col-md-10 col-md-offset-2">                
                 <input type="submit" name="update" class="btn btn-round btn-lg btn-success" value="Update Company Details" style="width: 237px !important;">

                </div>
                </form>

                <div class="clearfix"></div>

             

            </div>
          </div>
          <!-- Inline Form End -->

        </div>
        <!-- Row End -->

      


    </div>
  </div>

</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>