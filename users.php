
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Users</title>

    <style>
        body{
            background: #d071f9;
        }

        table{
            background: whitesmoke;
        }

        span{
            font-weight: bold;
            font-size: 25px;
        }

        .update{
            background-color: orange;
            color: whitesmoke;
            border: 0;
            outline: none;
            border-radius: 5px;
            height: 23px;
            width: 80px;
            font-weight: bold;
            cursor: pointer;
        }

        .delete{
            background-color: red;
            color: whitesmoke;
            border: 0;
            outline: none;
            border-radius: 5px;
            height: 23px;
            width: 80px;
            font-weight: bold;
            cursor: pointer;
        }

    </style>

</head>
<body>
    
</body>
</html>

<?php 
include("connection.php");

$user= $_SESSION["email"];
if($user==true){

} else {
    header("location:login.php"); 
}

$sql= "SELECT * FROM form";
$data= mysqli_query($conn,$sql);

$total= mysqli_num_rows($data);


if($total != 0){
    ?>
        <h1 align="center"><mark>Displaying Users</mark></h1>
        <div  style="padding: 4px 6px; font-size: 14px; margin-bottom:5px; text-transform: uppercase; text-align: left;">
            <a href=form.php style="text-decoration: none;"> <span style="background-color: white; color: black;">       Register Here </span></a>
        </div>

        <div style="text-align: right; ">
            <a href=logout.php style="text-decoration: none;"><input type="submit" name="" value="Logout" style="background-color: blue; height:35px; width:100px; color: white;  font-size: 18px; margin-top:20px; border: 0; border-radius:5px;  margin-bottom:5px; text-transform: uppercase; text-align: right;"> </a>
        </div>
        <center><table border="6" cellpadding="8" cellspacing="6" width="97%">
            <tr>
                <th width="3%">ID</th>
                <th width="16%">Student Name</th>
                <th width="16%">Stu Image</th>
                <th width="6%">Gender</th>
                <th width="20%">E-mail </th>
                <th width="10%">Phone Number</th>
                <th width="10%">Caste</th>
                <th width="10%">Language</th>
                <th width="20%">Address</th>
                <th width="19%">Actions</th>

            </tr>
    <?php 
        while($result= mysqli_fetch_assoc($data)){
            echo
                "<tr>
                    <td align='center'>". $result['id'] ."</td>
                    <td align='center'>". $result['first_name'] .'&nbsp'. $result['last_name'] ."</td>
                    <td align='center'><img src='". $result['stu_image'] ."' height=100px></td>
                    <td align='center'>". $result['gender'] ."</td>
                    <td align='center'>". $result['email'] ."</td>
                    <td align='center'>". $result['phone'] ."</td>
                    <td align='center'>". $result['caste'] ."</td>
                    <td align='center'>". $result['language'] ."</td>
                    <td align='center'>". $result['address'] ."</td>
                    <td align='center'><a href='update.php?id=$result[id]'><input type='submit' value='Edit' class='update'></a> <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' onclick=deleteconfirm() class='delete'></a></td>

                </tr>";
        }
} else {
    echo  "<tr><td>No Record Found</td></tr>";
}

    ?>
        </table></center>


        <script>
            function deleteconfirm(){
                return confirm('Are you Sure you want to Delete this Record? ')
            }
        </script>