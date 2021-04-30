<?php 
    session_start();
    if(!isset($_SESSION['user_type']))
	{
		header("location:login.php");
    }
    else{
		
    include("include/Connection.php");
    include("Navbar.php"); 
?>
<html>
    <head>
        <title>View Product</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/0b1d7c9201.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/index.css" />
    </head>
    <body>
        <br>
        <div style="width:200px;text-align:center;margin-right:auto;margin-left:auto;">
                <P style="border-top:5px solid black;border-bottom:5px solid black;font-size:30px;font-family:allura;">Book Details</P>
        </div>
        <br>
        <div class="container">
            
            <div class="row">
            <?php
					$id=$_GET['id'];
					
                    $query="select book_id,book_author,book_publication,book_title,book_edition,book_img1,subject_code,first_name,last_name,book_description from btp_upload_books,btp_subjects,btp_users where book_id=$id and btp_upload_books.user_id=btp_users.id_no and btp_upload_books.sub_id=btp_subjects.sub_id;";
                    $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($result))
                    {              
            ?>
            <div class="col-lg-6">
              
                <img src=<?php echo 'Upload/'.$row['book_img1'] ?> width="400px" height="450px">
            </div>
            <div class="col-lg-6">
                <h2><?php echo $row['book_title'] ?></h2>
                <br>
                <p>Book Author :<?php echo $row['book_author'] ?> </p>
                <p>Book Publication : <?php echo $row['book_publication'] ?></p>
                <p>Book Edition : <?php echo $row['book_edition'] ?></p>
                <p>Subject code : <?php echo $row['subject_code'] ?></p>
                <p>Uploaded By : <?php echo $row['first_name'] ." ". $row['last_name'] ?></p>
                <p style="text-align:justify"><?php echo $row['book_description'] ?></p>
                <div class="row">
                    <div class="col-lg-6">
                        <a href="index.php" class="btn btn-warning btn-block bg-warning" style="height:50px;"><i
                                            class="fas fa-arrow-left"></i>Back</a>
                    </div>
                    
                    <div class="col-lg-6">
                        <a href="include/request_book.php?id=<?php echo $row['book_id']?>"><button type="button" name="submit" class="btn btn-success btn-block bg-success" style="height:50px;"><i
                                            class="fas fa-check"></i>Request</button></a>
                    </div>
                </div>
            </div>
            
            <?php
                            
                        
                    }
        ?>
        </div>
        </div>
        
        <br>
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
        include("Footer.php");
    ?>
</html>
<?php
    }
?>