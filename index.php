<?php
$insert = false;
if (isset($_POST['name'])){
   $server = "localhost";
   $username = "root";
   $passwaord = "";

   $con = mysqli_connect($server, $username, $passwaord);

   if (!$con){
    die("connection to this database failed due to".
    mysqli_connect_error());

   }
//    echo "success connecting to the db";
     $name = $_POST['name'];
     $age = $_POST['age'];
     $gender = $_POST['gender'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $desc = $_POST['desc'];

    $sql = "INSERT INTO `us_trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "successfully inserted";
          $insert = true;
    }

    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,800;1,400;1,500;1,600;1,800;1,900&display=swap" rel="stylesheet">
    <title>welcome to Travel from</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img  class="iit" src="IIT.jpg" alt="IIT-Mumbai">
    <div class="container">
        <h1>welcome to IIT mumbai US trip form</h1>
        <p>Enter you details and submit this from to confirm your participation in the trip</p>
       <?php 
       if($insert == true){
       echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining for the US trip</p>";
       }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" placeholder="Enter your name">
            <input type="text" name="age" placeholder="Enter your age ">
            <input type="text" name="gender" placeholder="Enter your gender ">
            <input type="email" name="email" placeholder="Enter your Email ">
            <input type="phone" name="phone" placeholder="Enter your phone number ">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your other information here"></textarea>
            <button class="btn">Submit</button>


        </form>

    </div>
    <script src="index.js"></script>

    
</body>
</html>