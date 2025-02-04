<?php
include('../assets/connection/connection.php');

if (isset($_POST['btnlogin']) && $_POST['username'] != "" && $_POST['userpass'] != "" && $_POST['useremail'] != "" && $_POST['useraddress'] != "" && $_POST['userphone'] != "") {
    $username = $_POST['username'];
    $userpass = $_POST['userpass'];
    $useremail = $_POST['useremail'];
    $useraddress = $_POST['useraddress'];
    $userphone = $_POST['userphone'];

    // SQL Query to insert user into the table
    $insqry = "INSERT INTO tbl_user (user_name, user_password, user_address, user_email, user_phone) 
               VALUES ('$username', '$userpass', '$useraddress', '$useremail', '$userphone')";
    $result = mysqli_query($conn, $insqry);

    if ($result) {
        echo "<script>alert('User registered successfully');</script>";
        header("Location:login.php");
        exit();
    } else {
        echo "<script>alert('Error: User not inserted');</script>";
    }
} else {
    echo "Please fill all the fields.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script>
    function valid() {
        var uname = document.getElementById('username').value;
        var uemail = document.getElementById('useremail').value;
        var uaddress = document.getElementById('useraddress').value;
        var upassword = document.getElementById('userpass').value;
        var cpass = document.getElementById('usercpass').value;
        var uphone = document.getElementById('userphone').value;

        if (uname === "" || uemail === "" || uaddress === "" || upassword === "" || cpass === "" || uphone === "") {
            alert("All fields are required!");
            return false;
        }

        if (upassword !== cpass) {
            alert("Passwords do not match!");
            return false;
        }
        return true;
    }
    </script>
</head>

<body>
    <center>
        <form action="register.php" method="POST" onsubmit="return valid()">
            <h1>Register</h1>
            <table border="1">
                <tr>
                    <th>
                        <center>Name</center>
                    </th>
                    <td><input type="text" name="username" id="username" placeholder="Enter Username"></td>
                </tr>
                <tr>
                    <th>
                        <center>Password</center>
                    </th>
                    <td><input type="password" name="userpass" id="userpass" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <th>
                        <center>Email</center>
                    </th>
                    <td><input type="email" name="useremail" id="useremail" placeholder="Enter Email"></td>
                </tr>
                <tr>
                    <th>
                        <center>Address</center>
                    </th>
                    <td><textarea name="useraddress" id="useraddress" placeholder="Enter Address"></textarea></td>
                </tr>
                <tr>
                    <th>
                        <center>Phone</center>
                    </th>
                    <td><input type="text" name="userphone" id="userphone" placeholder="Enter Phone Number"></td>
                </tr>
                <tr>
                    <th>
                        <center>Confirm Password</center>
                    </th>
                    <td><input type="password" name="usercpass" id="usercpass" placeholder="Confirm Password"></td>
                </tr>
            </table>
            <input type="submit" name="btnlogin" id="btnlogin" value="Register"
                style="background-color:gray;color:white;">
        </form>
    </center>
</body>

</html>