<?php
include("connection.php");

if(isset($_POST['uname'])){
    $options = [
        'cost' => 15,
    ];
    $uname = $_POST['uname'];
    $password = password_hash($_POST['pword'], PASSWORD_BCRYPT, $options); 
    $addUsers = mysqli_query($connection, "INSERT INTO account(username, password) VALUES ('$uname', '$password') ");
}else{
    header("Location: index.html");
}

?>