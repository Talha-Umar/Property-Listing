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
  $sql="DELETE FROM post_details WHERE post_id='$id'";
  if (mysqli_query($conn, $sql)) {
    $tables = array('posts','lease','rent','sale','post_images' );
    foreach ($tables as $table) {
      $sql1="DELETE FROM $table WHERE p_id='$id'";
      if (mysqli_query($conn, $sql1)) {}
      else {echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);}

    }
     echo "<script type='text/javascript'>location.replace('pending_cmp_list.php')</script>";
       } 
       else {echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
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
    <h3>Properties For Activation</h3>

    <!-- Row Start -->
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="boxed no-padding">

          <!-- Title Bart Start -->
          <div class="title-bar white">
            <h4>Pending Post Active List</h4>
            <ul class="actions">
              <li><a href="#" class="close-box"><i class="fa fa-chevron-up"></i></a></li>
              <li><a href="#" class="remove-box"><i class="fa fa-times-circle-o"></i></a></li>
            </ul>
          </div>
          <!-- Title Bart End -->

          <div class="inner no-radius">
          <!-- Table Holder Start -->
          <div class="table-holder">

            <table id="stripe-table" class="theme-table invoice-table">
              <thead>
                
                <th>#</th>
                <th class="hidden-sm hidden-xs">Property Id</th>
                <th>Area</th>
                <th>Construction Year</th>
                <th>Status</th>
               
                <th>Actions</th>
              </thead>
              <tbody>
                <?php
                $k=0;
                  $user_id=$_SESSION["userid"];
                  $sql="SELECT * FROM post_details WHERE user_id='$user_id'";
               $result=mysqli_query($conn,$sql);
               if (mysqli_num_rows($result)>0) {
               while ($row=mysqli_fetch_assoc($result)) {

                 ?>
                 
                <tr>
                  
                  <td><?php echo ++$k; ?></td>
                  <td class="hidden-sm hidden-xs"><?php echo $row['post_id']; ?></td>
                      <td class="hidden-sm hidden-xs"><?php echo $row['area']; ?></td>
                  <td class="hidden-sm hidden-xs"><?php echo $row['c_year']; ?></td>
                  <td>
                     <?php if ($row['status']=='0') { ?>
                    <span class="delayed">UnComplete</span>
                    <?php } else if ($row['status']=='1') { ?>
                    <span class="in-progress">Complete</span>
                     <?php } ?>
                  </td>
                 
                  <td>
              

                      <a href="pending_cmp_list.php?deleteid=<?php echo $row['post_id']; ?>" id="btnGetTime"  class="fa fa-trash-o input_btn"  style=" color: red;"></a>
                     <?php if ($row['status']=='0') { ?>
                    | <a href="pending_company_posts.php?id=<?php echo $row['post_id']; ?>" class="fa fa-edit" style="color: orange;"></a> 
                     <?php } ?>
                     
                  </td>
                </tr>
               <?php
             }
         }      else {
                ?>
                         <tr>
                           <td>There is no Pending Listing</td>
                         </tr>
                       <?php } ?>
                 
              </tbody>
            </table>
          </div>
          <!-- Table Holder End -->
          </div>

        </div>
      </div>

     
        </div>
        <!-- Row End -->


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