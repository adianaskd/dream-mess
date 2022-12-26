<?php
include('../login/dAta.php');
include ('Session.php'); 

include ('Functions.php');

if(isset($_POST["Submit"]))
{
$Username=mysqli_real_escape_string($conn,$_POST["Username"]);
$Password=mysqli_real_escape_string($conn,$_POST["Password"]);
if (empty($Username)||empty($Password))
{
$_SESSION["ErrorMessage"] = "ALL FILLED MUST BE FILL OUT";
Redirect_to("Login.php");
}
else
{
$Query="SELECT * FROM reg WHERE username=? AND pa=?";
$aru=$conn->prepare($Query);
$aru->bind_param('ss',$Username,$Password);
$aru->execute();
$skd=$aru->get_result();

if (mysqli_num_rows($skd)>0) {
    $_SESSION['adminskd'] = $Username;
	header("location:Admindashbord.php");
}
else
{
header("location:Login.php");
	
}
}	
}

?>
