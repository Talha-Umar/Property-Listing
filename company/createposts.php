<?php
include '../includes/dbconn.php';
if(!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION["username"])) {
  echo "<script type='text/javascript'>location.replace('../login.php')</script>";
}

    $user_id=$_SESSION["userid"];

if (isset($_POST['add'])) {
  
$postid=$_POST['postid'];
$cyear=$_POST['cyear'];
$area=$_POST['area'];
$bedroom=$_POST['bedroom'];
$bathroom=$_POST['bathroom'];
$kitchen=$_POST['kitchen'];
$storeroom=$_POST['storeroom'];
$carparking=$_POST['carparking'];
$otherfeatures=$_POST['otherfeatures'];
$airconditioner=$_POST['airconditioner'];
$centralheating=$_POST['centralheating'];
$doublewindow=$_POST['doublewindow'];
$electricty=$_POST['electricty'];
$flooring=$_POST['flooring'];
$nfloors=$_POST['nfloors'];
$waste=$_POST['waste'];
$drooms=$_POST['drooms'];
$grooms=$_POST['grooms'];
$prooms=$_POST['prooms'];
$sittingrooms=$_POST['sittingrooms'];
$studyrooms=$_POST['studyrooms'];
$stmrooms=$_POST['stmrooms'];
$servantrooms=$_POST['servantrooms'];
$otherrooms=$_POST['otherrooms'];
$internet=$_POST['internet'];
$tvcable=$_POST['tvcable'];
$jacuzzi=$_POST['jacuzzi'];
$lawn=$_POST['lawn'];
$sauna=$_POST['sauna'];
$airportdistance=$_POST['airport'];
$mosque=$_POST['mosque'];
$resturant=$_POST['resturant'];
$hospital=$_POST['hospital'];
$school=$_POST['school'];
$transport=$_POST['transport'];
$mall=$_POST['mall'];
$facility=$_POST['facility'];
$mstaff=$_POST['mstaff'];
$sstaff=$_POST['sstaff'];
 
$file_name=$_FILES['images']['name'];
  $file_type=$_FILES['images']['type'];
  $file_size=$_FILES['images']['size'];
  $file_temp_loc=$_FILES['images']['tmp_name'];
  $file_store="../images/postImages/".$file_name;
  move_uploaded_file($file_temp_loc, $file_store);
 
 date_default_timezone_set('Asia/Karachi');
    $date = date('d/m/Y  H:i:s A');

$sql = "INSERT INTO post_details (post_id, user_id, status, c_year, area, bed_rooms, bath_rooms, kitchen, store_rooms, car_parking, other_features, air_conditioner, window, heating, electricity_backup, flooring, no_floors, waste_deposal, dinning_rooms, gym_rooms, other_rooms, powder_rooms, sitting_rooms, study_rooms, steaming_rooms, servant_rooms, internet, cable, jacuzzi, lawn, sauna, airport_distance, restaurant, mosque, hospital, school, public_transport, shopping_mall, disable, maintenance_staff, security_staff, image, imagepath) VALUES ('$postid','$user_id','0','$cyear','$area','$bedroom','$bathroom','$kitchen','$storeroom','$carparking','$otherfeatures','$airconditioner','$doublewindow','$centralheating','$electricty','$flooring','$nfloors','$waste','$drooms','$grooms','$otherrooms','$prooms','$sittingrooms','$studyrooms','$stmrooms','$servantrooms','$internet','$tvcable','$jacuzzi','$lawn','$sauna','$airportdistance','$resturant','$mosque','$hospital','$school','$transport','$mall','$facility','$mstaff','$sstaff','$file_name','$file_store')";

if (mysqli_query($conn, $sql)) {

   echo'<script type="text/javascript">alert("Detail Added...!");</script>';
   echo "<script type='text/javascript'>location.replace('pending_cmp_list.php')</script>";

} 
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
    <style type="text/css">
        hr{
            margin-top: 0; margin-bottom: 0; border-top: 1px solid #d9e3e5;
        }
        input[type="radio"]{
            display: inline !important;
             width: 20px !important;
        }
    </style>
   
</head>
<body>
    
<?php include 'header.php'; ?>
<!-- Main Content Start -->
<div class="content-liquid-full">
<div class="container">             
    <div class="box daily-sales">

        <div class="title-bar">
        <i class="fa fa-users"></i>CREATE POST HERE
      </div>
      <form action="createposts.php" method="post" name="myform" enctype="multipart/form-data">
      <!-- Section 1 Start -->
<section id="section1">
    <div class="row" style="margin: 30px 50px;">
        <div class="col-md-3">
            <div class="form-control" style="text-align: center !important; height: 100%; width: 100%;">
            <a  id="basicinfo"> <b>Basic Information</b></a><hr>
            <a  id="rooms"> Basic Rooms</a><hr>
            <a  id="acessories"> Acessories</a><hr>
            <a  id="basic"> Basic</a><hr>
            <a  id="info"> Other Info</a><hr>
            <a  id="others"> Others</a><hr>
            <a  id="places"> Places</a><hr>
            <a  id="security"> Security</a>


            </div>
        </div>
        <div class="col-md-9">
            <div style="text-align: center !important; height: 100%; width: 100%; margin: 20px 10px;">
                <div class="row">
                <div class="col-md-3">
                    <span>Post ID</span>
                </div>
                <div class="col-md-9">
                    <input type="text" name="postid" id="postid" style="width: 100%;" readonly="true" value="<?php
                         $x ="PL123";
                         $y="786L";
                         $sql="SELECT COUNT(id) as nposts FROM post_details";
                         $result=mysqli_query($conn,$sql);
                          $row=mysqli_fetch_assoc($result);
                          $nposts=$row['nposts'];
                         echo $x.++$nposts.$y;
                     ?>">
                </div>
                </div>

                <div class="row">
                <div class="col-md-3">
                    <span>Construction Year</span>
                </div>
                <div class="col-md-9">
                    <input type="date" name="cyear" style="width: 100%;" id="cyear">
                </div>
                </div>
                
                <div class="row">
                <div class="col-md-3">
                    <span>Area (Marlas)</span>
                </div>
                <div class="col-md-9">
                    <input type="number" name="area" style="width: 100%;" id="area">
                </div>
                </div>

                <div class="row">
                
                <div class="col-md-12">
                    <input class="btn btn-info" type="button" id="section1fbtn"  style="width: 100%;" value="Next >>">
                </div>



            </div>
        </div>
    </div>
</div>
</section>
<!-- Section 1 End

    Section 2 Start -->
<section id="section2" style="display: none;">
    <div class="row" style="margin: 30px 50px;">
        <div class="col-md-3">
            <div class="form-control" style="text-align: center !important; height: 100%; width: 100%;">
            <a  id="basicinfo"> Basic Information</a><hr>
            <a  id="rooms"> <b>Basic Rooms</b></a><hr>
            <a  id="acessories"> Acessories</a><hr>
            <a  id="basic"> Basic</a><hr>
            <a  id="info"> Other Info</a><hr>
            <a  id="others"> Others</a><hr>
            <a  id="places"> Places</a><hr>
            <a  id="security"> Security</a>


            </div>
        </div>
        <div class="col-md-9">
            <div style="text-align: center !important; height: 100%; width: 100%; margin: 20px 10px;">
                <div class="row">
                <div class="col-md-3">
                    <span>Bed Roooms</span>
                </div>
                <div class="col-md-9">
                    <input type="number" name="bedroom" style="width: 100%;" value="0">
                </div>
                </div> 

                <div class="row">
                <div class="col-md-3">
                    <span>Bath Rooms</span>
                </div>
                <div class="col-md-9">
                    <input type="number" name="bathroom" style="width: 100%;" value="0">
                </div>
                </div>
                
                <div class="row">
                <div class="col-md-3">
                    <span>Kitchen</span>
                </div>
                <div class="col-md-9">
                    <input type="number" name="kitchen" style="width: 100%;" value="0">
                </div>
                </div>
                 <div class="row">
                <div class="col-md-3">
                    <span>Store Rooms</span>
                </div>
                <div class="col-md-9">
                    <input type="number" name="storeroom" style="width: 100%;" value="0">
                </div>
                </div>
                <div class="row">
                <div class="col-md-3">
                    <span>Car Parking</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="carparking" value="Yes" checked="true"> Yes <input type="radio" name="carparking" value="No">  No
                </div>
                </div>

                <div class="row">
                <div class="col-md-3">
                    <span>Other Features</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="otherfeatures" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="otherfeatures" value="No">  No
                </div>
                </div>
                <div class="row">
                
                <div class="col-md-12">
                    <input type="button"  class="btn btn-primary" style="width: 100%;" id="section2pbtn" value="<< Previus">
                    <input class="btn btn-info" type="button"  style="width: 100%;" id="section2fbtn" value="Next >>">
                </div>



            </div>
        </div>
    </div>
</div>
</section>
<!-- Section 2 End

    Section 3 Start -->
<section id="section3" style="display: none;">
    <div class="row" style="margin: 30px 50px;">
        <div class="col-md-3">
            <div class="form-control" style="text-align: center !important; height: 100%; width: 100%;">
            <a  id="basicinfo"> Basic Information</a><hr>
            <a  id="rooms">Basic Rooms</a><hr>
            <a  id="acessories"> <b>Acessories </b></a><hr>
            <a  id="basic"> Basic</a><hr>
            <a  id="info"> Other Info</a><hr>
            <a  id="others"> Others</a><hr>
            <a  id="places"> Places</a><hr>
            <a  id="security"> Security</a>


            </div>
        </div>
        <div class="col-md-9">
            <div style="text-align: center !important; height: 100%; width: 100%; margin: 20px 10px;">
                <div class="row">
                <div class="col-md-4">
                    <span>Central Air Conditioner</span>
                </div>
                <div class="col-md-8" style="text-align: left;">
                    <input type="radio" name="airconditioner" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="airconditioner" value="No">  No
                </div>
                </div>

               <div class="row">
                <div class="col-md-4">
                    <span>Central Heating</span>
                </div>
                <div class="col-md-8" style="text-align: left;">
                    <input type="radio" name="centralheating" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="centralheating" value="No">  No
                </div>
                </div>
                
                <div class="row">
                <div class="col-md-4">
                    <span>Double Glazed Window</span>
                </div>
                <div class="col-md-8" style="text-align: left;">
                    <input type="radio" name="doublewindow" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="doublewindow" value="No">  No
                </div>
                </div>

                 <div class="row">
                <div class="col-md-4">
                    <span>Electricty Backup</span>
                </div>
                <div class="col-md-8" style="text-align: left;">
                    <input type="radio" name="electricty" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="electricty" value="No">  No
                </div>
                </div>

                <div class="row">
                
                <div class="col-md-12">
                    <input type="button" class="btn btn-primary" style="width: 100%;" id="section3pbtn" value="<< Previus">
                    <input class="btn btn-info" type="button"  style="width: 100%;" id="section3fbtn" value="Next >>">
                </div>



            </div>
        </div>
    </div>
</div>
</section>
<!-- Section 3 End

    Section 4 Start -->
<section id="section4" style="display: none;">
    <div class="row" style="margin: 30px 50px;">
        <div class="col-md-3">
            <div class="form-control" style="text-align: center !important; height: 100%; width: 100%;">
            <a  id="basicinfo"> Basic Information</a><hr>
            <a  id="rooms">Basic Rooms</a><hr>
            <a  id="acessories"> Acessories </a><hr>
            <a  id="basic"> <b>Basic </b></a><hr>
            <a  id="info"> Other Info</a><hr>
            <a  id="others"> Others</a><hr>
            <a  id="places"> Places</a><hr>
            <a  id="security"> Security</a>


            </div>
        </div>
        <div class="col-md-9">
            <div style="text-align: center !important; height: 100%; width: 100%; margin: 20px 10px;">
               <div class="row">
                <div class="col-md-3">
                    <span>Flooring</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="flooring" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="flooring" value="No">  No
                </div>
                </div>

                <div class="row">
                <div class="col-md-3">
                    <span>Number Of Floors</span>
                </div>
                <div class="col-md-9">
                    <input type="number" name="nfloors" style="width: 100%;" id="nfloors">
                </div>
                </div>
                
                <div class="row">
                <div class="col-md-3">
                    <span>Waste Deposal</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="waste" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="waste" value="No">  No
                </div>
                </div>

                <div class="row">
                
                <div class="col-md-12">
                    <input type="button"  class="btn btn-primary" style="width: 100%;" id="section4pbtn" value="<< Previus">
                    <input class="btn btn-info" type="button"  style="width: 100%;" id="section4fbtn" value="Next >>">
                </div>



            </div>
        </div>
    </div>
</div>
</section>
<!-- Section 4 End

    Section 5 Start -->
<section id="section5" style="display: none;">
    <div class="row" style="margin: 30px 50px;">
        <div class="col-md-3">
            <div class="form-control" style="text-align: center !important; height: 100%; width: 100%;">
            <a  id="basicinfo"> Basic Information</a><hr>
            <a  id="rooms">Basic Rooms</a><hr>
            <a  id="acessories"> Acessories </a><hr>
            <a  id="basic">Basic </a><hr>
            <a  id="info">  <b>Other Info</b></a><hr>
            <a  id="others"> Others</a><hr>
            <a  id="places"> Places</a><hr>
            <a  id="security"> Security</a>


            </div>
        </div>
        <div class="col-md-9">
            <div style="text-align: center !important; height: 100%; width: 100%; margin: 20px 10px;">
                 <div class="row">
                <div class="col-md-3">
                    <span>Dinning Rooms</span>
                </div>
                <div class="col-md-9">
                    <input type="number" name="drooms" style="width: 100%;" value="0">
                </div>
                </div>

                <div class="row">
                <div class="col-md-3">
                    <span>Gym Rooms</span>
                </div>
                <div class="col-md-9">
                    <input type="number" name="grooms" style="width: 100%;" value="0">
                </div>
                </div>
                
                 <div class="row">
                <div class="col-md-3">
                    <span>Powder Rooms</span>
                </div>
                <div class="col-md-9">
                    <input type="number" name="prooms" style="width: 100%;" value="0">
                </div>
                </div>

                 <div class="row">
                <div class="col-md-3">
                    <span>Sitting Rooms</span>
                </div>
                <div class="col-md-9">
                    <input type="number" name="sittingrooms" style="width: 100%;" value="0">
                </div>
                </div>

                 <div class="row">
                <div class="col-md-3">
                    <span>Study Rooms</span>
                </div>
                <div class="col-md-9">
                    <input type="number" name="studyrooms" style="width: 100%;" value="0">
                </div>
                </div>

                 <div class="row">
                <div class="col-md-3">
                    <span>Steaming Rooms</span>
                </div>
                <div class="col-md-9">
                    <input type="number" name="stmrooms" style="width: 100%;" value="0">
                </div>
                </div>

                 <div class="row">
                <div class="col-md-3">
                    <span>Servant Rooms</span>
                </div>
                <div class="col-md-9">
                    <input type="number" name="servantrooms" style="width: 100%;" value="0">
                </div>
                </div>

                 <div class="row">
                <div class="col-md-3">
                    <span>Other Rooms</span>
                </div>
                <div class="col-md-9">
                    <input type="number" name="otherrooms" style="width: 100%;" value="0">
                </div>
                </div>

                <div class="row">
                
                <div class="col-md-12">
                    <input type="button"  class="btn btn-primary" style="width: 100%;" id="section5pbtn" value="<< Previus">
                    <input class="btn btn-info" type="button"  style="width: 100%;" id="section5fbtn" value="Next >>">
                </div>



            </div>
        </div>
    </div>
</div>
</section>
<!-- Section 5 End

    Section 6 Start -->
<section id="section6" style="display: none;">
    <div class="row" style="margin: 30px 50px;">
        <div class="col-md-3">
            <div class="form-control" style="text-align: center !important; height: 100%; width: 100%;">
            <a  id="basicinfo"> Basic Information</a><hr>
            <a  id="rooms">Basic Rooms</a><hr>
            <a  id="acessories"> Acessories </a><hr>
            <a  id="basic">Basic </a><hr>
            <a  id="info"> Other Info</a><hr>
            <a  id="others"> <b>Others</b> </a><hr>
            <a  id="places"> Places</a><hr>
            <a  id="security"> Security</a>


            </div>
        </div>
        <div class="col-md-9">
            <div style="text-align: center !important; height: 100%; width: 100%; margin: 20px 10px;">
                
                 <div class="row">
                <div class="col-md-3">
                    <span>Internet Access</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="internet" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="internet" value="No">  No
                </div>
                </div>

                 <div class="row">
                <div class="col-md-3">
                    <span>TV Cable</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="tvcable" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="tvcable" value="No">  No
                </div>
                </div>

                <div class="row">
                <div class="col-md-3">
                    <span>Jacuzzi</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="jacuzzi" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="jacuzzi" value="No">  No
                </div>
                </div>

                <div class="row">
                <div class="col-md-3">
                    <span>Lawn</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="lawn" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="lawn" value="No">  No
                </div>
                </div>

                <div class="row">
                <div class="col-md-3">
                    <span>Sauna</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="sauna" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="sauna" value="No">  No
                </div>
                </div>

                <div class="row">
                <div class="col-md-3">
                    <span>Airport Distance (KM)</span>
                </div>
                <div class="col-md-9">
                    <input type="number" name="airport" style="width: 100%;" id="airport">
                </div>
                </div>

                <div class="row">
                
                <div class="col-md-12">
                    <input type="button" class="btn btn-primary" style="width: 100%;" id="section6pbtn" value="<< Previus">
                    <input class="btn btn-info" type="button" style="width: 100%;" id="section6fbtn" value="Next >>">
                </div>



            </div>
        </div>
    </div>
</div>
</section>
<!-- Section 6 End

    Section 7 Start -->
<section id="section7" style="display: none;">
    <div class="row" style="margin: 30px 50px;">
        <div class="col-md-3">
            <div class="form-control" style="text-align: center !important; height: 100%; width: 100%;">
            <a  id="basicinfo"> Basic Information</a><hr>
            <a  id="rooms">Basic Rooms</a><hr>
            <a  id="acessories"> Acessories </a><hr>
            <a  id="basic">Basic </a><hr>
            <a  id="info"> Other Info</a><hr>
            <a  id="others"> Others </a><hr>
            <a  id="places"><b> Places</b></a><hr>
            <a  id="security"> Security</a>


            </div>
        </div>
        <div class="col-md-9">
            <div style="text-align: center !important; height: 100%; width: 100%; margin: 20px 10px;">
                 <div class="row">
                <div class="col-md-3">
                    <span>NearBy Mosque</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="mosque" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="mosque" value="No">  No
                </div>
                </div>

                 <div class="row">
                <div class="col-md-3">
                    <span>NearBy Resturant</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="resturant" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="resturant" value="No">  No
                </div>
                </div>
                
                 <div class="row">
                <div class="col-md-3">
                    <span>NearBy Hospital</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="hospital" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="hospital" value="No">  No
                </div>
                </div>

                 <div class="row">
                <div class="col-md-3">
                    <span>NearBy School</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="school" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="school" value="No">  No
                </div>
                </div>

                 <div class="row">
                <div class="col-md-3">
                    <span>NearBy Transports</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="transport" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="transport" value="No">  No
                </div>
                </div>

                 <div class="row">
                <div class="col-md-3">
                    <span>NearBy Mall</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="mall" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="mall" value="No">  No
                </div>
                </div>

                <div class="row">
                
                <div class="col-md-12">
                    <input type="button" class="btn btn-primary" style="width: 100%;" id="section7pbtn" value="<< Previus">
                    <input class="btn btn-info" type="button" style="width: 100%;" id="section7fbtn" value="Next >>">
                </div>



            </div>
        </div>
    </div>
</div>
</section>
<!-- Section 7 End

    Section 8 Start -->
<section id="section8" style="display: none;">
    <div class="row" style="margin: 30px 50px;">
        <div class="col-md-3">
            <div class="form-control" style="text-align: center !important; height: 100%; width: 100%;">
            <a  id="basicinfo"> Basic Information</a><hr>
            <a  id="rooms">Basic Rooms</a><hr>
            <a  id="acessories"> Acessories </a><hr>
            <a  id="basic">Basic </a><hr>
            <a  id="info"> Other Info</a><hr>
            <a  id="others"> Others</a><hr>
            <a  id="places"> Places</a><hr>
            <a  id="security"><b> security</b></a>


            </div>
        </div>
        <div class="col-md-9">
            <div style="text-align: center !important; height: 100%; width: 100%; margin: 20px 10px;">
                <div class="row">
                <div class="col-md-3">
                    <span>Facility For Disable</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="facility" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="facility" value="No">  No
                </div>
                </div>

                <div class="row">
                <div class="col-md-3">
                    <span>Maintanance Staff</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="mstaff" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="mstaff" value="No">  No
                </div>
                </div>

                <div class="row">
                <div class="col-md-3">
                    <span>Secuirty Staff</span>
                </div>
                <div class="col-md-9" style="text-align: left;">
                    <input type="radio" name="sstaff" value="Yes" checked="true"> Yes &nbsp;&nbsp;<input type="radio" name="sstaff" value="No">  No
                </div>
                </div>
                
                <div class="row">
                <div class="col-md-3">
                    <span>Pictures</span>
                </div>
                <div class="col-md-9">
                    <input type="file" name="images" multiple="multiple" class="form-control" style="width: 100%;" required="true">
                </div>
                </div>

                <div class="row">
                
                <div class="col-md-12">
                    <input type="button" name="" class="btn btn-primary" style="width: 100%;" id="section8pbtn" value="<< Previus">
                    <input class="btn btn-info" type="submit" name="add" style="width: 100%;" id="section8fbtn" value="Finish">
                </div>



            </div>
        </div>
    </div>
</div>
</section>
<!-- Section 8 End -->

</form>

</div>
</div>
<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(document).ready(function () {

        $("#section1fbtn").click(function(){
           var x=$('#area').val();
           var y=$('#cyear').val();
           if (x!="" && y!="") {
            $("#section1").css("display","none");
            $("#section2").css("display","block"); 
            $("section3").css("display","none");
            $("#section4").css("display","none");
            $("#section5").css("display","none");
            $("#section6").css("display","none");
            $("#section7").css("display","none");
            $("#section8").css("display","none");
        }
        else{
            alert("Fill all the fileds");
            return false;
        }

        });
        
        $("#section2pbtn").click(function(){
            $("#section1").css("display","block");
            $("#section2").css("display","none");
            $("section3").css("display","none");
            $("#section4").css("display","none");
            $("#section5").css("display","none");
            $("#section6").css("display","none");
            $("#section7").css("display","none");
            $("#section8").css("display","none");
        });
        

        $("#section2fbtn").click(function(){
            $("#section1").css("display","none");
            $("#section2").css("display","none");
            $("#section3").css("display","block");
            $("#section4").css("display","none");
            $("#section5").css("display","none");
            $("#section6").css("display","none");
            $("#section7").css("display","none");
            $("#section8").css("display","none");
        });

         $("#section3pbtn").click(function(){
            $("#section1").css("display","none");
            $("#section2").css("display","block");
            $("#section3").css("display","none");
            $("#section4").css("display","none");
            $("#section5").css("display","none");
            $("#section6").css("display","none");
            $("#section7").css("display","none");
            $("#section8").css("display","none");
        });

         $("#section3fbtn").click(function(){
            $("#section1").css("display","none");
            $("#section2").css("display","none");
            $("#section3").css("display","none");
            $("#section4").css("display","block");
            $("#section5").css("display","none");
            $("#section6").css("display","none");
            $("#section7").css("display","none");
            $("#section8").css("display","none"); 
        });

          $("#section4pbtn").click(function(){
            $("#section1").css("display","none");
            $("#section2").css("display","none");
            $("#section3").css("display","block");
            $("#section4").css("display","none");
            $("#section5").css("display","none");
            $("#section6").css("display","none"); 
            $("#section7").css("display","none");
            $("#section8").css("display","none");
        });

          $("#section4fbtn").click(function(){
            var x=$('#nfloors').val();
            if (x!="") {

            $("#section1").css("display","none");
            $("#section2").css("display","none");
            $("#section3").css("display","none");
            $("#section4").css("display","none");
            $("#section5").css("display","block");
            $("#section6").css("display","none"); 
            $("#section7").css("display","none");
            $("#section8").css("display","none");

            }
        else{
            alert("Fill all the fileds");
            return false;
        }
        });

          $("#section5pbtn").click(function(){
            $("#section1").css("display","none");
            $("#section2").css("display","none");
            $("#section3").css("display","none");
            $("#section4").css("display","block");
            $("#section5").css("display","none");
            $("#section6").css("display","none");
            $("#section7").css("display","none"); 
            $("#section8").css("display","none");
        });

          $("#section5fbtn").click(function(){
            $("#section1").css("display","none");
            $("#section2").css("display","none");
            $("#section3").css("display","none");
            $("#section4").css("display","none");
            $("#section5").css("display","none");
            $("#section6").css("display","block");
            $("#section7").css("display","none");
            $("#section8").css("display","none");
        });

          $("#section6pbtn").click(function(){
            $("#section1").css("display","none");
            $("#section2").css("display","none");
            $("#section3").css("display","none");
            $("#section4").css("display","none");
            $("#section5").css("display","block");
            $("#section6").css("display","none");
            $("#section7").css("display","none");
            $("#section8").css("display","none");
        });

          $("#section6fbtn").click(function(){
            var x=$('#airport').val();
            if (x!="") {

            $("#section1").css("display","none");
            $("#section2").css("display","none");
            $("#section3").css("display","none");
            $("#section4").css("display","none");
            $("#section5").css("display","none");
            $("#section6").css("display","none");
            $("#section7").css("display","block");
            $("#section8").css("display","none");

            }
        else{
            alert("Fill all the fileds");
            return false;
        }
        });

          $("#section7pbtn").click(function(){
            $("#section1").css("display","none");
            $("#section2").css("display","none");
            $("#section3").css("display","none");
            $("#section4").css("display","none");
            $("#section5").css("display","none");
            $("#section6").css("display","block");
            $("#section7").css("display","none");
            $("#section8").css("display","none");
        });

          $("#section7fbtn").click(function(){
            $("#section1").css("display","none");
            $("#section2").css("display","none");
            $("#section3").css("display","none");
            $("#section4").css("display","none");
            $("#section5").css("display","none");
            $("#section6").css("display","none");
            $("#section7").css("display","none");
            $("#section8").css("display","block");
        });

           $("#section8pbtn").click(function(){
            $("#section1").css("display","none");
            $("#section2").css("display","none");
            $("#section3").css("display","none");
            $("#section4").css("display","none");
            $("#section5").css("display","none");
            $("#section6").css("display","none");
            $("#section7").css("display","block");
            $("#section8").css("display","none");
        });



    });

</script>
</body>
</html>