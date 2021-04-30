<?php
	session_start();
    include("include/Connection.php");
    include("Navbar.php");

?>
<html>
    <head>
        <title>Notification</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/0b1d7c9201.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/index.css" />
    </head>

    <body>
        <br>
        <div class="container"><br>
            <div class="alert alert-primary justify-content-center" role="alert">Your
			pending requests will be shown here</div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    
                        <th scope="col">Book Image</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Requested By</th>
                        <th scope="col">Requested Date</th>
                        <th scope="col">Contact No</th>
                        <th scope="col">Accept</th>
                        <th scope="col">Reject</th>
                    </tr>
                </thead>
                <tbody>
					
				<?php
					
					$u_id=$_SESSION['login_id'];
					$query="select req_id,req_date,first_name,last_name,book_title,book_img1,user_contact,btp_upload_books.book_id,btp_users.id_no from btp_upload_books,btp_users,btp_pending_request where btp_upload_books.user_id=$u_id and btp_users.id_no=btp_pending_request.user_id and btp_upload_books.book_id=btp_pending_request.book_id order by req_date";
					
					//$query="select * from btp_users";
					$result=mysqli_query($con,$query);
					while($row=mysqli_fetch_assoc($result))
					{  
						
				?>
                    <tr>
                        <td><img src="Upload/<?php echo $row['book_img1'] ?>" width=90px height=100px style="border-radius:50%;"></td>
                        <td><?php echo $row['book_title'] ?></td>
                        <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                        <td><?php echo $row['req_date'] ?></td>
                        <td><?php echo $row['user_contact'] ?></td>
                        <td><a  href="include/accept_request.php?book_id=<?php echo $row['book_id'] ?> & recipentid=<?php echo $row['id_no'] ?>" ><button type="button"class="btn btn-success bg-success">Accept</button></a></td>
                        <td><a  href="include/reject_request.php?id=<?php echo $row['req_id'] ?>"><button type="button" class="btn btn-danger bg-danger">Reject</button></a></td>
                    </tr>
				<?php
					}
				?>
                </tbody>
            </table>
        </div>
          
    </body>
</html>