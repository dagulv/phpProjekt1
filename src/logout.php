<?php
session_start();

if (!isset($_SESSION['isLoggedInCustomer']) && !isset($_SESSION['isLoggedInEmployee'])) {
    header('Location: index.php');
    return;
}


// $_SESSION['isLoggedInCustomer'] = false;
session_unset();
header('Location: index.php');
// exit;

/*
unset($_SESSION);
session_destroy();
session_write_close();
header('Location: index.php');
die;
*/
?>

