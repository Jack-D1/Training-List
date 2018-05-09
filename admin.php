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
    <link href="stylesheet.css" rel="stylesheet" />
</head>
<body>
    <div id="topbar">
        <a href="home.php" style="margin-right:15px;">
            <img src="WPE.jpg" alt="WPE Logo" width="129.25" height="74.74" />
        </a>
        <h1 style="display:inline-block; margin-bottom: 0; margin-right: 10px; float: right;">
            <a href="training.php?clock=<?php echo $_SESSION['Clock']?>">My Training</a>
        </h1>
        <h1 style="display:inline-block; margin-bottom: 0; margin-right: 15px; float: right;">
            <a href="admin.php">Admin Panel</a>
        </h1>
        <h1 style="display:inline-block; margin-bottom: 0; margin-right: 15px; float: right;">
            <a href="logout.php">Logout</a>
        </h1>
    </div>
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
			<td>
				<h3>Add Employees from file</h3>
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
			<td>
				<iframe src="UploadPage.php" frameborder="0" width=450>Your browser does not support iFranes. Please use another browser</iframe>
			</td>
        </tr>
    </table>
    
    <h3>Search for employees with a training course</h3>
    <form method="get" action="showwith.php">
    <table>
        <tr>
            <td>Course to search for</td>
            <td><input type="text" name="search" value="" /></td>
            <td><input type="submit" name="submit" value="Search" /></td>
        </tr>
    </table>
    </form>

    <h3>Search for employees who do not have a training course</h3>
    <form method="get" action="showwithout.php">
        <table>
            <tr>
                <td>Course to search for</td>
                <td>
                    <input type="text" name="search" value="" />
                </td>
                <td>
                    <input type="submit" name="submit" value="Search" />
                </td>
            </tr>
        </table>
    </form>

    <table>
        <tr>
            <td>
                <h3>All Employees</h3>
            </td>
        </tr>
        <tr>
            <td>
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
            </td>
        </tr>
    </table>

    
  
</body>
</html>


<?php
}
?>