<?php
include("chek.php");
include("connection.php");

if(!isset($_POST['Clock'])){header("Location: home.php");}else{
	$clock = $_POST['Clock'];
	mysqli_query($connection, "UPDATE employee SET Trainer = '1' WHERE ClockNo = '$clock'");
}
?>