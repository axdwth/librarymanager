<?php
include("../Assets/Connection/connection.php");

?>
<?php
if(isset($_POSt['btnlogin'])&&($_POSt['username'])!=""&&($_POSt['userpass'])!=""&&($_POSt['username'])!=""&&($_POSt['useremail'])!=""&&($_POSt['useraddress'])!=""&&($_POSt['useraddress'])!="")
{
    $username=$_POST['username'];
    $userpass=$_POST['userpass'];
    $useremail=$_POST['useremail'];
    $useraddress=$_POST['useraddress'];
    $userphone=$_POST['userphone'];
    
$insqry="INSERT into tbl_user('user_name','user_password','user_address','	user_email','user_phone')values('$username','$userpass','$useraddress','$useremail','$userphone')";
$result=mysqli_query($con,$insqry);
if($result)
{
    echo"<script>
    alert('inserted');
    </script>";
}
else
{
    echo"<script>
    alert('not inserted');
    </script>"; 
}
}
else
{
    echo "please fill all the fields";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<script>
function valid() {
    var uname = document.getElementById('username').value;
    var uemail = document.getElementById('username').value;
    var uaddess = document.getElementById('username').value;
    var upassword = document.getElementById('username').value;
    var cpass = document.getElementById('username').value;
    var uphone = document.getElementById('username').value;
}
</script>

<body>
    <center>
        <h1>Register</h1>
        <table border="1">
            <tr>
                <th name="register">
                    <center>Name</center>
                <td>
                    <input type="text" name="username" id="username" placeholder="Enter Username">
                </td>
                </th>
            </tr>
            <tr>
                <th name="register">
                    <center>Password</center>
                <td>
                    <input type="text" name="userpass" id="userpass" placeholder="Enter userpass">
                </td>
                </th>
            </tr>
            <tr>
                <th name="register">
                    <center>Email</center>
                <td>
                    <input type="text" name="useremail" id="useremail" placeholder="Enter useremail">
                </td>
                </th>
            </tr>
            <tr>
                <th name="register">
                    <center>Address</center>
                <td>
                    <textarea name="useraddress" id="useraddress" placeholder="Enter useremail"></textarea>
                </td>
                </th>
            </tr>
            <tr>
                <th name="register">
                    <center>Phone</center>
                <td>
                    <input type="text" name="userphone" id="userphone" placeholder="Enter userphone">
                </td>
                </th>
            </tr>
            <tr>
                <th name="register">
                    <center>Conform Password</center>
                <td>
                    <input type="password" name="usercpass" id="usercpass" placeholder="Enter userpass">
                </td>
                </th>
            </tr>
        </table>

        <input type="submit" name="btnlogin" id="btnlogin" value="Login" onclick=vlaid()>
    </center>
</body>

</html>