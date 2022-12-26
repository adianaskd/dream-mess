


<?php 
require('login/session_check.php');
    include("login/dAta.php");
    $user="";
    $lout="";
    if(isset($_SESSION['user_name']))
    {
        $userimage="duser.png";
        $lout="Logout";
    $login_session=$_SESSION['user_name'];
    $sql="SELECT * FROM customer1 WHERE username=?";
        
        $stmt=$conn->prepare($sql);
       $stmt->bind_param('s',$login_session);
       $stmt->execute();
       $result=$stmt->get_result();
       $row = $result->fetch_assoc();
        
		if(mysqli_num_rows($result) > 0){
          $user= $row['firstname'];
            $userl=$row['lastname'];
            $ph=$row['phno'];
            
            
    }
    }
    ?> 
<?php
                  
    
    $isql="SELECT u_n_name FROM u_image WHERE userfk=? AND u_status='y'";
        $stmt=$conn->prepare($isql);
       $stmt->bind_param('s',$ph);
       $stmt->execute();
       $result=$stmt->get_result();
       $row = $result->fetch_assoc();
                    
		if(mysqli_num_rows($result) > 0){
          $userimage= $row['u_n_name'];
            
         }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is our website" />
		<meta name="keywords" content="search mess" />
		<meta name="robots" content="index, follow" />
		<title>my profile</title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="pcss/bootstrap.min.css" />
		<link rel="stylesheet" href="pcss/style.css" />
		<link rel="stylesheet" href="pcss/ionicons.min.css" />
    <link rel="stylesheet" href="pcss/font-awesome.min.css" />
    <!-- Font Awesome 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">-->
  <!-- Bootstrap core CSS -->

  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="modal/css/mdb.min.css"/>
        
        
         <link href="swtalert/sweetalert2.min.css" rel="stylesheet">
         <link rel="icon" href="img/dm.png">
        <style>
            body{
                background-color: black;
                
            }
            h4.grey{
    color:midnightblue;
    margin: 0 auto 20px;
}
            #uimage,#uimagem,#rid,#rimage{
                
                display:none;
                    
            }
    a:hover{
    font-weight: bold;
    font-size: 1.5em;
       
 } 
 

        
        </style>
	</head>
  <body>
      
