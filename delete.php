<?php include("connection.php"); 

$id= $_GET["id"];
$user= $_SESSION["email"];

if($user==true){

} else {
    header("location:login.php");
    }


$sql= "DELETE  FROM form WHERE id= '$id'";
$data= mysqli_query($conn,$sql);

if($data){
    echo"<script> alert(Record Successfully Deleted) </script>";
    header("location:users.php"); 

}  else {
    echo"failed to Delete". mysqli_connect_error();
}