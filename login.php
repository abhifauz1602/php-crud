
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login-style.css">
    
    <style>
        body{
            padding: 0;
            margin: 0;
            background-color: #D071f9;
        }

        .center{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background-color: white;
            border-radius: 5px;
        }

        .center h1{
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid silver;
        }
        .form{
            padding-bottom: 15px;
            margin: 0 20px;
            text-align: center;
        }

        .textfield{
            width: 100%;
            height: 50px;
            font-size: 18px;
            border: 3px solid #D071f9;
            box-sizing: border-box;
            border-radius: 5px;
            padding-left: 10px;
            margin: 7px 0;
        }

        .btn{
            width: 100%;
            height: 50px;
            background-color: #D071f9;
            border-radius: 5px;
            font-size: 20px;
            margin: 7px 0;
            color: white;
            border: 0;
            cursor: pointer;
        }

        .btn:hover{
            background-color: #0a63d6;
        }

        .forgetpass{
            font-size: 16px;
            padding: 4px 0;
            margin: 3px;
        }

        .link{
            text-decoration:  none;
            color: #0a63d8;
        }

        @media (max-width: 470px){
            .center{
                width: 88%;
            }
        }
    </style>
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form action="" method="post">
            <div class="form">
                <input type="text" name="email" class="textfield" placeholder="Enter Your E-mail Id" >
                <input type="password" name="password" class="textfield" placeholder="Enter Your Password" >

                <div class="forgetpass"> 
                    <a href="#" class="link" onclick="message()" >Forget Password</a>
                </div>
                <input type="submit" name="login" value="Login" class="btn" >

                <div class="signup">
                    New Member ?
                    <a href="#" class="link" > SignUp Here</a>
                </div>
            </div>
        </form>
    </div>

    <script>
        function message() { 
            alert('Abe to likh liya kr na intezaam thodi hai ')
         }
    </script>
</body>
</html>
<?php
// session_start();
include("connection.php");

if(isset($_POST["login"])){
    $email= $_POST["email"];
    $pass= $_POST["password"];
    
    $sql= "SELECT * FROM form Where email='$email' && password='$pass' ";

    $data = mysqli_query($conn, $sql);  

    $total=mysqli_num_rows($data);

    if($total == 1){
        header("location:users.php");
        $_SESSION["email"] = "$email";
        $_SESSION["pass"] = "$pass";
    }else{
        echo "Login Failed";
    }
}
?>
