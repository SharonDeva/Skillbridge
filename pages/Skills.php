<?php
require_once '../classes/DbConnector.php';

use classes\DbConnector;

$con = DbConnector::getConnection();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Skills</title>
        <link rel="stylesheet" href="../css/Skills.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <?php require '../include/VisitorNav.php'; ?>
        <div class="container mt-4">
            <div class="container text-center">
                <h4>Skills that you'll be interested in</h4>
                <?php
                $itemsPerPage = 12;
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                $sql = "SELECT * FROM skills";
                $result = $con->query($sql);

                if ($result !== false) {
                    $rowCount = $result->rowCount();
                    $pages = ceil($rowCount / $itemsPerPage);

                    if ($rowCount > 0) {
                        $start = ($currentPage - 1) * $itemsPerPage;

                        $sql .= " LIMIT $start, $itemsPerPage";
                        $result = $con->query($sql);

                        if ($result !== false) {
                            $counter = 0;

                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                if ($counter % 4 === 0) {
                                    echo '<div class="row">';
                                }

                                echo '<div class="col-md-3">';
                                echo '<div class="card">';
                                echo '<img src="' . $row["skillimage"] . '" class="card-img-top" alt="' . $row["skillname"] . '">';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">';
                                echo $row["skillname"];
                                
                                echo '</h5>';
                                echo '<p class="card-description" style="text-align: left;">';
                                echo $row["description"];
                                echo '</p>';
                                echo '<a href="SkillCourses.php?skillid=' . $row["skillid"] . '&skillname=' . urlencode($row["skillname"]) . '&description=' . urlencode($row["description"]) . ' "><button class="btn btn-primary">View More</button></a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';

                                if ($counter % 4 === 3 || $counter === $result->rowCount() - 1) {
                                    echo '</div>';

                                    if ($counter % 4 === 3 || $counter === $result->rowCount() - 1) {
                                        echo '<div class="row">';
                                        echo '<div class="col-md-12 text-right">';

                                        echo '</div>';
                                        echo '</div>';
                                    }
                                }

                                $counter++;
                            }
                        }
                    } else {
                        echo "No skills found";
                    }
                } else {
                    echo "Error executing query: " . $con->errorInfo()[2];
                }
                ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center pagination-rounded">
                        <?php
                        for ($i = 1; $i <= $pages; $i++) {
                            echo '<li class="page-item ' . ($i == $currentPage ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
        <?php require '../include/VisitorFooter.php'; ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
