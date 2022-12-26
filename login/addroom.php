<?php 
require('session_check.php');
    include("dAta.php");
    $user="";
    $lout="";
    if(isset($_SESSION['user_name']))
    {
        $lout="Logout";
    $login_session=$_SESSION['user_name'];
        if(isset($_POST['addroom'])) {
      // username and password sent from form 
            date_default_timezone_set("Asia/Kolkata");	
           $DateTime=date('Y-m-d h:i:s a',time());
      
      $rname = mysqli_real_escape_string($conn,$_POST['rname']);
      $raddr = mysqli_real_escape_string($conn,$_POST['raddr']); 
            $rcap = mysqli_real_escape_string($conn,$_POST['rsc']); 
            $ravl = mysqli_real_escape_string($conn,$_POST['rsavl']); 
            $rpri = mysqli_real_escape_string($conn,$_POST['rprice']); 
            $rtype = mysqli_real_escape_string($conn,$_POST['rtype']); 
            $rfor = mysqli_real_escape_string($conn,$_POST['rfor']); 
            $rfood = mysqli_real_escape_string($conn,$_POST['rfood']); 
            $rtext = mysqli_real_escape_string($conn,$_POST['rtext']); 
             if($raddr=="" || $rcap=="" || $ravl=="" || $rpri=="" || $rtype=="" || $rfor=="" || $rfood=="" || $rtext=="")
        {
             header("location:../profilea.php?result=".errorcheck);
        }
            else{
    $sql="INSERT INTO room (r_name,r_address,r_capacity,r_available,r_price,rtype,rfor,rfd,rnote,c_user_fk,r_date) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $stmt=$conn->prepare($sql);
       $stmt->bind_param('ssiiissssss',$rname,$raddr,$rcap,$ravl,$rpri,$rtype,$rfor,$rfood,$rtext,$login_session,$DateTime);
      
       $result= $stmt->execute();
       if($stmt)
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
    }
       ?>