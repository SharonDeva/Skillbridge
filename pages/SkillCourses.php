<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Skill Courses</title>
        <link rel="stylesheet" href="../css/Courses.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>

        <?php require '../include/VisitorNav.php' ?>
        <?php
        
        // Check if the skill ID and skill name are provided in the URL
        if (isset($_GET['skillid']) && isset($_GET['skillname']) && isset($_GET['description'])) {
            $skill_id = $_GET['skillid'];
            $skillname = $_GET['skillname'];
            $description = $_GET['description'];

            // Database connection code (replace with your own credentials)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "skillbridge";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $skill_id = $_GET['skillid'];

            $sql = "SELECT skill_course.courseid, skill_course.coursename, skill_course.courseimage, skill_course.course_description, 
        user.username, user.profilepic, user.role
        FROM skills
        JOIN skill_course ON skills.skillid = skill_course.skillid
        JOIN user ON skill_course.userid = user.userid
        WHERE skills.skillid = $skill_id";
            $result = $conn->query($sql);

            echo "<h1>" . $skillname . "</h1>";
            echo "<p>" . $description . "</p>";
            if ($result->num_rows > 0) {
                $counter = 0; // Initialize a counter
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    if ($counter % 4 == 0) {
                        // Start a new row for every 4 cards
                        echo "<div class='row'>";
                    }

                    // The HTML structure within the loop should be echoed as well
                    echo "<div class='col-md-3'>";
                    echo "<div class='card'>";
                    echo "<img src='" . $row["courseimage"] . "' alt='Course Image'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row["coursename"] . "</h5>";
                    echo "<div class='d-flex align-items-center'>";
                    echo "<img src='" . $row["profilepic"] . "' alt='Course Image' class='profile-image-small'>";
                    echo "<span class='ml-2'>" . $row["username"] . "</span>";
                    echo "</div>";
                    echo "<p class='card-text text-muted'>" . $row["course_description"] . "</p>"; // Change to course_description
                    echo "<div class='text-right'>";
                    echo "<a href='dummycourses.php?courseid=" . $row["courseid"] . "&coursename=" . urlencode($row["coursename"]) . "&description=" . urlencode($row["course_description"]) . "'><button class='btn btn-primary'>View More</button></a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                    if (($counter + 1) % 4 == 0 || $counter == $result->num_rows - 1) {
                        // Close the row after every 4 cards or at the end of the loop
                        echo "</div>";
                    }

                    $counter++;
                }
            } else {
                echo "No courses found for this skill";
            }
            // Close the database connection
            $conn->close();
        } else {
            echo "Skill ID or Skill Name not provided.";
        }
        ?>
        
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
