<?php
$insert=false; 
if(isset($_POST['name'])){
// set connection variables

$server = "localhost";
$username = "root";
$password = "";
// creat a connection 
$con = mysqli_connect($server, $username, $password);
// cheak for connection succses
if (!$con) {
    die("connection to this databse failed due to" . mysqli_connect_error());
}
// echo "Success Connecting To The DB";
// collect post vriables

$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
// data base connect karenge jisme data base ka name trip hai and table ka name bhi trip.
$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql; // yeh cheak krne ke liye tha connection

// Exicute the Query.
if($con->query($sql) == true){
    // echo "Successfully inserted"; // yeh bhi cheak krne ke liye tha
    // flag for successfull insertion
    $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error"; 
}
// close the database connection 
$con->close();
}

?>
<!-- html Code  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Keshav Kumar Soni </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1> Welcome To Our WebPage </h1>
        <p> Please Fill The Form And Gave Feedback :) </p>
        <?php
        if($insert==true){
       echo "<p class='submitMsg'>Thaks For Submiting The Form</p>";
        } 
        ?>  
        <form action="index.php" method="post">
            <input type="text" name="name" id="name"placeholder="Enter Your Name :">
            <input type="text" name="age" id="age" placeholder="Enter Your Age :">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender :">
            <input type="email" name="email" id="email" placeholder="Enter Your Email :">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone :">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Any Other Information Here : "></textarea>
            <button class="btn">Submit</button>
            
        </form>


    </div>
    <script src="index.js"></script>
    
</body>
</html>