<!--sweet alert-->
      <?php  
      if(isset($_GET['result']))
     {
         if($_GET['result']=='inserted')
         { ?>

              <script type="text/javascript">
              setTimeout(function () { 
                  swal({title:"SUCCESS!",
                        text:"You are successfully save!",
                        type:"success",
                       timer: 2000});
              }, 500);
            </script>;
        <?php }
        else if($_GET['result']=='not inserted')
         { ?>
        <script type='text/javascript'>
           setTimeout(function () {
           Swal({
                type: 'error',
                title: 'Oops...',
                text: 'not inserted',
                timer: 2000
                });
                }, 500);
          </script>
       <?php }
        else if($_GET['result']=='succes')
         { ?>
        <script type='text/javascript'>
           setTimeout(function () {
           Swal({
                type: 'success',
                title: 'DONE...',
                text: 'sucessfully inserted',
                timer: 2000
                });
                }, 500);
          </script>
      <?php }
        else if($_GET['result']=='ierror')
         { ?>
        <script type='text/javascript'>
           setTimeout(function () {
           Swal({
                type: 'error',
                title: 'Ooops...',
                text: 'file is not selected',
                timer: 2000
                });
                }, 500);
          </script>
      <?php }
        else if($_GET['result']=='success')
         { ?>
        <script type='text/javascript'>
           setTimeout(function () {
           Swal({
                type: 'success',
                title: 'Ooops...',
                text: 'Room is successfully deleted',
                timer: 2000
                });
                }, 500);
          </script>
      <?php }
        else if($_GET['result']=='error')
         { ?>
        <script type='text/javascript'>
           setTimeout(function () {
           Swal({
                type: 'error',
                title: 'Ooops...',
                text: 'file is not deleted',
                timer: 2000
                });
                }, 500);
          </script>
       <?php }
         }
      
    ?>
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
            <a class="navbar-brand" href="index.php"><b style="font-weight: bold;font-size: 2em;color: silver;">Home</b></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
                <li class="dropdown"><a href="#"><b style="font-weight: bold;font-size: 2em;color: gold;"><?php echo $user ?></b></a></li>
             
              <li class="dropdown"><a href="contact.php"><b style="font-weight: bold;font-size: 1.5em;">Contact</b></a></li>
               
                
                <li class="dropdown"><a href="" data-toggle="modal" data-target="#modalConfirmDelete"><b style="font-weight: bold;font-size: 1.5em;"><?php echo $lout ?></b></a></li>
                <li class="dropdown"><a href="" data-toggle="modal" data-target="#dltaccount"><b style="font-weight: bold;font-size: 1.5em;">Delete Account</b></a></li>
                    
            </ul>
            
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->
      <br>          
    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
        <div class="timeline-cover" style="background-image: url(img/user/<?php echo $userimage ?>)!important">

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
                <form action="profileimg.php" name="cimage" method="post" enctype="multipart/form-data">
              <div class="col-md-3">
                <div class="profile-info">
                  <img src="img/user/<?php echo $userimage ?>" alt="" class="img-responsive profile-photo" id='simg'/>
                    <input type="file" name="uimage" id="uimage" class="form-control" >
                     <button type="submit" class="btn-primary" name="bimage" >Change Image</button>
                  <h4><?php echo $user.' '.$userl ?></h4>
                  <a href="#" class="btn-primary" data-toggle="modal" data-target="#aru63">Add Details</a>
                </div>
              </div>
                </form>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                    <li style="font-weight: bold;font-size: 1.3em;"><a href="#" data-toggle="modal" data-target="#skdchange">Change Password</a></li>
                  <li style="font-weight: bold;font-size: 1.3em;"><a href="#" data-toggle="modal" data-target="#updateprofile" class="editskd" id="<?php echo $login_session ?>">Edit Profile</a></li>
                  <li style="font-weight: bold; font-size: 1.3em;"><a  data-toggle="modal" data-target="#arudlt">Delete Room</a></li>
                </ul>
                <ul class="follow-me list-inline">
                  <li><a href="#" class="btn-primary"  data-toggle="modal" data-target="#arundhuti" >Add Room</a></li>
                </ul>
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
         <form name="mobform" action="profileimg.php" method="post" enctype="multipart/form-data">
          <div class="navbar-mobile hidden-lg hidden-md">
               
            <div class="profile-info">
              <img src="img/user/<?php echo $userimage ?>" alt="" class="img-responsive profile-photo" id='msimg' />
              <input type="file" name="uimage" id="uimagem" class="form-control" >
                <button type="submit" class="btn-primary" name="bimage">Change Image</button>

              <h4><?php echo $user.' '.$userl ?></h4>
              <a href="#" class="btn-primary" data-toggle="modal" data-target="#aru63">Add Details</a>
            </div>
            
            <div class="mobile-menu">
              <ul class="list-inline">
                <li><a href="#" class="editskd" data-toggle="modal" data-target="#updateprofile" id="<?php echo $login_session ?>"><b>Edit Profile</b></a></li>
                <li><a href="#" class="active" data-toggle="modal" data-target="#skdchange"><b>Change Password</b></a></li>
                <li><a  data-toggle="modal" data-target="#arudlt" class="active"><b>Delete Room</b></a></li>
              </ul>
              <a href="#" class="btn-primary"  data-toggle="modal" data-target="#arundhuti" >Add Room</a>
            </div>
          </div><!--Timeline Menu for Small Screens End-->
 </form>
        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">

              <!-- About
              ================================================= -->
              <div class="about-profile1">
               
                <div class="about-content-block">
                
                </div>
                <div class="about-content-block">
                  <h4 style="color:#099"><b style="font-size: 2em;">My Room</b></h4>
                </div>
                 
                  <?php
    $asql="SELECT * FROM room WHERE c_user_fk=?";
        $risql="select i_name from r_image where r_id=?";
                       $Aru=$conn->prepare($asql);
                       $Aru->bind_param('s',$login_session);
                       $Aru->execute();
                       $re=$Aru->get_result();
                   
                while($r_row=$re->fetch_assoc())
                {
                   
                    $rid=$r_row['r_id'];
                    
                    ?>
                <div class="about-content-block">
                  <ul class="interests list-inline">
                    <li style="font-weight: bold;font-size: 1.2em;">Room Name:<?php echo $r_row['r_name'] ?></li><br>
                    <li style="font-weight: bold;font-size: 1.2em;">Room Addresss:<?php echo $r_row['r_address'] ?></li><br>
                    <li style="font-weight: bold;font-size: 1.2em;">Room Price:<?php echo $r_row['r_price'] ?></li><br>
                    <li style="font-weight: bold;font-size: 1.2em;">Room Capacity:<?php echo $r_row['r_capacity'] ?></li><br>
                    <li style="font-weight: bold;font-size: 1.2em;">Seat Available:<?php echo $r_row['r_available'] ?></li><br>
                      <li><button class="btn btn-warning"><a href='addroomimg.php?data=<?php echo $rid?>'><b style="color: black;font-weight: bold;font-size: 1.5em;">+add image</b></a></button></li>
                      <li><button class="btn btn-success"><a href="#" class="updateroom" id="<?php echo $rid?>" data-toggle="modal" data-target="#udroom"><b style="color: black;font-weight: bold;font-size: 1.5em;">update room</b></a></button></li>
                  </ul>
                    <?php
                        $AS=$conn->prepare($risql);   
       $AS->bind_param('i',$rid);
       $AS->execute();
       $imgre=$AS->get_result();
                   
       while($irow = $imgre->fetch_assoc())
       {
                        ?>
                   
                        <img src="img/room/<?php echo $irow['i_name'] ?>" height="130" width="150">
                   
                    <?php } ?>
                      </div>
                  <?php } ?>
                      </form>
                <div class="about-content-block">
                  <h4 style="color:#099"><b style="font-size: 1.7em;">Admin Block</b></h4>
                </div>
                 <div class="about-content-block">
                    <?php 
                     $time="";
                    $tousermsg="NO MESSAGE,BUT ALWAYS WITH YOU.";
                    $msgtouser="SELECT message,date_time FROM adminmsg WHERE m_u_fk=? AND m_status='y'";
                    $msgst=$conn->prepare($msgtouser);
                     $msgst->bind_param('s',$ph);
                     $msgst->execute();
                    $msgresult=$msgst->get_result();
                    if(mysqli_num_rows($msgresult)>0)
                    while($msgrow = $msgresult->fetch_assoc())
                    {
                        $tousermsg=$msgrow['message'];
                        $time=$msgrow['date_time'];
                    }
                    ?>
                  <p style="font-weight: bold;font-size: 1.5em;"><?php echo '"'.$tousermsg.'"'." on -".$time ?></p>
                </div>
              </div>
            </div>
            <div class="col-md-2 static">
              <div id="sticky-sidebar">
                <h4 >Your Details</h4>
              
                  <?php
                   $uaddress = "SELECT h_no,loclity,city,pincode FROM address WHERE c_a_fk=?";
       $addr=$conn->prepare($uaddress);
       $addr->bind_param('s',$login_session);
       $addr->execute();
       $readdr=$addr->get_result();
       $row_a = $readdr->fetch_assoc();
                  
		if(mysqli_num_rows($readdr) > 0)
        {
                   ?>
                <div class="feed-item">
                  <div class="live-activity">
                    <p class="profile-link"><b style="color: white;font-weight: bold;font-size: 1.3em;">Lives in:</b><?php echo " ".$row_a['h_no'].",".$row_a['loclity'].",".$row_a['city']."-".$row_a['pincode']  ?></p>
                    
                  </div>
                </div>
           <?php } ?>
                <!--finish-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
