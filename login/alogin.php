<!DOCTYPE html>
<html lang="en" >

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="css/style.css">
<!-- Bootstrap core CSS -->
  <link href="../modal/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../modal/css/mdb.min.css" rel="stylesheet">
  <!-- sweet alert css-->
    <link href="../swtalert/sweetalert2.min.css" rel="stylesheet">
</head>
<style>
  body{
    background-color:rgba(40,57,101,.9);
  }
.login-wrap
{
  background-color:rgba(40,57,101,.9);
  width: 100%;
  height: 100%;
} 
.login-html
{
  background-color:rgba(40,57,101,.9);
} 
a:hover
{
  font-weight: bold;
  font-size: 1.8em;
}
</style>
<body bgcolor="rgba(40,57,101,.9);">

   <?php 
    session_start();
      if(isset($_GET['result']))
     {
          if($_GET['result']=='errorcheck')
         { ?>

              <script type="text/javascript">
              setTimeout(function () { 
                  swal({title:"!ERROR!",
                        text:"Please enter the all field",
                        type:"error",
                       timer: 4000});
              }, 500);
            </script>;
        <?php }
         else if($_GET['result']=='success')
         { ?>

              <script type="text/javascript">
              setTimeout(function () { 
                  swal({title:"SUCCESS!",
                        text:"<?php echo $_SESSION['pass']; ?>",
                        type:"success",
                       timer: 2000});
              }, 500);
            </script>;
        <?php }
          else if($_GET['result']=='upsuccess')
         { ?>

              <script type="text/javascript">
              setTimeout(function () { 
                  swal({title:"SUCCESS!",
                        text:"your account is created",
                        type:"success",
                       timer: 2000});
              }, 500);
            </script>;
        <?php }
          else if($_GET['result']=='uperror')
         { ?>

              <script type="text/javascript">
              setTimeout(function () { 
                  swal({title:"!ERROR!",
                        text:"sorry!something wrong!",
                        type:"error",
                       timer: 2000});
              }, 500);
            </script>;
        <?php }
        else if($_GET['result']=='errorp')
         { ?>
        <script type='text/javascript'>
           setTimeout(function () {
           Swal({
                type: 'error',
                title: '!Oops....!',
                text: 'username and Password did not match!',
                timer: 2000
                });
                }, 500);
          </script>
       <?php }
         }
    ?>
  <div class="login-wrap">
<div class="login-html">
   <center><h2 style="font-weight: bold;color: white;"></h2></center><br>   
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"><b style="font-size: 1.2em;font-weight: bold;">Sign In</b></label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"><b style="font-size: 1.2em;font-weight: bold;">Sign Up</b></label>
        
		<div class="login-form">
			<div class="sign-in-htm">
                 <form name="signin" action="signin.php" method="post">
				<div class="group">
                   
					<label for="user"  class="label">Username</label>
					<input id="user" name="username" type="text" class="input" required>
				</div>
				
				<div class="group">
					<label for="pass"  class="label">Password</label>
					<input id="pass" name="password" type="password" class="input" data-type="password" required>
				</div>
				
					<div class="group">
				  <div align="center"><button type="submit" class="button"  name="signin">Sign In</button>
			        </div>
				</div>
                </form>
				<div class="hr"></div>
       
				<div class="foot-lnk">
					<a href="" class=" mb-4" data-toggle="modal" data-target="#modalLoginForm"><b style="font-weight: bold;color: white;">Forgot Password?</b></a></div>
			</div>
            <form class="label" action="signup.php" method="post">
			<div class="sign-up-htm">
                
                <div class="group">
					<label for="fname" class="label">Firstname</label>
					<input id="fname" name="sfname" type="text" class="input" placeholder="first name" required>
				</div>
                <div class="group">
					<label for="lnme" class="label">Lastname</label>
					<input id="flnm" name="slname" type="text" class="input" placeholder="last name" required>
				</div>
				<div class="group">
					<label for="uname" class="label">Username</label>
					<input id="uname" name="suser" type="text" class="input" placeholder="user name" required>
				</div>
				
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="spass" name="spass" type="password" class="input" data-type="password" placeholder="must be greater than 8" required>
				</div>
				<div class="group">
					<label for="email"  class="label">Email</label>
					<input id="email" name="semail" type="email" class="input" placeholder="enter your email" required>
				</div>
				<div class="group">
					<label for="ph"  class="label">Phone Number</label>
					<input id="ph" name="sphnumber" type="tel"  maxlength="10" placeholder="enter your mobile number" class="input" required>
				</div>
				
				<div class="group">
				  <div align="center">
                      <button type="submit" name="signup" class="button"  >Sign Up</button>
			        </div>
				</div>
				<!--<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>-->
                
			</div>
                </form> 
           
		</div>
	</div>
        
</div>
  
 
             <!-- Start your project here-->
  <div  class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog"  role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Forget Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form name="forgot" action="reset.php" method="post" id="aditi">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="text" id="defaultForm-email" name="uname" class="form-control validate">
          <label for="defaultForm-email">Enter Your User Name</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="text" name="uphone" id="defaultForm-pass" class="form-control validate">
          <label  for="defaultForm-pass">Your mobile number</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" name="forgot" class="btn btn-default">get password</button>
      </div>
            </form>
    </div>
  </div>
</div>

<!--Start your project here-->
  
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="../modal/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../modal/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../modal/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../modal/js/mdb.js"></script>
<script>
    $('#spass').on('blur', function(){
    if(this.value.length < 8){ // checks the password value length
       alert('You have entered less than 8 characters for password');
       $(this).focusin(); // focuses the current field.
       return false; // stops the execution.
    }
        
});
    </script>
    <script>
        $('#ph').on('blur', function(){
    if(this.value.length!=10){ // checks the password value length
       alert('mobile number must be 10 digits');
       $(this).focusin(); // focuses the current field.
       return false; // stops the execution.
    } });
 </script>
</body>
<!-- sweet alert-->
    <script src="../swtalert/sweetalert2.min.js"></script>
</html>
