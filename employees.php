<?php
include("check.php");
include("connection.php");
if ($_SESSION['UserID'] > 2){
    header("Location: home.php");
}else {
    echo '<div id="topbar">
        <a href="home.php" style="margin-right:15px;">
            <img src="WPE.jpg" alt="WPE Logo" width="129.25" height="74.74" />
        </a>
        <h1 style="display:inline-block; margin-bottom: 0; margin-right: 10px; float: right;">
            <a href="training.php?clock='. $_SESSION['Clock'].'">My Training</a>
        </h1>
        <h1 style="display:inline-block; margin-bottom: 0; margin-right: 15px; float: right;">
            <a href="admin.php">Admin Panel</a>
        </h1>
        <h1 style="display:inline-block; margin-bottom: 0; margin-right: 15px; float: right;">
            <a href="logout.php">Logout</a>
        </h1>
    </div>
    ';
    $dept = $_GET['dept'];
    $deptEmployees = mysqli_query($connection, "SELECT * FROM employee WHERE Department = '$dept'");
    echo "<h3> ". $dept ." Department Employees</h3>";
    echo "<table>";
    echo "<tr><td><b>Name</b></td><td><b>Clock No</b></td><td><b>Training</b></td></tr>";
    while ($employees = mysqli_fetch_assoc($deptEmployees)){
        echo"<tr>";
            echo "<td>" . $employees['Name'] . "</td>";
            echo "<td>".$employees['ClockNo']."</td>";
            echo '<td><a href = "training.php?clock='.$employees['ClockNo'].'">View training</a></td>';
        echo"</tr>";
    }
    echo "</table>";
}
echo '<h3>Add Training</h3>
    <iframe src="addTraining.php" frameborder="0" height=220>Your browser does not support iFrames. Please use another browser</iframe>';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $dept;?> Department Employees</title>
    <link href="stylesheet.css" rel="stylesheet" />
</head>
<body>
</body>
</html>