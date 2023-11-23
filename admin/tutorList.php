<?php
require_once '../classes/DbConnector.php';

use classes\DbConnector;

$dbcon = new DbConnector();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <?php include '../include/adminNav.php';?>
<div class="content">
    <button class="btn btn-danger logout-button">Logout</button>
    <table class="table table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col" colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        try {
            $con = $dbcon->getConnection();
            $query = "SELECT firstname, lastname, email, username FROM user WHERE role = 'tutor'";
            $pstmt = $con->prepare($query);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            $i = 1;
            foreach ($rs as $user) {
                ?>

                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $user->firstname; ?></td>
                    <td><?php echo $user->lastname; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->username; ?></td>
                    <td>
                        <button class="btn">
                            <span><i class="fas fa-trash" style="color: #ffffff;">Edit</i></span>
                        </button>
                    </td>
                    <td>
                        <button class="btn">
                            <i class="fa-solid fa-pen-to-square" style="color: #ffffff;">Delete</i>
                        </button>
                    </td>
                </tr>

                <?php
                $i++;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        ?>
        </tbody>
    </table>
</div>
        <?php include '../include/adminFooter.php';?>
    </body>
</html>
