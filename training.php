<?php
include("check.php");
include("connection.php");
if (!isset($_GET['clock'])){
    header("Location: home.php");
}else {
    $clock = $_GET['clock'];
    $getName = mysqli_query($connection, "SELECT Name FROM employee WHERE ClockNo = '$clock'");
    $name = mysqli_fetch_assoc($getName);
    $getTraining = mysqli_query($connection, "SELECT Course, Renew, Level, PassDate, Name, cost FROM course,employee WHERE employee.ClockNo = course.ClockNo AND employee.ClockNo = '$clock'");

    echo "<h3>". $name['Name'] . "'s Training</h3>";
    echo "<table>";
    echo "<tr><td><b>Name</b></td><td><b>Course</b></td><td><b>Level</b></td><td><b>Pass Date</b></td><td><b>Renew Date</b></td><td><b>Cost</b></td></tr>";
    while ($training = mysqli_fetch_assoc($getTraining)){
        echo "<tr><td>".$training['Name']."</td><td>".$training['Course']."</td><td>".$training['Level']."</td><td>".$training['PassDate']."</td><td>".$training['Renew']."</td><td>&pound;".$training['cost']."</td></tr>";
    }

    echo "</table>";
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $name['Name'];?>'s Training</title>
    <link href="stylesheet.css" rel="stylesheet" />
</head>
<body>
</body>
</html>