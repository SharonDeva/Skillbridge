<!DOCTYPE html>
<html>
    <head>
        <title>Footer</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <style>
            body {
                
            }
            #footer {
                background-color: #1c3276;
                max-width: 100%;
                position: sticky;
                color: white;
            }
            .footerRow{
                padding-top: 20px;
            }
            .text-blue {
                color: #ffffff;
            }
            .footerLists{
                padding-right: 50px;
                text-align: right;
            }
            .footerP{
                padding-left: 50px;
            }
            .mb-4 {
                color: #ffffff;
            }
            #footerBtn {
                background-color: #e7e5e4;
                color: #2a4dbe;
                outline-color: #e7e5e4;
            }
            a, a:hover {
                color: white;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <footer id="footer">
            <div class="container py-4 ">
                <div class="row footerRow">
                    <div class="col-md-6 mb-4 footerP">
                        <p>
                            <strong>Contact Us</strong>
                        </p>
                        <p>
                            "SkillBridge - Empowering learners and tutors worldwide
                            <br>by providing a secure and non-profit platform for <br> 
                            seamless skills and knowledge sharing, fostering personal <br>
                            growth and community collaboration."
                        </p>
                    </div>
                    <div class="col-md-6 mb-4 footerLists">
                        <div class=" ">
                            <h5 class="text-uppercase"><a href="../pages/Home.php">Home</a></h5>
                        </div>
                        <div class=" ">
                            <h5 class="text-uppercase">
                                <a href="../pages/">Skills</a>
                            </h5>
                        </div>
                        <div class=" ">
                            <h5 class="text-uppercase">
                                <a href="../pages/LeadingTutors.php">Leading Tutors</a>
                            </h5>
                        </div>
                        <div class=" ">
                            <h5 class="text-uppercase">
                                <a href="../pages/ContactUs.php">Contact Us</a>
                            </h5>
                        </div>

                    </div>
                </div>

                <div class="row">

                </div>

                <div class="row d-flex justify-content-center mt-4">
                    <div class="col-auto">
                        <button class="btn" id="footerBtn">
                            <a href="../pages/SignUp.php" style="color: black;">Become A Learner</a>
                        </button>
                    </div>
                    <div class="col-auto">
                        <button class="btn" id="footerBtn">
                            <a href="../pages/SignUp.php" style="color: black;">Become A Tutor</a>
                        </button>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
