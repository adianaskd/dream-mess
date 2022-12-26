<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli("localhost","root","","dream");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 