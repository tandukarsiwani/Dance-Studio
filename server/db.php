<?php
$servername = "dancefusionstudio.infinityfreeapp.com"; 
$username = "if0_38085412";       
$password = "CXtTlcx0SVU8L";    
$dbname = "db_dancefusionstudio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
