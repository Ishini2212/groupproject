<?php
    require 'config.php';

    $student_id = 1;  // get from session

    $sql = "SELECT `note_id`, `note`, `teacher`.`name` FROM `behaviour-notes` JOIN `teacher` ON `teacher`.`teacher_id` = `behaviour-notes`.`teacher_id` WHERE `student_id` = $student_id; ";

    $result = mysqli_query($conn, $sql);

    $rows;
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="login page of Sky Schsool">
        <title>SkySchool - Student Dashboard</title>
        <link rel="stylesheet" href="./main.css">
    </head>
    <body>
        <div class="mainContainer">
            <ul class="navbar">
                <li><a href="./Student Dashboard.html">Dashboard</a></li>
                <li><a href="./Student Myprofile.html">My Profile</a></li>
                <li><a href="./Student Attendance.html">Attendance</a></li>
                <li><a href="./Student Marks.html">Marks</a></li>
                <li><a style="color: #0400C7;" href="./Student Behaviour.html">Behaviour</a></li>
            </ul>
            <div class="subContainer">
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Note ID</th>
                            <th>Note Given By</th>
                            <th>Behaviour Note</th>
                        </tr> 
                    </thead>
                    <tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$row['note_id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['note']}</td>
                                </tr>";
                        }
                    ?>
                    </tbody>

                    
                </table>
            </div>
        </div>
        </div>
        

    </body>
</html>
