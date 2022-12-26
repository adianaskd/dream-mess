


<?php
include('../login/dAta.php');
include ('Session.php');
include ('Functions.php');
$Admin=$_SESSION['adminskd'];
if(!isset($_SESSION['adminskd']))
        header("location:Login.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>add a message</title>
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
				<h1>Admin:<b style="color:#00FFE6;"><?php echo $Admin?></b></h1>
				<ul id="side_menu" class="nav nav-pills nav-stacked">
					<li><a href="Admindashbord.php"><span class="glyphicon glyphicon-th"> DashBord</span></a></li>
					<li class="active"><a href="AddNewPost.php"><span class="glyphicon glyphicon-list-alt"> Add New Post</span></a></li>
					<li><a href="Blog.php"><span class="glyphicon glyphicon-equalizer"> Blogs</span></a></li>
					<li><a href="#"><span class="glyphicon glyphicon-user"> Mannage_Admin</span></a></li>
					<li><a href="#"><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
				</ul>
			</div><!--end of side area---->
			<div class="col-sm-9">
				<h2>SEND MESSAGE TO MESS OWNER</h2>
                <?php
                        $phoneno=$_GET['data'];
                        ?>
				<div>
					<form action="sendmessage.php" method="post">
						<fieldset>
                            <input type="text" name="phone" value="<?php echo $phoneno ?>">
							<div class="form-group">
								<label for="title">Enter the message..</label>
								<input class="form-control" type="text" name="message" id="title" placeholder="type message">
							</div>
							<input class="btn btn-success btn-lg btn-block" type="Submit" name="Submit" value="SEND MESSAGE">
							<br>
						</fieldset>
					</form>
				</div>
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