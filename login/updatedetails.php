<?php 
require('session_check.php');
    include("dAta.php");
    
    if(isset($_SESSION['user_name']))
    {
        
    $username=$_SESSION['user_name'];
        if(isset($_POST['aditi'])) {
      $ucity = mysqli_real_escape_string($conn,$_POST['ucity']);
      $umc = mysqli_real_escape_string($conn,$_POST['umc']); 
            $uroad= mysqli_real_escape_string($conn,$_POST['uroad']); 
            $ulocal = mysqli_real_escape_string($conn,$_POST['ulocal']); 
            $upin = mysqli_real_escape_string($conn,$_POST['upin']); 
             if($ucity=="" || $umc=="" || $uroad=="" || $upin=="")
                 echo $uroad;
            else{
    $sql="UPDATE address SET city=?,municipality=?,h_no=?,loclity=?,pincode=? WHERE c_a_fk=?";
        $stmt=$conn->prepare($sql);
       $stmt->bind_param('ssssss',$ucity,$umc,$uroad,$ulocal,$upin,$username);
      
       $result= $stmt->execute();
       if($stmt)
       {
           $success="insert_detail";
           header("location:../profilea.php?result=".$success);
       }
            else
            {
           $error="no_detail";
             header("location:../profilea.php?result=".$error);
			exit();
            }
       }
        }
    }
       ?>