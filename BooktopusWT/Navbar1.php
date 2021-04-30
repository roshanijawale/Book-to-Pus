<html>
    <head>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0b1d7c9201.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    </head>
    <body>
         <!-- Navbar start -->

    <div style="height: 10px;background-color: #27aae1;"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="index.php" class="navbar-brand" style="color:white ;">BOOKTOPUS</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarcollapseCMS">
                <form action="ajax-db-admin-search.php">  
                    <input type="text" placeholder="Search Here........" name="search" id="search"
                        style="border-radius:53px;width:250px;border:none;height:35px;margin-left: 75px;margin-top:15px">
                    <script type="text/javascript">
                        $(function() {
                            $( "#search" ).autocomplete({
                            source: 'ajax-db-admin-search.php',
                            });
                        });
                    </script>
            </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="admin_index.php" class="nav-link" style="color:white;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" style="color:white;">About us</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin_subject.php" class="nav-link" style="color:white;">Subjects</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin_dept.php" class="nav-link" style="color:white;">Department</a>
                    </li>
                    <li class="nav-item">
                        <a href="Upload_student_details.php" class="nav-link" style="color:white;">Upload Student Details</a>
                    </li>
                    <?php
                        if(isset($_SESSION["login_id"]))
                        {
                    ?>
                            <a href="logout.php" class="nav-link" style="color:white">Log Out</a>
                    <?php
                        }
                        else{
                            ?>
                            <a href="login.php" class="nav-link" style="color:white">LogIn</a>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div style="height: 10px;background-color:#27aae1;"></div>

    <!-- Navbar End -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    </body>
</html>