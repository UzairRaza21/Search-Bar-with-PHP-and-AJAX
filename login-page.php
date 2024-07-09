<?php
session_start();
include "conn.php";
if (isset($_SESSION['admin_name'])){
    header("location: dashboard.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash.css">
    <title>Login</title>
</head>
<body class="login-body">
    
<div class="login-section">


<h3>Login User</h3>

<form action="" method="post">

    <label for="">Username</label><br>
    <input type="text" name="username" id="username" placeholder="Enter Username"><br><br>
    
    <label for="">Password </label><br>
    <input type="password" name="passwor" id="password" placeholder="Enter Password" ><br><br>
   
    <input type="submit" class="login-button" value="Log In" name="login" ><br>
</form>

</div>

<?php

if (isset($_POST['login'])){

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['passwor']);

    $sql = "SELECT * FROM `admin` WHERE admin_name = '$username' AND admin_password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1){
        $_SESSION['admin_name'] = $username;
        header("location: dashboard.php");
    }else{
        echo "Invalid Username or Password";
    }
}

?>




</body>
</html>