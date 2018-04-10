<?php
include("check.php");
include("connection.php");

$searchterm = "%".$_GET['search']."%";

$startSearch = mysqli_query($connection, "SELECT Name, ClockNo, Department, Trainer, Manager, Course, Level, PassDate, cost FROM course,employee WHERE employee.ClockNo = course.ClockNo AND course.Course LIKE '$searchterm'");

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Users With Training Course</title>
</head>
<body>
    <table>
        <tr>
            <td><b>Name</b></td>
        </tr>
        <tr>
            <td>
                <b>Name</b>
            </td>
        </tr>
        <tr>
            <td>
                <b>Name</b>
            </td>
        </tr>
        <tr>
            <td>
                <b>Name</b>
            </td>
        </tr>
        <tr>
            <td>
                <b>Name</b>
            </td>
        </tr>
        <tr>
            <td>
                <b>Name</b>
            </td>
        </tr>
        <tr>
            <td>
                <b>Name</b>
            </td>
        </tr>
        <tr>
            <td>
                <b>Name</b>
            </td>
        </tr>
        <tr>
            <td>
                <b>Name</b>
            </td>
        </tr>
    </table>
</body>
</html>