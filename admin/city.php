<?php
if(!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION["username"])) {
  echo "<script type='text/javascript'>location.replace('../login.php')</script>";
}
include '../includes/dbconn.php';
if (isset($_POST['add'])) {
   $name=$_POST['cityname'];
    $sql = "INSERT INTO city (c_name) VALUES ('$name')";

if (mysqli_query($conn, $sql)) {
   echo'<script type="text/javascript">alert("City Added...!");</script>';
     echo "<script type='text/javascript'>location.replace('city.php')</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
            <h3><b>City </b></h3>
            <div class="boxed">
                <div class="inner panel panel-default">
                <form method="post" action="">
                    <div style="padding-left:150px; width:700px">
                    <span>Name</span>
                        <span style="color:Red;"></span>
                        <input name="cityname" type="text" maxlength="20" required="true" placeholder="Enter City Name">
                   </div>
                    
                  <div style="padding-left:340px">
                    <input type="submit" name="add" value="Save" class="btn btn-round btn-lg btn-success" style="width:20%">
                  </div>
              </form>


                        <div>
    <table class="table table-striped table-bordered table-hover dataTable no-footer" cellspacing="0" rules="all" border="1"style="border-collapse:collapse;">
        <tbody>
            <tr>
            <th scope="col">Sr.</th>
            <th scope="col">City Name</th>
            <th scope="col">Action</th>
            </tr>
            <?php
            $k=0;
$sql="SELECT * FROM city";
               $result=mysqli_query($conn,$sql);
               if (mysqli_num_rows($result)>0) {
                
               
               while ($row=mysqli_fetch_assoc($result)) {
             ?>
        <tr>
                <td><?php echo ++$k; ?></td>
                <td><?php echo $row['c_name'];?></td>
                <td><a href='edit_city.php?action_id=<?php echo $row["id"]; ?>'>Select</a></td>
        </tr>
        <?php 
              }
         }
         else{?>
            <tr>
                <td colspan="3">There is no City. Please add one.</td>
            </tr>
<?php 

         }

         ?>
    </tbody></table>
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