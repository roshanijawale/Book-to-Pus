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
        
        $query="update btp_subjects set sub_status='active' where sub_id=$id";
        $result=mysqli_query($con,$query);
        if($result)
        {
            echo "<script>alert('Record is Active now !!!!!!!!!');
			            window.location.href='../admin_subject.php';
			            </script>";
        }
        else
        {
            echo "<script>alert('Record is not active !!!!!!!!!');
			            window.location.href='../admin_subject.php';
			            </script>";
        }
    }
?>