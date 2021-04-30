<?php
    include("Connection.php");

    session_start();
    if(!isset($_SESSION['user_type']))
	{
		header("location:login.php");
    }
    else{
        $Book_id=$_GET['id'];
       
        $query="select user_id from btp_upload_books where book_id=$Book_id";
        $result=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            if($row['user_id']==$_SESSION['login_id'])
            {
                echo "hello";
                echo "<script> alert('Can not Request The Book Which Is Uploaded By You ');
                window.location.href='../index.php';
                </script>";
            }
            else
            {
                $id=$_SESSION['login_id'];
                $query1="insert into btp_pending_request (user_id,book_id,req_date) values ('$id','$Book_id',curdate())";
                $result1=mysqli_query($con,$query1);
                if($result1)
                {
                    echo "<script>alert('Your Request is sent !!!!!!!!!!!');
                    window.location.href='../index.php';
                    </script>";
                }
                else{
                    echo "<script>alert('Some What Is Going Wrong !!!!!!!!!!!');
                    window.location.href='../view_product.php?id=$Book_id';
                    </script>";
                }
                
            }
        }
        
    }


?>