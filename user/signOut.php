<?php
session_start();
unset($_SESSION["user_id"]);
unset($_SESSION["user_firstname"]);
unset($_SESSION["user_lastname"]);
session_destroy();
header("Location: ../pages/Home.php");