<?php
$servername = "localhost";
$username = "root";   // XAMPP/WAMP default user
$password = "";       // default empty password
$database = "library_db";    // your DB name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
} else {
    // echo "Connected Successfully"; // test ke liye uncomment kar sakte ho
}
?>