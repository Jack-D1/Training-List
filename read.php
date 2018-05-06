<?php
include("connection.php");

/*
Test.csv will be replaced with the file that contains employee details, will most 
likely be uploaded via form to a folder on the server directory. Its name will be 
passed to this script.
*/
$items = file_get_contents("test.csv");

/*
Splitting by EOL and then will split by comma within the loop
*/
$initSplit = explode(PHP_EOL, $items);


for($i = 0; $i < count($initSplit); $i++){
	/*This example assumes that there are 3 piece of data associated with
	eah row, this can be altered for more or less data*/
	$finSplit = explode(',',$initSplit[$i]);
	echo $finSplit[0]." ";
	echo $finSplit[1]." ";
	echo $finSplit[2];
	echo "<br>";
}
?>