<!-- dr-->
<div  class="modal fade" id="arudlt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog"  role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Click and Delete</h4>
          <h3>for delete a room click on it</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
            
            <?php
            $ir=0;
             $sa="SELECT * FROM room WHERE c_user_fk=?";
                       $A=$conn->prepare($sa);
                       $A->bind_param('s',$login_session);
                       $A->execute();
                       $re=$A->get_result();
                if(mysqli_num_rows($re)<=0)
                    echo "<h4 style={color:red}>no room is available</h4>";
                else{
           while($rrow=$re->fetch_assoc())
                {
               $ir=$ir+1;
                  ?> 
             <?php  $rname=$rrow['r_name'];
                if($rname=="")
                $rname="no name";?>
                
             <div>
       <a href="login/dltroom.php?rid=<?php echo $rrow['r_id'];?>"><b style="color:black;"><?php echo "(".$ir.")";?></b>Room name:<?php echo $rname." "?>Price: <?php echo $rrow['r_price']." ";?>Address:<?php echo $rrow['r_address']?></a>
          </div>
                 
                 <?php } } ?>
        
        </div>
            
      <!--  <div class="modal-footer d-flex justify-content-center">
        <button name="dlt" class="btn btn-default">Delete</button>
      </div>-->

            </div>
    </div>
  </div>
