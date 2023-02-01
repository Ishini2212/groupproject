<?php 
require 'config.php';

if(isset($_POST["submit"])){
    $user = $_POST["username"];
    $password = $_POST["password"];
 
    $adminresult = mysqli_query($conn, "SELECT * FROM admin WHERE adminname = '$user'"); //connection to admins

    $adminrow = mysqli_fetch_assoc($adminresult); //admin
 
    if(mysqli_num_rows($adminresult) > 0){ //admin validation
       if($password == $adminrow["password"]){
          $_SESSION["Adminlogin"] = true;
          $_SESSION["admin_id"] = $adminrow["admin_id"];
          header("Location: StudentDashboard.php");
       }
       else{
          echo
          "<script> alert('Wrong Password'); </script>";
       }
 }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="login page of Sky School">
        <title>SkySchool - Admin login</title>
        <link rel="stylesheet" href="./main.css">
    </head>
    <body>
        <div><center><h1 class="mainh">Sky School</h1></center></div>
        <form action="" method="post" autocomplete="off">
        <div class="container_2">

            <!-- <p class="heading2">Sign in</p>
            <p class="lable">Username</p>
                <input type="text" class="log1">
            <p class="lable">Password</p>
                <input type="text" class="log1"> -->

            <label for="username" class="lable">Username:</label>
            <input type="text" class="log1" name="username" required>
            <label for="password" class="lable">Password:</label>
            <input type="password" class="log1" name="password" required>

            <button class="login" type="submit" name="submit">Login</button>


        </div>
        </form>
    </body>
</html>