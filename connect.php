<?php
$firstname = $_POST ['firstname'];
$lastname = $_POST ['lastname'];
$email = $_POST ['email'];
$number = $_POST ['number'];
$message = $_POST ['message'];

//database connection
$conn = new mysqli('localhost','root','','job-req');
    if ($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into register (firstname,lastname,email,number,message) 
        Values(?,?,?,?,?)");
        $stmt->bind_param("sssis",$firstname,$lastname,$email,$number,$message);
        $stmt->execute();
        echo "Sucessfully..";
        $stmt->close();
        $conn->close();
    }

?>