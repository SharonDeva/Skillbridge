<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="../css/Courses.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php require '../include/VisitorNav.php' ?>
    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "skillbridge";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the skill_course table
    $sql = "SELECT user.username, user.profilepic, skills.skillname, skill_course.coursename, skill_course.courseimage, skill_course.course_description
        FROM skill_course
        JOIN user ON skill_course.userid = user.userid
        JOIN skills ON skill_course.skillid = skills.skillid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {           
            // The HTML structure within the loop should be echoed as well
            echo "<div class='col-md-3'>";
            echo "<div class='card'>";
            echo "<img src='" . $row["courseimage"] . "' alt='Course Image'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $row["coursename"] . "</h5>";
            echo "<div class='d-flex align-items-center'>";
            echo "<img src='" . $row["profilepic"]. "' alt='Course Image' class='profile-image-small'>";
            echo "<span class='ml-2'>" . $row["username"]. "</span>";
            echo "</div>";
            echo "<p class='card-text text-muted'>" . $row["skillname"]. "</p>";
            echo "<div class='text-right'>";
            echo "<a href='#' class='btn btn-primary'>View</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    // Close the database connection
    $conn->close();
    ?>

</body>
</html>
