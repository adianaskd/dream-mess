<?php 
                require("dAta.php");
                $sa=mysqli_real_escape_string($conn,$_POST['uname']);
 $sql="SELECT * FROM address WHERE c_a_fk=?";
     
                 $stmt=$conn->prepare($sql);
                  $stmt->bind_param('s',$sa);
                    $stmt->execute() ;
                    $result=$stmt->get_result();
                  $userp=array();
                  while($row=$result->fetch_assoc())
                  {
	
	                   /*$userp["city"] = $row['city'];
	                   $userp["munici"] =$row['municipality'];
                       $userp["hno"] = $row['h_no'];
	                   $userp["locality"] =$row['loclity'];
                       $userp["pincode"] = $row['pincode']; */
                       $sub_array = array(
	                   "rcity" => $row['city'],
	                   "munici" =>$row['municipality'],
                           "hno" => $row['h_no'],
	                   "locality" =>$row['loclity'],
                           "pincode" => $row['pincode']
	               );
	$userp[]=$sub_array;              
                } 
$result = array(
    "data" => $userp);
echo json_encode($result)
    ;
?>
