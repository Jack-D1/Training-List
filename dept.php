<?php
include("chek.php");
include("connection.php");

if(!isset($_POST['Dept'])){header("Location: home.php");}else{
	$dept = $_POST['Dept'];
	$clock = $_POST['Clock'];
	mysqli_query($connection, "UPDATE employee SET Department = '$dept' WHERE ClockNo = '$clock'");
}
?>