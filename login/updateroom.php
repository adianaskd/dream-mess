<?php 
require('session_check.php');
    include("dAta.php");
    if(isset($_SESSION['user_name']))
    {
        date_default_timezone_set("Asia/Kolkata");	
           $DateTime=date('Y-m-d h:i:s a',time());
        if(isset($_POST['addroom'])) {
      $rid=mysqli_real_escape_string($conn,$_POST['rid']);
      $rname = mysqli_real_escape_string($conn,$_POST['rname']);
      $raddr = mysqli_real_escape_string($conn,$_POST['raddr']); 
            $rcap = mysqli_real_escape_string($conn,$_POST['rsc']); 
            $ravl = mysqli_real_escape_string($conn,$_POST['rsavl']); 
            $rpri = mysqli_real_escape_string($conn,$_POST['rprice']); 
            $rtype = mysqli_real_escape_string($conn,$_POST['rtype']); 
            $rfor = mysqli_real_escape_string($conn,$_POST['rfor']); 
            $rfood = mysqli_real_escape_string($conn,$_POST['rfood']); 
            $rtext = mysqli_real_escape_string($conn,$_POST['rtext']); 
    $sql="UPDATE room SET r_name=?,r_address=?,r_capacity=?,r_available=?,r_price=?,rtype=?,rfor=?,rfd=?,rnote=?,r_date=? WHERE r_id=?";
        $stmt=$conn->prepare($sql);
       $stmt->bind_param('ssiiissssi',$rname,$raddr,$rcap,$ravl,$rpri,$rtype,$rfor,$rfood,$rtext,$DateTime,$rid);
      
       $result= $stmt->execute();
       if($result)
       {
           $success="inserted";
           header("location:../profilea.php?result=".$success);
       }
            else
            {
           $error="not inserted";
             header("location:../profilea.php?result=".$error);
			exit();
            }
        }
    }
       ?>