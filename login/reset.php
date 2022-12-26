<?php

    require("dAta.php");

    session_start();
   $error ="";
   if(isset($_POST['forgot'])) {
      
      
      $username = mysqli_real_escape_string($conn,$_POST['uname']);
      $ph = mysqli_real_escape_string($conn,$_POST['uphone']); 
      
       $sql = "SELECT password FROM customer1 WHERE username =? and phno = ?";
       $stmt=$conn->prepare($sql);
       $stmt->bind_param('ss',$username,$ph);
       $stmt->execute();
       $result=$stmt->get_result();
       $row = $result->fetch_assoc();
		if(mysqli_num_rows($result) > 0){
			$_SESSION['pass']=$row['password'];
            $aru="success";
		    header("location:../profilea.php?result=".aru);
		}else {
			$error = "resetwrong";
             header("location:alogin.php?result=".error);
			exit();
      }
      
	  }
		
	  
?>