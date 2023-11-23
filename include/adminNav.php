<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: "Lato", sans-serif;
                flex-direction: column;
                font-size: 15px;
            }

            .sidebar {
                width: 200px;
                background-color: #333;
                position: fixed;
                height: 100%;
                overflow: auto;
                float: left;
                margin-left: 0px;
                top: 0;
                left: 0;
                overflow-x: hidden;
                padding-top: 20px;
                flex-direction: column;

            }

            .sidebar a {
                display: block;
                color: white;
                padding: 12px;
                text-decoration: none;
            }

            .sidebar a.active {
                background-color: #0056b3;
                color: white;
            }

            .sidebar a:hover:not(.active) {
                background-color: #555;
                color: white;
            }

            .sidebar-heading {
                font-size: 24px;
                padding: 20px 15px;
                color: white;
                font-weight: bold;
            }

            @media screen and (max-width: 700px) {
                .sidebar {
                    width: 100%;
                    height: auto;
                    position: relative;
                }
            }

            @media screen and (max-width: 400px) {
                .sidebar a {
                    text-align: center;
                    float: none;
                }
            }
        </style>
    </head>
    <body>
        <div class="container-fluid" id="adminNav">
            <div class="sidebar">
                <p class="sidebar-heading" href="#home">SkillBridge</p>
                <a  href="../admin/tutorList.php">Tutor list</a>
                <a  href="../admin/learnerList.php">Learner List</a>
                <a href="#"> Tutor Request List</a>
                <a href="../admin/skillList.php">Skill List</a>
                <a href="#ModuleList">Module List</a>
                <a href="#Post List">Posts List</a>
            </div>

        </div>
        <script src="activeJs.js"></script>
    </body>
</html>
