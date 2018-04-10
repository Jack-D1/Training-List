<?php
include("check.php");
include("connection.php");

if(!isset($_POST['Username'])){
    header("Location: home.php");
}else{
    $options = [
        'cost' => 15,
    ];
    $user = $_POST['Username'];
    $password = password_hash($_POST['Password'], PASSWORD_BCRYPT, $options);
    mysqli_query($connection, "UPDATE account SET password = '$password' WHERE username = '$user'");
}
?>