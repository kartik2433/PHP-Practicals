<html>
  <head>
    <style>
    td,th {
        border: 1px solid black;
        padding: 10px;
        margin: 5px;
        text-align: center;
    }
      .box {
        align-content: center;
        display: flex;
      }
      .column{
          border: 3px solid black;
          padding: 10px;
          height: auto;
      }
    </style>
  </head>
  <body>
    <?php

      $nameErr = $emailErr = $enrollErr = "";
      $name = $email= $enrollment_no = "";

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "TEST";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      else{
        echo "=> Connection Established With Database."."<br>"; }

     $correct_name=$correct_email=$correct_enroll=0;
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
          $nameErr = "* Name is required";
        } else {
          $name = test_input($_POST["name"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "* Only letters and white space allowed";
          }
          else{
            $correct_name=1;
          }
        }
      }
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {
          $emailErr = "* Email is required";
        } else {
          $email = test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "* Invalid email format";
          }
          else{
            $correct_email=1;
          }
        }
    }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["enrollment_no"])) {
            $enrollErr = "* Number is required";
          } 
          else if(strlen(strval(test_input($_POST["enrollment_no"]))) != 10){
            $enrollErr = "* Number Should Contain 10 Digit";
          }
          else {
            $enrollment_no = test_input($_POST["enrollment_no"]);
            // check if name only contains letters and whitespac
            $correct_enroll=1;
          }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
    ?>
    <div class="box">
    <div class = "column" style="align-content:flex-end;">
    <h1 style="font-weight:bold">Student Registration Form</h1>
    <form name="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
       Name: <input type="text" name="name" value="<?php echo $name; ?>"> 
       <span style="color:red"> <?php echo $nameErr;?></span> <br>
       Enrollment No: <input type="number" name="enrollment_no" value="<?php echo $enrollment_no; ?>"> 
       <span style="color:red"> <?php echo $enrollErr;?></span> <br>
       E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
       <span style="color:red"> <?php echo $emailErr;?></span> <br>
       <input type="submit" name="submit" value="Submit">
    </form>
    <?php  
          if($correct_email==1 && $correct_enroll==1 && $correct_name==1) {
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $enrollment_no = $_POST["enrollment_no"];
            $email = $_POST["email"];
            $sql="INSERT INTO SAMPLE VALUES('$name','$enrollment_no','$email');"; 
              if($conn->query($sql) == TRUE) {
                echo "Data Successfully Inserted...!!!"."<br>";
                $run = 1;
              }
              else {
               echo "Data Not Inserted."."<br>";
              }
          }
        }    
       echo "<h2>Your Input: </h2>";
       echo "Name: ".$name."<br>";
       echo "Enrollment No: ".$enrollment_no."<br>";
       echo "Email: ".$email."<br>";
    ?>
    <?php
            $sql = "select * from sample";
            $result = ($conn->query($sql));
            $row = []; 
            if ($result->num_rows > 0) 
            {
                $row = $result->fetch_all(MYSQLI_ASSOC);  
            }   
    ?>
    </div>
        <div class="column" style="align-content:flex-end;">
        <h1>Students Data: </h1>
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
        </div>
    </div>
  </body>
</html>