</div>


    <!-- Start your project here-->
  
<div class="modal fade" id="arundhuti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Add Room</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="addroom" action="login/addroom.php" method="post">
        <div class="md-form mb-5">
          
         <b><input type="text" name="rname" placeholder="room name(optional)" id="orangeForm-name" class="form-control validate" ></b>
        </div>
        <div class="md-form mb-5">
            <span class=""></span>
         <b> <input type="text" name="raddr" placeholder="room address" id="orangeForm-name" class="form-control validate" required></b>
        </div>
        <div class="md-form mb-5">
          
            <span class=""></span>
            <b><input type="tel" name="rsc" placeholder="seat capacity" id="orangeForm-name" class="form-control validate" required></b>
        </div>
        <div class="md-form mb-5">
          <span class=""></span>
         <b> <input type="tel" name="rsavl" placeholder="seat available" id="orangeForm-name" class="form-control validate" required></b>
        </div>
        <div class="md-form mb-5">
          <span class=""></span>
          <b><input type="tel" name="rprice" placeholder="room price" id="orangeForm-name" class="form-control validate" required></b>
        </div>
         <div class="mb-5">
          <label for="rfd"  class="col-sm-2 control-label">Food:</label>
         <select id="rfd" class="form-control" name="rfood">
          <option><b>Not Available</b></option>
           <option><b>Available</b></option>
         </select>
            </div><br>
             <div class="mb-5">
         <label for="ch"  class="col-sm-2 control-label">Room type:</label>
         <select id="ch" class="form-control" name="rtype">
          <option><b>MESS</b></option>
           <option><b>PG</b></option>
         </select>
            </div><br>
           <div class="mb-5">
         <label for="mf"  class="col-sm-2 control-label">Room for:</label>
         <select id="mf" class="form-control" name="rfor">
          <option><b>Girls</b></option>
           <option><b>Boys</b></option>
         </select>
            </div>
        <div class="md-form mb-5">
          <span class=""></span>
          <b><input type="text" name="rtext" placeholder="wrie something about the room" id="orangeForm-name" class="form-control validate" required>
        </b></div>
        <div class="modal-footer">
        <button type="submit" name="addroom" class="btn btn-primary btn-lg" ><b style="font-size: 2em;">Add</b></button>
      </div>
      </form>
      </div>
      
    </div>
  </div>
</div>

  <!-- /edit profile-->
<div class="modal fade" id="aru63" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel"><b style="font-size: 2em;">Your Details.....</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body" id="sview1">
           <form name="udetails" action="login/userdetail.php" method="post">
        <div class="md-form mb-5">
          <span></span>
          <b><input type="text" name="ucity" placeholder="city or vilage" id="orangeForm-name" class="form-control validate" required></b>
        </div>
        <div class="md-form mb-5">
          <span></span>
          <b><input type="text" name="umc" placeholder="municipality" id="orangeForm-name" class="form-control validate" required></b>
        </div>
        <div class="md-form mb-5">
          <span></span>
          <b><input type="text" name="uroad" placeholder="road/home no" id="orangeForm-name" class="form-control validate" required></b>
        </div>
        <div class="md-form mb-5">
        <span></span>
          <b><input type="text" name="ulocal" placeholder="locality" id="orangeForm-name" class="form-control validate" required></b>
        </div>
        <div class="md-form mb-5">
         <span></span>
          <b><input type="tel" name="upin" placeholder="pincode" id="orangeForm-name" class="form-control validate" required></b>
        </div>
        
        <div class="modal-footer">
        <button type="submit" name="userdetail" class="btn btn-primary btn-lg"><b style="font-size: 1.9em;">Save</b></button>
      </div>
       </form>
      </div>
     
    </div>
  </div>
</div>
<!-- /add room-->
<!-- update room -->
<div class="modal fade" id="udroom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Update Room</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form name="updateroom" action="login/updateroom.php" method="post">
      <div class="modal-body" id="suview">
    
      
      </div>
      </form>
    </div>
  </div>
</div>


<!--/update room-->
  <!-- /edit profile-->
 <!-- /update profile-->
