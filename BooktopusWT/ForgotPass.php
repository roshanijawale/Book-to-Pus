<?php 
    include("include/connection.php");
?>
<html>

<head>
    <title>
        Forgot Password
    </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <h1 class="header">Welcome To Booktopus</h1>
    <form action="include/forgot_process.php" method="POST">
        <div class="login-box" style="width:320px">
            <h1>Forgot Password</h1>
            <div class="textbox">
                <i class="material-icons">email</i>
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="textbox">
                <i class="material-icons">lock</i>
                <input type="password" placeholder="New passWord" name="pass" required >
            </div>
            <div class="textbox">
                <i class="material-icons">lock</i>
                <input type="password" placeholder="Confirm New passWord" name="newpass" required >
            </div>
            <input type="submit"  name="submit" value="submit" class="btn">
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