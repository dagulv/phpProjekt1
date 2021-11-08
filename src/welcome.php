<?php
session_start();

if (!isset($_SESSION['loggedIn'])) {
    header('Location: login.php');
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bokhandel</title>
        <meta charset="utf-8" />
    </head>
    <body>
    <h1>Välkommen <?php echo $_SESSION['username']; ?></h1>
    <a href="index.php">Gå till Index</a>


    </body>
</html>