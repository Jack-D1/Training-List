<?php
include("connection.php");

//if(isset($_POST['NewUsername'])){
   /* $options = [
        'cost' => 15,
    ];*/
    $uname = $_POST['NewUsername'];
	$password = $_POST['NewPassword'];
  //  $password = password_hash($_POST['NewPassword'], PASSWORD_BCRYPT, $options); 
    mysqli_query($connection,"INSERT INTO account VALUES('$uname', '$password')");
//}

?>