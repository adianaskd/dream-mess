<?php 
    include("dAta.php");
    
    
        if(isset($_POST['aru'])) {
      // username and password sent from form 
      
      $name = mysqli_real_escape_string($conn,$_POST['name']);
      $email = mysqli_real_escape_string($conn,$_POST['email']); 
            $phone = mysqli_real_escape_string($conn,$_POST['subject']); 
            $msg = mysqli_real_escape_string($conn,$_POST['message']);
    $sql="INSERT INTO contact (cname,cemail,cphno,ctext) VALUES(?,?,?,?)";
        $stmt=$conn->prepare($sql);
       $stmt->bind_param('ssss',$name,$email,$phone,$msg);
      
       $result= $stmt->execute();
       if($stmt)
       {
           $success="inserted";
           header("location:../contact.php?result=".$success);
       }
            else
            {
           $error="not inserted";
             header("location:../contact.php?result=".$error);
			exit();
            }
       }
    
       ?>