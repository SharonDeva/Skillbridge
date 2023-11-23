<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Skill Course</title>
</head>
<body>

<h2>Add Skill Course</h2>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to your database (replace these variables with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "skillbridge";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from the form
    $userid = $_POST['userid'];
    $skillid = $_POST['skillid'];
    $coursename = $_POST['coursename'];
    $course_description = $_POST['course_description'];

    // Check if an image is selected
    if (isset($_FILES['courseimage'])) {
        $file_name = $_FILES['courseimage']['name'];
        $file_tmp = $_FILES['courseimage']['tmp_name'];
        $uploads_dir = "../uploads/";
        move_uploaded_file($file_tmp, $uploads_dir . $file_name);
        $courseimage = $uploads_dir . $file_name;

        // Insert data into the skill_course table
        $sql = "INSERT INTO skill_course (userid, skillid, coursename, course_description, courseimage) 
                VALUES ('$userid', '$skillid', '$coursename', '$course_description', '$courseimage')";

        if ($conn->query($sql) === TRUE) {
            echo "Course added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Please select an image";
    }

    // Close the database connection
    $conn->close();
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <label for="userid">User ID:</label>
    <input type="text" name="userid" required><br>

    <label for="skillid">Skill ID:</label>
    <input type="text" name="skillid" required><br>

    <label for="coursename">Course Name:</label>
    <input type="text" name="coursename" required><br>

    <label for="course_description">Course Description:</label>
    <textarea name="course_description" required></textarea><br>

    <label for="courseimage">Upload Course Image:</label>
    <input type="file" name="courseimage" accept="image/*" required><br>

    <input type="submit" value="Add Course">
</form>

</body>
</html>
