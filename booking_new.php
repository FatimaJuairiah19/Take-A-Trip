


<?php
session_start();

include "db_conn.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    

</head>






<!------ Include the above in your HEAD tag ---------->





<body>

 <?php
 include "header.php"
 ?>

<div class="Profile-area">
    <div class="container">
    
        
        
            <?php

            if(isset($_POST['submit1']))
            {
                ?>
                <script type="text/javascript">
                    //window.location="edit.php"
                </script>
                <?php
            }


                $sql=mysqli_query($conn,"SELECT * FROM sajek where Id='$_SESSION[Id]' ;");

                 $sqlprofile=mysqli_query($conn,"SELECT * FROM registration where Id='$_SESSION[Id]' ;");
            ?>
            
            
        
    
        <?php if(isset($_SESSION['Id'])){ ?>

        
    </div>

    <div>
        <div class="container">
            <div class="my-profile" style="text-align: center;">
                <?php
                $sql = 'select * from sajek where Id="'.$_SESSION['Id'].'"';
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result)

               
                ?>
            
            </div>
        </div>
        <?php
        $sql = 'select * from sajek where Id="'.$_SESSION['Id'].'"';
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count>0){
            ?>          
        <?php } else {?>
           
        <?php } ?>
    </div>
    <?php } else {?>
    <?php } ?>
</div>




<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                    <!------ <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/> ---------->
                           <?php
                           $sql1='SELECT * FROM registration where Id="'.$_SESSION['Id'].'"';

                           $result1=mysqli_query($conn,$sql1);
      
                           $row1=mysqli_fetch_assoc($result1); 


                           ?> 
     
                                        <div class="row" style="margin-top: 40px; text-align: center;">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                 <?php
                                                  echo $row1['firstName'];
                                                 ?>   

                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php
                                                  echo $row1['email'];
                                                 ?> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php
                                                  echo $row['totalCost'];
                                                 ?>   
                                                </p>
                                            </div>
                                        </div>
                            
                    
                               </div>