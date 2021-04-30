<?php

    include("Connection.php");
    session_start();
    if(!isset($_SESSION['user_type']))
	{
		header("location: ../login.php");
    }
    else
	{
        $id=$_GET['id'];
        
        $query="update btp_users set user_status='active' where id_no=$id";
        $result=mysqli_query($con,$query);
        if($result)
        {
            echo "<script>alert('Record is active now !!!!!!!!!');
			            window.location.href='../admin_index.php';
			            </script>";
        }
        else
        {
            echo "<script>alert('Record is not active !!!!!!!!!');
			            window.location.href='../admin_index.php';
			            </script>";
        }
    }
?>