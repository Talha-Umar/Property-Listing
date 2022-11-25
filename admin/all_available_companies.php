<?php
if(!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION["username"])) {
  echo "<script type='text/javascript'>location.replace('../login.php')</script>";
}
include '../includes/dbconn.php';
$id=@$_REQUEST['del-company'];
if (isset($id)) {
 $sql1=" DELETE FROM company_agency  WHERE id='$id'";
    if (mysqli_query($conn,$sql1)) {
     echo'<script type="text/javascript">alert("Company Deleted...!");</script>';
     echo "<script type='text/javascript'>location.replace('all_available_companies.php')</script>";
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

      <!-- Mail Table Start -->
      <div class="boxed no-padding mail-container">
        <div class="inner">

          <!-- Header Start -->
          <div class="header">
            <ul>
              <li>
                
                  <i class="fa fa-envelope"></i> All
                
              </li>
              <li>
                
                  <i class="fa fa-star"></i> Companies
               
              </li>
              <li>
                
                  <i class="fa fa-check-circle"></i> Here
                
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
                <th>Email</th>
               
                <th>Actions</th>
              </thead>
              <tbody>
                 <?php
               $k=0;
              $sql="SELECT * FROM company_agency";
               $result=mysqli_query($conn,$sql);
               if (mysqli_num_rows($result)>0) {
                
               
               while ($row=mysqli_fetch_assoc($result)) {
             ?>
                <tr>
                  
                  <td><?php echo ++$k; ?></td>
                  <td class="hidden-sm hidden-xs"><?php echo $row['company_name']; ?></td>
                      <td class="hidden-sm hidden-xs"><?php echo $row['owner_name']; ?></td>
                  <td class="hidden-sm hidden-xs"><?php echo $row['created_at']; ?></td>
                 <td class="hidden-sm hidden-xs"><?php echo $row['email']; ?></td>
                 
                 <td>
                      <a href="all_available_companies.php?del-company=<?php echo $row['id'] ?>" id="delete"  class="fa fa-trash-o input_btn"  style="color: red;"></a>
                        
                  </td>
                </tr>
               <?php 
              }
         }
         else{?>
            <tr>
                <td colspan="3">There is no Company.</td>
            </tr>
<?php 

         }

         ?>

                 
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

<?php include 'footer.php';?>
<script type="text/javascript">
$(document).ready(function(){
  $("#delete").click(function(){
   return confirm('Are you sure ? want to delete!');

  });
});
</script>
</body>
</html>