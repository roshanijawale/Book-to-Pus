<?php 
    include("include/connection.php");
    session_start();
    if(!isset($_SESSION['login_id']))
    {
        header("location:login.php");
    }
    else{
        $utype=$_SESSION['user_type'];
        if($utype!="admin")
        {
            header("location:index.php");
        }
        else{
            include("Navbar1.php");
        ?>

<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0b1d7c9201.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css" />
</head>

<body>

    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>
                        <i class="fas fa-upload" style="color: #27aae1;margin-right: 5px;"></i> Add New Subject
                    </h3>
                </div>
            </div>
        </div>
    </header>
    <br>
    <!-- Main start -->
    <section class="container py-2 mb-4">
        <div class="row">
            <div class="offset-lg-1 col-lg-10">
                <!-- here offset means we can give space first column and last column -->
                <form action="include/add_subject_process.php" method="POST">
                    <div class="card text-light" style="width: 70%;margin-left: auto;margin-right: auto;">
                        <div class="card-header bg-secondary">
                            <h3>Subject Details</h3>
                        </div>
                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="Subject Name"><span class="FieldInfo">Subject Name</span></label>
                                <input class="form-control" type="text" name="subname" id="t1"
                                    placeholder="Enter Subject Name Here">
                            </div>
                            <div class="form-group">
                                <label for="UserId"><span class="FieldInfo">Subject Code</span></label>
                                <input class="form-control" type="text" name="subcode" id="t1"
                                    placeholder="Enter Subject Code Here">
                            </div>
                            <div class="form-group">
                                <label for="UserId"><span class="FieldInfo">Subject Semister</span></label>
                                <input class="form-control" type="text" name="subsemister" id="t1"
                                    placeholder="Enter Subject Semister">
                            </div>

                            <div class="form-group">
                                <label for="UserId"><span class="FieldInfo">Department</span></label>
                                <select class="form-control" name="dept">
                                    <option value="">select</option>
                                        <?php
                                            $result=mysqli_query($con,"select * from btp_departments");
                                            while($row=mysqli_fetch_array($result)){
                                            echo 1;
                                            echo "<option value='".$row['dept_id']."'>" .$row['dept_name']. "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="admin_index.php" class="btn btn-warning btn-block"><i
                                            class="fas fa-arrow-left"></i>Back</a>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" name="submit" class="btn btn-success btn-block"><i
                                            class="fas fa-check"></i>Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </section>

    

    <!-- Main Ends -->
    <?php
       include("Footer.php"); 
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
    <?php
          }
        }  
    ?>
</html>