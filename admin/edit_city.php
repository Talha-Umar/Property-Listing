<?php
if(!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION["username"])) {
  echo "<script type='text/javascript'>location.replace('../login.php')</script>";
}
include '../includes/dbconn.php';
$id=$_REQUEST['action_id'];
if (isset($_POST['update'])) {
  $name=$_POST['cityname'];
  $sql="UPDATE city SET c_name='$name' WHERE id='$id'  ";
    if (mysqli_query($conn,$sql)) {
     echo'<script type="text/javascript">alert("City Updated...!");</script>';
     echo "<script type='text/javascript'>location.replace('city.php')</script>";
    }
}
if (isset($_POST['delete'])) {
   $sql1=" DELETE FROM city  WHERE id='$id'";
    if (mysqli_query($conn,$sql1)) {
     echo'<script type="text/javascript">alert("City Deleted...!");</script>';
     echo "<script type='text/javascript'>location.replace('city.php')</script>";
    }
}

 ?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Property Listing-Admin</title>
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3><b> Edit City </b></h3>
            <div class="boxed">
                <div class="inner panel panel-default">
                    <form method="post" action="">
                      <?php  
                           $sql="SELECT * FROM city WHERE id='$id'";
                           $result=mysqli_query($conn,$sql);
                           $row=mysqli_fetch_assoc($result);
                      ?>
                    <div style="padding-left:150px; width:700px">
                    <span>Name</span>
                        <span style="color:Red;"></span>
                        <input name="cityname" type="text" value="<?php echo $row['c_name']; ?>" maxlength="20">
                    </div>
                    <br>
                  <div style="padding-left:340px">
                    
                  <input type="submit" name="update" value="Update" class="btn btn-round btn-lg btn-primary" style="width:20%">
                   <input type="submit" name="delete" value="Delete" class="btn btn-round btn-lg btn-danger" id="delete" style="width:20%">
                 
                  </div>
              </form>
                   
                  </div>
            </div>
        </div>
    </div>

</div>
</div>
<?php include 'footer.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
  $("#delete").click(function(){
   return confirm('Are you sure ? want to delete!');

  });
});
</script>
</body>
</html>