<?php
    include("Connection.php");
    session_start();
    if(isset($_POST['login']))
    {
        $Email = $_POST["email"];
		$Password = $_POST["pass"];
		
        $query = mysqli_query($con,"select * from btp_users where user_email = '$Email' && user_password = '$Password' ");
        
        $result = mysqli_fetch_array($query);
		
		$type = $result['user_type'];
		
		$status = $result['user_status'];
		
    
        $cnt = mysqli_num_rows($query);
        
        
         
        $id = $result['id_no'];

        if($cnt==1)
        {
            if(($type=='student' && $status=='active')  || ($type=='professor' && $status=='active'))
            {
                $_SESSION['login_id']=$id;

                $_SESSION['user_type']=$type;
				
				//echo $_SESSION['user_type'];
                header("location:../index.php");
            }
            elseif($type=='admin')
            {
                $_SESSION['login_id']=$id;

                $_SESSION['user_type']=$type;

                header("location:../admin_index.php");
            }
			else
			{
				echo "<script>alert('Something went wrong')
				window.location.href='../login.php'
				</script>";
			}
        }
        else
		{
            // $_SESSION['login_fail'] = "true";
            echo "<script>alert('Invalid E-mail Id or Password')
            window.location.href='../login.php'
            </script>";

			// header("location:../Upload_Book.php");
		}
    }   
    else
	{
        echo "<script>alert('Something went wrong')
            window.location.href='../login.php'
            </script>";
        // $_SESSION['login_fail'] = "true";
        
		// header("location:../login.php");
	}

?>