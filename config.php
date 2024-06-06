<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventhub";
$port = 3307;

$conn = new mysqli($servername,$username,$password,$dbname,$port);

if ($conn->connect_error){
    die("connection failed: ". $conn->connect_error);
}
?>