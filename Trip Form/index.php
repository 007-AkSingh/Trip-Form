<?php
$insert = false;
if(isset($_POST['name'])){

    // Set connection variable
   
    $server = "localhost";
    $username = "root";
    $password = "";

    //create a database connection

    $con = mysqli_connect($server, $username, $password);

    // Check for connection success 

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    //echo "Success Connecting to the db";

    //collect post variables

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //echo $sql;

    //Execute the query

    if($con->query($sql) == true){
       // echo "Successfully inserted";

       //Flag for successful insertion
        $insert = true;
    }

    else{
        echo "Error: $sql <br> $con->error";
    }

    // Close the database connection

    $con->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="lt" src="ltce.jpg" alt="Lokmanya Tilak College Of Engineering">
    <div class="container">
        <h3>Welcome to Lokmanya Tilak College of Engineering US Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true){
            echo "<p class='submitmsg'> Thanks for submitting your form. We are happy to see you joining us for the US Trip</p>";
        }
        

        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your name">
            <input type="text" name="age" id="age" placeholder="Enter Your age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input type="email" name="email" id="email" placeholder="Enter Your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
            
    
        </form>
    </div>
    <script src="index.js"></script>
    <!-- INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'testname', '23', 'male', 'this@this.com', '999999999', 'This is my first php web page', current_timestamp()); -->
    
</body>
</html>