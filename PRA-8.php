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
  echo "Connected Successfully."."<br>"; }

$sql="CREATE TABLE STUDENT(NO INT(10),NAME CHAR(30),Percentage int(3));";
    if($conn->query($sql) == TRUE) {
        echo "TABLE CREATED SUCCESSFULLY...!!!"."<br>";
    }
    else {
        echo "TABLE NOT CREATED...!!!"."<br>"; 
    } 
?>