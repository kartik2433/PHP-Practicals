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
  echo "Connected Successfully."."<br>"; 
}

$sql="INSERT INTO STUDENT VALUES(2101201000,'XYZ',92);";
  if($conn->query($sql) == TRUE){
    echo "Data Inserted Successfully...!!!"."<br>";
  }
  else{
    echo "Data Not Inserted...!!!"."<br>";
  }
?>