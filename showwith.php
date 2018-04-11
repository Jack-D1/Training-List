<?php
include("check.php");
include("connection.php");

$searchterm = "%".$_GET['search']."%";

$startSearch = mysqli_query($connection, "SELECT Name, employee.ClockNo, Department, Trainer, Manager, Course, Level, PassDate, Renew, cost FROM course,employee WHERE employee.ClockNo = course.ClockNo AND course.Course LIKE '$searchterm'");

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Users With Training Course</title>
    <link href="stylesheet.css" rel="stylesheet" />
</head>
<body>
    <h2>All people with <?php echo $_GET['search']?> training</h2>
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
        
            <td>
                <b>Course</b>
            </td>
        
            <td>
                <b>Level</b>
            </td>
       
            <td>
                <b>Pass Date</b>
            </td>
       
            <td>
                <b>Renew Date</b>
            </td>
      
            <td>
                <b>Cost</b>
            </td>
        </tr>
            <?php
            while($search = mysqli_fetch_assoc($startSearch)){
                echo "<tr><td>".$search['Name']."</td><td>".$search['ClockNo']."</td><td>".$search['Department']."</td><td>".$search['Trainer']."</td><td>".$search['Manager']."</td><td>".$search['Course']."</td><td>".$search['Level']."</td><td>".$search['PassDate']."</td><td>".$search['Renew']."</td><td>".$search['cost']."</td><td></tr>";
            }
            ?>
    </table>
</body>
</html>