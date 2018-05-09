<?php
include("check.php");

if($_SESSION['UserID'] > 2){header("Location: home.php");}else{
?>

<html>
	<head>
		<link rel = "stylesheet" href = "stylesheet.css">
	</head>
	<body>
		<form method = "post" onSubmit="update();">
			<table>
				<tr>
					<td>
						Clock Number
					</td>
					<td>
						<input type = "text" name="clock" id="clock">
					</td>
				</tr>
				<tr>
					<td>
						New Department
					</td>
					<td>
						<input type="text" name = "dept" id = "dept">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type = "submit" name = "submit" value = "submit">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
<script type="text/javascript" src="jquery.min.js"></script>

<script type="text/javascript">
	function update() {
            
            var clock1 = document.getElementById("clock").value;
            var newdept = document.getElementById("dept").value;
            $.ajax({
               type: 'post',
               url: 'dept.php',
               data: {
                   	Dept:newdept,
                    Clock: clock1
               }
            });

            alert("Department updated to " + newdept);

            document.getElementById("dept").value = "";
            document.getElementById("clock").value = "";
            return true;
        }
</script>
<?php
}
?>