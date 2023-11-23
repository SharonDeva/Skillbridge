<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Skill Input Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "skillbridge";

        $conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

// Process form data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $skillName = $_POST["skillName"];
            $description = $_POST["description"];

            // Handle file upload
            $targetDir = "../uploads/"; // Go up one level to reach the "Source Files Folder" and then enter the "uploads" folder
            $targetFile = $targetDir . basename($_FILES["skillImage"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["skillImage"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            // Check if file already exists
            if (file_exists($targetFile)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["skillImage"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            $allowedExtensions = array("jpg", "jpeg", "png");
            if (!in_array($imageFileType, $allowedExtensions)) {
                echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // If everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["skillImage"]["tmp_name"], $targetFile)) {
                    echo "The file " . basename($_FILES["skillImage"]["name"]) . " has been uploaded.";

                    // Insert data into the "skills" table using prepared statements
                    $stmt = $conn->prepare("INSERT INTO skills (skillname, skillimage, description) VALUES (?, ?, ?)");
                    $stmt->bind_param("sss", $skillName, $targetFile, $description);

                    if ($stmt->execute()) {
                        echo "Skill information added successfully!";
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        ?>

        <h2>Enter Skill Information</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <label for="skillName">Skill Name:</label>
            <input type="text" id="skillName" name="skillName" required><br>

            <label for="skillImage">Skill Image (JPEG, PNG):</label>
            <input type="file" id="skillImage" name="skillImage" accept="image/jpeg, image/png" required><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" required></textarea><br>

            <input type="submit" name="submit" value="Submit">
        </form>

        <?php
        $conn->close();
        ?>

    </body>
</html>