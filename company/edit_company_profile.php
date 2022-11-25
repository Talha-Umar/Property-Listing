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
  $file_name=$_FILES['file']['name'];
  $file_type=$_FILES['file']['type'];
  $file_size=$_FILES['file']['size'];
  $file_temp_loc=$_FILES['file']['tmp_name'];
  $file_store="../images/company/".$file_name;
  $file_path="images/company/".$file_name;
   $name=$_POST['name'];
   $founder=$_POST['founder'];
   $city=$_POST['city'];
   $about=$_POST['about'];
   move_uploaded_file($file_temp_loc, $file_store);
 
    $sql1="UPDATE company_agency SET company_name='$name', founded='$founder',imagepath='$file_path',city_id='$city',about='$about' WHERE user_id='$user_id'  ";
    if (mysqli_query($conn,$sql1)) {
     echo'<script type="text/javascript">alert("Profile Updated...!");</script>';
     echo "<script type='text/javascript'>location.replace('edit_company_profile.php')</script>";
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
   
    <style type="text/css">
      input{
        display: block;
    border: 1px solid #c6ced0;
    border-radius: 3px;
    padding: 7px;
    width: 100%;
    margin-bottom: 10px;
    -webkit-transition: all 500ms ease;
    -moz-transition: all 500ms ease;
    -ms-transition: all 500ms ease;
    -o-transition: all 500ms ease;
    transition: all 500ms ease;
    resize: none;
      }
    </style>
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
                <h4>EDIT PROFILE INFORMATION</h4>
              </div>
              <!-- Title Bar End -->
                <br/>
            <?php
               $sql="SELECT * FROM company_agency WHERE user_id='$user_id'";
               $result=mysqli_query($conn,$sql);
               $row=mysqli_fetch_assoc($result);
                 ?>  
                   <form action="edit_company_profile.php" method="POST" enctype="multipart/form-data">
                <div class="col-md-2"><label for="txt_name">Company:</label></div>
                <div class="col-md-10">
                  <input type="text"  name="name"  required  value="<?php echo $row['company_name']; ?>">
                </div>
                
                <div class="col-md-2"><label>Founder:</label></div>
                <div class="col-md-10">
                   <input type="text" name="founder" required value="<?php echo $row['founded']; ?>">
                </div>

                <div class="col-md-2"><label>City:</label></div>
                <div class="col-md-10">
                  <select name="city" required>
                     <?php 
                      $cid=$row['city_id'];
                      $sql2 = "SELECT * FROM city WHERE id='$cid'";
                      $result2 = $conn->query($sql2);
                      $row2 = $result2->fetch_assoc();
                      $cname=$row2['c_name'];
                      if ($cid=='') {
                       echo ' <option value="">Select city</option>';
                      }
                      else{
                        echo '<option value="'.$cid.'">'.$cname.'</option>';
                      }

                      $sql3 = "SELECT * FROM city";
                      $result3 = $conn->query($sql3);
                      while($row3 = $result3->fetch_assoc()) {
                     ?>
                     <option value="<?php echo $row3['id'];?>"><?php echo $row3['c_name'];?></option>
                   
                   <?php } ?>

                  </select>
                </div>
                
                <div class="col-md-2"><label>About:</label></div>
                <div class="col-md-10">
                   <input type="text" name="about" required value="<?php echo $row['about']; ?>">
                </div>
               
                <div class="col-md-2"><label for="FileUpload1">Thumbnail Image:</label></div>
                <div class="col-md-10">
               <input type="file" name="file" class="btn btn-danger btn-small">
                </div>

                <div class="col-md-10 col-md-offset-2">                
                  <input type="submit" name="update" class="btn btn-round btn-lg btn-success" value="Update Profile Details" style="width: 237px;">
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

    <script>
        $("#ContentPlaceHolder1_txt_name").bind("keypress", function (event)
    {
        if (event.charCode != 0) {
            var regex = new RegExp("^[a-zA-Z ]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        }
        });
        $("#ContentPlaceHolder1_txt_mobile").bind("keypress", function (event) {
            if (event.charCode != 0) {
                var regex = new RegExp("^[0-9 ]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            }
        });
</script>

</body>
</html>