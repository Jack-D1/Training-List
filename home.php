<?php
include("check.php");
include("connection.php");
$UID = $_SESSION['UserID'];
echo "Welcome back " . $_SESSION['username'];
echo "<br>";
echo '<a href = "logout.php">Logout</a>';
$getManagers = mysqli_query($connection, "SELECT * FROM employee WHERE Manager = 1");
$checkManager = mysqli_query($connection, "SELECT username FROM account, employee WHERE employee.ClockNo = account.ClockNo AND UserID = '$UID' AND manager = 1");
if ($_SESSION['UserID'] <= 2){


?>
<html>
<head>
</head>
<body>
    <br>
    <a href="admin.php">Admin Centre</a>
    <h3>Managers</h3>
    <?php
    echo "<table>";
    echo "<tr><td><b>Name</b></td><td><b>Department</b></td><td><b>Employees</b></td><td><b>Training</b></td></tr>";
    while($managers = mysqli_fetch_assoc($getManagers)){
        echo "<tr>";
        echo "<td>".$managers['Name'] ."</td>";
        echo "<td>".$managers['Department'] ."</td>";
        echo '<td><a href = "employees.php?dept='.$managers['Department'].'">View Employees</a></td>';
        echo '<td><a href = "training.php?clock='.$managers['ClockNo'].'">View training</a></td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>
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
<head></head>
<body>
    <h3>Employees</h3>
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
    <h2>Add Employee</h2>
    <iframe src="AddEmployee.php" frameborder="0">Your browser does not support iFrames. Please use another browser</iframe>
</body>
</html>

<?php
}else{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
</head>
<body>
</body>
</html>
<?php
}
?>