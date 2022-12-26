<?php
    session_start();
    require('dAta.php');

    
    if(isset($_POST['signup']))
    {
        
        $email=mysqli_real_escape_string($conn,$_POST['semail']);
        //$userid=$_REQUEST['user_id'];
        $firstname=mysqli_real_escape_string($conn,$_POST['sfname']);
        $lastname=mysqli_real_escape_string($conn,$_POST['slname']);
        $uname=mysqli_real_escape_string($conn,$_POST['suser']);
        $phone=mysqli_real_escape_string($conn,$_POST['sphnumber']);
        $password=mysqli_real_escape_string($conn,$_POST['spass']);
         if($firstname=="" || $password=="" || $email=="" || $lastname=="" || $uname=="" || $phone=="")
        {
             header("location:alogin.php?result=".errorcheck);
        }
        else
        {
        $sql="INSERT INTO customer1(firstname,lastname,username,email,phno,password) VALUES('$firstname','$lastname','$uname','$email','$phone','$password')";
        //$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $statement = $conn->prepare($sql);
       $result= $statement->execute();
       // header( "refresh:5;url=alogin.php" );
                if($result){
                    $success="upsuccess";
             header( "location:alogin.php?result=".upsuccess );
        }
        else{
            $error="uperror";
             header( "location:alogin.php?result=".uperror );
        }
        }
    }
?>