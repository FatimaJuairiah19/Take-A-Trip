<?php
session_start();

include "db_conn.php";
                  

if(isset($_POST["ok"])){
  
  $firstName= $rows['firstName'];
  $email= $rows['email'];
  $resortName= $rows['resortName'];
  $costPerNight= $rows['costPerNight'];
  $package= $rows['package'];
  $costPerday= $_SESSION['costPerday'];
  $costOfVehicle= $_SESSION['costOfVehicle'];
  $otherCost= $_SESSION['otherCost'];
  $totalCost= $_SESSION['totalCost'];

  //$sql ="INSERT INTO booking(firstName,email,resortName,costPerNight,package,costPerday,costOfVehicle,otherCost,totalCost) VALUES ('$firstName','$email','$resortName','$costPerNight','$package','$costPerday','$costOfVehicle','$otherCost','$totalCost')";

  if($conn->query($sql)==TRUE){
    echo json_encode("OK");


  }else{
    echo json_encode("Failed");
  }
 

}



?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TakeaTrip.com | Free Travel Website </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/owl.css"> 

  </head>

  <body style="background-image: url(images/orderImage.jpg); background-size: cover;">
  
    

    <?php
     include 'header.php';
    ?>
   
      
   
        <div class="table-responsive">
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table" style="margin-top: 100px;">
              

               
             
              <thead>        
                    <tr>
                         <th>Package</th>
                         <th>Resort Name</th>
                         <th>Cost Per Night</th>
                         <th>Cost Per Day</th>
                         <th>Cost of Vehicle</th>
                         <th>Other Costs</th>
                         <th>Total Cost</th>
                    </tr>
               </thead>
               
               <tbody>

             <?php 
           $sql='SELECT * FROM booking where email="'.$_SESSION['email'].'"';

           $result=mysqli_query($conn,$sql);
    
          while($rows=mysqli_fetch_assoc($result))
        {
    ?>        
                    <tr>
                      <form method="post">
                        <td><?php echo $rows['package']; ?></td>
                         <td><?php echo $rows['resortName']; ?></td>
                         <td><?php echo $rows['costPerNight']; ?></td>
                         <td><?php echo $rows['costPerday']; ?></td>
                         <td><?php echo $rows['costOfVehicle']; ?></td>
                         <td><?php echo $rows['otherCost']; ?></td>
                         <td><?php echo $rows['totalCost']; ?></td>
                      </form>
                    </tr>


                    
    <?php     
        }
    ?>    
                    
               </tbody>
          </table>


        </div>



     <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2021 Company Name  <a href="home.php">TakeATrip.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!--<script src="vendor/jquery/jquery.min.js"></script>-->
    <script src="js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="js/custom.js"></script>
    <script src="js/owl.js"></script>
  </body>
</html>

