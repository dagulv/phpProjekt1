<?php
session_start();
if (!isset($_SESSION['isLoggedInCustomer']) && !isset($_SESSION['isLoggedInEmployee'])) {
    header('Location: index.php');
    return;
}

session_unset();
// $_SESSION['isLoggedInCustomer'] = false;

header('Location: index.php');
// exit;

/*
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('Location: index.php');
die;
*/

?>

