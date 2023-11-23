<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course and Modules</title>
    <link rel="stylesheet" href="../css/LearnerViewCourse.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="body">
    <?php
    if (isset($_GET['userid']) && isset($_GET['skillname']) && isset($_GET['username'])) {
        $userid = $_GET['userid'];
        $skillname = $_GET['skillname'];
        $name = $_GET['username'];

        // Database connection code here (replace with your own credentials)
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $dbname = "skillbridge";

        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT m.moduleid, m.modulename, m.description
                FROM module m
                JOIN skill_module sm ON m.moduleid = sm.moduleid
                JOIN skills s ON sm.skillid = s.skillid
                JOIN user u ON sm.userid = u.userid
                WHERE sm.userid = ? AND s.skillname = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $userid, $skillname);
        $stmt->execute();
        $result = $stmt->get_result();

        echo '<h2>Skill: ' . $skillname . '</h2>';
        echo '<h3>Tutor: ' . $name . '</h3>';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="module-card">
                        <h4>' . $row["modulename"] . '</h4>
                        <p>' . $row["description"] . '</p>
                    </div>';

                // Fetch and display module resources for this module
                $moduleid = $row["moduleid"];

                // Fetch PDF resources for this module
                $pdf_sql = "SELECT pdfname, file
                            FROM pdf_resource
                            WHERE moduleid = ?";
                $pdf_stmt = $conn->prepare($pdf_sql);
                $pdf_stmt->bind_param("i", $moduleid);
                $pdf_stmt->execute();
                $pdf_result = $pdf_stmt->get_result();

                // Fetch video resources for this module
                $video_sql = "SELECT videoname, videourl
                              FROM video_resource
                              WHERE moduleid = ?";
                $video_stmt = $conn->prepare($video_sql);
                $video_stmt->bind_param("i", $moduleid);
                $video_stmt->execute();
                $video_result = $video_stmt->get_result();

                echo '<div class="container mt-5 col-md-10">';
                echo '<h1 class="h1">Indian Cooking by <i>Tutor name</i></h1>';
                echo '<span>Cooking[skill name]</span>';

                echo '<div class="resource">';
                echo '<h3 class="h3">North Indian Cuisine</h3>';
                echo '<span>Module 1</span>';
                echo '<div class="resource" style="text-align: start;">';
                echo '<p class="moduleDesc">';
                echo 'Explore the rich and diverse flavors of North Indian cuisine. From aromatic curries to delectable tandoori dishes, this module will introduce you to the heart of Indian culinary traditions.';
                echo '</p>';
                echo '<a class="pdf" href="../img/progress new report 2.pdf" target="_blank">';
                echo '<div class="material-symbols-outlined"> picture_as_pdf</div>';
                echo 'North Indian cuisine recipe.';
                echo '</a><br>';
                echo '<div class="d-flex justify-content-center align-items-center">';
                echo '<iframe class="ytFrame" width="560" height="315" src="https://www.youtube.com/embed/axMMXIvpsDg?si=v4aXWjW59N8IeY_w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                echo '</div>';
                echo '<p class="quiz-link">';
                echo '<span class="material-symbols-outlined"> quiz </span>';
                echo '<a href="#" data-bs-toggle="modal" data-bs-target="#confirmationModal">Start Quiz</a>';
                echo '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    }
    ?>

    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to start the quiz?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="javascript:void(0);" onclick="openQuiz();" class="btn btn-primary">Start Quiz</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        let quizOpened = false;

        function openQuiz() {
            if (!quizOpened) {
                window.open("../pages/LearnerQuiz.php", "_blank");
                quizOpened = true;
                $('#confirmationModal').modal('hide');
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>