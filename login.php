<?php
include("connection.php");
session_start();
$goodLogin = 0;
$uName = $_POST['uName'];
$pWord = $_POST['pWord'];

$checkInDatabase = mysqli_query($connection, "SELECT * FROM account WHERE username = '$uName'");

if(mysqli_num_rows($checkInDatabase) > 0){
    $accDetails = mysqli_fetch_assoc($checkInDatabase);
    if (password_verify($pWord, $accDetails['password'])){
        $_SESSION['username'] = $uName;
        $_SESSION['UserID'] = $accDetails['UserID'];
		$goodLogin = 1;
    }else{
        echo "Incorrect password, please try again";
		$goodLogin = 0;
    }
}else{
    echo "Your account cannot be found please try again";
	$goodLogin = 0;
}

if($goodLogin == 1){
	header("Location: home.php");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Login Failed</title>
    <link href="stylesheet.css" rel="stylesheet" />
</head>
<body>
</body>
</html>