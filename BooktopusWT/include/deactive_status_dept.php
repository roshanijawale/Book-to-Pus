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
        
        $query="update btp_departments set dept_status='deactive' where dept_id=$id";
        $query1="update btp_subjects set sub_status='deactive' where dept_id=$id";
        $result=mysqli_query($con,$query);
        $result1=mysqli_query($con,$query1);
        if($result && $result1)
        {
            echo "<script>alert('Record is Deactive now !!!!!!!!!');
			            window.location.href='../admin_dept.php';
			            </script>";
        }
        else
        {
            echo "<script>alert('Record is not Deactive !!!!!!!!!');
			            window.location.href='../admin_dept.php';
			            </script>";
        }
    }
?>