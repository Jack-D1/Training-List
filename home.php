<?php
include("check.php");
include("connection.php");

echo "Welcome back" . $_SESSION['username'];
echo "<br>";
echo '<a href = "logout.php">Logout</a>';
?>