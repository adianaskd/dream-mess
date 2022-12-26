<?php

 session_start();
    require('login/dAta.php');
   $Destination = 'img/user';
 $login_session=$_SESSION['user_name'];
    $asql="select phno from customer1 where username=?";
        $stmt=$conn->prepare($asql);
       $stmt->bind_param('s',$login_session);
       $stmt->execute();
       $result=$stmt->get_result();
       $row = $result->fetch_assoc();
		if(mysqli_num_rows($result) > 0){
          $ph= $row['phno'];
    }
if(isset($_POST['bimage']))
{
            if(!isset($_FILES['uimage']) || !is_uploaded_file($_FILES['uimage']['tmp_name'])){
            $NewImageName= 'default.jpg';
                 header('location:profilea.php?result=ierror');
        }
        else{
            $st='n';
            $usql="UPDATE u_image SET u_status=? WHERE userfk=?";
            $ust=$conn->prepare($usql);
            $ust->bind_param('ss',$st,$ph);
            $ust->execute();
            $iname=basename($_FILES["uimage"]["name"]);
            $RandomNum = rand(1,99999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES["uimage"]["name"]));
            $ImageType = $_FILES["uimage"]["type"];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES["uimage"]["tmp_name"], "$Destination/$NewImageName");
        
        

    $username=$_SESSION['user_name'];
    $stat='y';
    $sql="INSERT INTO u_image (u_n_name,userfk,u_status) VALUES(?,?,?)";
    $stmt=$conn->prepare($sql);
       $stmt->bind_param('sss', $NewImageName,$ph,$stat);
       $stmt->execute();
            $filelocation="img/user/";
            $getimg="SELECT u_n_name FROM u_image WHERE userfk=? AND u_status='n'";
            $getstmt=$conn->prepare($getimg);
       $getstmt->bind_param('s',$ph);
       $getstmt->execute();
            $getre=$getstmt->get_result();
            $getrow=$getre->fetch_assoc();
            if(mysqli_num_rows($getre)>0)
                while($getrow=$getre->fetch_assoc()){
            $file=$filelocation.$getrow['u_n_name'];
if(file_exists($file))
{
	unlink($file);
    
}
        }
   
    if($stmt)
    {
        header('location:profilea.php?result=succes');
       
    }
    else
         header('location:profilea.php?result=error');
                    }

}
?>