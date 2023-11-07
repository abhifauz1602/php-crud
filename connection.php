<?php
session_start();
// session_unset();
// error_reporting(0);
   $conn=mysqli_connect("localhost","root","","cwcrud");

   if($conn){
    // echo"connected successfully";
   }
   else
{
    echo"connection fail". mysqli_connect_error();
}
?>