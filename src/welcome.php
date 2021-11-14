<?php
session_start();
if (!isset($_SESSION['isLoggedInCustomer']) && !isset($_SESSION['isLoggedInEmployee'])) {
    header('Location: login.php');
    return;
}
?>

    <?php
        require("header.php");
    ?>

    <h1>Välkommen <?php echo $_SESSION['username']; echo '<h3>';echo $_SESSION['role'];echo '</h3>';?></h1>
    <?php 
        //var_dump($_SESSION);
        //session_unset();
        //var_dump($_SESSION);
        if (!isset($_SESSION['isLoggedInCustomer']) && !isset($_SESSION['isLoggedInEmployee'])) {
            echo 'funkar';
            return;
        }
        else {echo !isset($_SESSION['isLoggedInCustomer']) && !isset($_SESSION['isLoggedInEmployee']);}
    ?>

    <a href="index.php">Gå till hem</a>

    <?php
        require("footer.php");
    ?>


    </body>
</html>