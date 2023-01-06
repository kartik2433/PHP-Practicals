<?php 
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="TEST";
    $conn= new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die(" Connection Failed ".$connect_error);
    }
    else {
        echo "Connected Successfully."."<br>";
    }
?>
<html>
<style>
    td,th {
        border: 1px solid black;
        padding: 10px;
        margin: 5px;
        text-align: center;
    }
</style>
    <body>
        <?php
            $sql = "select * from sample";
            $result = ($conn->query($sql));
            $row = []; 
            if ($result->num_rows > 0) 
            {
                $row = $result->fetch_all(MYSQLI_ASSOC);  
            }   
        ?>
        <h2>Students Data</h2>
        <p>Students Data Is Selected From -<br>Database: Test <br>Table: Sample</p>
        <table>
            <tr>
                <th>Name</th>
                <th>Enrollment_No</th>
                <th>Email</th>
            </tr>
            <?php
               if(!empty($row))
               foreach($row as $rows)
              { 
            ?>
            <tr>
                <td><?php echo $rows['NAME'] ?></td>
                <td><?php echo $rows['ENROLLMENT_NO'] ?></td>
                <td><?php echo $rows['EMAIL'] ?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>