<div class="modal fade" id="updateprofile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <b><div class="modal-header">
     <h4 class="modal-title w-100" id="myModalLabel">Your Details.....</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <form name="updatedetails" action="login/updatedetails.php" method="post">
      <div class="modal-body" id="sview">
      
        
      </div>
      </form></b>
    </div>
  </div>
</div>

  <!-- /update profile-->






<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading"><b style="font-weight: bold;font-size: 2em;">Are you want to sign out?</b></p>
      </div>

      <!--Body-->
      <div class="modal-body">

        

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a href="login/signout.php" class="btn  btn-outline-danger"><b style="font-weight: bold;font-size: 1.5em;">Yes</b></a>
        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal"><b style="font-weight: bold;font-size: 1.5em;">No</b></a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="dltaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading"><b style="font-weight: bold;font-size: 2em;">Are you sure?<br>your account will be deleted.</b></p>
      </div>

      <!--Body-->
      <div class="modal-body">

        

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a href="login/accountdelete.php" class="btn  btn-outline-danger"><b style="font-weight: bold;font-size: 1.5em;">Yes</b></a>
        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal"><b style="font-weight: bold;font-size: 1.5em;">No</b></a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
    <!--
change 
password
  -->


<div class="modal fade" id="skdchange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Header-->
      <div class="modal-header">
          
        <img src="img/user/<?php echo $userimage ?>" alt="avatar" class="rounded-circle img-responsive">
      </div>
      <!--Body-->
      <div class="modal-body mb-1">

        <h5 class="mt-1 mb-2 text-center"><?php echo $user ?></h5>
        <form name="change password" action="login/changepassword.php" method="post" >
        <div class="md-form ml-0 mr-0">
          <input type="password" type="text" id="form29" name="old" class="form-control form-control-sm ml-0"
            mdbInput [formControl]="modalFormAvatarPassword">
          <label data-error="wrong" data-success="right" for="form29"  class="ml-0">Enter Old Password</label>
        </div><br>
        <div class="md-form ml-0 mr-0">
          <input type="password" type="text" id="form29" name="new" class="form-control form-control-sm ml-0"
            mdbInput [formControl]="modalFormAvatarPassword">
          <label data-error="wrong" data-success="right" for="form29" class="ml-0">Enter New Password</label>
        </div>

        <div class="text-center mt-4">
          <button color="cyan" rounded="true" type="submit" name="change" class="btn btn-primary btn-lg">Change Password
            <i class="fas fa-sign-in-alt ml-1"></i>
          </button>
        </div>
        </form>
      </div>

    </div>
    <!--/.Content-->
  </div>
</div>

<!--Modal:finish-->
     
    <!-- Footer
    ================================================= -->
    <footer id="footer">
     
      <div class="copyright">
        <p>Dream-Mess,kolkata-700056,email:dreammess19@gmail.com</p>
      </div>
		</footer>
    
    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>
    
   
    <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="modal/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="modal/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="modal/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="modal/js/mdb.js"></script>
    <!-- Scripts
    ================================================= -->
    <!--swt alt-->
    <script type="text/javascript" src="swtalert/sweetalert2.min.js"></script>
    
    <script src="pjs/jquery-3.1.1.min.js"></script>
    <script src="pjs/bootstrap.min.js"></script>
    <script src="pjs/jquery.sticky-kit.min.js"></script>
    <script src="pjs/jquery.scrollbar.min.js"></script>
    <script src="pjs/script.js"></script>
    <script>
$('#simg').click(function(){
    $('#uimage').click();
});
        $('#msimg').click(function(){
    $('#uimagem').click();
});
        $("#skd").click(function () {
    $("#rimage").click();
});

