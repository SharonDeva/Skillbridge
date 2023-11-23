<?php
session_start();
require_once '../classes/User.php';
require_once '../classes/DbConnector.php';

use classes\User;
use classes\DbConnector;

if (isset($_POST["email"], $_POST["password"])) {
    // Handle form submissions
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = new User(null, null, null, $email, $password, null);

    // Authenticate user
    if ($user->authenticate(DbConnector::getConnection())) {
        // Set session variables
        $_SESSION["user_id"] = $user->getUserid();
        $_SESSION["user_firstname"] = $user->getFirstname();
        $_SESSION["user_lastname"] = $user->getLastname();
        $_SESSION["user_role"] = $user->getRole();

        // Redirect based on user role
        switch ($_SESSION["user_role"]) {
            case 'learner':
                $location = "../pages/learner.php";
                break;
            case 'tutor':
                $location = "../pages/tutorProfile.php";
                break;
            case 'admin':
                $location = "../pages/adminProfile.php";
                break;
            default:
                $location = "SignIn.php";
        }
    } else {
        // Invalid credentials, redirect to login with status
        $location = "SignIn.php?status=2";
    }
} else {
    // No form submission, redirect with status
    $location = "SignIn.php?status=0";
}

// Redirect to the determined location
header("Location:" . $location);
?>