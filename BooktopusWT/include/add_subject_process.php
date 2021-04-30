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
            $Sub_name=$_POST['subname'];
            $Sub_code=$_POST['subcode'];
            $Sub_semister=$_POST['subsemister'];
            $Department=$_POST['dept'];
            

            $query="insert into btp_subjects (dept_id,subject_code,sub_name,sub_semister,sub_status) values ('$Department','$Sub_code','$Sub_name','$Sub_semister','active')";
            $result=mysqli_query($con,$query);
            if($result)
            {
                echo "<script>alert('Subject are Add Successfully !!!!!!!!!');
			            window.location.href='../admin_index.php';
			            </script>";
            }
            else{
                echo "<script>alert('Subject Can not add . Please try again!');
			            window.location.href='../Add_subject.php';
			            </script>";
            }
        }
        else{
            echo "<script>alert('Are You Mad . Can not reach this page directly');
			    window.location.href='../Add_subject.php';
			    </script>";
        }
    }   
?>