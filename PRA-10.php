<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "IT_WORKSHOP";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
  echo "Connected successfully"."<br>"; }

$sql="DROP TABLE STUDENT;";
if($conn->query($sql) == TRUE) {
    echo "Table Dropped Successfully...!!!"."<br>";
}
else {
    echo "Table Is Not Dropped...!!!"."<br>"; 
}
?>