<?php 
session_start();
    include("login/dAta.php");
  
    $rid=$_GET['data'];

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
<!DOCTYPE html>
<html lang="en">
	<head>
		<!--<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>About Me | Learn Detail About Me</title>-->

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="pcss/bootstrap.min.css" />
		<link rel="stylesheet" href="pcss/style.css" />
		<link rel="stylesheet" href="pcss/ionicons.min.css" />
    <link rel="stylesheet" href="pcss/font-awesome.min.css" />
    <!-- Font Awesome 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">-->
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
        <style>
            body{
                background-color: black;
                
            }
        </style>
	</head>
  <body>

    <!-- Header
    ================================================= -->
		<header id="header">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Home</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
                
              <li class="dropdown"><a href="contact.html">Contact</a>
              </li>
              <li class="dropdown"><a href="aboutus.html">About us</a></li>
               <li class="dropdown"><a href="login/alogin.php">login</a></li>     
            </ul>
            <!-- <form class="navbar-form navbar-right hidden-sm">
              <div class="form-group">
                <i class="icon ion-android-search"></i>
                <input type="text" class="form-control" placeholder="Search rooms">
              </div>
            </form>-->
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->
                
    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
        <div class="timeline-cover">

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
                <form action="profileimg.php" method="post">
              <div class="col-md-3">
                <div class="profile-info">
                    <?php
               
    
    $isql="SELECT u_n_name FROM u_image WHERE userfk=?";
        $stmt=$conn->prepare($isql);
       $stmt->bind_param('s',$ph);
       $stmt->execute();
       $result=$stmt->get_result();
       $row = $result->fetch_assoc();
		if(mysqli_num_rows($result) > 0){
          $Aru= $row['u_n_name'];
            
         }
                         
                    ?>
                  <img src="img/user/<?php echo $Aru ?>" alt="" class="img-responsive profile-photo" />
                  <h4>Advetiser:<?php echo $user.' '.$userl ?></h4>
                  <p class="text-muted">.........</p>
                </div>
              </div>
                </form>
              
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
           
          <div class="navbar-mobile hidden-lg hidden-md">
               <form  name="bform" action="profileimg.php" method="post">
            <div class="profile-info">
              <img src="img/user/<?php echo $Aru ?>" alt="" class="img-responsive profile-photo" />
                <h4>Advetiser:</h4><h5><?php echo $user.' '.$userl ?></h5>
              <p class="text-muted">address</p>
            </div>
             </form>
           
          </div><!--Timeline Menu for Small Screens End-->

        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">

              <!-- About
              ================================================= -->
              <div class="about-profile">
                
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>Work Experiences</h4>
                  <div class="organization">
                    <img src="images/envato.png" alt="" class="pull-left img-org" />
                    <div class="work-info">
                      <h5>Envato</h5>
                      <p>Seller - <span class="text-grey">1 February 2013 to present</span></p>
                    </div>
                  </div>
                  <div class="organization">
                    <img src="" alt="" class="pull-left img-org" />
                    <div class="work-info">
                      <h5>Envato</h5>
                      <p>Seller - <span class="text-grey">1 February 2013 to present</span></p>
                    </div>
                  </div>
                  <div class="organization">
                    <img src="images/envato.png" alt="" class="pull-left img-org" />
                    <div class="work-info">
                      <h5>Envato</h5>
                      <p>Seller - <span class="text-grey">1 February 2013 to present</span></p>
                    </div>
                  </div>
                </div>
                
                <div class="about-content-block">
  
                  <h4 class="grey"><i class="ion-ios-heart-outline icon-in-title"></i>Images</h4>
                  <ul class="interests list-inline">
                      <?php
                     $skd="SELECT i_name FROM r_image WHERE r_id=?";
                       $aru=$conn->prepare($skd);
                       $aru->bind_param('i',$rid);
                       $aru->execute();
                       $arus=$aru->get_result();
                       while($srow=$arus->fetch_assoc())
                       {
    ?>
                   <img src="pro2/<?php echo $srow['i_name'] ?>" height="300" width="250">
                     <?php } ?>
                  </ul>
                  </div>
              </div>
            </div>
            <div class="col-md-2 static">
              <div id="sticky-sidebar">
                <h4 class="grey">Sarah's activity</h4>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Commended on a Photo</p>
                    <p class="text-muted">5 mins ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Has posted a photo</p>
                    <p class="text-muted">an hour ago</p>
                  </div>
                </div>
                <!--finish-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
    <!-- Start your project here-->
  
     
    <!-- Footer
    ================================================= -->
    <footer id="footer">
    
      <div class="copyright">
        <p>Dream-Mess</p>
      </div>
		</footer>
    
    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>
    
    <!--Buy button-->
    <a href="" target="_blank" class="btn btn-buy"><span class="italy">Buy with:</span><img src="images/envato_logo.png" alt="" /><span class="price"> Rs-<?php echo $rrow['r_price']; ?></span></a>
  
    
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&callback=initMap"></script>
    <script src="pjs/jquery-3.1.1.min.js"></script>
    <script src="pjs/bootstrap.min.js"></script>
    <script src="pjs/jquery.sticky-kit.min.js"></script>
    <script src="pjs/jquery.scrollbar.min.js"></script>
    <script src="pjs/script.js"></script>
    
  </body>
</html>
