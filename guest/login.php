<?php

include("../Assets/Connection/connection.php");

if (isset($_POST['btnlogin'])) {
  
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $userpass = mysqli_real_escape_string($conn, $_POST['userpass']);


    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$userpass'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) == 1) {

        session_start();
        $_SESSION['username'] = $username; 
        
        header("Location: homepage.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
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
                    <th>Login</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="username" id="username" placeholder="Enter Username" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="userpass" id="userpass" placeholder="Enter Password" required>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                        <input type="submit" name="btnlogin" id="btnlogin" value="Login"
                            style="background-color:gray;color:white;">
                    </td>
                </tr>
            </table>

            <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <a href="register.php">Register new user</a>
        </center>
    </form>
</body>

</html>