<?php 
 
include("Connection.php");
session_start();
if(!isset($_SESSION['login_id']))
{
    header("localhost:../login.php");
}
else
{
        $id=$_GET['id'];
        $query="delete from btp_pending_request where req_id=$id";
        $result=mysqli_query($con,$query);

        if($result)
        {
            echo "<script>alert('Request Delete');
                window.location.href='../Notification.php';
            </script>";
        }
        else{
            echo "<script>alert('Something went Wrong');
                window.location.href='../Notification.php';
            </script>";
        }
}


?>