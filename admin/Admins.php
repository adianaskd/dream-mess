<?php
include('../login/dAta.php');
include ('Session.php'); 
include ('Functions.php');
$Admin=$_SESSION['adminskd'];
if(!isset($_SESSION['adminskd']))
        header("location:Login.php");
if(isset($_POST["Submit"]))
{
    $stad="SELECT status FROM reg WHERE username='$Admin'";
					
						$Exestatus=mysqli_query($conn,$stad);
						while ($Datast=mysqli_fetch_array($Exstatus)) 
						{
							$admin_st=$Datast["status"];
                        }
$Username=mysqli_real_escape_string($conn,$_POST["Username"]);
$Password=mysqli_real_escape_string($conn,$_POST["Password"]);
$ConfirmPassword=mysqli_real_escape_string($conn,$_POST["ConfirmPassword"]);
date_default_timezone_set("Asia/Kolkata");	
$CurrentTime=time();
$DateTime=strftime("%B-%d-%Y  %H:%M:%S",$CurrentTime);

$DateTime;

if (empty($Username)||empty($Password)||empty($ConfirmPassword))
{
$_SESSION["ErrorMessage"] = "ALL FILL MUST BE FILL OUT";
Redirect_to("Admins.php");
}
elseif (strlen($Password)<5)
{
$_SESSION["ErrorMessage"] = "TOO SMALL PASSWORD";
Redirect_to("Admins.php");
}
elseif($Password!==$ConfirmPassword)
{
$_SESSION["ErrorMessage"] = "PASSWORD DOES NOT MATCH";
Redirect_to("Admins.php");
}
elseif($admin_st==0)
{
   $_SESSION["ErrorMessage"] = "you are not main admin";
Redirect_to("Admins.php"); 
}
else
{
    $admin_st=0;
$Query="INSERT INTO reg(datetime,username,addedby,pa,status) VALUES(?,?,?,?,?)";
 $inadmin=$conn->prepare($Query);
       $inadmin->bind_param('ssssi',$DateTime,$Username,$Admin,$Password,$admin_st);
      $Execute=$inadmin->execute();
      
      
if($Execute) 
{
$_SESSION["SucessMessage"]="ADMIN ADDED SUCCESSFULLY";
Redirect_to("Admins.php");
}
else
{
$_SESSION["ErrorMessage"]="FALIED TO ADD ADMIN";
Redirect_to("Admins.php");
}	
}
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Mannage Admins</title>
	<meta name="VIEWPORT" content="WIDTH=DEVICE-WIDTH, INITIAL-STATE=1" />
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/adminpanelcss.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<h1>Admin:<b style="color:#EEFF0A;"><?php echo $Admin?></b></h1>
				<ul id="side_menu" class="nav nav-pills nav-stacked">
					<li><a href="Admindashbord.php"><span class="glyphicon glyphicon-th"> Admin Home</span></a></li>
					<li class="active"><a href="Admins.php"><span class="glyphicon glyphicon-user"> Mannage_Admin</span></a></li>
					<li><a href="../login/signout.php"><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
				</ul>
			</div><!--end of side area---->
			<div class="col-sm-9">
				<h2>ADD NEW ADMIN</h2>
				<?php 
				echo Message();
				echo SucessMessage();
				?>
				<div>
					<form action="Admins.php" method="Post">
						<fieldset>
							<div class="form-group">
								<label for="Username">USER NAME</label>
								<input class="form-control" type="text" name="Username" id="Username" placeholder="User name">
							</div>
							<div class="form-group">
								<label for="Password">PASSWORD</label>
							<input class="form-control" type="Password" name="Password" id="Password" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="ConfirmPassword">CONFIRM PASSWORD</label>
										<input class="form-control" type="Password" name="ConfirmPassword" id="ConfirmPassword" placeholder="Confirm Password">
							</div>
							<input class="btn btn-success btn-lg btn-block" type="Submit" name="Submit" value="ADD NEW ADMIN">
							<br>
						</fieldset>
					</form>
				</div>
				<div  class="table-responsive">
					<table class="table table-striped table-hover">
						<tr>
							<th>SL. NO.</th>
							<th>DATE & TIME</th>
							<th>ADMIN NAME</th>
							<th>ADDED BY</th>
							<th>ACTION</th>
						</tr>
						<?php
						
						$ViewQuery="SELECT * FROM `reg`";
						$Execute=mysqli_query($conn,$ViewQuery);
						$srNo=0;
                        
						while ($DataRows=mysqli_fetch_array($Execute))
						{
                            
						$ID=$DataRows["id"];
						$DateTime=$DataRows["datetime"];
						$UserName=$DataRows["username"];
						$AddedBy=$DataRows["addedby"];
						$srNo++;	
                            if($Admin==$UserName)
                                continue;
						?>
						<tr>
							<td><?php  echo $srNo; ?></td>
							<td><?php  echo $DateTime; ?></td>
							<td><?php  echo $UserName; ?></td>
							<td><?php  echo $AddedBy; ?></td>
							<td>
								<a href="DeleteAdmin.php?id=<?php echo $ID; ?>">
									<span class="btn btn-danger">
										DELETE
									</span>
								</a>
							</td>
						</tr>
					<?php } ?>
					</table>
				</div>
			</div><!-----end of main area----->
		</div><!---end of row---->
	</div><!---end of container----->
	<div id="footer">
		<hr><p>design By | <b>tanmoycsk99</b> | &copy;2019</p>
	</div>
	<div style="height: 10px; background: #27aae1;"></div>
</body>
</html> 