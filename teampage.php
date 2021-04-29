


<!DOCTYPE html>
<html>
  <head>
    
  
    

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <meta charset="UTF-8" />

    <link rel="stylesheet" type="text/css" href="teampagecss.css" />
   

  </head>

 

  <body>

  <div class="head1">

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
    </header>
  	
  </div>

    <?php

  
     require 'db_conn.php';

    $sql='SELECT * FROM about_us';

    $result=mysqli_query($conn,$sql);
      
     $row=mysqli_fetch_assoc($result); 
   
    
    ?>

   <div class="middleportion"> 

    <div class="card">
      <div class="card-image">
     
     <?php
       
       

    $sql="SELECT * FROM team where Id='1'";

    $result=mysqli_query($conn,$sql);
      
    $row=mysqli_fetch_assoc($result); 

    echo '<img src="data:images;base64,'.base64_encode($row['img']).'"  style="width: 280px; height: 250px;">'


      ?>
    
      </div>
      <div class="card-text">
        <span class="date">
        	
         <?php
         echo $row['roll'];
         ?>   

        </span>
        <h2>
         <?php
         echo $row['Name'];
         ?> 
        </h2>
        
      </div>
      <div class="card-stats">
        <div class="stat">
          <div class="value">Face</sup></div>
          <div class="type">book</div>
        </div>
        <div class="stat border">
          <div class="value">Email</div>
          <div class="type">Id</div>
        </div>
        <div class="stat">
          <div class="value">Linked</div>
          <div class="type">IN</div>
        </div>
      </div>
    </div>



    <div class="card">
      <div class="card-image card2">
        
     <?php
       
       

    $sql1="SELECT * FROM team where Id='2'";

    $result1=mysqli_query($conn,$sql1);
      
    $row1=mysqli_fetch_assoc($result1); 

    echo '<img src="data:images;base64,'.base64_encode($row1['img']).'"  style="width: 280px; height: 480px;">'


      ?>
    

      </div>
      <div class="card-text card2">
        <span class="date">
        <?php
         echo $row1['roll'];
         ?>   
        </span>
        <h2>
         <?php
         echo $row1['Name'];
         ?> 
        </h2>
        
      </div>
      <div class="card-stats card2">
        <div class="stat">
          <div class="value"><a href="<?php
         echo $row1['linkedIn'];
         ?>">Linked</a> </div>

          <div class="type">IN</div>
          
        </div>
        <div class="stat border">
           <div class="value"><a href="<?php
         echo $row1['email'];
         ?>">Email</a> </div>
          <div class="type">Id</div>
          
        </div>
         <div class="stat border">
           <div class="value"><a href="<?php
         echo $row1['facebook'];
         ?>">FB</a> </div>

       
        </div>
        
      </div>
    </div>
  </div>
  </body>
</html>
