<?php
include '../includes/dbconn.php';
if(!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION["username"])) {
  echo "<script type='text/javascript'>location.replace('../login.php')</script>";
}

    $user_id=$_SESSION["userid"];

$id=$_REQUEST['id'];
if (isset($_POST['add'])) {
  $cid=$_POST['category'];
  $sql="SELECT * FROM category WHERE id='$cid'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $cname=$row['name'];

  $postid=$_POST['postid'];
  $pname=$_POST['pname'];
  $category=$_POST['category'];
  $type=$_POST['type'];
  $city=$_POST['city'];
  $address=$_POST['address'];
  $description=$_POST['description'];
  
  $file_name=$_FILES['image']['name'];
  $file_type=$_FILES['image']['type'];
  $file_size=$_FILES['image']['size'];
  $file_temp_loc=$_FILES['image']['tmp_name'];
  $file_store="../images/postthumb/".$file_name;
  move_uploaded_file($file_temp_loc, $file_store);

  date_default_timezone_set('Asia/Karachi');
    $date = date('d/m/Y  h:i:s A');

    $sql1="INSERT INTO posts (p_name, status, created_at, description, address, p_id, city_id, user_id, category_id, post_type_id, cover_image, imgpath) VALUES ('$pname', '0', '$date', '$description', '$address', '$postid', '$city', '$user_id', '$category', '$type', '$file_name', '$file_store')";
 if (mysqli_query($conn, $sql1)) {
      $sql2="UPDATE post_details SET status='1' WHERE  post_id='$postid'";
       if (mysqli_query($conn, $sql2)) {} else {echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);}

  if ($cname=='Rent') {
    $rent=$_POST['rent'];
    $sql3="INSERT INTO rent ( month_rent, p_id) VALUES ('$rent', '$postid')";
    if (mysqli_query($conn, $sql3)) {} else {echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);}
  }
  if ($cname=='Sale') {
   $price=$_POST['price'];
   $sql4="INSERT INTO sale ( p_id, price) VALUES ('$postid','$price')";
    if (mysqli_query($conn, $sql4)) {} else {echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);}
  }
  if ($cname=='Lease') {
    $price=$_POST['lprice'];
    $lease=$_POST['lease'];

    $sql5="INSERT INTO lease (p_id, price, lease_max_year) VALUES ('$postid','$price','$lease')";
    if (mysqli_query($conn, $sql5)) {} else {echo "Error: " . $sql5 . "<br>" . mysqli_error($conn);}
  }
  echo'<script type="text/javascript">alert("Property Listed...!");</script>';
   echo "<script type='text/javascript'>location.replace('pending_cmp_list.php')</script>";

  } 
 else {echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);}

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
                <h4>ACTIVE YOUR PENDING POST WITH FULL INFORMATION</h4>
              </div>
              <!-- Title Bar End -->
                <br/>
                <form action="" method="post" enctype="multipart/form-data">

                <div class="col-md-2"><label for="txt_id">Property ID:</label></div>
                <div class="col-md-10"><input type="text" name="postid" readonly="true" value="<?php echo $id; ?>"></div>

                <div class="col-md-2"><label for="txt_name">Property Name:</label></div>
                <div class="col-md-10"><input type="text" name="pname" required="true"></div>

                <div class="col-md-2"><label for="DD_category">Category:</label></div>
                <div class="col-md-10"> 
                   <select name="category" required="true" id="category">
                     <option value="">Select Category</option>
                     <?php
                     $sql="SELECT * FROM category";
                     $result=mysqli_query($conn,$sql);
                       while ($row=mysqli_fetch_assoc($result)) { ?>
                      <option id="<?php echo $row['name'];?>" value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                      <?php  }?>
                   </select>
                </div>

                <div class="col-md-2"><label for="DD_type">Type:</label></div>
                <div class="col-md-10"> 
                     <select name="type" required="true">
                       <option value="">Select Post Type</option>
                        <?php
                     $sql="SELECT * FROM post_type";
                     $result=mysqli_query($conn,$sql);
                       while ($row=mysqli_fetch_assoc($result)) { ?>
                      <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                      <?php  }?>
                     </select>
                  </div>

                <div class="col-md-2"><label for="D_cityid">City:</label></div>
                <div class="col-md-10"> 
                  <select name="city" required="true">
                    <option value="">Select City</option>
                    <?php
                     $sql="SELECT * FROM city";
                     $result=mysqli_query($conn,$sql);
                       while ($row=mysqli_fetch_assoc($result)) { ?>
                      <option value="<?php echo $row['id'];?>"><?php echo $row['c_name'];?></option>
                      <?php  }?>
                  </select>
                 </div>
                
                <div id="sale">
                <div class="col-md-2"><label for="txt_price">Price:</label></div>
                <div class="col-md-10"><input type="number" name="price" maxlength="8" required="true"></div>
               </div>

               <div id="lease">
                <div class="col-md-2"><label for="txt_price">Price:</label></div>
                <div class="col-md-10"><input type="number" name="lprice" maxlength="8" required="true"></div>
                <div class="col-md-2"><label for="txt_price">Lease Max/Year:</label></div>
                <div class="col-md-10"><input type="number" name="lease" maxlength="8" required="true"></div>
               </div>

               <div id="rent">
                <div class="col-md-2"><label for="txt_price">Rent/Month:</label></div>
                <div class="col-md-10"><input type="number" name="rent" maxlength="8" required="true"></div>
               </div>


                <div class="col-md-2"><label for="txt_address">Address:</label></div>
                <div class="col-md-10"><input type="text" name="address" required="true"></div>

                <div class="col-md-2"><label for="txt_discription">Discreption:</label></div>
                <div class="col-md-10"><textarea name="description" cols="20" rows="4" required="true"></textarea></div>
                             
                <div class="col-md-2"><label for="FileUpload1">Thumbnail:</label></div>
                <div class="col-md-10"><input type="file" name="image" required="true"></div>
             
                <div class="col-md-10 col-md-offset-2">                
                  <input type="submit" name="add" class="btn btn-lg btn-round btn-success" value="Post Now" style="width: 237px;">
                </div>

                </form>

             

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
 <script type="text/javascript">

    $(document).ready(function () {
    $("#sale").show();
    $("#sale input").removeAttr("disabled","disabled");
   
    $("#lease").hide();
    $("#lease input").attr("disabled","disabled");
    
    $("#rent").hide();
    $("#rent input").attr("disabled","disabled");
    

       $("#category").change(function(){
         var id =$(this).find('option:selected').attr('id');

         if (id=='Sale') {
            $("#sale").show();
            $("#sale input").removeAttr("disabled","disabled");
   
            $("#lease").hide();
            $("#lease input").attr("disabled","disabled");
    
            $("#rent").hide();
            $("#rent input").attr("disabled","disabled");
         }

         if (id=='Lease') {
            $("#sale").hide();
            $("#sale input").attr("disabled","disabled");
   
            $("#lease").show();
            $("#lease input").removeAttr("disabled","disabled");
    
            $("#rent").hide();
            $("#rent input").attr("disabled","disabled");
         }

         if (id=='Rent') {
            $("#sale").hide();
            $("#sale input").attr("disabled","disabled");
   
            $("#lease").hide();
            $("#lease input").attr("disabled","disabled");
    
            $("#rent").show();
            $("#rent input").removeAttr("disabled","disabled");
         }

            });
  

    });

 </script>
</body>
</html>