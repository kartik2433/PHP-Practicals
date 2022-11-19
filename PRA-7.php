<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
  echo "Connected successfully"."<br>"; }

$sql="CREATE DATABASE IT_WORKSHOP1;";
  if($conn->query($sql) == TRUE) {
    echo "DATABASE CREATED SUCCESSFULLY...!!!."."<br>";
}
  else {
    echo "DATABASE NOT CREATED...!!!."."<br>"; } 
     
$sql="DROP DATABASE IT_WORKSHOP1;";
if($conn->query($sql) == TRUE) {
  echo "DATABASE DROPED SUCCESSFULLY...!!!."."<br>";
}
else {
  echo "DATABASE NOT DROPED...!!!"."<br>"; }
?>