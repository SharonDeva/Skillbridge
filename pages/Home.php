<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/home.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    </head>

    <body>
        <?php require '../include/VisitorNav.php' ?>
        <div class="home-body">
            <div class="hero-image">
                <div class="hero-text">
                    <h1 class="heroTitle">SkillBridge</h1>
                    <p>Unlock Your Potential with SkillBridge
                        <br> Share, Learn, and Master Skills Together

                    </p>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="skill-list">
                            <h2>You need it, we've got it...</h2>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card border-0 skillCard d-flex flex-column align-items-center">
                                        <img src="../img/singer.png" class="icons" alt="alt"/>
                                        <h6 class="card-title">Singing</h6>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 skillCard d-flex flex-column align-items-center">
                                        <img src="../img/drawing.png" class="icons" alt="alt"/>
                                        <h6 class="card-title">Painting</h6>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 skillCard d-flex flex-column align-items-center">
                                        <img src="../img/dance.png" class="icons" alt="alt"/>
                                        <h6 class="card-title">Danceee</h6>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 skillCard d-flex flex-column align-items-center">
                                        <img src="../img/karate.png" class="icons" alt="alt"/>
                                        <h6 class="card-title">Karate</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card border-0 skillCard d-flex flex-column align-items-center">
                                        <img src="../img/fashion-design.png" class="icons" alt="Fashion Design"/>
                                        <h6 class="card-title">Fashion Design</h6>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 skillCard d-flex flex-column align-items-center">
                                        <img src="../img/photographer.png" class="icons" alt="Photography"/>
                                        <h6 class="card-title">Photography</h6>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 skillCard d-flex flex-column align-items-center">
                                        <img src="../img/yoga.png" class="icons" alt="Yoga"/>
                                        <h6 class="card-title">Yoga</h6>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 skillCard d-flex flex-column align-items-center">
                                        <img src="../img/esoteric.png" class="icons" alt="Astronomy"/>
                                        <h6 class="card-title">Astronomy</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="skill-content">
                            <h2>SkillBridge Leading Tutors.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require '../include/VisitorFooter.php'; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    </body>

</html>
