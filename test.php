<?php
include("connection.php");
$pass = password_hash("Hello", PASSWORD_DEFAULT);
mysqli_query($connection, "INSERT INTO account VALUES('123', '$pass')");
?>