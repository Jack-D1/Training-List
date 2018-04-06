<?php
include("connection.php");

session_start();

$uName = $_POST['uName'];
$pWord = $_POST['pWord'];

$checkInDatabase = mysqli_query($connection, "SELECT * FROM account WHERE username = '$uName'");

if(mysqli_num_rows($checkInDatabase) > 0){
    $accDetails = mysqli_fetch_assoc($checkInDatabase);
    if (password_verify($pWord, $accDetails['password'])){
        $_SESSION['username'] = $uName;
        header("Location home.php");
    }else{
        echo "Incorrect password, please try again";
    }
}else{
    echo "Your account cannot be found please try again";
}
?>