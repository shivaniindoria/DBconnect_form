<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";


    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Sucess connecting to the db";

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $sql = "INSERT INTO `journey`.`details` (`name`, `phone`, `email`, `age`, `gender`, `address`, `date`) VALUES ('$name', '$phone', '$email', '$age', '$gender', '$address', current_timestamp());";
    // echo $sql;
    if($con->query($sql) == true){ 
        // echo "sucessfully inserted";
        $insert = true ;
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
    <link rel="stylesheet" href="index.css">
    <title>Registration Form</title>
</head>
<body>
    <div class="container">
    <h1 class="head">Welcome to Education Registration Form</h1>
    <p>enter your Details and submit to confirm your participation in this educational journey.</p>
    <?php
    if ($insert == true ){
    echo "<p id='submition'>Thanks for Submitting your details. We are happy to see you joining Us.</p>" ;}
    ?>
    <form action="index.php" method="post">
        
        <input type="text" name="name" id="name" placeholder="Enter Your Name">
        <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number">
        <input type="email" name="email" id="email" placeholder="Enter Your Email">
        <input type="number" name="age" id="age" placeholder="Enter Your Age">
        <!-- <label for="gender">Gender</label>
        <input type="radio" value="male" name="gender"><label for="">M</label>
        <input type="radio" value="female" name="gender"><label for="">F</label> -->
        <input type="text" name="gender" id="gender" placeholder="gender">
        <textarea name="address" id="" cols="30" rows="3" placeholder="Your Address"></textarea>
        <button class="btn">Submit</button>
        <button class="btn">Reset</button>
    </form>
    </div>
    <script src="index.js"></script>
</body>

</html>


