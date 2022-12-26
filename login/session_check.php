<?php
if(session_status()==PHP_SESSION_NONE)
    session_start();

require('dAta.php');

if(!isset($_SESSION['user_name']))
        header("location:login/alogin.php");


?>