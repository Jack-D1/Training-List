<?php
include("check.php");

if($_SESSION['UserID'] > 2){
    header("Location: home.php");    
}else{
?>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link href="stylesheet.css" rel="stylesheet" />
	</head>
	<body>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Select CSV file to be read in:</td>
					<td><input type = "file" name="fileToUpload" id="fileToUpload" required></td>
				</tr>
				<tr>
					<td></td>
					<td><input type = "submit" name = "submit" value = "Upload"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php
}
?>