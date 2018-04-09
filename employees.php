<?php
include("check.php");
include("connection.php");
if ($_SESSION['UserID'] > 2){
    header("Location: home.php");
}else {
    $dept = $_GET['dept'];
    $deptEmployees = mysqli_query($connection, "SELECT * FROM employee WHERE Department = '$dept'");
    echo "<h3> ". $dept ." Department Employees</h3>";
    echo "<table>";
    echo "<tr><td><b>Name</b></td><td><b>Training</b></td></tr>";
    while ($employees = mysqli_fetch_assoc($deptEmployees)){
        echo"<tr>";
            echo "<td>" . $employees['Name'] . "</td>";
            echo '<td><a href = "training.php?clock='.$employees['ClockNo'].'">View training</a></td>';
        echo"</tr>";
    }
    echo "</table>";
}
?>