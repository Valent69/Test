<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    //Database connection
    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into contact(firstName,lastName,subject,message) values(?, ?, ?, ?)");
        $stmt ->bind_param("ssss",$firstName,$lastName,$subject,$message);
        $stmt->execute();
        header("Location: succes.html");
        $stmt->close();
        $conn->close();
    }
?>