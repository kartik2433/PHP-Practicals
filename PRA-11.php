<?php 
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="IT_WORKSHOP";
    $conn= new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die(" Connection Failed ".$connect_error);
    }
    else {
        echo "Connected Successfully."."<br>";
    }

    $sql="UPDATE STUDENT SET NAME='PQR' WHERE NO=2101201000;";
            if($conn->query($sql) == TRUE){
                echo  "Data Successfully Updated."."<br>";
            }
            else{
                echo  "Data is Not Updated."."<br>";
            }

?>