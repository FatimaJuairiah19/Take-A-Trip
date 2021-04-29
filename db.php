<?php

$conn= mysqli_connect('localhost','rootNew','Yes','user');
//check connection

if(!$conn){
 
 echo "connection error".mysqli_connect_error();

}

else{
    echo "connected to databse ";
}



//$info =mysqli_fetch_all($result,MYSQLI_ASSOC);

//print_r($info);


?>