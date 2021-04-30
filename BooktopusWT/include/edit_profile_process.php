<?php
    include("Connection.php");
    session_start();
    if(!isset($_SESSION['login_id']))
    {
        header("loaction:../login.php");
    }
    else
    {
        if(isset($_POST['submit']))
        {
            $First_name=$_POST['firstname'];
            $Last_name=$_POST['lastname'];
            $Password=$_POST['password'];
            $Contact=$_POST['contact'];
            $userid=$_SESSION['login_id'];

            $query="update btp_users set first_name='$First_name' ,last_name='$Last_name' ,user_password='$Password',user_contact='$Contact' where id_no='$userid' ";
            $result=mysqli_query($con,$query);
            if($result)
            {
                 echo "<script>alert('Your data are update Successfully !!!!!!!!!');
			            window.location.href='../History.php';
			            </script>";
            }
            else
            {
                 echo "<script>alert('Your data can not update Successfully !!!!!!!!!');
			            window.location.href='../edit_profile.php';
			            </script>";
            }
        }
        else
        {
             echo "<script>alert('Enter your Data Correctly !!!!!!!!!');
			            window.location.href='../edit_profile.php';
			            </script>";
        }
    }
?>