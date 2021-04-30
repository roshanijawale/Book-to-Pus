<?php

include("include/Connection.php");
include("Navbar.php");

?>
<html>
    <head>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/0b1d7c9201.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/index.css" />
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    </head>
    <body>
        <br>

        <!-- carousel start -->

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="image/sample-1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="image/sample-2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="image/corosal1.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="image/corosal4.jpeg" class="d-block w-100" alt="...">
            </div>
        </div>
        </div>

        <!-- carousel end -->

        <!-- main part -->
        <br>
            <div class="container" style="min-height:400px">
                <div class="card-deck">
            <?php
                if(isset($_GET['search']))
                {
                    $query="select * from btp_upload_books where book_title like '{$_GET['search']}%' limit 25";
                    $result=mysqli_query($con,$query);
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row=mysqli_fetch_array($result))
                        {
                            $query2="select sub_name from btp_subjects where sub_id=".$row['sub_id'].";";
                            $result1=mysqli_query($con,$query2);
                            while($r1=mysqli_fetch_assoc($result1))
                            {
            ?>
                                <div class="card col-4" style="border:none;">
                                    <img src=<?php echo 'Upload/'.$row['book_img1'] ?>  class="card-img-top" height="350px">
                                    <div class="card-body"style="text-align:center;">
                                        <h5 class="card-title"><?php echo $row['book_title'] ?></h5>
                                        <p class="card-text"><?php echo $r1['sub_name']  ?></p>
                                        <p class="card-text"><?php echo "Author :".$row['book_author'] ?></p>
                                        <a href="view_product.php?id=<?php echo $row['book_id'] ?>"><button type="button">More Info</button></a>
                                    </div>
                                </div>
            <?php
                            }
                        }
                    }
                    else
                    {
            ?>
                <div class="alert alert-primary justify-content-center" role="alert">Student
	    		    and professor data are show below</div>
                    <br><br><br>
            <?php
                }
                }
            ?>
            </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
            <?php
                include("Footer.php");
            ?>
        </body>
</html>