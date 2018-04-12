<?php
include("check.php");
include("connection.php");
$UID = $_SESSION['UserID'];
$getClock = mysqli_query($connection, "SELECT ClockNo FROM account WHERE UserID = '$UID'");
$Clock = mysqli_fetch_assoc($getClock);
$_SESSION['Clock'] = $Clock['ClockNo'];
$getManagers = mysqli_query($connection, "SELECT * FROM employee WHERE Manager = 1");
$checkManager = mysqli_query($connection, "SELECT username FROM account, employee WHERE employee.ClockNo = account.ClockNo AND UserID = '$UID' AND manager = 1");
if ($_SESSION['UserID'] <= 2){


?>
<html>
<head>
    <title>Peoples Training</title>
    <link href="stylesheet.css" rel="stylesheet" />
</head>

<body>
    <div id="topbar">
        <a href="home.php" style="margin-right:15px;">
            <img src="WPE.jpg" alt="WPE Logo" width="129.25" height="74.74" />
        </a>
        <h1 style="display:inline-block; margin-bottom: 0; margin-right: 10px; float: right;">
            <a href="training.php?clock=<?php echo $_SESSION['Clock'];?>">My Training</a>
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
                <h3>Managers</h3>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                    echo "<table>";
                    echo "<tr><td><b>Name</b></td><td><b>Department</b></td><td><b>Clock No</b></td><td><b>Employees</b></td><td><b>Training</b></td></tr>";
                    while($managers = mysqli_fetch_assoc($getManagers)){
                        echo "<tr>";
                        echo "<td>".$managers['Name'] ."</td>";
                        echo "<td>".$managers['Department'] ."</td>";
                        echo "<td>".$managers['ClockNo']."</td>";
                        echo '<td><a href = "employees.php?dept='.$managers['Department'].'">View Employees</a></td>';
                        echo '<td><a href = "training.php?clock='.$managers['ClockNo'].'">View training</a></td>';
                        echo "</tr>";
                    }
                    echo "</table>";
                ?>
            </td>
        </tr>
    </table>
    
      
    <br />


    <table>
        <tr>
            <td><h3>Add Training</h3></td>
        </tr>
        <tr>
            <td>
               <iframe src="addTraining.php" frameborder="0" height=220>Your browser does not support iFrames. Please use another browser</iframe>
            </td>
        </tr>
    </table>
    
</body>
</html>

<?php
}else if (mysqli_num_rows($checkManager) > 0){
    $getDept = mysqli_query($connection, "SELECT Department FROM employee,account WHERE employee.ClockNo = account.ClockNo AND UserID = '$UID'");
    $dept = mysqli_fetch_assoc($getDept);
    $empDep = $dept['Department'];
    $_SESSION['dept'] = $empDep;
    $empFromDep = mysqli_query($connection, "SELECT * from employee WHERE Department = '$empDep' AND manager = 0");
?>

<html>
<head>
    <title>Employees Training</title>
    <link href="stylesheet.css" rel="stylesheet" />
</head>
<body>
    <div id="topbar">
        <a href="home.php" style="margin-right:15px;">
            <img src="WPE.jpg" alt="WPE Logo" width="129.25" height="74.74" />
        </a>
        <h1 style="display:inline-block; margin-bottom: 0; margin-right: 10px; float: right;">
            <a href="training.php?clock=<?php echo $Clock['ClockNo'];?>">My Training</a>
        </h1>
        <h1 style="display:inline-block; margin-bottom: 0; margin-right: 10px; float: right;">
            <a href="logout.php">Logout</a>
        </h1>
    </div>
    
    <table>
        <tr>
            <td>
                <h3>Employees</h3>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                echo "<table>";
                echo "<tr><td><b>Employee</b></td><td><b>Clock No</b></td><td><b>Training</b></td></tr>";
                while($employees = mysqli_fetch_assoc($empFromDep)){
                    echo"<tr>";
                    echo "<td>" . $employees['Name'] . "</td>";
                    echo "<td>".$employees['ClockNo']."</td>";
                    echo '<td><a href = "training.php?clock='.$employees['ClockNo'].'">View training</a></td>';
                    echo"</tr>";
                }
                echo "</table>";
                ?>
            </td>
        </tr>
    </table>
    
    <br />
    <table>
        <tr>
            <td><h3>Add Employee</h3></td>
            <td><h3>Add Training</h3></td>
        </tr>
        <tr>
            <td>
                <iframe src="AddEmployee.php" frameborder="0">Your browser does not support iFrames. Please use another browser</iframe>
            </td>
            <td>
                <iframe src="addTraining.php" frameborder="0" height=220>Your browser does not support iFrames. Please use another browser</iframe>
            </td>
        </tr>
    </table>   
</body>
</html>

<?php
}else{

    $getTraining = mysqli_query($connection, "SELECT Name, Course, PassDate, Renew FROM account, employee, course WHERE account.ClockNo = employee.ClockNo AND employee.ClockNo = course.ClockNo AND account.UserID = '$UID'");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>My Training</title>
    <link href="stylesheet.css" rel="stylesheet" />
</head>
<body>
    <div id="topbar">
        <a href="home.php" style="margin-right:15px;">
            <img src="WPE.jpg" alt="WPE Logo" width="129.25" height="74.74" />
        </a>
        <h1 style="display:inline-block; margin-bottom: 0; margin-right: 10px; float: right;">
            <a href="training.php?clock=<?php echo $Clock['ClockNo'];?>">My Training</a>
        </h1>
        <h1 style="display:inline-block; margin-bottom: 0; margin-right: 10px; float: right;">
            <a href="logout.php">Logout</a>
        </h1>
    </div>
    <br />


    <table>
        <tr>
            <td>
                <h3>My Training</h3>
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
                            <b>Course</b>
                        </td>
                        <td>
                            <b>Pass Date</b>
                        </td>
                        <td>
                            <b>Renew Date</b>
                        </td>
                    </tr>
                    <?php
                    while($training = mysqli_fetch_assoc($getTraining)){
                        echo "<tr><td>".$training['Name']."</td><td>".$training['Course']."</td><td>".$training['PassDate']."</td><td>".$training['Renew']."</td></tr>";
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