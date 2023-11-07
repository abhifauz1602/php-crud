<?php include("connection.php"); 
$id= $_GET["id"];
$user= $_SESSION["email"];

if($user==true){

} else {
    header("location:login.php");         
}

$sql= "SELECT * FROM form WHERE id= '$id'";
$data= mysqli_query($conn,$sql);

$total= mysqli_num_rows($data);
$result= mysqli_fetch_assoc($data);

// $lan= $result['language'];
$language1= explode(",", $result['language']);


?>
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
            <form action="" method="POST">
                <div class="title">
                   Update Student Record
                </div>
                <div class="form">
                    <div class="input_field">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" value="<?php echo $result['first_name'] ?>" class="input" required>
                    </div>
                    <div class="input_field">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" value="<?php echo $result['last_name'] ?>" class="input" required>
                    </div>
                    <div class="input_field">
                        <label for="password">Password</label>
                        <input type="password" name="password" value="<?php echo $result['password'] ?>" class="input" required>
                    </div>
                    <div class="input_field">
                        <label for="c_password">Confirm Password</label>
                        <input type="password" name="c_password" value="<?php echo $result['con_pass'] ?>" class="input" required>
                    </div>
                    <div class="input_field">
                        <label for="gender">Gender</label>
                        <div class="custom_select">
                            <select name="gender" id="" required>
                                <option value="">Select</option>
                                <option value="male" <?php if($result['gender'] == 'male'){ echo 'selected'; } ?> >Male</option>
                                <option value="female" <?php if($result['gender'] == 'female'){ echo 'selected';} ?> >Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="input_field">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" value="<?php echo $result['email'] ?>" class="input" required>
                    </div>
        
                    <div class="input_field">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" value="<?php echo $result['phone'] ?>" class="input" required>
                    </div>

                    <div class="input_field">
                        <label style="margin-right: 100px;">Caste</label>
                        <input type="radio" name="r1" value="General" required <?= ($result['caste'] == 'General')?'checked':'' ?>><label style="margin-left: 5px;" >General</label>
                        <input type="radio" name="r1" value="OBC" required <?= ($result['caste'] == 'OBC')?'checked':'' ?>><label style="margin-left: 5px;" >OBC</label>
                        <input type="radio" name="r1" value="ST" required <?= ($result['caste'] == 'ST')?'checked':'' ?>><label style="margin-left: 5px;" >ST</label>
                        <input type="radio" name="r1" value="SC" required <?= ($result['caste'] == 'SC')?'checked':'' ?>><label style="margin-left: 5px;" >SC</label>
                    </div>

                    <div class="input_field">
                        <label style="margin-right: 100px;">Language</label>
                        <input   type="checkbox" name="language[]" value="Hindi" 
                            <?php 
                                if(in_array('Hindi', $language1)){
                                    echo "checked";
                                }
                            ?> 
                        >
                        <label style="margin-left: 5px;" >Hindi</label>
                        <input type="checkbox" name="language[]" value="English"
                            <?php 
                                if(in_array('English', $language1)){
                                    echo "checked";
                                }
                            ?>
                        >
                        <label style="margin-left: 5px;" >English</label>
                        <input type="checkbox" name="language[]" value="French" 
                            <?php 
                                if(in_array('French', $language1)){
                                    echo "checked";
                                }
                            ?>
                        >
                        <label style="margin-left: 5px;" >French</label>
                        <input type="checkbox" name="language[]" value="Hinglish" 
                        <?php 
                                if(in_array('Hinglish', $language1)){
                                    echo "checked";
                                }
                            ?>
                        >
                        <label style="margin-left: 5px;" >Hinglish</label>
                    </div>

                    <div class="input_field">
                        <label for="address">Address</label>
                    <textarea class="textarea" name="address" required ><?php echo $result['address'] ?></textarea>
                    </div>
                    <div class="input_field terms">
                        <label class="check">
                            <input type="checkbox" name="checkbox" class="check" required>
                            <span class="checkmark"></span>
                        </label>
                        <p>Agree to terms and conditions</p>
                    </div>
                    <div class="input_field ">
                            <input type="submit" value="Update Details" name="update" class="btn">
                    </div>
                </div>
            </form>
            <div  style="display: block; height: 22px; padding: 4px 6px; font-size: 14px; margin-bottom: 5px;text-transform: uppercase; text-align: right;">
                <a href=users.php style="text-decoration: none;" ><span style=" background-color: whitesmoke; color: black; font-weight: bold; font-size: 25px;">Back</span></a>
            </div>
        </div>
    </body>
</html>

<?php

if(isset($_POST["update"])){
   $fname    = $_POST["first_name"]; 
   $lname    = $_POST["last_name"];
   $pass     = $_POST["password"];
   $cpass    = $_POST["c_password"];
   $gender   = $_POST["gender"];
   $email    = $_POST["email"];
   $phone    = $_POST["phone"];
   $caste    = $_POST["r1"];
   $lang    = implode(",",$_POST["language"]);
   $address  = $_POST["address"];

   if($fname != "" && $pass != "" && $cpass != "" && $gender != "" && $email != "" && $phone != "" && $caste != "" && $lang != "" && $address != "") {
        $sql = "UPDATE form SET first_name='$fname', last_name= '$lname', password= '$pass',con_pass= '$cpass', gender= '$gender',email = '$email', phone = '$phone', caste='$caste', language='$lang', address= '$address' WHERE id='$id'";
        $data= mysqli_query($conn,$sql);
        if($data){
            echo"<script> alert(Record Successfully Updated) </script>";
            header("location:users.php"); 
        
        }  else {
            echo"Updation failed". mysqli_connect_error();
        }
    }




}


?>