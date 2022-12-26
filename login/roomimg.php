<?php

 session_start();
    require('dAta.php');
   $Destination = '../img/room';
if(isset($_SESSION['user_name']))
{
    $roomid=mysqli_real_escape_string($conn,$_POST['roomid']);
if(isset($_POST['upload']))
{
            if(!isset($_FILES['skdtanmoy']) || !is_uploaded_file($_FILES['skdtanmoy']['tmp_name'])){
            $NewImageName= 'default.jpg';
                 header('location:../profilea.php?result=error');
        }
        else{
            $st='n';
            $usql="UPDATE r_image SET istatus=? WHERE r_id=?";
            $ust=$conn->prepare($usql);
            $ust->bind_param('si',$st,$roomid);
            $ust->execute();
            $iname=basename($_FILES["skdtanmoy"]["name"]);
            $RandomNum = rand(1,99999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES["skdtanmoy"]["name"]));
            $ImageType = $_FILES["skdtanmoy"]["type"];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES["skdtanmoy"]["tmp_name"], "$Destination/$NewImageName");
    $stat='y';
    $sql="INSERT INTO r_image(i_name,r_id,istatus) VALUES(?,?,?)";
    $stmt=$conn->prepare($sql);
       $stmt->bind_param('sis', $NewImageName,$roomid,$stat);
       $stmt->execute();
 if($stmt)
    {
        header('location:../profilea.php?result=succes');
       
    }
    else
         header('location:../profilea.php?result=error');
   
} }
}
?>