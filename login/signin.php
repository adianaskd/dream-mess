<?php

    require("dAta.php");

    session_start();
   $error ="";
   if(isset($_POST['signin'])) {
      
      
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
        if($username=="" || $password=="")
        {
             header("location:alogin.php?result=".errorcheck);
        }
       else
       {
       $sql = "SELECT * FROM customer1 WHERE username =? and password = ?";
       $stmt=$conn->prepare($sql);
       $stmt->bind_param('ss',$username,$password);
       $stmt->execute();
       $result=$stmt->get_result();
       $row = $result->fetch_assoc();
      
           
		if(mysqli_num_rows($result) > 0){
			$_SESSION['user_name'] = $username;
           
			// $error="You loged in success fully";
		    header("location:../profilea.php");
			
		}else {
			
             header("location:alogin.php?result=".errorp);
			exit();
      }
       }
      
	  }
		
	  
?>