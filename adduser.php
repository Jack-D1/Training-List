<?php
include("connection.php");

if(isset($_POST['NewUsername'])){
    $options = [
        'cost' => 15,
    ];
    $Password = password_hash($_POST['NewPassword'], PASSWORD_BCRYPT. $options); 
    $uname = $_POST['NewUsername']; 
    mysqli_query($connection,"INSERT INTO account VALUES('$uname', '$Password')");
}
?>