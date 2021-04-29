

<?php
session_start();

include "db_conn.php";


?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/owl.css"> 


     <link rel="stylesheet" type="text/css" href="about_us_css.css" />

      <link rel="stylesheet" href="css/style.css">
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

                <li class="nav-item"><a class="nav-link" href="packages.php">Packages</a></li>

                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="about-us.html">About Us</a>
                      <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                      <a class="dropdown-item" href="terms.html">Terms</a>
                    </div>
                </li>

                
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>


  

  <section class="introduction-section">
    <div class="container">
    <h1>Introduction</h1>
    
      <?php
                $sql = 'select * From text';
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);

                echo $row['introduction'];
                ?>
    </div>
  </section>

  <section class="location-section">
    <div class="container">
    <h1>About This Website</h1>
    <p>I call <a href="https://upload.wikimedia.org/wikipedia/commons/2/2a/1855_Colton_Map_of_Wisconsin_-_Geographicus_-_Wisconsin-colton-1855.jpg">Madison, Wisconsin</a> my home, the land of dairy (Get outta here, California!). My favorite part about <b>Madison</b> is that we're a city built around a large <a href="http://www.wisc.edu/">university</a>. There's a vibrant crowd here that keeps this city bold and <strong>progressive</strong>. 
    
    The isles of <a href="http://www.quickmeme.com/img/50/50507a001a1b91078f63c8da7f340e9a529c7f22a65d0666ce1128bde8513d42.jpg">cheese</a> in every grocery store aren't so bad either.
      
    <p>You can find me in the city, <strong>camera</strong> in hand, documenting the stories around me, or in little cafe's writing about my daily <a href="http://www.kedarjoyner.com/blog/">adventures</a> and the people I meet.</p>
    </div>
  </section>

  <section class="questions-section">
    <div class="container">
    <h1>More About Us</h1>
    <h2>What are your favourite Places?</h2>
    <p>I love to explore new cities, take photographs, eat tacos, catnap with my cat, bike to big lakes, hold hands, play video games, dance in hay lofts, spend weekends with my grandpa, drink good <a href="http://www.proof66.com/whiskey/eagle-rare-10yr-bourbon.html">whiskey</a>, and sit outside all night on porches.</h2>

   
   
    </div>
  </section>

  <footer class="content-footer">
    <div class="footer-container">
    <p>Stay connected with us on these social networks:</p>
    
    <p>Cover Image via <a href="home.php">Take A Trip</a></p>
</div>
  </footer>


    </header>
   
    
</body>
</html>

