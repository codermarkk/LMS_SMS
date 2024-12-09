<?php
$servername = "localhost";
$username = "root"; // change as per your setup
$password = ""; // change as per your setup
$dbname = "lms_dashboard";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>