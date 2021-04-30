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
            $User_Id=$_POST["userid"];
            $Book_title=$_POST["booktitle"];
            $Book_author=$_POST["bookauthor"];
            $Book_publication=$_POST["bookpublication"];
            $Book_description=$_POST["bookdescription"];
            $Book_edition=$_POST["bookedition"];
            $Subject=$_POST["subject"];
            $Book_image=$_FILES['file']['name'];
            $tmpimage=$_FILES['file']['tmp_name'];
            $file_size=$_FILES['file']['size'];

            if($User_Id==$_SESSION['login_id'])
            {
                echo $_SESSION['login_id'];
                if(isset($_FILES['file']['name']) && $_FILES['file']['name']!="")
                {
                    $errors= array();
                    $a=explode('.',$Book_image);
                    $file_ext=strtolower(end($a));
                    $extensions= array("jpeg","jpg","png"); 
                    if(in_array($file_ext,$extensions)===false)
				    {
					    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                    }
                    if($file_size > 2097152) 
				    {
    					$errors[]='File Size Must Be Less Than 2 MB';
                    }
                    if(empty($errors)==true) 
				    {
    					move_uploaded_file($tmpimage,"../Upload/".$Book_image);
										
	    				$query2 = mysqli_query($con, "insert into btp_upload_books (sub_id,user_id,book_title,book_publication,book_author,book_description,book_edition,book_status,book_img1) values ('$Subject','$User_Id','$Book_title','$Book_publication','$Book_author','$Book_description','$Book_edition','active','$Book_image')");
                    }
                    else
				    {
					    echo "<script>alert($errors);
			            window.location.href='../Upload_Book.php';
			            </script>";
                    }
                    if($query2)
                    {
                        echo "<script>alert('Your Book Upload are Successfully !!!!!!!!!');
			            window.location.href='../index.php';
			            </script>";
                    }
                    else{
                        echo "<script>alert('Data you');
			            window.location.href='../Upload_Book.php';
			            </script>";
                    }
                }
            }
            else
            {
                echo "<script>alert('Please enter your User id..')
                window.location.href='../login.php'
                </scropt>";
            }
            // else{
            //     header("location:../Upload_Book.php");
            // }
       }
   }

?>