<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CONTACT</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/dm.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
  </style>
</head>
    <link rel="icon" href="img/dm.png">
<body>

  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="index.php" class="scrollto">DREAM-MESS</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
            <li class="active"><a href="admin/Login.php">Admin</a></li>
          <li><a href="index.php">Home</a></li>
          <li><a href="aboutus.php">About Us</a></li>
          <li class="menu-active"><a href="contact.php" `>Contact</a></li>
          
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">
  <div class="carousel-item active">
            <div class="carousel-background"><img src="img/page/1.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <p>Find your dream mess here.Very easy and reliable.</p>
                <a href="index.php" class="btn-get-started scrollto">Let's go</a>
                
            </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/page/1.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                
                <p>advetise your room here,for get better profit.</p>
                <a href="profilea.php" class="btn-get-started scrollto">want to advetise</a>              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/page/1.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <p>happy to serve you.always with you.</p>
                <a href="contact.php" class="btn-get-started scrollto">contact with us</a>
                             </div>
            </div>
         
         

          

      

         
        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section>
  <!-- #intro -->
<!--==========================
      Contact Section
    ============================-->
   

    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contact Us</h3>
          <p>If any problem, contact with us</p>
        </div>
          <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="login/contactus.php" method="post"  >
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required/>
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="tel" class="form-control" name="subject" id="subject" placeholder="Phone Number" data-rule="maxlen:10" maxlength="10" data-msg="Please enter valid phone number" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" required></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button name="aru" type="submit">Send Message</button></div>
          </form>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>15,G GOBRA GOROSTHAN ROAD KOLKATA-700046</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+91 6290314949</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">dreammess19@gamil.com</a></p>
            </div>
          </div>

        </div>

        

      </div>
    </section><br><!-- #contact -->

   <!---maps--->
          <div class="container">
              <div class="row">
          <div class="col-md-12">
          <center><font size="+8"><b><strong class="heading"><span class="style7">OUR</span><span class="style8"> LOCATION</span></strong></b></font></center>
          <br><br>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7959.004372490824!2d88.36884836999043!3d22.559623908350268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0276f9c368321d%3A0x269b2a9da6bcc881!2sCentral+Calcutta+Polytechnic!5e0!3m2!1sen!2sin!4v1534658968833" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>





          </div>              
              </div></div><!---end of maps--->

<!--footer section-->
<section id="footer" class="section footer">
    <div class="container">
      <div class="row animated opacity mar-bot20" data-andown="fadeIn" data-animation="animation">
        <div class="col-sm-12 align-center">
          <ul class="social-network social-circle">
            <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
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