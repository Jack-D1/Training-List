<?php
include("connection.php");
include("check.php");

if(!isset($_GET['fileName'])){header("Location: home.php");}else{
		/*
		From V1 -- Test.csv will be replaced with the file that contains employee details, will most 
		likely be uploaded via form to a folder on the server directory. Its name will be 
		passed to this script.
		*/

		/*
		The file name will be passed from the upload script to the function on the GET
		method, 
		*/
		$items = file_get_contents($_GET['fileName']);

		/*
		Splitting by EOL and then will split by comma within the loop
		*/
		$initSplit = explode(PHP_EOL, $items);
		
		for($i = 0; $i < count($initSplit); $i++){
			/*This example assumes that there are 5 pieces of data associated with
			eah row, this can be altered for more or less data*/
			$finSplit = explode(',',$initSplit[$i]);
			$a = $finSplit[0];
			$b = $finSplit[1];
			$c = $finSplit[2];
			$d = $finSplit[3];
			$e = $finSplit[4];
			//Adds people to the employee table
			mysqli_query($connection, "INSERT INTO employee(Name, ClockNo, Department, Trainer, Manager) VALUES ('$a','$b','$c','$d','$e')");
			
			//Give people a user account with a default password
			$options = [
				'cost' => 15,
			];
			$password = password_hash("password", PASSWORD_BCRYPT, $options);
			$a = explode(' ', $a);
			$a1 = str_split($a[0], 1);
			$uname = $a1[0].$a[1];
			mysqli_query($connection, "INSERT INTO account(username, password, ClockNo) VALUES('$uname','$password','$b')");
			
		}

		header("Location: UploadPage.php");
}
?>