<?php

include("include/Connection.php");
include("Navbar1.php");
$i=1;

?>
<html>
    <head>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/0b1d7c9201.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/index.css" />
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    </head>
    <body>
        <br>
        <div class="container">
        <?php
            if(isset($_GET['search']))
                {
                    $query="select * from btp_users,btp_departments,btp_subjects where btp_users.id_no like '{$_GET['search']}%' or btp_subjects.sub_name like '{$_GET['search']}%' or btp_departments.dept_name like '{$_GET['search']}%' limit 25";
                    $result=mysqli_query($con,$query);
                    if(mysqli_num_rows($result)>0)       
                    {
                        $que1="select * from btp_users where id_no  like '{$_GET['search']}%'";
                        $que2="select * from btp_subjects where sub_name like '{$_GET['search']}%'";
                        $que3="select * from btp_departments where dept_name like '{$_GET['search']}%'";
                        $villu1=mysqli_query($con,$que1);      
                        if(mysqli_num_rows($villu1)>0)
                        {
            ?>
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
                            while($row=mysqli_fetch_assoc($villu1))
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
                }
                    else
                    {
                        $villu2=mysqli_query($con,$que2);
                        if(mysqli_num_rows($villu2)>0)
                        {
            ?>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                    
                                <th scope="col">Sr No</th>
                                <th scope="col">Department</th>
                                <th scope="col">Subject Name</th>
                                <th scope="col">Subject Code</th>
                                <th scope="col">Subject Sem</th>
                                <th scope="col">Active</th>
                                <th scope="col">Deactive</th>
                            </tr>
                        </thead>
                        <tbody>
			<?php
                while($row=mysqli_fetch_assoc($villu2))
                    {
                        $id=$row['dept_id'];
                        $que4="select * from btp_departments where btp_departments.dept_id=$id";  	
                        $res=mysqli_query($con,$que4);
                        $res1=mysqli_fetch_array($res);

			?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $res1['dept_name'] ?></td>
                            <td><?php echo $row['sub_name'] ?></td>
                            <td><?php echo $row['subject_code'] ?></td>
                            <td><?php echo $row['sub_semister'] ?></td>
                            <?php if($row['sub_status']=="active")
                                {
                            ?>
                            <td><a  href="#" ><button type="button"class="btn btn-success bg-success" disabled>Active</button></a></td>
                            <td><a  href="include/deactive_status_subject.php?id=<?php echo $row['sub_id'] ?>" ><button type="button"class="btn btn-danger bg-danger">Deactive</button></a></td>
                            <?php
                                }
                                else{
                            ?>
                            <td><a  href="include/active_status_subject.php?id=<?php echo $row['sub_id'] ?>" ><button type="button"class="btn btn-success bg-success">Active</button></a></td>
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
                        }
                        else
                        {
                            $villu3=mysqli_query($con,$que3);

                            if(mysqli_num_rows($villu3)>0)
                             {
            ?>
                    <table class="table" style="width:70%;margin-left:auto;margin-right:auto">
                        <thead class="thead-dark">
                            <tr>
                    
                                <th scope="col">Sr No</th>
                                <th scope="col">Department</th>
                                <th scope="col">Active</th>
                                <th scope="col">Deactive</th>
                            </tr>
                        </thead>
                        <tbody>
			<?php        
                while($row=mysqli_fetch_assoc($villu3))
                    {  	
			?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['dept_name'] ?></td>
                            <?php if($row['dept_status']=="active")
                                {
                            ?>
                            <td><a  href="#" ><button type="button"class="btn btn-success bg-success" disabled>Active</button></a></td>
                            <td><a  href="include/deactive_status_dept.php?id=<?php echo $row['dept_id'] ?>" ><button type="button"class="btn btn-danger bg-danger">Deactive</button></a></td>
                            <?php
                                }
                                else{
                            ?>
                            <td><a  href="include/active_status_dept.php?id=<?php echo $row['dept_id'] ?>" ><button type="button"class="btn btn-success bg-success">Active</button></a></td>
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
                    }
                }
            }
            }
            
        }
            ?>
            
        </div>
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
            <?php
                include("Footer.php");
            ?>
        </body>
</html>