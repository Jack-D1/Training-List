<?php
include("check.php");
include("connection.php");

session_start();
echo "Welcome back" . $_SESSION['username'];
?>