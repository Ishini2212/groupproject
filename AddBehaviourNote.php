<?php
    require 'config.php';
    $teacher_id =  1;  // get from session

    //get student details first
    $sql = "SELECT `student_id`, `first_name`, `last_name` FROM `students`; ";
    $result = mysqli_query($conn, $sql);
    
    $students = $result;  
    
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="login page of Sky School">
        <title>SkySchool - Teacher Dashboard</title>
        <link rel="stylesheet" href="./main.css">
        <script src="https://kit.fontawesome.com/293566d6c5.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="mainContainer">
            <ul class="navbar">
                <!-- <li ><a style="color: #0400C7;" href="./Student Dashboard.html">Dashboard</a></li> -->
                <li><a href="./Student Myprofile.html">My Profile</a></li>
                <li><a href="./Student Attendance.html">Attendance</a></li>
                <li><a href="./Student Marks.html">Marks</a></li>
                <li><a href="./Student Behaviour.html">Behaviour</a></li>
            </ul>
            <p class="h2"><b>Welcome to Our School's Student Management system</b></p>
            <div class="subContainer">
                <form action="" method="post">
                    <label for="student-select">Select Student</label>
                
                   
                    <select name="student_id" id="student-select" required>

                        <?php
                            while($row = mysqli_fetch_assoc($students)) {
                                echo "<option value={$row['student_id']}>
                                        {$row['first_name']} {$row['last_name']}
                                      </option>";
                            }
                        ?>
                    </select>
                    <br>
                    <label for="note">Behaviour Note</label>
                    <input type="text" name="note" id="note">

                    <br>
                    <button type="submit" name="submit">Add Note</button>
                </form>
            </div>
        </div>
       

    </body>

</html>

<?php


if(isset($_POST['submit'])) 
{
    $teacher_id; 
    
    $student_id = $_POST['student_id'];
    $note = $_POST['note'];

    $sql = "INSERT INTO `behaviour-notes`( `student_id`, `teacher_id`, `note`) VALUES ($student_id, $teacher_id, '$note')"; 

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('New record created successfully')</script>";
    } else {
        echo "<script>Error: " . $sql . "<br></script>";

     }
}
?>

