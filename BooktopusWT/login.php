<?php 
    include("include/connection.php");
?>
<html>

<head>
    <title>
        Login
    </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <h1 class="header">Welcome To Booktopus</h1>
    <form action="include/login_process.php" method="POST">
        <div class="login-box">
            <h1 class="loginheader">Login</h1>
            <div class="textbox">
                <i class="material-icons">email</i>
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="textbox">
                <i class="material-icons">lock</i>
                <input type="password" placeholder="Password" name="pass" required >
            </div>
            <input type="submit"  name="login" value="Login" class="btn">
            <div class="margin">
                <a href="Signup.php" class="sign">Sign Up</a>
                <a href="#" class="hr"></a>
                <a href="Forgotpass.php" class="forgot">Forgot Password</a>
            </div>
        </div>
    </form>
</body>
<style>
    body {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.5)), url('./image/background.jpg');
        background-size: 100% 100%;
        background-repeat: no-repeat;
    }
</style>

</html>