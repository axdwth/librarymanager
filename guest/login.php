<?php
include("../Assets/Connection/connection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="login.php" method="POST">
        <center>

            <table border="1">
                <tr>
                    <th>login</th>

                </tr>
                <tr>
                    <td>
                        <input type="text" name="username" id="username" placeholder="Enter Username">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="userpass" id="userpass" placeholder="Enter userpass">
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                        <input type="submit" name="btnlogin" id="btnlogin" value="Login"
                            style="background-color:gray;color:white;" align="center">
                    </td>
                </tr>
            </table>
            <a href="register.php">Register new user</a>
        </center>
    </form>
</body>

</html>