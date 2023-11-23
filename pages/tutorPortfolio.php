<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "skillbridge");
$tutorId = 2;
$query = "SELECT * FROM user where userid = $tutorId";
$rs_result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($rs_result)) {
    $full_name = $row["firstname"] . " " . $row["lastname"];
    ?>


    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Portfolio</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="../css/portfolio.scss">
        </head>

        <body data-bs-spy="scroll" data-bs-target=".navbar">
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
                <div class="container flex-lg-column">
                    <a class="navbar-brand mx-lg-auto mb-lg-4" href="#">
                        <span class="h3 fw-bold d-block d-lg-none">
                            <!-- Name of the user -->
                            <?php $full_name; ?>
                        </span>
                        <img src="../img/person2.jpg" alt="" class="d-none d-lg-block rounded-circle">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto flex-lg-column text-lg-center">

                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#skills">Skills</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#intrests">Intrests</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#certicate">Certification</a>
                            </li>


                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Contents Start -->
            <div id="content-wrapper">

                <!-- About Start-->
                <section id="about" class="full-height px-lg-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10">

                                <h1 class="display-4 fw-bold" data-aos="fade-up">
                                    My name is
                                    <span class="text-brand">
                                        <!-- Name of the User -->
                                        <!-- First Name --> <!-- Last Name -->
                                        <?php echo $full_name; ?>
                                    </span>
                                    <br>

                                    I am from
                                    <span class="text-brand">
                                        <!-- Country of the user -->
                                        London
                                    </span>
                                </h1>
                                <br>
                                <div data-aos="fade-up" data-aos-delay="600">
                                    <h2><span class="text-brand"><?php $row["email"]; ?></span></h2>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <!-- About end -->

                <!-- Skill part Start -->
                <section id="skills" class="full-height px-lg-5">
                    <div class="container">
                        <div class="row pb-4" data-aos="fade-up">
                            <div class="col-lg-8">
                                <h6 class="text-brand">Skills</h6>
                                <h1>Skills That I Have</h1>
                            </div>
                        </div>

                        <div class="row gy-4">
                            <?php
                            $query1 = "SELECT * FROM tutor_skill where userid = $tutorId";
                            $rs_result1 = mysqli_query($link, $query1);
                            while ($row1 = mysqli_fetch_array($rs_result1)) {
                                $sid = $row1["skillid"];
                                $query2 = "SELECT * FROM skills where skillid = $sid";
                                $rs_result2 = mysqli_query($link, $query2);
                                while ($row2 = mysqli_fetch_array($rs_result2)) {
                                    ?>

                                    <div class="col-md-4" data-aos="fade-up">
                                        <div class="service p-4 bg-base rounded-4 shadow-effect">

                                            <h5 class="mt-4 mb-2"><?php echo $row2["skillname"]; ?></h5>
                                            <!-- Small Description -->
                                            <p><?php echo $row2["description"]; ?></p>

                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </section>
                <!-- Skill part end -->

                <!-- Intrests Part Start -->
                <section id="intrests" class="full-height px-lg-5">
                    <div class="container">
                        <div class="row pb-4" data-aos="fade-up">
                            <div class="col-lg-8">
                                <h6 class="text-brand">Intrests</h6>
                                <h1>These are my intested part</h1>
                            </div>
                        </div>

                        <div class="row gy-4">
                            <?php
                            $query1 = "SELECT * FROM tutor_skill where userid = $tutorId";
                            $rs_result1 = mysqli_query($link, $query1);
                            while ($row1 = mysqli_fetch_array($rs_result1)) {
                                $sid = $row1["skillid"];
                                $query2 = "SELECT * FROM skills where skillid = $sid";
                                $rs_result2 = mysqli_query($link, $query2);
                                while ($row2 = mysqli_fetch_array($rs_result2)) {
                                    ?>
                                    <div class="col-md-4" data-aos="fade-up">
                                        <div class="shadow-effect bg-base p-4 rounded-4">
                                            <div class="person">
                                                <p class="mb-0"><?php echo $row2["skillname"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                </section>
                <!-- Intrests Part End -->


                <!-- Certification Part Start-->
                <section id="certicate" class="full-height px-lg-5">
                    <div class="container">
                        <div class="row pb-4" data-aos="fade-up">
                            <div class="col-lg-8">
                                <h6 class="text-brand">Certification</h6>
                                <h1>My Certificates</h1>
                            </div>
                        </div>

                        <div class="row gy-5">
                            <div class="col-lg-6">
                                <div class="row gy-4">
                                    <?php
                                    $query1 = "SELECT * FROM tutor_profile where userid = $tutorId";
                                    $rs_result1 = mysqli_query($link, $query1);
                                    while ($row1 = mysqli_fetch_array($rs_result1)) {
                                        ?>

                                        <div class="col-12" data-aos="fade-up" data-aos-delay="600">
                                            <div class="bg-base p-4 rounded-4 shadow-effect">
                                                <h4><?php echo $row1["certification"]; ?></h4> 
                                                <p class="mb-0"><?php echo $row1["skills"]; ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Certification part end -->

            </div>
            <!-- Contents End -->
            <?php
        }
        ?>

        <!-- Script Links -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>