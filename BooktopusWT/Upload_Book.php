<?php 
    include("include/connection.php");
    session_start();
    
    if(isset($_SESSION['login_id']))
    {  
		$utype=$_SESSION['user_type'];
        if($utype=="student" || $utype=="professor")
        {
            include("Navbar.php");
        }

        else if($utype=="admin"){
            include("Navbar1.php");
        }
    }
    else
    {
		 echo "<script>alert('Login First')
            window.location.href='login.php'
            </script>";
		 //header("location : login.php");
    }
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
                    <h1>
                        <i class="fas fa-upload" style="color: #27aae1;margin-right: 5px;"></i> Upload Book
                    </h1>
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
                <form action="include/Upload_Book_process.php" method="POST" enctype="multipart/form-data">
                    <div class="card text-light" style="width: 70%;margin-left: auto;margin-right: auto;">
                        <div class="card-header bg-secondary">
                            <h1>Add Book Details</h1>
                        </div>
                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="UserId"><span class="FieldInfo">User Id</span></label>
                                <input class="form-control" type="text" name="userid" id="t1"
                                    placeholder="Enter user id here">
                            </div>
                            <div class="form-group">
                                <label for="UserId"><span class="FieldInfo">Book Title</span></label>
                                <input class="form-control" type="text" name="booktitle" id="t2"
                                    placeholder="Enter Book Title here">
                            </div>
                            <div class="form-group">
                                <label for="UserId"><span class="FieldInfo">Book Author</span></label>
                                <input class="form-control" type="text" name="bookauthor" id="t3"
                                    placeholder="Enter Book Author here">
                            </div>
                            <div class="form-group">
                                <label for="UserId"><span class="FieldInfo">Book Publication</span></label>
                                <input class="form-control" type="text" name="bookpublication" id="t4"
                                    placeholder="Enter Book Publication here">
                            </div>
                            <div class="form-group">
                                <label for="UserId"><span class="FieldInfo">Book Edition</span></label>
                                <input class="form-control" type="text" name="bookedition" id="t5"
                                    placeholder="Enter Book Edition here">
                            </div>
                            <div class="form-group">
                                <label for="UserId"><span class="FieldInfo">Subject</span></label>
                                <select class="form-control" name="subject">
                                    <option value="">select</option>
                                        <?php
                                            $result=mysqli_query($con,"select * from btp_subjects where dept_id in (select dept_id from btp_departments where dept_status='active')");
                                            while($row=mysqli_fetch_array($result)){
                                            echo 1;
                                            echo "<option value='".$row['sub_id']."'>" .$row['sub_name']. "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="UserId"><span class="FieldInfo">Book Front Image</span></label>
                                <input class="form-control" type="file" name="file" id="t7"
                                    placeholder="Choose Book Front Image" style="height: auto;">
                                    <b>*Must be less than 2 MB [.jpg, .jpeg, .png]</b>
                            </div>
                            <div class="form-group">
                                <label for=""><span class="FieldInfo">Book Desciption</span></label>
                                <textarea name="bookdescription" class="form-control" cols="300" rows="10"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="index.html" class="btn btn-warning btn-block"><i
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

</html>