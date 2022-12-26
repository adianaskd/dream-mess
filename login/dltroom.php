<?php 
require('session_check.php');
    include("dAta.php");
    $user="";
    $lout="";
    if(isset($_SESSION['user_name']))
    {
        
    $login=$_SESSION['user_name'];
    
      // username and password sent from form 
      $filelocation="../img/room/";
      $rid = mysqli_real_escape_string($conn,$_GET['rid']);
            $getimg="SELECT i_name FROM r_image WHERE r_id=?";
        $gst=$conn->prepare($getimg);
        $gst->bind_param('i',$rid);
        $gst->execute();
        $gre=$gst->get_result();
        if(mysqli_num_rows($gre)>0)
                while($girow=$gre->fetch_assoc()){
            $file=$filelocation.$girow['i_name'];
if(file_exists($file))
{
	unlink($file);
    
}
        }
   
    $dltimg="DELETE FROM r_image WHERE r_id=?";
    $dltroom="DELETE FROM room WHERE r_id=?";
   
        $stmt=$conn->prepare($dltimg);
       $stmt->bind_param('i',$rid);
       $result= $stmt->execute();
            
            $stmt1=$conn->prepare($dltroom);
       $stmt1->bind_param('i',$rid);
       $result1= $stmt1->execute();
        
            
       if($result1)
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