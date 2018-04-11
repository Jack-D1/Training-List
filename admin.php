<?php
include("connection.php");
include("check.php");

if($_SESSION['UserID'] > 2){
	header("Location: home.php");
}else {
    $getAllEmployees = mysqli_query($connection, "SELECT * FROM employee,account WHERE employee.ClockNo = account.ClockNo ORDER BY employee.Department ASC");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Admin Panel</title>
</head>
<body>
    <table>
        <tr>
            <td>
                <h3>Add User</h3>
            </td>
            <td>
                <h3>Add employee</h3>
            </td>
            <td>
                <h3>Add Training</h3>
            </td>
            <td>
                <h3>Change Password</h3>
            </td>
        </tr>
        <tr>
            <td>
                <iframe src="UserAddingPage.php" frameborder="0">Your browser does not support iFrames. Please use another browser</iframe>
            </td>
            <td>
                <iframe src="AddEmployee.php" frameborder="0" height=200>Your browser does not support iFrames. Please use another browser</iframe>
            </td>
            <td>
                <iframe src="addTraining.php" frameborder="0" height=220>Your browser does not support iFrames. Please use another browser</iframe>
            </td>
            <td>
                <iframe src="ChangePassword.php" frameborder="0" height=150>Your browser does not support iFrames. Please use another browser</iframe>
            </td>
        </tr>
    </table>
    <h3>Search for employees with a course</h3>
    <form method="get" action="showwith.php">
    <table>
        <tr>
            <td>Course to search for</td>
            <td><input type="text" name="search" value="" /></td>
            <td><input type="submit" name="submit" value="Search" /></td>
        </tr>
    </table>
    </form>
    <h3>All Employees</h3>
    <table>
        <tr>
            <td>
                <b>Name</b>
            </td>
            <td>
                <b>Username</b>
            </td>
            <td>
                <b>Clock No</b>
            </td>
            <td>
                <b>Department</b>
            </td>
            <td>
                <b>Training</b>
            </td>
        </tr>
        <?php
            while ($AllEmployees = mysqli_fetch_assoc($getAllEmployees)){
                 echo "<tr><td>".$AllEmployees['Name']."</td><td>".$AllEmployees['username']."</td><td>".$AllEmployees['ClockNo']."</td><td>".$AllEmployees['Department'].'</td><td><a href = "training.php?clock='.$AllEmployees['ClockNo'].'">View training</a></td></tr>';
            }
        ?>
    </table>
</body>
</html>


<?php
}
?>