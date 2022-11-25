<?php 
if(!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION["username"])) {
  echo "<script type='text/javascript'>location.replace('../login.php')</script>";
}
$user_id=$_SESSION["userid"];
if (isset($_REQUEST['deleteid'])) {
  $id=$_REQUEST['deleteid'];
  $sql="UPDATE post_details SET status='0' WHERE post_id='$id'";
  if (mysqli_query($conn, $sql)) {
    $tables = array('posts','lease','rent','sale','post_images' );
    foreach ($tables as $table) {
      $sql1="DELETE FROM $table WHERE p_id='$id'";
      if (mysqli_query($conn, $sql1)) {}
      else {echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);}

    }
     echo "<script type='text/javascript'>location.replace('company_active_post.php')</script>";
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

  <div class="col-sm-12">
    <div class="box calendar">

      <!-- Title Bar Start -->
      <div class="title-bar"><i class="fa fa-calendar"></i>Company Posts TimeLine</div>
      <!-- Title Bar End -->

      <div class="calendar-widget"></div>

    </div>
  </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   

    <!-- Row Start -->
    <div class="row">
         <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            

          </div>
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <?php
                  $user_id=$_SESSION["userid"];
                  $sql="SELECT * FROM posts WHERE user_id='$user_id' AND status='1'";
               $result=mysqli_query($conn,$sql);
               if (mysqli_num_rows($result)>0) {
               while ($row=mysqli_fetch_assoc($result)) {
                     $pid=$row['p_id'];
                 ?>
        <div class="boxed no-padding">

          <!-- Title Bart Start -->
          <div class="title-bar white">
            <h4><?php echo $row['p_name'] ;?></h4>
               
            <ul class="actions">
             
              <li> <a href="company_active_post.php?deleteid=<?php echo $pid;?>" id="btnGetTime" data-id="" class="fa fa-trash-o input_btn"  style="color: red;"></a></li>
              <li><a href="#" class="close-box"><i class="fa fa-chevron-up"></i></a></li>
              <li><a href="#" class="remove-box"><i class="fa fa-times-circle-o"></i></a></li>
              
            </ul>
          </div>
          <!-- Title Bart End -->

          <div class="inner no-radius">
          <!-- Table Holder Start -->
              
          <div class="table-holder">

            <table id="stripe-table" class="theme-table stripe-rows">
              
              <tbody>
                
                <tr>
                   
                  <td> <img src="<?php echo $row['imgpath'];?>" style=" height: 131px !important; width: 131px !important;" alt="Profile Picture" /></td> 
                  <td class="hidden-sm hidden-xs"  style="    padding-left: 30px;"><?php echo $row['description'];?><br/>
                    <p class="fa fa-clock-o">  <?php echo $row['created_at'];?> </p><p class="fa fa-map-marker" style="padding-left:20px;"> <?php
                     $ctid=$row['city_id'];
                     $sql1="SELECT * FROM city WHERE id='$ctid'";
                    $result1=mysqli_query($conn,$sql1);
                    $row1=mysqli_fetch_assoc($result1);
                    echo $row1['c_name'];
                     ?> </p>  <p class="fa fa-money" style="padding-left:20px;"> PKR: <?php
                      $cid= $row['category_id'];
                       $sql2="SELECT * FROM category WHERE id='$cid'";
                    $result2=mysqli_query($conn,$sql2);
                    $row2=mysqli_fetch_assoc($result2);

                     if ($row2['name']=='Sale') {
                      $sql3="SELECT * FROM sale WHERE p_id='$pid'";
                      $result3=mysqli_query($conn,$sql3);
                      $row3=mysqli_fetch_assoc($result3);
                      echo $row3['price'];
                     }

                     if ($row2['name']=='Lease') {
                       $sql3="SELECT * FROM lease WHERE p_id='$pid'";
                       $result3=mysqli_query($conn,$sql3);
                       $row3=mysqli_fetch_assoc($result3);
                       echo $row3['price'];
                     }
                     if ($row2['name']=='Rent') {
                      $sql3="SELECT * FROM rent WHERE p_id='$pid'";
                       $result3=mysqli_query($conn,$sql3);
                       $row3=mysqli_fetch_assoc($result3);
                       echo $row3['month_rent'];
                     }
                      ?></p></td>
                  
                
                   
                </tr>
                
                
              </tbody>
            </table>
          </div>
          <!-- Table Holder End -->
          </div>

        </div>
        <?php } } else{?>
              <tr>
                <td>Thers is no active post</td>
              </tr>

         <?php    } ?>
      </div>

      <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
            

          </div>
        </div>
        <!-- Row End -->


      </div>
        </div>

  </div>
</div>
<!-- Main Content End -->
    <?php include 'footer.php';?>
    <script type="text/javascript">
$(document).ready(function(){
  $("#btnGetTime").click(function(){
   return confirm('Are you sure ? want to delete!');

  });
});
</script>
</body>
</html>