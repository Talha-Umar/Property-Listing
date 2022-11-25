<?php
include 'includes/dbconn.php';
 ?>
<!-- Subscribe Area Start Here -->
        <div class="subscribe-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <div class="subscribe-text">
                            <h3>SUBSCRIBE NEWSLETTER</h3>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <div class="newsletter wow fadeInRight" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInRight;">
                           
                                <label><i class="fa fa-envelope-o" aria-hidden="true"></i></label>
                               <input type="email"  id="email_to"  data-id="email_to" placeholder="youremail@domain.com"/>
                               
                                <button   class="input_btn">Subscribe</button>
                                                    
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Subscribe Area End Here -->



     <footer>
          <div id="footer" class="footer-top-area">
            <div class="container">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="footer-heading">
                    <a href="index-2.html"><img src="home/images/logo.png" alt=""></a>
                    <p>Property Listing Present a Plateform For Properties sale out.</p>
                    <div class="footer-social-icons">
                      <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="footer-heading">
                    <h2>Quick Links</h2>
                    <div class="footer-two">
                      <nav>
                        <ul>
                          <li><a href="index.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Home</a></li>
                          <li><a href="allproperties.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Properties</a></li>                          
                          <li><a href="allcompanies.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Companies</a></li>
                            <li><a href="contactus.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact Us</a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="footer-heading heading-margin">
                    <h2>RECENT PROPERTIES</h2>
                      <?php
                         $sql="SELECT * FROM posts WHERE  status='1'  ORDER BY id DESC LIMIT 2";
                          $result=mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result)>0) {
                      while ($row=mysqli_fetch_assoc($result)) {

                       ?>
                      <div class="sweet-home">
                      <div class="media">
                        <a class="pull-left" href="property_detail.php?id=<?php echo $row['p_id']; ?>">
                          <img src="images/postthumb/<?php echo $row['cover_image']; ?>" style="height:70px; width: 70px;" alt="">
                        </a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="property_detail.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['p_name']; ?><br/><?php 
                                       $cityid=$row['city_id'];
                                       $sql2="SELECT * FROM city WHERE id='$cityid'";
                                        $result2=mysqli_query($conn,$sql2);
                                        $row2=mysqli_fetch_assoc($result2);
                                        echo $row2['c_name'];

                                   ?></a></h4>
                          <p>PKR: <?php
                            $cid=$row['category_id'];
                                            $pid=$row['p_id'];
                                             $sql4="SELECT * FROM category WHERE id='$cid'";
                                             $result4=mysqli_query($conn,$sql4);
                                             $row4=mysqli_fetch_assoc($result4);

                                             if ($row4['name']=='Sale') {
                                             $sql5="SELECT * FROM sale WHERE p_id='$pid'";
                                             $result5=mysqli_query($conn,$sql5);
                                             $row5=mysqli_fetch_assoc($result5);
                                             echo $row5['price'];
                                              }

                                             if ($row4['name']=='Lease') {
                                              $sql5="SELECT * FROM lease WHERE p_id='$pid'";
                                              $result5=mysqli_query($conn,$sql5);
                                              $row5=mysqli_fetch_assoc($result5);
                                              echo $row5['price'];
                                            }
                                            if ($row4['name']=='Rent') {
                                            $sql5="SELECT * FROM rent WHERE p_id='$pid'";
                                            $result5=mysqli_query($conn,$sql5);
                                             $row5=mysqli_fetch_assoc($result5);
                                                 echo $row5['month_rent'];
                                              }
                           ?></p>
                        </div>
                      </div>
                    </div>
                  <?php } }  else { ?>
                         <div class="sweet-home">
                      <div class="media">
                        <a class="pull-left" href="#">
                          <img src="home/images/footer/1.jpg" style="height:70px; width: 70px;" alt="">
                        </a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#">No recent Post<br/>Not Available</a></h4>
                          <p>PKR:0.00</p>
                        </div>
                      </div>
                    </div>                                
                    <?php } ?>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="footer-heading">
                    <h2>Contact US</h2>
                    <p class="footer-border-bottom"><i class="fa fa-home" aria-hidden="true"></i> Address: PO Box 61100, Vehari<br/>In, Muslim Town Vehari  </p>
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Monday - Sunday 9.00 - 18.00 <br/>Saturday - Sunday Holiday</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-bottom-area">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="footer-bottom-left">                  
                    <p>@ Designed & Developed By  <a href="#">UE Vehari Students</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>

    <!-- End footer -->
    






    <!-- all js here -->
        <!-- jquery latest version -->
        <script src="home/js/vendor/jquery-1.12.0.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.min.js"></script>
        <!-- owl.carousel js -->
        <script src="home/js/owl.carousel.min.js"></script>
        <!-- meanmenu js -->
        <script src="home/js/jquery.meanmenu.js"></script>
        <!-- jquery-ui js -->
        <script src="home/js/jquery-ui.min.js"></script>
        <!-- wow js -->
        <script src="home/js/wow.min.js"></script>
        <!-- plugins js -->
        <script src="home/js/plugins.js"></script>
        <!-- Nivo slider js-->    
        <script src="home/inc/custom-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
        <script src="home/inc/custom-slider/home.js" type="text/javascript"></script>      
        <!-- jquery.fancybox.pack js -->
        <script src="home/inc/fancybox/jquery.fancybox.pack.js"></script>        
        <!-- bxslider JS -->
        <script src="home/js/jquery.bxslider.min.js"></script>   
       <!--  Nice Select js -->
        <script src="home/js/jquery.nice-select.min.js" type="text/javascript"></script> 
        <!-- slick JS -->
        <script src="home/js/slick.min.js"></script>
       <!--  jquery isotope -->
        <script src="home/js/isotope.pkgd.min.js" type="text/javascript"></script>
        <script src="home/js/imagesloaded.pkgd.min.js" type="text/javascript"></script>
        <!-- jquery.counterup js -->
        <script src="home/js/jquery.counterup.min.js"></script>
        <script src="home/js/waypoints.min.js"></script>
        <!-- Google Map -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcvAXp35fi4q7HXm7vcG9JMtzQbMzjRe8"></script>  
        <script src="home/js/gmaps.js"></script>
        <!-- main js -->
        <script src="home/js/main.js"></script>