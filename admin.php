<?php
include("connection.php");
include("check.php");

if($_SESSION['UserID'] > 2){
	header("Location: home.php");
}else {

	echo '<h3>Add User</h3>
    <iframe src="UserAddingPage.php" frameborder="0">Your browser does not support iFrames. Please use another browser</iframe>';
    echo '<h3>Add Employee</h3>
    <iframe src="AddEmployee.php" frameborder="0" height = 200>Your browser does not support iFrames. Please use another browser</iframe>';
    echo '<h3>Add Training</h3>
    <iframe src="addTraining.php" frameborder="0" height=220>Your browser does not support iFrames. Please use another browser</iframe>';

    echo "<h3>All Employees</h3>";
    $getAllEmployees = mysqli_query($connection, "SELECT * FROM employee,account WHERE employee.ClockNo = account.ClockNo");
    echo "<table>";
    echo "<tr><td><b>Name</b></td><td><b>Username</b></td><td><b>Clock No</b></td><td><b>Department</b></td><td><b>Training</b></td></tr>";
    while ($AllEmployees = mysqli_fetch_assoc($getAllEmployees)){
        echo "<tr><td>".$AllEmployees['Name']."</td><td>".$AllEmployees['username']."</td><td>".$AllEmployees['ClockNo']."</td><td>".$AllEmployees['Department'].'</td><td><a href = "training.php?clock='.$AllEmployees['ClockNo'].'">View training</a></td></tr>';
    }
}

?>