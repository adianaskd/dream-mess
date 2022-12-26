<?php  
include('../login/dAta.php');
include ('Session.php'); 
include ('Functions.php');
$Admin=$_SESSION['adminskd'];
if(!isset($_SESSION['adminskd']))
        header("location:Login.php");
$stad="SELECT status FROM reg WHERE username='$Admin'";
					
						$Exestatus=mysqli_query($conn,$stad);
						while ($Datast=mysqli_fetch_array($Exstatus)) 
						{
							$admin_st=$Datast["status"];
                        }
if($admin_st==0)
{
     $_SESSION["ErrorMessage"] = "you are not main admin";
Redirect_to("Admins.php"); 
    
}
if (isset($_GET["id"])) 
{
	$IdFromURL=$_GET["id"];
	$Query="DELETE FROM reg WHERE id='$IdFromURL'";
	$Execute=mysqli_query($conn,$Query);
	if ($Execute) 
	{
		$_SESSION["SucessMessage"]="ADMIN DELETED SUCCESSFULLY";
		Redirect_to("Admins.php");
	}
	else
	{
		$_SESSION["ErrorMessage"]="SOMETHING WENT WRONG !!! TRY AGAIN";
		Redirect_to("Admins.php");
	}
}
?>