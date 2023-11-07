<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP CRUD</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="title"> Registration Form </div>
            
                <div class="form">
                    <div class="input_field">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="input" required>
                    </div>
            
                    <div class="input_field">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="input" required>
                    </div>
            
                    <div class="input_field">
                        <label for="password">Stu Image</label>
                        <input type="file" name="image" class="input" required>
                    </div>

                    <div class="input_field">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="input" required>
                    </div>
            
                    <div class="input_field">
                        <label for="c_password">Confirm Password</label>
                        <input type="password" name="c_password" class="input" required>
                    </div>
            
                    <div class="input_field">
                        <label for="gender">Gender</label>
                        <div class="custom_select">
                            <select name="gender" id="" required>
                                <option value="">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
            
                    <div class="input_field">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" class="input" required>
                    </div>
        
                    <div class="input_field">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" class="input" required>
                    </div>

                    <div class="input_field">
                        <label style="margin-right: 100px;">Caste</label>
                        <input type="radio" name="r1" value="General" required><label style="margin-left: 5px;" >General</label>
                        <input type="radio" name="r1" value="OBC" required><label style="margin-left: 5px;" >OBC</label>
                        <input type="radio" name="r1" value="ST" required><label style="margin-left: 5px;" >ST</label>
                        <input type="radio" name="r1" value="SC" required><label style="margin-left: 5px;" >SC</label>
                    </div>

                    <div class="input_field">
                        <label style="margin-right: 100px;">Language</label>
                        <input   type="checkbox" name="language[]" value="Hindi" ><label style="margin-left: 5px;" >Hindi</label>
                        <input type="checkbox" name="language[]" value="English" ><label style="margin-left: 5px;" >English</label>
                        <input type="checkbox" name="language[]" value="French" ><label style="margin-left: 5px;" >French</label>
                        <input type="checkbox" name="language[]" value="Hinglish" ><label style="margin-left: 5px;" >Hinglish</label>
                    </div>

                    <div class="input_field">
                        <label for="address">Address</label>
                        <textarea class="textarea" name="address" required ></textarea>
                    </div>
                    
                    <div class="input_field terms">
                        <label class="check">
                            <input type="checkbox" name="checkbox" class="check" required>
                            <span class="checkmark"></span>
                        </label>
                        <p>Agree to terms and conditions</p>
                    </div>
            
                    <div class="input_field ">
                        <input type="submit" value="Register" name="register" class="btn">
                    </div>                    
                </div>
            </form>
            
            <br>

            <div  style="display: block; height: 22px; padding: 4px 6px; font-size: 14px; margin-bottom: 5px;text-transform: uppercase; text-align: right;">
                <a href=users.php style="text-decoration: none;" ><span style=" background-color: whitesmoke; color: black; font-weight: bold; font-size: 25px;">Back</span></a>
            </div>
        </div>
    </body>
</html>

<?php
include("connection.php");

$user= $_SESSION["email"];
if($user == true){

} else {
    header("location:login.php");
}

if(isset($_POST["register"])){

    $user= $_SESSION["email"];

    if($user == true){
    
    } else {
        header("location:login.php");
    }

    $fname = $_POST["first_name"]; 
    $lname = $_POST["last_name"];

        $filename=$_FILES["image"]["name"];
        $tempname=$_FILES["image"]["tmp_name"];
        $folder= "images/".$filename;
        move_uploaded_file($tempname,$folder);

    $pass     = $_POST["password"];
    $cpass    = $_POST["c_password"];
    $gender   = $_POST["gender"];
    $email    = $_POST["email"];
    $phone    = $_POST["phone"];
    $caste    = $_POST["r1"];
    $lang     = implode(",",$_POST["language"]);
    $address  = $_POST["address"];

   if($fname != "" && $lname != "" && $folder != "" && $pass != "" && $cpass != "" && $gender != "" && $email != "" && $phone != "" && $caste != "" && $lang != "" && $address != "") {
        
        $sql = "INSERT INTO form values('','$fname','$lname','$folder','$pass','$cpass','$gender','$email','$phone','$caste', '$lang', '$address')";
        $data= mysqli_query($conn,$sql);
        
            if($data){
                echo"<script> alert('Student Data Inserted') </script>";
                header("location:users.php"); 
            }  else {
                echo"<script> alert('Failed to Insert Data') </script> " . mysqli_connect_error();
            }   
    } else {
        echo "<script>
                alert('Please Fill the all Fields') 
              </script>";
    }
}

?>