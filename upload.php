<?php
include("check.php");

echo '<link rel="stylesheet" href="default.css">';

$returnURL = "admin.php";
$target_dir = "/CSV/";
$fname = rand().".";
$target_file = $target_dir . $fname . "csv";
$imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));
$uploadOk = 1;
if(!isset($_POST["submit"])) {
    $uploadOk = 0;
}
if($imageFileType != "csv") {
    echo "Sorry, only CSV files are allowed.";
	echo "<br>";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	echo "<br>";
	echo "<a href = $returnURL> Click here to return</a>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		header("Location: read.php?fileName=/CSV/".$fname."csv");
    } else {
        echo "Sorry, there was an error uploading your file.";
		echo "<a href = $returnURL> Click here to return</a>";
    }
}


?>