<?php
   include('connect.php');
   if(session_status()==PHP_SESSION_NONE)
    session_start();
   
   $user_check = $_SESSION['user_name'];
   
   $ses_sql = mysqli_query($conn,"select userid from admin where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['userid'];
   //echo "you are in session.php page";
  
?>