<?php 
                require("dAta.php");
                $sa=mysqli_real_escape_string($conn,$_POST['query']);
 $sql="SELECT * FROM room";
$ist='y';
     $sql1="SELECT i_name FROM r_image WHERE r_id=? AND istatus=?";
$sql3 = "SELECT * FROM room WHERE r_address LIKE '%".$sa."%' OR r_available LIKE '%$sa%' OR r_capacity LIKE '%$sa%'
OR rfor LIKE '%".$sa."%' OR rtype LIKE '%".$sa."%' OR r_price LIKE '%$sa%'";
              if($sa=="")
              {
                 $stmt=$conn->prepare($sql);
                    $stmt->execute() ;
                    $result=$stmt->get_result();
                  $stmt1=$conn->prepare($sql1);
                  $arus=array();
                  while($row=$result->fetch_assoc())
                  {
                      $rid=$row['r_id'];
                      $stmt1->bind_param('is',$rid,$ist);
                    $stmt1->execute() ;
                    $result1=$stmt1->get_result();
                      $row1=$result1->fetch_assoc();
                      $img="default.png";
                      if(mysqli_num_rows($result1)>0)
                          $img=$row1['i_name'];
	
	                   $sub_array = array(
	                   "rid" => $row['r_id'],
	                   "raddr" =>$row['r_address'],
                           "rsc" => $row['r_capacity'],
	                   "ravl" =>$row['r_available'],
                           "rfor" => $row['rfor'],
	                   "rprice" =>$row['r_price'],
                           "rtype"=> $row['rtype'],
                           "rimg"=>$img
	               );
	$arus[]=$sub_array;           
                      
                } }

else
     {
                 $stmt3=$conn->prepare($sql3);
                    
                    $stmt3->execute() ;
                    $result3=$stmt3->get_result();
                    
                  $stmt2=$conn->prepare($sql1);
                  $arus=array();
                    $i=0;
                  while($row=$result3->fetch_assoc())
                  {
                      $rid=$row['r_id'];
                      $stmt2->bind_param('is',$rid,$ist);
                    $stmt2->execute() ;
                    $result2=$stmt2->get_result();
                      $row1=$result2->fetch_assoc();
                      $img="default.png";
                      if(mysqli_num_rows($result2)>0)
                          $img=$row1['i_name'];
	
	                   $sub_array = array();
	                   $sub_array["rid"] = $row['r_id'];
	                   $sub_array["raddr"] =$row['r_address'];
                        $sub_array["rsc"] = $row['r_capacity'];
	                   $sub_array["ravl"] =$row['r_available'];
                          $sub_array["rfor"] = $row['rfor'];
	                   $sub_array["rprice"] =$row['r_price'];
                           $sub_array["rtype"]= $row['rtype'];
                           $sub_array["rimg"]=$img;
	              $arus[]=$sub_array;           
                      
                }
}
$result = array(
    "data" => $arus);
echo json_encode($result)
    ;

?>
   
               