<?php
include("check.php");
include("connection.php");
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Add Employee</title>
</head>
<body>
    <form method="post" onsubmit="addEmp();">
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name" id="name" required />
                </td>
            </tr>
            <tr>
                <td>Clock Number</td>
                <td>
                    <input type="text" name="clockno" id="clock" value="" required />
                </td>
            </tr>
            <?php
            if ($_SESSION['UserID'] > 2){
                echo '<input type="hidden" name="dept" id="dept" value = '.$_SESSION['dept'].' required />';
            }else {
            ?>
            <tr>
                <td>Department</td>
                <td>
                    <input type="text" name="dept" id="dept" required />
                </td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <td>Trainer</td>
                <td>
                    <input type="text" name="trainer" id="train" value="0" required />
                </td>
            </tr>
            <?php
            if($_SESSION['UserID'] > 2){
                echo '<input type="hidden" name="manag" id="manag" value="0" required />';
            }else{
            ?>
            <tr>
                <td>Manager</td>
                <td>
                    <input type="text" name="manag" id="manag" value="0" required />
                </td>
            </tr>
            <?php   
            }
            ?>
            <tr>
                <td>
                    <input type="submit" id="name" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<script type="text/javascript" src="jquery.min.js"></script>


<script type="text/javascript">


    function addEmp() {
            event.preventDefault();

            var name = document.getElementById("name").value;
            var newclock = document.getElementById("clock").value;
            var dept = document.getElementById("dept").value;
            var trainer = document.getElementById("train").value;
            var manag = document.getElementById("manag").value;
            $.ajax({
               type: 'post',
               url: 'emp.php',
               data: {
                   	UsersName:name,
                    NewClock: newclock,
                    Department: dept,
                    Trainer: trainer,
                    Manager: manag,
               }
            });

            alert("Employee " + name + " added");

            document.getElementById("uname").value = "";
            document.getElementById("clock").value = "";
            document.getElementById("dept").value = "";
            document.getElementById("train").value = "";
            document.getElementById("manag").value = "";
            return true;
    }

</script>