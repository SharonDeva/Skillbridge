<?php
// create_post.php
require_once '../classes/DbConnector.php';
require_once '../classes/Post.php';

session_start();

// Check if the user is logged in
if (isset($_SESSION["user_id"])) {
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $userId = $_SESSION["user_id"];
        $description = $_POST["post"];

        // Additional logic for handling image and video uploads if needed

        // Create a Post object and save it to the database
        $post = new \classes\Post($userId, $description);
        $con = \classes\DbConnector::getConnection();
        $post->createPost($con);

        // Redirect to the postFeed.php page after post creation
        header("Location: postFeed.php");
        exit();
    } else {
        // Handle the case when the form is not submitted
        echo "Form not submitted!";
    }
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: ./Home.php");
    exit();
}
?>
