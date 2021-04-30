<?php 
    include("include/connection.php");
?>
<html>
<head>
    <title>
        Sign UP
    </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    
</head>

<body>
    <h1 style="text-align: center; color: white;">Welcome To Booktopus</h1>
    <form action="include/sign_up_process.php" method="POST">
        <div class="signinlogin-box">
            <h1>Sign In</h1>
            <div class="textbox">
                <i class="material-icons">person</i>
                <input type="text" placeholder="Enter Id Number Here" name="userid" required>
            </div>
            <div class="textbox">
                <i class="material-icons">person</i>
                <input type="text" placeholder="First Name" name="fname" required>
            </div>
            <div class="textbox">
                <i class="material-icons">person</i>
                <input type="text" placeholder="Last Name" name="lname" required>
            </div>
            <div class="textbox">
                <i class="material-icons">email</i>
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="textbox">
                <i class="material-icons">lock</i>
                <input type="password" placeholder="PassWord" name="pass" required>
            </div>
            <div class="textbox">
                <i class="material-icons">phone</i>
                <input type="text" placeholder="Contact Number" name="phoneno" required>
            </div>
            <div class="textbox">
                <label>Sign Up As</label> :
                <select name="type" required>
                    <option value="select">Select</option>
                    <option value="student">Student</option>
                    <option value="professor">Professor</option>
                </select>
            </div>
            <div class="textbox">
                <label for="branch">Branch Name</label> :
                <select name="branch" required>
                    <option value="select">select</option>
                    <?php
                        $result=mysqli_query($con,"select * from btp_departments where dept_status='active'");
                        while($row=mysqli_fetch_array($result)){
                            echo "<option value='".$row['dept_id']."'>" .$row['dept_name']. "</option>";
                        }
                    ?>
                    <!-- <option>Computer</option>
                    <option>Electronic</option>
                    <option>Electrical</option>
                    <option>Civil</option>
                    <option>Mechanical</option>
                    <option>Chemical</option> -->
                </select>
            </div>
            <input type="submit" value="Register" name="signup" class="btn">
        </div>
    </form>
</body>
<style>
    body {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.5)), url('./image/background.jpg');
        background-size: 100% 200%;
        background-repeat: no-repeat;
    }
</style>

</html>