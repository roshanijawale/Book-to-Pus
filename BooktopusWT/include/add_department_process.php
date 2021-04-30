<?php

    include("Connection.php");
    session_start();
    if(!isset($_SESSION['user_type']))
	{
		header("location: ../login.php");
    }
    else
	{
		if(isset($_POST['submit']))
		{
            $Dept_name=$_POST['deptname'];
            

            $query="insert into btp_departments(dept_name,dept_status) values ('$Dept_name','active')";
            $result=mysqli_query($con,$query);
            if($result)
            {
                echo "<script>alert('Department are Add Successfully !!!!!!!!!');
			            window.location.href='../admin_index.php';
			            </script>";
            }
            else{
                echo "<script>alert('Department Can not add . Please try again!');
			            window.location.href='../Add_department.php';
			            </script>";
            }
        }
        else{
            echo "<script>alert('Are You Mad . Can not reach this page directly');
			    window.location.href='../Add_department.php';
			    </script>";
        }
    }   
?>