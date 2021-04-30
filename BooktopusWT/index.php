<?php
  session_start();
  include("include/Connection.php");
//     if(isset($_SESSION['user_type']) && isset($_SESSION['login_id']))
// 	{
//         echo $_SESSION['user_type'];
//         echo $_SESSION['login_id'];
//     }

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

        <script>
            function setbackimage(){
                document.getElementById("img1").src="image/book1_1.jpg";
            }
            function setfrontimage(){
                document.getElementById("img1").src="image/book1.png";
            } 
        </script>


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
            <div style="width:200px;text-align:center;margin-right:auto;margin-left:auto;">
                <P style="border-top:5px solid black;border-bottom:5px solid black;font-size:30px;font-family:allura;">New Arrival</P>
            </div>
            <div class="container">
                <div class="card-deck">
                <?php
                    $query1="select * from btp_upload_books,btp_users where book_status='active' and user_status='active' and id_no=btp_upload_books.user_id order by book_id desc limit 3";
                    $rs1=mysqli_query($con,$query1);

                    while($r=mysqli_fetch_assoc($rs1))
                    {   
                        $query2="select sub_name from btp_subjects where sub_id=".$r['sub_id'].";";
                        $result=mysqli_query($con,$query2);
                        while($r1=mysqli_fetch_assoc($result))
                        {
                ?>
                   <div class="card" style="border:none;">
                        <img src=<?php echo 'Upload/'.$r['book_img1'] ?>  class="card-img-top" height="350px">
                        <div class="card-body"style="text-align:center;">
                            <h5 class="card-title"><?php echo $r['book_title'] ?></h5>
                            <p class="card-text"><?php echo $r1['sub_name']  ?></p>
                            <p class="card-text"><?php echo "Author :".$r['book_author'] ?></p>
                            <a href="view_product.php?id=<?php echo $r['book_id'] ?>"><button type="button">More Info</button></a>
                        </div>
                    </div>
            <?php
                        }
                }
            ?>
                </div>
            <div style="width:200px;text-align:center;margin-right:auto;margin-left:auto;">
                <P style="border-top:5px solid black;border-bottom:5px solid black;font-size:30px;font-family:allura;">Other Product</P>
            </div>
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
                    $result1 = mysqli_query($con,"select * from btp_upload_books,btp_users where book_status='active' and user_status='active' and id_no=btp_upload_books.user_id limit $page1,3");
                    while($r2=mysqli_fetch_assoc($result1))
                    {
                        $query2="select sub_name from btp_subjects where sub_id=".$r2['sub_id'].";";
                        $result=mysqli_query($con,$query2);
                        while($i1=mysqli_fetch_assoc($result))
                        {
                ?>  
                <div class="card"style="border:none;">
                    <img src="<?php echo 'Upload/'.$r2['book_img1'] ?>" class="card-img-top" id="img1" height="350px">
                    <div class="card-body"style="text-align:center;">
                        <h5 class="card-title"><?php echo $r2['book_title'] ?></h5>
                        <p class="card-text"><?php echo $i1['sub_name']  ?></p>
                        <p class="card-text"><?php echo "Author :".$r2['book_author'] ?></p>
                       <a href="view_product.php?id=<?php echo $r2['book_id'] ?>"><button type="button">More Info</button></a>
                    </div>
                </div>
                    <?php
                            }
                        }
                    ?>
                </div>
                <?php
                        $paging="select * from btp_upload_books,btp_users where book_status='active' and user_status='active' and id_no=btp_upload_books.user_id";
                        $check=mysqli_query($con,$paging);
                        $total=mysqli_num_rows($check);
                        $v=$total/3;
                        $p=ceil($v);
						
						echo "<div align='center'>";
                        for($i=1;$i<=$p;$i++)
                        {
                            echo "<a href='index.php?page=".$i."' style='font-weight:bold;font-size:20px;margin-left:30px;text-decoration:none;'>".$i."</a>";
                        }
						echo "</div>";
                    ?>
        </div>
            <br>
        <!-- end main part -->
           
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
