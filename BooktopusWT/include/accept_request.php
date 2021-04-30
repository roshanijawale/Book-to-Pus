<?php 
 
include("Connection.php");
session_start();
if(!isset($_SESSION['login_id']))
{
    header("localhost:../login.php");
}
else
{
    $book_id=$_GET['book_id'];
    $userid=$_SESSION['login_id'];
    $recipent=$_GET['recipentid'];

    $query="insert into btp_issued_books (user_id,book_id,recepient_id,issued_date) values ('$userid','$book_id','$recipent',curdate())";
    $query1="update btp_upload_books set book_status='deactive' where book_id=$book_id";
    $result=mysqli_query($con,$query);
    $result1=mysqli_query($con,$query1);
    if($result && $result1)
    {
        $query1="delete from btp_pending_request where book_id=$book_id";
        $result1=mysqli_query($con,$query1);
        echo "<script>alert('Request Accepted');
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
