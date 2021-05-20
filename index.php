<?php
    $insert = false;
    if(isset($_POST['name'])){
    $server ="localhost";
    $username="root";
    $password="";
    $con= mysqli_connect($server,$username,$password);
    if(!$con){
        die("connection failed to the server due to". mysqli_connect_error());
    }
    //echo "successfully connected"
    $name = $_POST['name']; 
    $order = $_POST['order']; 
    $phone = $_POST['phone']; 
    $email  = $_POST['email'];
    $feedback = $_POST['feedback'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `order`, `phone`, `email`, `feedback`, `dt`) VALUES ('$name', '$order', '$phone', '$email', '$feedback', current_timestamp());";
   // echo $sql;
   if($con->query($sql) == true){
       //echo "success";
       $insert=true;
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
    <title>Cafe_feedback</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="cafe.jfif">
    <div class="container">
        <h1><u>Cafe Lucknow</u></h1>
        <p><u>Please fill the feedback form and Then Submit....</u></p>
        <?php
        if($insert == true){
        echo "<p class='msg'>Thanks for submitting feedback......</p>";
        }
        ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name"><br>
            <input type="text" name="order" id="order" placeholder="Enter your order name"><br>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number"><br>
            <input type="email" name="email" id="email" placeholder="Enter your email"><br>
            <textarea name="feedback" id="feedback" placeholder="Enter your feedback here" rows="8" cols="50"></textarea><br>
            <button class="btn">Submit</button>
        </form>
    </div>
</body>
</html>