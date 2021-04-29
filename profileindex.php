

<?php
session_start();

include "db_conn.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    
<link rel="stylesheet" href="cssprofile.css">
</head>






<!------ Include the above in your HEAD tag ---------->





<body>

 <?php
 include "header.php"
 ?>

<div class="Profile-area">
    <div class="container">
    
        


    
            <?php
            if(isset($_POST['show'])) {
              header('location:orderdetails.php'); 
                
            }



        
           
            if(isset($_POST['logout'])) {
      echo " hello" ;         
    session_destroy();
    unset($_SESSION['email']);
    header('location:home.php');
        }
             
            


            if(isset($_POST['submit1']))
            {
                ?>
                <script type="text/javascript">
                    //window.location="edit.php"
                </script>
                <?php
            }


                $sql=mysqli_query($conn,"SELECT * FROM registration where Id='$_SESSION[Id]' ;");
            ?>
            
            <?php
                //$row=mysqli_fetch_assoc($sql);

                //echo "<div style='text-align: center'>
                    //<img class='img-circle profile-img' height=110 width=120 src='images/".$_SESSION['pic']."'>
                //</div>";
            ?>
        
    
        <?php if(isset($_SESSION['Id'])){ ?>

        
    </div>

    <div>
        <div class="container">
            <div class="my-profile" style="text-align: center;">
                <?php
                $sql = 'select * from registration where Id="'.$_SESSION['Id'].'"';
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result)
                ?>
            
            </div>
        </div>
        <?php
        $sql = 'select * from registration where Id="'.$_SESSION['Id'].'"';
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
            <form method="post" style="margin-top: 200px;">
                <div class="row" style="margin-top: 0px;">
                    <div class="col-md-4">
                        <div class="profile-img" >
                    <!------ <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/> ---------->
        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                 <?php
                                                  echo $row['firstName'];
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
                                                  echo $row['email'];
                                                 ?> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php
                                                  echo $row['number'];
                                                 ?>   
                                                </p>
                                            </div>
                                        </div>
                                        
                            </div>
                            
                    
        </div>

    </div>
     <form method="post"><input type="submit" name="show" style="margin-top:20px; margin-left: 500px;" class="btn btn-success" value="Your Orders" /></form>


    <form method="post"><input type="submit" name="logout" style="margin-top:20px; margin-left: 500px;" class="btn btn-success" value="LOG OUT" /></form>


</form>
</div>
</body>