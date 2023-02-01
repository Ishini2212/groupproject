<?php
require 'config.php';
if (isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $city = $_POST["city"];
    $grade = $_POST["grade"];
    $password = $_POST["password"];

    $duplicate = mysqli_query($conn, "SELECT * FROM student WHERE username = '$username' OR first_name = '$firstname' OR last_name = '$lastname' ");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "<script> alert('Phone number or Email has already been taken'); </script>";
    } else {
        $query = "INSERT INTO student (first_name, last_name, username, phone_number, city, grade, password)
         VALUES('$firstname', '$lastname', '$username', '$phone', '$city', '$grade', '$password')";
        mysqli_query($conn, $query);

        header("Location: Studentlogin.php");


    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="login page of Sky School">
        <title>SkySchool - Student sign up</title>
        <link rel="stylesheet" href="./main.css">
    </head>
    <body>
        <div><center><h1 class="mainh">Sky School</h1></center></div>
        <form action="" method="post" autocomplete="off">
        <div class="container_1">
            <!-- <p class="heading1">Sign up</p>
            <p class="lable">Student Index Number</p>
                <input type="text" class="log">
            <p class="lable">Student Name</p>
                <input type="text" class="log">
            <p class="lable">Create Password</p>
                <input type="text" class="log">
            <p class="lable">Re-type Password</p>
                <input type="text" class="log"> -->

            <label for="firstname" class="lable">First Name:</label>
            <input type="text" class="log1" name="firstname" required><br>

            <label for="lastname" class="lable">Last Name:</label>
            <input type="text" class="log1" name="lastname" required><br>

            <label for="username" class="lable">Username:</label>
            <input type="text" class="log1" name="username" required><br>

            <label for="phone" class="lable">Phone Number:</label>
            <input type="text" class="log1" name="phone" required><br>

            <label for="city" class="lable">City:</label>
            <input type="text" class="log1" name="city" required><br>

            <label for="grade" class="lable">Grade:</label>
            <input type="text" class="log1" name="grade" required><br>

            <label for="password" class="lable">Password:</label>
            <input type="password" class="log1" name="password" required><br>

            <button class="create" type="submit" name="submit">Create Account</button>


        </div>
        </form>
    </body>
</html>