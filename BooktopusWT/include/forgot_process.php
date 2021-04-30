<?php 

    include("Connection.php");

    if(isset($_POST['submit']))
    {
        $Email=$_POST['email'];
        $Password=$_POST['pass'];
        $Npassword=$_POST['newpass'];
		
		
            $result=mysqli_query($con,"select * from btp_users where user_email='$Email'");
            if(($row=(mysqli_num_rows($result)))==1)
            {
                if($Password==$Npassword)
                {
                    $query1="update btp_users set user_password='$Password' where user_email='$Email'";
                    $result1=mysqli_query($con,$query1);
                    if($result1)
                    {
						
                        echo "<script>alert('Your Password are change successfully !!!!!!!!!');
			            window.location.href='../login.php';
			            </script>";
                    }
                    else
                    {
                        echo "<script>alert('Your Password cna not change successfully !!!!!!!!!');
			            window.location.href='../ForgotPass.php';
			            </script>";
                    }
                }
                else
                {
					
                    echo "<script>alert('Both Password does not match !!!!!!!!!');
			            window.location.href='../ForgotPass.php';
			            </script>";
                }
            }
            else
            {
                echo "<script>alert('Your are not registered . Please Do registation first .');
			            window.location.href='../Signup.php';
			            </script>";
            }
    }
    else
    {
        echo "<script>alert('Enter the details Correctly');
			            window.location.href='../ForgotPass.php';
			            </script>";
    }

?>
