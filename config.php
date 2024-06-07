<?php
$env = file_get_contents(__DIR__."/.env");
$lines = explode("\n",$env);

foreach($lines as $line){
  preg_match("/([^#]+)\=(.*)/",$line,$matches);
  if(isset($matches[2])){
    putenv(trim($line));
  }
} 

$servername = getenv('SERVERNAME');
$username = getenv('USERNAME');
$password = getenv('PASSWORD');
$dbname = getenv('DBNAME');
$port = getenv('PORT');

$conn = new mysqli($servername,$username,$password,$dbname,$port);

if ($conn->connect_error){
    die("connection failed: ". $conn->connect_error);
}
?>