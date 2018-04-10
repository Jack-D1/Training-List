<?php
include("connection.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Add Training</title>
</head>
<body>
    <form method="post" onsubmit="addTrain();">
        <table>
            <tr>
                <td>Clock Number</td>
                <td>
                    <input type="text" name="clockno" id="clock" value="" required />
                </td>
            </tr>
            <tr>
                <td>Course</td>
                <td>
                    <input type="text" name="course" id="course" value="" required />
                </td>
            </tr>
            <tr>
            <td>Level</td>
                <td>
                    <input type="text" name="level" id="level" value="" required />
                </td>
            </tr>
            <tr>
                <td>Pass Date</td>
                <td>
                    <input type="text" name="passdate" id="passdate" value="YYYY-MM-DD" required />
                </td>
            </tr>
            <tr>
                <td>Renew Date</td>
                <td>
                    <input type="text" name="rendate" id="rendate" value="YYYY-MM-DD" required />
                </td>
            </tr>
            <tr>
                <td>Cost</td>
                <td>
                    <input type="text" name="cost" id="cost" value="" required />
                </td>
            </tr>
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


    function addTrain() {
        event.preventDefault();
        var clock = document.getElementById("clock").value;
        var course = document.getElementById("course").value;
        var level = document.getElementById("level").value;
        var passdate = document.getElementById("passdate").value;
        var rendate = document.getElementById("rendate").value;
        var cost = document.getElementById("cost").value;
        $.ajax({
            type: 'post',
            url: 'train.php',
            data: {
                Clock: clock,
                Course: course,
                Level: level,
                PassDate: passdate,
                RenDate: rendate,
                Cost: cost,
            }
        });

        alert("Course " + course + " added to employee with Clock Number:" + clock);

        document.getElementById("clock").value = "";
        document.getElementById("course").value = "";
        document.getElementById("level").value = "";
        document.getElementById("passdate").value = "";
        document.getElementById("rendate").value = "";
        document.getElementById("cost").value = "";
        return true;
    }

</script>