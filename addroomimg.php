

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
	<title>welcomeTOdreammess</title>
	<!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">
	 <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="pro2/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="pro2/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="pro2/lib/animate/animate.min.css" rel="stylesheet">
  <link href="pro2/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="pro2/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="pro2/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Style CSS -->
    <link rel="stylesheet" href="pro2/style2.css">


</head>
    <?php
    session_start();
    include("login/dAta.php");
    $login="";
    $lout="";
    if(isset($_SESSION['user_name']))
    {
        $lout="Logout";
    $login_session=$_SESSION['user_name'];
    $sql="select * from customer1 where username=?";
        $stmt=$conn->prepare($sql);
       $stmt->bind_param('s',$login_session);
       $stmt->execute();
       $result=$stmt->get_result();
       $row = $result->fetch_assoc();
		if(mysqli_num_rows($result) > 0){
          $login= $row['firstname'];
    }
    }
    ?> 
    <style>
      .classy-menu li a:hover
      {
        font-size: 2em;
      }
      .tanmoy img
      {
        height: 380px;
        width: 350px;
      }
    </style>
<body>
	<!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>
	
	
	
	
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
       

        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="southNav">

                    <!-- Logo -->
                    <H1><a class="nav-brand" href="#">DREAM-MESS</a></H1>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                
                                <li ><a href="profilea.php"><?php echo $login; ?></a></li>
            <li ><a href="login/signout.php"><?php echo $lout; ?></a></li>
                                <li class="active"><a href="#">Home</a></li>
                             
                                <li><a href="aboutus.html">About Us</a></li>
                
                                   <li><a href="contact.php">Contact</a></li>
								    
                            </ul>

                            
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

	<br><br><br><br><br><br><br><br>
     <div class="south-search-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="advanced-search-form">
                        <!-- Search Title -->
                        <div class="search-title">
                            <p>Insert photo for your room </p>
                        </div>
                        <?php
                        $rid=$_GET['data'];
                        ?>
                        <!-- Search Form -->
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <form action="login/roomimg.php" method="post" enctype="multipart/form-data">
                                       <br> <input type="file" class="form-control" name="skdtanmoy"><br>
                                        <center><button  type="submit" class="btn btn-primary btn-lg" name="upload">Upload Your Photo</button></center>
                                        <input  disable class="form-control1" type="text" name="roomid" value="<?php echo $rid ?>">
                                        
                                            </form>
                                    </div>
                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="featured-properties-area section-padding-100-50">
        <div class="container">
           
              <center><h4><b style="font-size: 2em;">Your Images:</b></h4></center>
            <div class="row">
                <?php
                $imgsql="SELECT i_name FROM r_image WHERE r_id=?";
                 $imgst=$conn->prepare($imgsql);
       $imgst->bind_param('i',$rid);
       $imgst->execute();
       $imgresult=$imgst->get_result(); 
		if(mysqli_num_rows($imgresult) > 0){
                while($imgrow=$imgresult->fetch_assoc())
        {
            $imagename=$imgrow['i_name'];
        ?>
               <div class="col-12 col-md-12 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb tanmoy">
                            <img src="img/room/<?php echo $imagename ?>" alt="">
                            <div class="tag">
                                <span> <a href="login/deleteimg.php?iname=<?php echo $imagename ?>">DELETE</a></span>
                                </div>
                            
                        </div>
                    </div>
                </div>
                <?php } }
                else
                { ?>
                <h4>  ---- NO IMAGE FOR THIS ROOM ---- </h4>
               <?PHP } ?>
                
            </div>
        </div>
    </section>
    <!-- ##### Featured Properties Area End ##### -->
        <!-- ##### Call To Action Area Start ##### -->

    <!-- ##### Call To Action Area End ##### -->
	
    <!--footer section--><br><br><br>
<section id="footer" class="section footer">
    <div class="container">
	
      <div class="row align-center">
      	<div class="col-sm-12 align-center">
        <ul class="footer-menu text-center">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="aboutus.html">About us</a></li>
          <li><a href="contact.php">Contact us</a></li>
           <li><a href="login/alogin.php">Sign in</a></li>
        </ul>
    	</div>
      </div>
    
      <div class="credits">
        
        Designed by <a href="#">DREAM-MESS</a>
      </div>
    </div>
</section>
<!--end of footer section---->
    
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="pro2/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="pro2/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="pro2/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="pro2/js/plugins.js"></script>
    <script src="pro2/js/classy-nav.min.js"></script>
    <script src="pro2/js/jquery-ui.min.js"></script>
    <!-- Active js -->
    <script src="pro2/js/active.js"></script>
    </body>
</html>