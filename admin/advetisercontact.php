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
	<title>admin panel</title>
	<meta name="VIEWPORT" content="WIDTH=DEVICE-WIDTH, INITIAL-STATE=1" />
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/adminpanelcss.css">
  
</head>
<body>
	<div style="height: 10px; background: #27aae1;"></div>
<nav class="navbar navbar-inverse" role="navigation">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
	<span class="sr-only">Toggle Navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="Blog.php">
	<h2 style="margin-top: -4px;">DREAM-MESS</h2>
</a>	
</div>
<div class="collapse navbar-collapse" id="collapse">	
<ul class="nav navbar-nav">
	<li style="margin-top:5px;font-weight: bold;font-size: 1.2em;font-family:bitter,Georgia,Times New Roman,serif;">
		<a href="../index.php">HOME</a></li>
	<li style="margin-top: 5px;font-weight: bold;font-size: 1.2em;font-family:bitter,Georgia,Times New Roman,serif;">
		<a href="../aboutus.html">ABOUT US</a></li>
	<li style="margin-top: 5px;font-weight: bold;font-size: 1.2em;font-family:bitter,Georgia,Times New Roman,serif;">
		<a href="../contact.php">CONTACT US</a></li>
</ul>

</div>
</div>		
</nav>
<div class="Line" style="height: 10px; background: #27aae1; margin-top: -20px;"></div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<h1>Admin:<b style="color:#FF26DB;"><?php echo $Admin?></b></h1>
				<ul id="side_menu" class="nav nav-pills nav-stacked">
                    <li><a href="Admindashbord.php"><span class="glyphicon glyphicon-list-alt"> Admin home</span></a></li>
					
                    <li class="active"><a href="#"><span class="glyphicon glyphicon-list-alt"> CONTACT ADVETISER</span></a></li>
					<li><a href="Admins.php"><span class="glyphicon glyphicon-user"> Mannage_Admin</span></a></li>
					<li><a href="../login/signout.php" ><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
                    
				</ul>
			</div><!--end of side area---->
			<div class="col-sm-9">
                
				<div>
				<?php 
				echo Message();
				echo SucessMessage();
				?>
				</div>
				<h1>All Mess Owner</h1>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>Sr.No</th>
						<th>ADVETISER</th>
						<th>EMAIL</th>
						<th>PHONE NO</th>
                        <th>CONTACT</th>
                        <th>DELETE</th>
					</tr>
					<?php 
						
						$ViewQuery="SELECT firstname,lastname,email,phno FROM customer1";
						$SrNo=0;
						$Execute=mysqli_query($conn,$ViewQuery);
						while ($DataRow=mysqli_fetch_array($Execute)) 
						{
							$name=$DataRow["firstname"];
                            $email=$DataRow["email"];
                            $phone=$DataRow["phno"];
							$SrNo++;
					?>
					<tr>
					<td><?php echo $SrNo; ?></td>
					<td style="color: darkblue;font-weight: bold;"><?php if (strlen($name)>15) 
					{
						$name=substr($name,0,15).'...';
					}
					echo $name; 
					?></td>
					<td style="color: darkblue;font-weight: bold;"><?php echo $email; ?></td>
                        <td style="color: darkblue;font-weight: bold;"><?php echo $phone; ?></td>
                        <td>
                        <a href='replytoadv.php?data=<?php echo $phone?>' >contact</a>
                        </td>
                         <td>
                        <a href='accountdelete.php?email=<?php echo $email ?>'>Delete</a>
                        </td>
					
				</tr>
			<?php } ?>
				</table>
			</div>	
			</div><!-----end of main area----->
		</div><!---end of row---->
	</div><br><br><br><br><br><br><br>
    
    <!---end of container----->
	<div id="footer">
		<hr><p>design By | <b>dream_mess</b> | &copy;2019</p>
	</div>
<div style="height: 10px; background: #27aae1;"></div>
    
</body>
</html>