<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/VisitorNav.css" />
        <style>
            /* Additional CSS for white font color in the navigation bar */
            .navbar-nav li.nav-item a.nav-link {
                color: white;
            }
            .navbar {
                background-color: #1c3276;
                margin-top: 0px;
                position: sticky;
            }
            .navbar-dark .navbar-toggler-icon {
                background-color: white;
            }
            .navbar-toggler {
                border-color: white;
            }
            .navbar-nav .nav-link {
                color: white;
            }
            .navbar-nav .nav-link:hover {
                color: #f8f9fa;
            }
            .navbar-nav .show > .nav-link,
            .navbar-nav .active > .nav-link,
            .navbar-nav .nav-link.show,
            .navbar-nav .nav-link.active {
                color: #f8f9fa;
            }
            .navbar-nav .dropdown-menu {
                background-color: #1c3276;
            }
            .navbar-nav .dropdown-menu .dropdown-item {
                color: white;
            }
            .navbar-nav .dropdown-menu .dropdown-item:hover {
                background-color: #3f5da3;
            }
        </style>
        <title></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark mx-0">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="navbar-brand" href="../pages/Home.php">SkillBridge</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/Home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Leading Tutors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/Courses.php">Courses</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <?php
                    if (isset($_SESSION["user_id"])) {
                        switch ($_SESSION["user_role"]) {
                            case 'learner':
                            case 'tutor':
                                ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="User Profile" class="dropdown-toggle-icon rounded-circle" style="width: 30px; height: 30px;">
                                        <span>
                                            <?= $_SESSION["user_firstname"] . " " . $_SESSION["user_lastname"] ?>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="../pages/mainTutorProfile.php">User Profile</a></li>
                                        <li><a class="dropdown-item" href="../user/signOut.php" onclick="return confirm('Are you sure you want to log out?')">Log Out</a></li>
                                    </ul>
                                </li>
                                <?php
                                break;
                            case 'admin':
                                break;
                        }
                    } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/SignIn.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/SignUp.php">Register</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyExukwLU1CO6Q6YtEL+J7tpZkZaXmmF6" crossorigin="anonymous"></script>
    </body>
</html>
