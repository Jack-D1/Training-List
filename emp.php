<?php
include("check.php");
include("connection.php");

if(!isset($_POST['UsersName'])){
    header("Location: home.php");
}else{
    $name = $_POST['UsersName'];
    $clock = $_POST['NewClock'];
    $dept = $_POST['Department'];
    $train = $_POST['Trainer'];
    $manag = $_POST['Manager'];

    mysqli_query($connection, "INSERT INTO employee(Name, ClockNo, Department, Trainer, Manager) VALUES ('$name', '$clock', '$dept', '$train', '$manag')");

}
?>