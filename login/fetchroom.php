<?php 
                require("dAta.php");
                $sid=mysqli_real_escape_string($conn,$_POST['rid']);
 $sql="SELECT * FROM room WHERE r_id=?";
     
                 $stmt=$conn->prepare($sql);
                  $stmt->bind_param('i',$sid);
                    $stmt->execute() ;
                    $result=$stmt->get_result();
                  $userp=array();
                  while($row=$result->fetch_assoc())
                  {
                       $sub_array = array(
                           "rid"=>$row['r_id'],
	                   "rname" => $row['r_name'],
                           "raddr" => $row['r_address'],
                           "rcapa" => $row['r_capacity'],
                           "ravl" => $row['r_available'],
                           "rprice" => $row['r_price'],
                           "rtype" => $row['rtype'],
                           "rfor" => $row['rfor'],
                           "rfd" => $row['rfd'],
                           "rnote" => $row['rnote'],
	               );
	$userp[]=$sub_array;              
                } 
$result = array(
    "data" => $userp);
echo json_encode($result)
    ;
?>
