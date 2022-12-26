<?php
include("dAta.php");
  $sql = "SELECT * FROM room";
       $stmt=$conn->prepare($sql);
       $stmt->execute();
       $result=$stmt->get_result();
       $row = $result->fetch_assoc();
      

?>
