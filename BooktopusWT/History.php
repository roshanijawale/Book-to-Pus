<?php
    include("include/Connection.php");
    session_start();
    if(!isset($_SESSION['login_id']))
    {
        header("location:login.php");
    }
    else{
        include("Navbar.php");
        $userid=$_SESSION['login_id'];
?>
<html>
    <head>
        <title>History</title>

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
                <P style="border-top:5px solid black;border-bottom:5px solid black;font-size:30px;font-family:allura;">Profile</P>
        </div>
        <div style="border :5px solid yellow; max-height:410px" class="bg-dark row prof">
            <?php 
                $query="select first_name,last_name,user_email,user_contact from btp_users where id_no=$userid";
                $result=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($result))
                {

            ?>
            <div class="col-lg-5">
                <img src="image/Profile.jpg" class="image">
            </div>
            <div class="col-lg-7 details">
                <h2>Dr . <?php echo strtoupper($row['first_name']." ".$row['last_name']) ?></h2>
                <h3 class="mar">Email :<?php echo $row['user_email']?></h3>
                <h3 class="mar">Id No :<?php echo $userid ?></h3>
                <h3 class="mar">First Name : <?php echo $row['first_name']?></h3>
                <h3 class="mar">Last Name : <?php echo $row['last_name']?></h3>
                <h3 class="mar">Contact No :<?php echo $row['user_contact']?></h3>
                <a href="edit_profile.php"><button class="ebutton btn-block">Edit Profile</button></a>
            </div>
            <?php
                }
            ?>
        </div>
        <br>
        <div class="bg-dark text-white">
            <div class="container">
                <br>
                <h1>Uploaded</h1>
                <br>
                <div class="card-deck">
                    <?php	
                        if(!isset($_GET['page']))
                        {
                            $page=1;
                        }			
                        else{
                            $page=$_GET['page'];
                        }
                        if($page=="" || $page=="1")
					    {
						    $page1=0;
					    }
                        else
					    {
						    $page1=($page*3)-3;
					    }
                        $result1 = mysqli_query($con,"select * from btp_upload_books where user_id=$userid limit $page1,3");
                        while($r2=mysqli_fetch_assoc($result1))
                        {
                            $query2="select sub_name from btp_subjects where sub_id=".$r2['sub_id'].";";
                            $result=mysqli_query($con,$query2);
                            while($i1=mysqli_fetch_assoc($result))
                            {
                    ?>
                    <div class="card" style="border:2px solid white;background:none;margin-bottom:20px">
                        <img src="<?php echo 'Upload/'.$r2['book_img1'] ?>" class="card-img-top" height="300px" width="150px">
                        <div class="card-body"style="text-align:center;">
                            <h5 class="card-title"><?php echo $r2['book_title'] ?></h5>
                            <p class="card-text"><?php echo $i1['sub_name']  ?></p>
                            <p class="card-text"><?php echo "Author :".$r2['book_author'] ?></p>
                        </div>
                    </div>
                    <?php 
                            }
                        }
                    ?>
                </div>
                <?php
                    $paging="select * from btp_upload_books where user_id=$userid";
                    $check=mysqli_query($con,$paging);
                    $total=mysqli_num_rows($check);
                    $v=$total/3;
                    $p=ceil($v);
              
					echo "<div align='center'>";
                    for($i=1;$i<=$p;$i++)
                    {
                        echo "<a href='History.php?page=".$i."' style='font-weight:bold;font-size:20px;margin-left:30px;text-decoration:none;'>".$i."</a>";
                    }
					echo "</div>";
                ?>
            </div>
        </div>
        <br>
        <br>
        <div class="bg-dark text-white">
                <br>
                <div class="container">
                    <h1>Received Books</h1>
                    <br>
                <div class="card-deck">
                <?php	
                    if(!isset($_GET['page*']))
                    {
                        $page=1;
                    }			
                    else{
                        $page=$_GET['page*'];
                    }
                    if($page=="" || $page=="1")
					{
						$page1=0;
					}
                    else
					{
						$page1=($page*3)-3;
					}
                    $result1 = mysqli_query($con,"select sub_name,book_author,book_img1,book_title from btp_upload_books,btp_subjects,btp_issued_books where btp_issued_books.recepient_id=$userid and btp_issued_books.book_id=btp_upload_books.book_id and btp_upload_books.sub_id=btp_subjects.sub_id limit $page1,3");
                    while($r2=mysqli_fetch_assoc($result1))
                    {
					?>
						<div class="card" style="border:2px solid white;background:none;margin-bottom:20px">
						 <img src="<?php echo 'Upload/'.$r2['book_img1'] ?>" class="card-img-top" height="300px" width="150px">
							<div class="card-body"style="text-align:center;">
								<h5 class="card-title"><?php echo $r2['book_title'] ?></h5>	
								<p class="card-text"><?php echo $r2['sub_name']  ?></p>
								<p class="card-text"><?php echo "Author :".$r2['book_author'] ?></p>
							</div>
						</div>
					<?php
					}
                    ?>
            </div>
			 <?php
                    $paging="select sub_name,book_author,book_title from btp_upload_books,btp_subjects,btp_issued_books where btp_issued_books.recepient_id=$userid and btp_issued_books.book_id=btp_upload_books.book_id and btp_upload_books.sub_id=btp_subjects.sub_id";
                    $check=mysqli_query($con,$paging);
                    $total=mysqli_num_rows($check);
                    $v=$total/3;
                    $p=ceil($v);
              
					echo "<div align='center'>";
                    for($i=1;$i<=$p;$i++)
                    {
                        echo "<a href='History.php?page*=".$i."' style='font-weight:bold;font-size:20px;margin-left:30px;text-decoration:none;'>".$i."</a>";
                    }
					echo "</div>";
                ?>
                <!-- <img src="image/book2.jpg" alt="" style="width:200ppx;height:300px;margin-left:10px;">
                <p>Object Oriented With C++</p> -->
            </div>
        </div>
    <br>
    <br>
    <br>
    <?php
        include("Footer.php");
    ?>
        <style>
            .mar{
                margin-top:20px;
            }
            .ebutton{
                float:right;
                margin-right:35px;
                width:200px;
                height:50px;
                border:none;
                background:#ffeb3b;

            }
            .details{
                color:white;
                padding:20px;
            }
            .prof{
                margin-left:15px;
                margin-right:15px;
            }
            .image{
                width:500px;
                height:400px;
                padding:20px;
                border-radius: 8px;
            }
        </style>
    </body>
</html>
<?php
    }
?>