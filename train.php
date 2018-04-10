<?php
include("check.php");
include("connection.php");

if(!isset($_POST['Clock'])){
    header("Location: home.php");
}else{
    $clock = $_POST['Clock'];
    $course = $_POST['Course'];
    $level = $_POST['Level'];
    $passdate = $_POST['PassDate'];
    $rendate = $_POST['RenDate'];
    $cost = $_POST['Cost'];

    mysqli_query($connection, "INSERT INTO course(ClockNo, Course, Level, PassDate, Renew, cost) VALUES ('$clock','$course','$level','$passdate','$rendate','$cost')");

}
?>