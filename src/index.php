<?php
session_start();

require("header.php");
?>

    <?php if(isset($_SESSION['isLoggedInCustomer']) || isset($_SESSION['isLoggedInEmployee'])): ?>
       <p id="loginStatus"><?php echo $_SESSION['username']; echo '<h3>';echo $_SESSION['role'];echo '</h3>';?>
    <?php endif; ?>
 
    <?php 
        require("footer.php");
    ?>
