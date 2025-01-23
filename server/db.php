<?php
$servername = "sql309.infinityfree.com"; 
$username = "if0_38085412";       
$password = "CXtTlcx0SVU8L";    
$dbname = "if0_38085412_db_dancefusionstudio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
