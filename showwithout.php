<?php
include("check.php");
include("connection.php");

$searchterm = "%".$_GET['search']."%";

$startSearch = mysqli_query($connection, "SELECT Name, employee.ClockNo, Department, Trainer, Manager FROM course,employee WHERE employee.ClockNo = course.ClockNo AND course.Course NOT LIKE '$searchterm'");

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Users Without Training Course</title>
    <link href="stylehsheet.css" rel="stylesheet" />
</head>
<body>
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