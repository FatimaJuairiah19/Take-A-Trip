<?php 

include "db_conn.php";

session_start();


$email='';
$pass='';
$errorEmail=''; $errorPass = ''; $errorUser='';

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if(isset($_POST["login"])){

    if(empty($_POST["email"])){
        $errorEmail .= '<h2><label class="text-danger">Email is required</label></h2>';
    }
    else{
        $email = clean_text($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errorEmail .= '<h2><label class="text-danger">Invalid email format</label></h2>';
        }
    }

    if(empty ($_POST['password'])){
        $errorPass .= '<h2><label class="text-danger">Password is required</label></h2>';
    }
    else{
        $pass = clean_text ($_POST['password']);
    }

    if($errorEmail == '' && $errorPass=='') {
        $sql = 'select * from registration where email="'.$email.'" and password="'.$pass.'"';
        $result = mysqli_query($conn, $sql);
        $noOfData = mysqli_num_rows($result);

        if($noOfData>0){
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $pass;

            $row =  mysqli_fetch_array($result);
            $_SESSION['Id'] = $row['Id'];

            header('Location: profileindex.php');
        }else
            $errorUser = '<h2><label class="text-danger">Wrong input</label></h2>';
    }
}


?>


<!DOCTYPE html>
<html>
    
    
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

        
        <title>Log in</title>

         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="csslogin.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/owl.css">
        
    </head>

<body>


      
        <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="home.php"><h2>Take A <em>Trip</em></h2></a>
          
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item "><a class="nav-link" href="packages.php">Packages</a></li>

                <li class="nav-item active"><a class="nav-link" href="login.php">Login</a></li>


               <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="package-details2.php">Sajek</a>
                      <a class="dropdown-item" href="package-details1.php">Boga Lake</a>
                      <a class="dropdown-item" href="package-details.php">Cox's Bazar</a>
                    </div>
                </li>
                
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header> 



    <div class="login-dark">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required value="<?php echo $email; ?>" required class="form-control" style="height: 30px;"/> 
                    <?php echo $errorEmail; ?></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"  required value="<?php echo $email; ?>" class="form-control" style="height: 30px;"/>
                     <?php echo $errorPass; ?></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit"  name="login" value="Login" class="btn btn-success";>Log In</button></div> <a href="indexreg.php">Don't have an account ? Register</a></form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>




     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


</body>

</html>

