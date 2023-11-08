<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$role=$_POST['usertype'];

$sql ="SELECT UserName,Password,Usertype FROM admin WHERE UserName=:uname and Password=:password and Usertype=:usertypo";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':usertypo', $role, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_ASSOC);

 if($query->rowCount() > 0)
 {
    switch($role){
        case "Admin":
            $_SESSION['alogin']=$_POST['username'];
            echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";

        case "Faculty":  
            $_SESSION['alogin']=$_POST['username'];
            $_SESSION['password']=$_POST['password'];
            echo "<script type='text/javascript'> document.location = 'faculty.php'; </script>";
            break;
        
            
    }
 }
    else{
        echo "<script>alert('Invalid Details');</script>";

    }
}
?>



 


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Font awesome icon link -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
        integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <!-- Glyphicon Icon usage -->
    <link rel="stylesheet" type="css/text" href="glyphion.css">

    <title>Government College of Engineering</title>
</head>


<body>
<nav class="navbar navbar-expand-lg navbar-light bg-success">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <img class="col-10" src="logo.png" alt="Gceb_logo">
        
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"   aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    
      <!-- <li class="nav-item">
      <img class="col" src="logo.png" alt="Gceb_logo">
        
      </li> -->
      
      <li class="nav-item">
      <!-- <div class="container">
          <div class="row">
              <div class="col order-last"> -->
              <!-- <div class="d-flex justify-content-end"> -->

      <span type="button"  class="btn btn-danger btn-sm" data-bs-toggle="modal"
                data-bs-target="#adminloginModal">
                <i class="fas fa-sign-in-alt" style="color:white"></i> Log-In 
</span>
<!-- </div>  -->
</li>
        
     
    </ul>
  </div>
</nav>
    <!-- <div class="container-fluid bg-success">
        <div class="row align-items-start"> -->
            <!-- Gceb Logo -->
            <!-- <img class="col" src="logo.png" alt="Gceb_logo"> -->
            <!-- Admin Log in Button -->
            <!-- <button type="button" class="col-lg-2 col-md-1 col-sm-2 btn btn-danger btn-mini" data-bs-toggle="modal"
                data-bs-target="#adminloginModal">
                <i class="fas fa-sign-in-alt" style="color:white"></i> Admin Log-In
            </button>
            

        </div>

    </div> -->


    <!-- Admin Log-in Modal -->
    <div class="modal fade" id="adminloginModal" tabindex="-1" aria-labelledby="adminloginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" align="center" id="adminloginModalLabel">Admin Log-In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="section-title">
                        <p class="sub-title" align="center">Enter the proper Credentials!!!
                        </p>
                        <div class="text-center">
                            <span class="fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                    </div>
                    <div class="panel-body p-20">



                        <form class="form-horizontal" method="post">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">


                                    <input type="text" name="username" class="form-control" id="inputEmail3"
                                        placeholder="UserName" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="inputPassword3"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="role" class="ml-3 control-label">Select Your Role</label>
                                <div class="col-sm-10">
                                <select class="form-control" id="role" name="usertype">
                                    <option>Options</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Faculty">Faculty</option>

                                </select>
                                </div>
                            </div>

                            <div class="form-group mt-20">
                                <div class="col-sm-offset-2 col-sm-10">

                                    <button type="submit" name="login"
                                        class="btn btn-success btn-labeled pull-right">Sign
                                        in <span class="btn-label btn-label-right"><i
                                                class="fa fa-check"></i></span></button>
                                </div>
                            </div>
                        </form>




                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal end -->

    <!-- Cards Start -->

    <div class="cointainer-fluid  d-flex justify-content-center" style="box-sizing: border-box;">
        <div class="card text-center col-lg-12 mx-auto bg-warning" style="width:50rem;height:30rem;">
            <div class="card-body">
                <div>
                    <!-- <div> -->
                    <marquee behavior="slide" scrollamount="20" bgcolor="#958ee4"
                        style="margin:50px;text-align:center;">
                        <h5 class="card-title text-white mx-auto" style="width:150px;">Dear Students Welcome</h5>
                        <p class="card-text text-black font-weight-bold"><img src="new_icon.gif" width="60" height="30"
                                alt="new">
                            The Results has been published.
                    </marquee>
                    </p>
                    <button type="button" class="btn btn-primary"><a href="find-result.php" class="link-warning">Click Here to view results</a></button>

                    
                </div>
                



            </div>
            <span><button type="button" class="btn btn-primary"><a href="feedback.php" class="link-dark">FEEDBACK</a></button></span>
<!-- 
            <span><a href="feedback.php" class="btn btn-dark">FEEDBACK</a></span> -->
        </div>

       
    </div>
    <!-- Card Ends -->

    <!-- Footer -->
    <footer class="page-footer font-small green">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
            <a href="https://gcebargur.ac.in/"> gceb.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>

</html>