<?php
include("connection.php");
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
	/*This example assumes that there are 3 piece of data associated with
	eah row, this can be altered for more or less data*/
	$finSplit = explode(',',$initSplit[$i]);
	/*Need these variables as the query parses the arrays square brackets */
	$a = $finSplit[0];
	$b = $finSplit[1];
	$c = $finSplit[2];
	
	//replace * with table 
	mysqli_query($connection, "INSERT INTO * VALUES '$a','$b','$c'");
}
?>