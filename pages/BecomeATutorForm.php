<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Request to be a Tutor</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">
        <link rel="stylesheet" href="../css/BecomeATutorForm.scss"/>
    </head>

    <body>
        <?php include '../include/VisitorNav.php';?>
        <div class="container d-flex justify-content-center align-items-center vh-100 reqForm">
        <div class="p-4 rounded shadow transparent-bg" style="width: 50%;">
                <h3 class="text-center mb-4">Request to be a Tutor</h3>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Certificates (JPEG, PNG):</label>
                        <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png" required>
                    </div>

                    <div class="mb-3">
                        <label for="dropdown" class="form-label">Choose a Skill:</label>
                        <select class="form-select" id="dropdown" name="subject" required>
                            <option value="" disabled selected>Select a Skill</option>
                            <option value="math">Singing</option>
                            <option value="science">Dancing</option>
                            <option value="history">Swimming</option>
                            <option value="programming">Beat box</option>
                            <option value="languages">karate</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" >Send</button>
                </form>
            </div>
        </div>
        <?php require ''; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-r5djB2z+pvVe3PFII0DSaPXlK7P5tUGbl3Hcbz9BUpz9PQSb+jDx8ve7pj2y4C4p"
                crossorigin="anonymous"></script>
    </body>

</html>
