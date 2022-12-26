<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>HOME</title>
   <link rel="icon" href="img/dm.png">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  
</head>
<body>
  <header id="header" style="background-color:black">
    <div class="container-fluid" >

      <div id="logo" class="pull-left">
        <h1><a href="#" class="scrollto">DREAM-MESS</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Home</a></li>
          <li><a href="aboutus.php">About Us</a></li>
          <li><a href="contact.php">Contact</a></li>
            <li><a href="login/alogin.php">Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
 <?php 
            require("login/dAta.php");
            session_start();
           $rid=$_GET['data'];
            ?>
  <!--==========================
    Intro Section
  ============================-->
  
  
  <!--==========================
      description Section
============================-->
    <?php
    $as="SELECT * FROM customer1 c,room r WHERE r.c_user_fk=c.username AND r.r_id=?";
      $aru=$conn->prepare($as);
      $aru->bind_param('i',$rid);
      $aru->execute();
    $rresult=$aru->get_result();
     $rrow=$rresult->fetch_assoc();
if(mysqli_num_rows($rresult)>0)
{
    $user=$rrow['firstname'];
    $userl=$rrow['lastname'];
    $ph=$rrow['phno'];
}
    
    
    ?>
    <div></div><br><br><br>
    <section id="about" >
      <div class="container">

        <header class="section-header">
          <h3>Room Description</h3>
<!----          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      ---->  </header>

        <div class="row about-cols">
            <div class="col-md-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
                
              <h2 class="title" style="background-color: black;"><a href="#" style="color: white;">Room Details</a></h2>
              
            </div>
              <p  style="font-size: 1.2em;font-weight: bold;">
                  Address: <?php echo $rrow['r_address'] ?> <br>
                  Price:<?php echo $rrow['r_price']?> <br>
                 <?php echo "Seat capacity:". $rrow['r_capacity']  ." <br>   Seat available:".$rrow['r_available'] ?><br>
                 <?php echo "Category:".$rrow['rtype']."<br>Room for ".$rrow['rfor'] ?>
                  
              </p>
          </div>
            <?php 
    $img="default.png";
                  $st="y";
    $sql2="SELECT u_n_name FROM u_image WHERE userfk=? AND u_status=?";
      $skd=$conn->prepare($sql2);
      $skd->bind_param('ss',$ph,$st);
      $skd->execute();
    $sre=$skd->get_result();
     $srow=$sre->fetch_assoc();
if(mysqli_num_rows($sre)>0)
    $img=$srow['u_n_name'];
                 ?>

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
               
              <h2 class="title" style="background-color: black;"><a href="#" style="color: white;">Advetiser</a></h2>
              
            </div>
              <p style="align-items: center;text-align: center;font-size: 1.2em;font-weight: bold;">
                <img src="img/user/<?php echo $img ?>" alt="advetiser has no image" height="200" width="300" img-responsive ><br>
              Name:<?php echo $user." ".$userl?><br>
              Contact No:<?php echo $ph?>
              </p>
          </div>

          

          <div class="col-md-3 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
           
              <h2 class="title" style=" background-color: black;"><a href="#" style="color: white;">Others</a></h2>
             
            </div>
               <p style="font-size: 1.0em;font-weight: bold; color:fff;">
                   Advertise on <?php echo $rrow['r_date']; ?><br>
                 Food:<?php echo $rrow['rfd'] ?>
                   
                       <br><?php echo $rrow['rnote']; ?>
                   
              </p>
          </div>
            <div class="col-md-3 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
           
              <h2 class="title" style=" background-color: black;"><a href="#" style="color: white;">Images</a></h2>
             
            </div>
                <?php
                $sql3="SELECT i_name FROM r_image WHERE r_id=?";
      $skd3=$conn->prepare($sql3);
      $skd3->bind_param('i',$rid);
      $skd3->execute();
    $sre3=$skd3->get_result();
     while($srow=$sre3->fetch_assoc()){
                ?>
               <img src="img/room/<?php echo $srow['i_name']; ?>"  height="200" width="300" img-responsive >
                <br>
                <?php } ?>
          </div>


        </div>

      </div>
    </section><!-- #description section -->

<!--footer section-->
<section id="footer" class="section footer">
    <div class="container">
      <div class="row animated opacity mar-bot20" data-andown="fadeIn" data-animation="animation">
        <div class="col-sm-12 align-center">
          <ul class="social-network social-circle">
            <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-instagram"></i></a></li>
            <li><a href="https://www.facebook.com/Dream-Mess-313191542711965" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="row align-center">
      	<div class="col-sm-12 align-center">
        <ul class="footer-menu text-center">
          <li><a href="index.php">Home</a></li>
          <li><a href="aboutus.php">About us</a></li>
          <li><a href="#">Privacy policy</a></li>
          <li><a href="contact.php">Contact us</a></li>
        </ul>
    	</div>
      </div>
	  <!---
      <div class="row align-center copyright">
        <div class="col-sm-12">
          <P>Copyright &copy; All rights reserved</p>
        </div>
      </div>
	  ----->
	  
	  
      <div class="credits">
        
        Designed by <a href="#">DREAM-MESS</a>
      </div>
	  
    </div>
</section>
<!--end of footer section---->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


<!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>