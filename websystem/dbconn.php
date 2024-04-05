<?php
$servername = "localhost";
$name = "root"; // Username from the user table
$password = ""; // Password from the user table
$dbname = "snookerbooking";

$conn = new mysqli($servername, $name, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
