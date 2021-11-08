<?php
session_start();

if (!isset($_SESSION['isLoggedInCustomer']) && !isset($_SESSION['isLoggedInEmployee'])) {
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
    <h1>Välkommen <?php echo $_SESSION['username']; echo '<h3>';echo $_SESSION['role'];echo '</h3>';?></h1>
    <?php 
        var_dump($_SESSION);
        //session_unset();
        //var_dump($_SESSION);

    ?>
    <a href="index.php">Gå till Index</a>


    </body>
</html>