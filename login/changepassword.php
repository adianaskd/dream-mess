<?php

    require("dAta.php");

    session_start();
   if(isset($_SESSION['user_name']))
    {
        
    $username=$_SESSION['user_name'];
   if(isset($_POST['change'])) {
      
      
      $oldp = mysqli_real_escape_string($conn,$_POST['old']);
      $newp= mysqli_real_escape_string($conn,$_POST['new']); 
      
        if($oldp=="" || $newp=="")
        {
             header("location:../profilea.php?result=".errorchange);
        }
       else
       {
       $sql = "SELECT password FROM customer1 WHERE username =?";
       $stmt=$conn->prepare($sql);
       $stmt->bind_param('s',$username);
       $stmt->execute();
       $result=$stmt->get_result();
       $row = $result->fetch_assoc();
		if(mysqli_num_rows($result) > 0){
			$password=$row['password'];
            if($password==$oldp)
            {
                $cp="UPDATE customer1 SET password=? WHERE username=?";
                $cps=$conn->prepare($cp);
                $cps->bind_param('ss',$newp,$username);
                $cpr=$cps->execute();
                if($cpr)
                header("location:../profilea.php?result=".suchange);    
                
            }
            else
                header("location:../profilea.php?result=".echange);
			
		}
       }
      
	  }
   }
	  
?>