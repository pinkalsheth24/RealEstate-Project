<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

$conn = new mysqli($servername, $username, $password, $database);//create the connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);//check connection
}
?>
