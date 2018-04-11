<?php
include("check.php");
include("connection.php");

$searchterm = "%".htmlspecialchars(mysqli_real_escape_string($connection,$_GET['search']))."%";

$startSearch = mysqli_query($connection, "SELECT Name, employee.ClockNo, Department, Trainer, Manager FROM course,employee WHERE employee.ClockNo = course.ClockNo AND course.Course NOT LIKE '$searchterm'");

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Users Without Training Course</title>
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
    <br />
    <h2>
        All people without <?php echo $_GET['search']?> training
    </h2>
    <table>
        <tr>
            <td>
                <b>Name</b>
            </td>
            
            <td>
                <b>Clock No</b>
            </td>

            <td>
                <b>Department</b>
            </td>

            <td>
                <b>Trainer</b>
            </td>

            <td>
                <b>Manager</b>
            </td>
        </tr>
        <?php
        while($search = mysqli_fetch_assoc($startSearch)){
            echo "<tr><td>".$search['Name']."</td><td>".$search['ClockNo']."</td><td>".$search['Department']."</td><td>".$search['Trainer']."</td><td>".$search['Manager']."</td></tr>";
        }
        ?>
    </table>
</body>
</html>