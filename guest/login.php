<?php

include('../assets/connection/connection.php');

if (isset($_POST['btnlogin'])) {
  
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $userpass = mysqli_real_escape_string($conn, $_POST['userpass']);


    $sql = "SELECT * FROM tbl_user WHERE user_name = '$username' AND user_password = '$userpass'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) == 1) {

        session_start();
        $_SESSION['username'] = $username; 
        
        header("Location: ../users/Homepage.php");
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
<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: rgb(200, 213, 233);
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    background-color: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 0 20px rgb(253, 102, 2);
    width: 350px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    background-color: rgb(0, 0, 0);
    color: white;
    padding: 1rem;
    font-size: 1.2rem;
    border-radius: 10px 10px 2 2;
}

td {
    padding: 0.8rem;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 0.8rem;
    border: 2px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 1rem;
}

input[type="text"]:focus,
input[type="password"]:focus {
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
}

input[type="submit"] {
    background-color: #3498db !important;
    color: white !important;
    padding: 0.8rem 1.5rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s;
    width: 100%;
}

input[type="submit"]:hover {
    background-color: #2980b9 !important;
}

.error-message {
    color: #e74c3c;
    margin: 1rem 0;
    text-align: center;
}

a {
    text-decoration: none;
    color: #4CAF50;
    margin-top: 20px;
    display: inline-block;
}

a:hover {
    text-decoration: underline;
}

.back-link {
    margin-top: 10px;
}

@media (max-width: 480px) {
    .container {
        width: 90%;
        margin: 1rem;
    }
}
</style>

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