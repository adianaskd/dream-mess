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
    <link rel="icon" href="img/dm.png">
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
    <link rel="stylesheet" href="pro2/style1.css">


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
        ::placeholder {
  color: blue;
  font-size: 0.64em;
}
      .classy-menu li a:hover
      {
        font-size: 2em;
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
                    <H1><a class="nav-brand" href="index.php"><b style="font-weight: bold;font-size: 1.2em;">DREAM-MESS</b></a></H1>

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
                                <li class="active"><a href="index.php">Home</a></li>
                             
                                <li><a href="aboutus.php">About Us</a></li>
                
                                   <li><a href="contact.php">Contact</a></li>
								   <li><a href="login/alogin.php">Sign in</a></li>
                                <li><a href="profilea.php">For Advertising</a></li>
								    
                            </ul>

                            
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

	<!-- ##### Hero Area Start ##### -->
   <br><br><br><br><br><br>
    <!-- ##### Hero Area End ##### -->
    <!-- ##### Advance Search Area Start
##### -->
   
    <!-- ##### Advance Search Area End ##### -->
    <!-- ##### Advance Search Area Start ##### -->
    <div class="south-search-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="advanced-search-form">
                        <!-- Search Title -->
                        <div class="search-title">
                            <p style="background-color: black;font-weight: bold;font-size: 1em;">Start Searching...</p>
                        </div>
                        <!-- Search Form -->
                            <div class="row">

                                <div class="offset-1 col-md-11">
                                    <div class="form-group">
           <input type="input" class="form-control" name="aru" id="aru" placeholder="search by name,address,rent....">
                                    </div>
                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
        <div class="container">
           
              
            <div class="row" id="sview1">
                

                
            </div>
        </div>
    
    <!-- ##### Featured Properties Area End ##### -->
        <!-- ##### Call To Action Area Start ##### -->

    <!-- ##### Call To Action Area End ##### -->
	
    <!--footer section-->
<section id="footer" class="section footer">
    <div class="container">
	
      <div class="row align-center">
      	<div class="col-sm-12 align-center">
        <ul class="footer-menu text-center">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="aboutus.php">About us</a></li>
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
    <!--lets search -->
    <script>
       $(document).ready(function(){

           $.ajax({
            url:"login/search1.php",
            method:"post",
              data:{query:''},
              dataType: 'json',
              success:function( data)
              {
               var a=data['data'];
                 var html = "";
                for(var i=0;i<a.length;i++) {
                    var d=a[i];
         		html += "<div class='col-12 col-md-6 col-xl-4 single-featured-property mb-50 wow fadeInUp' data-wow-delay='100ms'   >";
                   html +="<a href='room.php?data="+d['rid']+"'><div class='property-thumb'  >";
                   html+= "<img src='img/room/"+d['rimg']+"' alt='' style=' height:150px; width:100%; '!important  ><div class='tag'>";
                    html += "<span>"+d['rfor']+" "+d['rtype']+", Rs-"+d['rprice']+"</span></div><div class='list-price'>";
                    html += "<p style=' font-size:10px; '!important >"+d['raddr']+"</p>seat capacity: "+d['rsc']+", seat available: "+d['ravl']+" </div></div></a>";
                    html +="</div>";
                    
         		}
              $('#sview1').html(html);
        
               },
              	error:function(x) {
    			if (x.status==0) {
        		alert('You are offline!!\n Please Check Your Network.');
    			} else if(x.status==404) {
        		alert('Requested URL not found.');
    			} else if(x.status==500) {
        		alert('Internel Server Error.');
    			}  else {
        		
    			}
		   } 
         });
   
          $('#aru').keyup(function()
       {
         var query=$(this).val();
              
       
          $.ajax({
            url:"login/search1.php",
            method:"post",
              data:{query:query},
              dataType: 'json',
              success:function( data)
              {
               var a=data['data'];
                 var html = "";
                for(var i=0;i<a.length;i++) {
                    var d=a[i];
         		html += "<div class='col-12 col-md-6 col-xl-4' ><div class='single-featured-property mb-50 wow fadeInUp' data-wow-delay='100ms'   >";
                   html +="<a href='room.php?data="+d['rid']+"'><div class='property-thumb'  >";
                   html+= "<img src='img/room/"+d['rimg']+"' alt='' style=' height:220px; width:100%; '!important  ><div class='tag'>";
                    html += "<span>"+d['rfor']+" "+d['rtype']+", Rs-"+d['rprice']+"</span></div><div class='list-price'>";
                    html += "<p style=' font-size:10px; '!important >"+d['raddr']+"</p>seat capacity: "+d['rsc']+", seat available: "+d['ravl']+" </div></div></a>";
                    html +="</div></div>";
                    
         		}
              $('#sview1').html(html);
        
               },
              	error:function(x) {
    			if (x.status==0) {
        		alert('You are offline!!\n Please Check Your Network.');
    			} else if(x.status==404) {
        		alert('Requested URL not found.');
    			} else if(x.status==500) {
        		alert('Internel Server Error.');
    			} 
                else{
                    
                }
		   } 
         });
   
     });
});
</script>
    </body>
</html>