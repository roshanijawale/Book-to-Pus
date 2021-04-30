<?php
    include("include/Connection.php");
    session_start();
    $i=1;
    if(!isset($_SESSION['login_id']))
    {
        header("location:login.php");
    }
    else{
        if($_SESSION['user_type']=="admin")
        {
            include("Navbar1.php");
        ?>
    <html>
        <head>
            <title>Admin Index</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
            <script src="https://kit.fontawesome.com/0b1d7c9201.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="css/index.css" />
        </head>
            
        <body>
            <br>
            <div class="container"><br>
                <div class="alert alert-primary justify-content-center" role="alert">Student
	    		and professor data are show below</div>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                    
                            <th scope="col">Sr No</th>
                            <th scope="col">User Id</th>
                            <th scope="col">Email</th>
                            <th scope="col">Type of user</th>
                            <th scope="col">Active</th>
                            <th scope="col">Deactive</th>
                    </tr>
                </thead>
                <tbody>
					
				<?php
					 if(!isset($_GET['page']))
                    {
                        $page=1;
                    }			
                    else{
                        $page=$_GET['page'];
                    }
					if($page=="" || $page=="1")
					{
						$page1=0;
					}
                    else
					{
						$page1=($page*10)-10;
					}
                    $query="select id_no,user_email,user_type,user_status from btp_users limit $page1,10 ";
                    $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($result))
                    {  	
				?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $row['id_no'] ?></td>
                        <td><?php echo $row['user_email'] ?></td>
                        <td><?php echo $row['user_type'] ?></td>
                        <?php if($row['user_status']=="active")
                            {
                        ?>
                        <td><a  href="#" ><button type="button"class="btn btn-success bg-success" disabled>Active</button></a></td>
                        <td><a  href="include/deactive_status_user.php?id=<?php echo $row['id_no'] ?>" ><button type="button"class="btn btn-danger bg-danger">Deactive</button></a></td>
                        <?php
                            }
                            else{
                        ?>
                        <td><a  href="include/active_status_user.php?id=<?php echo $row['id_no'] ?>" ><button type="button"class="btn btn-success bg-success">Active</button></a></td>
                        <td><a  href="#"><button type="button" class="btn btn-danger bg-danger" disabled>Deactive</button></a></td>
                        <?php
                            }
                         $i=$i+1; ?>
                    </tr>
				<?php
					}
				?>
                </tbody>
            </table>
            <?php
                $paging="select * from btp_users";
                $check=mysqli_query($con,$paging);
                $total=mysqli_num_rows($check);
                $v=$total/3;
                $p=ceil($v);              
				echo "<div align='center'>";
                for($i=1;$i<=$p;$i++)
                    {
                        echo "<a href='admin_index.php?page=".$i."' style='font-weight:bold;font-size:20px;margin-left:30px;text-decoration:none;'>".$i."</a>";
                    }
				echo "</div>";
            ?>
        </div>
          
    </body>
</html>
        <?php
        }
        else
        {
            echo "<script>alert('Do not try to system Hack . You are not Admin !!!!');
			    window.location.href='../login.php';
			    </script>";
        }
    }
?>