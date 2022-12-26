
<?php
include ('Session.php'); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<meta name="VIEWPORT" content="WIDTH=DEVICE-WIDTH, INITIAL-STATE=1" />
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/adminpanelcss.css">
	<style>
		body
		{
			background-color: white;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-offset-4 col-md-4">
				<br><br><br><br>
				<?php 
				echo Message();
				echo SucessMessage();
				?>
				<h3 style=" color:red; font-family:courier; font-size:40px; "><b>!!!Only For Admins!!!</b></h3>
				
				<div>
					<form action="adminlogin.php" method="post">
						<fieldset>
							<div class="form-group">
							<label for="Username">USER NAME</label>
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-envelope text-primary"></span>
								</span>
							<input class="form-control" type="text" name="Username" id="Username" placeholder="User name">
							</div>
							</div>
							<div class="form-group">
							<label for="Password">PASSWORD</label>
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-lock text-primary"></span>
								</span>
							<input class="form-control" type="Password" name="Password" id="Password" placeholder="Password">
							
							</div>
							</div>
							<input class="btn btn-primary btn-lg btn-block" type="Submit" name="Submit" value="LOG IN">
							<br>
						</fieldset>
					</form>
				</div>
							</div><!-----end of main area----->
		</div><!---end of row---->
	</div><!---end of container----->
	
</body>
</html> 