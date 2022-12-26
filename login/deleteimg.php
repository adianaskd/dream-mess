<?php 
require('session_check.php');
    include("dAta.php");
    $user="";
    $lout="";
    if(isset($_SESSION['user_name']))
    {
        
    $login=$_SESSION['user_name'];
        $rimg=$_GET['iname'];
    
      // username and password sent from form 
      $filelocation="../img/room/";
      $rid = mysqli_real_escape_string($conn,$_GET['rid']);
            $dltimg="DELETE FROM r_image WHERE i_name=?";
        $gst=$conn->prepare($dltimg);
        $gst->bind_param('s',$rimg);
                $gre=$gst->execute();
    
            $file=$filelocation.$rimg;
if(file_exists($file))
{
	unlink($file);
    
}
       
   
            
       if($gre)
       {
           $success="dsc";
           header("location:../profilea.php?result=".success);
       }
            else
            {
           $error="error";
             header("location:../profilea.php?result=".error);
            }
			
        }
    
       ?>