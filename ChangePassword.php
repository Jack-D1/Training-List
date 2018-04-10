<?php
include("check.php");

if($_SESSION['UserID'] > 2){
    header("Location: home.php");
}else{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Change Password</title>
</head>
<body>
    <form method="post" onsubmit="updatePassword();">
        <table>
            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="uname" id="uname" required />
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="pword" id="pword" required />
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Submit" /></td>
            </tr>
        </table>
    </form>
</body>
</html>
<script type="text/javascript" src="jquery.min.js"></script>


<script type="text/javascript">

    function updatePassword() {
        event.preventDefault();
        var username = document.getElementById("uname").value;
        var password = document.getElementById("pword").value;
        $.ajax({
            type: 'post',
            url: 'password.php',
            data: {
                Username: username,
                Password: password,
            }
        });

        alert("User " + uname + "'s password updated");

        document.getElementById("uname").value = "";
        document.getElementById("pword").value = "";
        return true;
    }

</script>
<?php
}
?>