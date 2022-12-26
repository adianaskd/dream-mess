<?php 
    include("../login/dAta.php");
    include ('Session.php');
    
if(!isset($_SESSION['adminskd']))
        header("location:Login.php");
else{
    
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($conn,$_GET['email']);
        $dataadv1="SELECT username,phno FROM customer1 WHERE email=?";
            $datast1=$conn->prepare($dataadv1);
       $datast1->bind_param('s',$email);
        $datast1->execute();
         $datare=$datast1->get_result();
                while($datar1=$datare->fetch_assoc())
                {
                    $uphno=$datar1['phno'];
                    $username=$datar1['username'];
                }
    $dltimg="DELETE FROM r_image WHERE r_id=?";
    $dltroom="DELETE FROM room WHERE c_user_fk=?";
        $dltaddress="DELETE FROM address WHERE c_a_fk=?";
        $dltuimage="DELETE FROM u_image WHERE userfk=?";
        $dltadve="DELETE FROM customer1 WHERE username=?";
    $dataadv2="SELECT r_id FROM room WHERE c_user_fk=?";
    $datast2=$conn->prepare($dataadv2);
       $datast2->bind_param('s',$username);
        $datast2->execute();
         $datare1=$datast2->get_result();
     if(mysqli_num_rows($datare1) > 0)
   {
     
                while($datar2=$datare1->fetch_assoc())
                {
                    echo "hello";
                    $urmid=$datar2['r_id'];
    
     $stmt=$conn->prepare($dltimg);
       $stmt->bind_param('i',$urmid);
       $result= $stmt->execute();
             }
            $stmt1=$conn->prepare($dltroom);
       $stmt1->bind_param('s',$username);
       $result1= $stmt1->execute();
        
  
     }
    $stmt2=$conn->prepare($dltaddress);
       $stmt2->bind_param('s',$username);
       $result2= $stmt2->execute();
            
            $stmt3=$conn->prepare($dltuimage);
       $stmt3->bind_param('s',$uphno);
       $result3= $stmt3->execute();
    
    $stmt4=$conn->prepare($dltadve);
       $stmt4->bind_param('s',$username);
       $result4= $stmt4->execute();
    
       if($result4)
       {
           $success="dsc";
           header("location:advetisercontact.php?result=".success);
            header("location:advetisercontact.php?result=".error);
       }
            else
            {
           $error="error";
            
            }
			
       } 
    
       ?>