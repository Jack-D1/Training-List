<?php
include("check.php");

if($_SESSION['UserID'] > 2){
    header("Location: home.php");    
}else{
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link href="stylesheet.css" rel="stylesheet" />
</head>
<body>
    <form method= "post" onSubmit="addUser();">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="uname" id="uname" onkeyup= "checkUname();" pattern="[^\s]+" title = "Username cannot contain a space"required></td>
            </tr>
            <tr>
                <td>Clock Number</td>
                <td><input type="text" name="clockno" id="clock" value="" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td> <input type="password" name="pword" id="pword" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" id="name" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>

<script type="text/javascript" src="jquery.min.js"></script>


<script type="text/javascript">


    function addUser() {
            event.preventDefault();

            var uname = document.getElementById("uname").value;
            var pword = document.getElementById("pword").value;
            var newclock = document.getElementById("clock").value;
            $.ajax({
               type: 'post',
               url: 'adduser.php',
               data: {
                   	NewUsername:uname,
                    NewPassword: pword,
                    NewClock: newclock,
               }
            });

            alert("User " + uname + " added");

            document.getElementById("uname").value = "";
            document.getElementById("pword").value = "";
            document.getElementById("clock").value = "";
            return true;
        }

    function checkUname() {
        var name = document.getElementById("uname").value;

        if (name) {
            $.ajax({
                //type: 'post',
                url: 'checkuname.php',
                data: {
                    user_name: name,
                },

                success: function (response) {
                    $('#name_status').html(response);
                    if (response == "OK") {
                        return true;
                    } else {
                        alert("An account with that username already exists");
                        return false;
                    }
                }
            });
        } else {
            $('#name_status').html("");
            return false;
        }
    }

</script>
<?php
}
?>