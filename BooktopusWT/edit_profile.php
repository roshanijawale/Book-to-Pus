<?php
    include("include/Connection.php");
    session_start();
    if(!isset($_SESSION['login_id']))
    {
        header("location:login.php");
    }
    else{
        include("Navbar.php");

        $user_id=$_SESSION['login_id'];

        $query="select first_name,last_name,user_password,user_contact from btp_users where id_no=$user_id";
        $result=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($result))
        {
?>
<html>
    <head>
        <title>Edit Profile</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/0b1d7c9201.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/index.css" />
    </head>
    <body>
    <br>
        <section class="container py-2 mb-4">
        <div class="row">
            <div class="offset-lg-1 col-lg-10">
                <!-- here offset means we can give space first column and last column -->
                <form action="include/edit_profile_process.php" method="POST" enctype="multipart/form-data">
                    <div class="card text-light" style="width: 70%;margin-left: auto;margin-right: auto;">
                        <div class="card-header bg-secondary">
                            <h1>Edit Profile</h1>
                        </div>
                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="UserId"><span class="FieldInfo">First Name</span></label>
                                <input class="form-control" type="text" name="firstname" value=<?php echo $row['first_name'] ?> id="t1"
                                    placeholder="Enter user id here">
                            </div>
                            <div class="form-group">
                                <label for="UserId"><span class="FieldInfo">Last Name</span></label>
                                <input class="form-control" type="text" name="lastname" value=<?php echo $row['last_name'] ?> id="t2"
                                    placeholder="Enter Book Title here">
                            </div>
                            <div class="form-group">
                                <label for="UserId"><span class="FieldInfo">Passsword</span></label>
                                <input class="form-control" type="text" name="password" value=<?php echo $row['user_password'] ?> id="t3"
                                    placeholder="Enter Book Author here">
                            </div>
                            <div class="form-group">
                                <label for="UserId"><span class="FieldInfo">Contact No</span></label>
                                <input class="form-control" type="text" name="contact" value=<?php echo $row['user_contact'] ?> id="t4"
                                    placeholder="Enter Book Publication here">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="History.php" class="btn btn-warning btn-block"><i
                                            class="fas fa-arrow-left"></i>Back</a>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" name="submit" class="btn btn-success btn-block"><i
                                            class="fas fa-check"></i>Save Change</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </section>
    <?php
        }
    }
    ?>
    </body>

    <?php
        include("Footer.php");
    ?>
</html>