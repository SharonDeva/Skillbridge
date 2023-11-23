<?php
session_start();
if(isset($_SESSION["user_id"])){
    

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h3>Welcome, <?=$_SESSION["user_firstname"]." ".$_SESSION["user_lastname"]?>!</h3>
        <a href ="signOut.php"><button type="button">Sign out</button></a>
        <?php
        ?>
    </body>
</html>
<?php
}
else{
    header("Location: ../");
}
?>