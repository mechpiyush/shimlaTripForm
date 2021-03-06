<?php
$insert = false;

if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Connection to this database is falied due to " . mysqli_connect_error());
    }
    // echo("Success connecting to Database.");

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];

    $sql = "INSERT INTO `shimla_trip`.`trip` (`Name`, `Gender`, `Email`, `Phone`, `Other`, `Date`) VALUES ('$name', '$gender', '$email', '$phone', '$other', current_timestamp());";

    // echo $sql;

    if($con->query($sql)==true){
        $insert = true; 
        // echo "Successfully Inserted";
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
    <title>Welcome To Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="hp.jpg" alt="Shimla">
    <div class="container">
        <h2>Welcome to IIIT Una Shimla Trip Form</h2>
        <p>Enter your details and submit the form to confirm your participation in the trip.</p>
        <?php
        if($insert==true){
           echo "<p class='success'>Thanks for submitting the form. We are happy to see you joining us for the Shimla Trip.</p>";
        }
        ?>    

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Please describe yourself." ></textarea>

            <!-- <button class="btn">Submit</button> -->
            <input class="btn" id="reset" type="reset"></input>
            <input class="btn" id="submit" type="submit"></input>

        </form>
    </div>
    <script src="index.js"></script>
   
</body>
</html>