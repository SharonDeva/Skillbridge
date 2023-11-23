<?php
// Include your database configuration file
require_once '../classes/DbConnector.php'; // Update with your actual file path

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve quiz name from the form
    $quizName = $_POST['quiz-name'];

    // Insert quiz information into the 'quiz' table
    $insertQuizQuery = "INSERT INTO quiz (moduleid, quiz_title) VALUES (1, :quizTitle)"; // Assuming moduleid is 1, update it accordingly

    $stmt = $pdo->prepare($insertQuizQuery);
    $stmt->bindParam(':quizTitle', $quizName);
    $stmt->execute();

    // Retrieve the quizid of the inserted quiz
    $quizId = $pdo->lastInsertId();

    // Loop through each question from the form
    for ($i = 1; $i <= 20; $i++) {
        // Retrieve question and correct answer from the form
        $question = $_POST['questions'][$i - 1];
        $correctAnswer = $_POST['correct' . $i];

        // Insert question information into the 'question' table
        $insertQuestionQuery = "INSERT INTO question (quizid, question, questionid) VALUES (:quizId, :question, :questionId)";

        $stmt = $pdo->prepare($insertQuestionQuery);
        $stmt->bindParam(':quizId', $quizId);
        $stmt->bindParam(':question', $question);
        $stmt->bindParam(':questionId', $i);
        $stmt->execute();

        // Retrieve the questionid of the inserted question
        $questionId = $pdo->lastInsertId();

        // Retrieve options from the form and insert into the 'answers' table
        $options = $_POST['options' . $i];
        foreach ($options as $option) {
            $insertAnswerQuery = "INSERT INTO answers (quizid, questionid, option, correct_answer) VALUES (:quizId, :questionId, :option, :correctAnswer)";

            $stmt = $pdo->prepare($insertAnswerQuery);
            $stmt->bindParam(':quizId', $quizId);
            $stmt->bindParam(':questionId', $questionId);
            $stmt->bindParam(':option', $option);
            $stmt->bindParam(':correctAnswer', $correctAnswer);
            $stmt->execute();
        }
    }

    // You can redirect or send a response as needed
    // For example, redirect to a success page
    header("Location: success.php");
    exit();
}
?>