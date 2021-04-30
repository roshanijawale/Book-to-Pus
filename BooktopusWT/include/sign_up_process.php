<?php 
    
    include("connection.php");
    
    if(isset($_POST['signup']))
    {
        
        $User_id=$_POST["userid"];
        $Fname=$_POST["fname"];
        $Lname=$_POST["lname"];
        $Email=$_POST["email"];
        $Password=$_POST["pass"];
        $Phoneno=$_POST["phoneno"];
        $Type=$_POST["type"];
        $Branch=$_POST["branch"];
        $flag=0;
				
		$result1=mysqli_query($con,"select * from btp_users where id_no=$User_id and user_email='$Email'");
		
		if(($result1->num_rows)==1)
		{
			echo "<script>alert('You are already Registerd');
			window.location.href='../Signup.php';
			</script>";
		}
		else
		{			
			$result2=mysqli_query($con,"select * from btp_valid_users where valid_id_no='$User_id' and valid_email='$Email' and valid_type='$Type'");
			
			if(($result2->num_rows)==1)
			{
				$query="insert into btp_users(id_no,first_name,last_name,user_contact,user_email,dept_id,user_password,user_type,user_status) values ($User_id,'$Fname','$Lname',$Phoneno,'$Email',$Branch,'$Password','$Type','active')";
                $res=mysqli_query($con,$query);
                if($res)
                {
					echo "<script>alert('Registered Successfully......!');
					window.location.href='../login.php';
					</script>";
                }
                else
				{
					echo "<script>alert('Registration Failed...Try Later');
					window.location.href='../Signup.php';
					</script>";
                }
			}
			else
			{
				echo "<script>alert('This Id or Email is invalid ...!Please contact to your Principal Sir');
				window.location.href='../Signup.php';
				</script>";
			}
		}
	}
    else
	{
        echo "<script>alert('You are not able to sign up.........!Because You are not in community .')
        window.location.href='../Signup.php';
        </script>";
	}
?>

 <!-- create table btp_users1(user_id bigint(20) primary key auto_increment,id_no bigint(20) not null,first_name varchar(20) not null,last_name varchar(20) not null,user_contact bigint(10) not null,dept_id bigint(15) not null,user_password varchar(20) not null,user_type enum('admin','student','professor') not null,user_status enum('active','deactive'),foreign key(id_no) references btp_valid_users(valid_id_no),foreign key(dept_id) references btp_departments(dept_id)); --> -->