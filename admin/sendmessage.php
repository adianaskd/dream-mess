<?php
include('../login/dAta.php');
include ('Session.php'); 
include ('Functions.php');
include('DateTime.php');

if(!isset($_SESSION['adminskd']))
        header("location:Login.php");

if(isset($_POST["Submit"]))
{
$phone=mysqli_real_escape_string($conn,$_POST["phone"]);
$msg=mysqli_real_escape_string($conn,$_POST["message"]);
date_default_timezone_set("Asia/Kolkata");	
$DateTime=date('Y-m-d h:i:s a',time());

if (empty($msg))
{
$_SESSION["ErrorMessage"] = "message NOT BE EMPTY";
Redirect_to("advetisercontact.php");
}
elseif (strlen($msg)<10)
{
$_SESSION["ErrorMessage"] = "message IS TOO SMALL";
Redirect_to("advetisercontact.php");
}
else
{
    $Queryu="UPDATE adminmsg SET m_status='n' WHERE m_u_fk='$phone'";
    $Executeu=mysqli_query($conn,$Queryu);
$Query="INSERT INTO adminmsg(message,date_time,m_status,m_u_fk) VALUES('$msg','$DateTime','y','$phone')";
$Execute=mysqli_query($conn,$Query);
if ($Execute) 
{
$_SESSION["SucessMessage"]="MESAAGE ADDED SUCCESSFULLY";
Redirect_to("advetisercontact.php");
}
else
{
$_SESSION["ErrorMessage"]="SOMETHING'S WENT WRONG";
Redirect_to("advetisercontact.php");

}	
}
}
?>