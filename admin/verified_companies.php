<?php 
if(!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION["username"])) {
  echo "<script type='text/javascript'>location.replace('../login.php')</script>";
}
include '../includes/dbconn.php';
if (isset($_REQUEST['deleteid'])) {
 $id=$_REQUEST['deleteid'];
 $sql="DELETE FROM users WHERE id='$id'";
      if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>location.replace('verified_companies.php')</script>";
      }
      else {echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}

if (isset($_REQUEST['verifyid'])) {
 $id=$_REQUEST['verifyid'];
 $sql="UPDATE company_agency SET verified_status='0' WHERE id ='$id'";
  if (mysqli_query($conn, $sql)) {
       echo "<script type='text/javascript'>location.replace('verified_companies.php')</script>";
  }
  else {echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
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

      <!-- Mail Table Start -->
      <div class="boxed no-padding mail-container">
        <div class="inner">

          <!-- Header Start -->
          <div class="header">
            <ul>
              <li>
                
                  <i class="fa fa-envelope"></i> Verified
                
              </li>
              <li>
                
                  <i class="fa fa-star"></i> Companies
               
              </li>
              <li>
                
                  <i class="fa fa-check-circle"></i> List
                
              </li>
            </ul>
          </div>
          <!-- Header End -->

          

          <div class="inner no-radius">
          <!-- Table Holder Start -->
          <div class="table-holder">

            <table id="stripe-table" class="theme-table  ">
              <thead>
                
                <th>#</th>
                <th class="hidden-sm hidden-xs">Company Name</th>
                <th>Owner Name</th>
                <th>Created At</th>
               
               <th>Verified Status</th>
                <th>Actions</th>
              </thead>
              <tbody>
                  <?php
                $k=0;
                  $user_id=$_SESSION["userid"];
                  $sql="SELECT * FROM company_agency WHERE verified_status='1'";
               $result=mysqli_query($conn,$sql);
               if (mysqli_num_rows($result)>0) {
               while ($row=mysqli_fetch_assoc($result)) {

                 ?>
                <tr>
                  
                  <td><?php echo ++$k; ?></td>
                  <td class="hidden-sm hidden-xs"><?php echo $row['company_name']; ?></td>
                      <td class="hidden-sm hidden-xs"><?php echo $row['owner_name']; ?></td>
                  <td class="hidden-sm hidden-xs"><?php echo $row['created_at']; ?></td>
                
                 <td>
                      <?php if ($row['verified_status']=='1') {?>
                    <span class="in-progress">Verified</span>
                     <?php } ?>
                      
                  </td>
                 <td>
              

                      <a href="verified_companies.php?deleteid=<?php echo $row['id'] ?>" id="btnGetTime" title="Remove Company"  class="fa fa-trash-o input_btn"  style="    color: red;"></a>
                        <?php if ($row['verified_status']=='1') {?>
                  | <a href="verified_companies.php?verifyid=<?php echo $row['id'] ?>" id="input_btn_inactive" title="Mark Unverify Company" class="fa fa-times-circle input_btn_inactive" style="color: green;"></a> 
                               <?php } ?>
                  </td>
                </tr>
               <?php } } else{?>
              <tr>
                <td>Thers is no Verified Company</td>
              </tr>

         <?php    } ?>

                 
              </tbody>
            </table>
          </div>
          <!-- Table Holder End -->
          </div>

        </div>
      </div>
      <!-- Mail Table End -->

    </div>
  </div>
</div>
</div>
<?php include 'footer.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
  $("#btnGetTime").click(function(){
   return confirm('Are you sure ? want to delete!');

  });
});
</script>
</body>
</html>