</script>
<!-- script for edit profile-->
<script>
      $(document).ready(function () {
            $(document).on('click','.editskd',function(){
                var val = $(this).attr("id");

                $.ajax({
                    url: "login/fetchprofile.php",
                    type: "POST",
                    data: {'uname': val},
                    dataType: 'json',
                    success:function( data)
              {
                 var html = "";
                  var skd=data['data'];
                for(var i=0;i<1;i++) {
                    var d=skd[i];
         		html += "<div class='md-form mb-5'><span></span><b><input type='text' name='ucity' id='orangeForm-name'";
                    html+=" class='form-control validate' value='"+d['rcity']+"'></b></div><div class='md-form mb-5'>";
                    html+="<span></span><b><input type='text' name='umc' id='orangeForm-name'";
                    html+=" class='form-control validate' value='"+d['munici']+"' required></b></div>";
                    html+="<div class='md-form mb-5'><span></span><b> <input type='text' name='uroad' ";
                    html+=" id='orangeForm-name' class='form-control validate' value='"+d['hno']+"' required></b></div>";
                    html+="<div class='md-form mb-5'><span></span><b> <input type='text' name='ulocal' ";
                    html+=" id='orangeForm-name' class='form-control validate' value='"+d['locality']+"' required></b></div>";
                    html+="<div class='md-form mb-5'><span></span><b> <input type='tel' id='orangeForm-name' ";
                    html+="class='form-control validate' name='upin' value='"+d['pincode']+"' required></b></div>";
                    html+="<div class='modal-footer'><b><button type='submit' name='aditi' class='btn btn-primary btn-lg'>";
                    html+="<b>Update</b></button></b></div>";    
         		}
              $('#sview').html(html);
        
               },
              	error:function(x) {
    			if (x.status==0) {
        		alert('You are offline!!\n Please Check Your Network.');
    			} else if(x.status==404) {
        		alert('Requested URL not found.');
    			} else if(x.status==500) {
        		alert('Internel Server Error.');
    			}  else {
        		alert('Unknow Error.\n'+x.responseText);
    			}
		   } 
         });
   
     });
});
</script>
<!-- script for update room-->
<script>
      $(document).ready(function () {
            $(document).on('click','.updateroom',function(){
                var val = $(this).attr("id");

                $.ajax({
                    url: "login/fetchroom.php",
                    type: "POST",
                    data: {'rid': val},
                    dataType: 'json',
                    success:function( data)
              {
                 var html = "";
                  var adi=data['data'];
                for(var i=0;i<1;i++) {
                    var s=adi[i];
                    html +="<input type='text' name='rid' value='"+s['rid']+"' id='rid' class='form-control validate'>";
         		html +="<div class='md-form mb-5'> <b><input type='text' name='rname' value='"+s['rname']+"' id='orangeForm-name' class='form-control validate'></b></div>";
        html +="<div class='md-form mb-5'><span class=''></span><b> <input type='text' name='raddr' id='orangeForm-name' class='form-control validate' value='"+s['raddr']+"' required></b></div>";
        html +="<div class='md-form mb-5'><span class=''></span><b><input type='tel' name='rsc' id='orangeForm-name' class='form-control validate' value='"+s['rcapa']+"' required></b></div>";
        html +="<div class='md-form mb-5'><span class=''></span><b> <input type='tel' name='rsavl'  id='orangeForm-name' class='form-control validate' value='"+s['ravl']+"' required></b></div>";
        html +="<div class='md-form mb-5'><span class=''></span><b><input type='tel' name='rprice' id='orangeForm-name' class='form-control validate' value='"+s['rprice']+"' required></b></div>";
         html +="<div class='mb-5'><label for='rfd'  class='col-sm-2 control-label'>Food:</label><select id='rfd' class='form-control' name='rfood'><option><b>Not Available</b></option><option><b>Available</b></option></select></div><br>";
             html +="<div class='mb-5'><label for='rtype'  class='col-sm-2 control-label'>Room type:</label><select id='rtype' class='form-control' name='rtype'><option><b>MESS</b></option><option><b>PG</b></option></select></div><br>";
           html +="<div class='mb-5'><label for='mf'  class='col-sm-2 control-label'>Room for:</label><select id='mf' class='form-control' name='rfor'><option><b>Girls</b></option><option><b>Boys</b></option></select></div>";
        html +="<div class='md-form mb-5'><span class=''></span><b><input type='text' name='rtext' placeholder='write something about the room' id='orangeForm-name' class='form-control validate' value='"+s['rnote']+"' required></b></div>";
        html +="<div class='modal-footer'><button type='submit' name='addroom' class='btn btn-primary btn-lg' ><b style='font-size: 2em;'>Update</b></button> </div>";
         		}
              $('#suview').html(html);
        
               },
              	error:function(x) {
    			if (x.status==0) {
        		alert('You are offline!!\n Please Check Your Network.');
    			} else if(x.status==404) {
        		alert('Requested URL not found.');
    			} else if(x.status==500) {
        		alert('Internel Server Error.');
    			}  else {
        		alert('Unknow Error.\n'+x.responseText);
    			}
		   } 
         });
   
     });
});
</script>

  </body>
</html>
