<?php
session_start();
session_unset();
$_SESSION['isLoggedIn'] = false;

header('Location: index.php');
exit;

/*
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('Location: index.php');
die;
*/

?>

