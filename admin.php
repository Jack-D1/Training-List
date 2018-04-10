<?php
include("connection.php");
include("check.php");

if($_SESSION['UserID'] > 2){
	header("Location: home.php");
}else {

	echo '<h2>Add User</h2>
    <iframe src="UserAddingPage.php" frameborder="0">Your browser does not support iFrames. Please use another browser</iframe>';
    echo '<h2>Add Employee</h2>
    <iframe src="AddEmployee.php" frameborder="0" width = 300px height = 300px>Your browser does not support iFrames. Please use another browser</iframe>';
}

?>