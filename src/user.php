<?php 
session_start();

if (!isset($_SESSION['isLoggedInCustomer'])) {
    header('Location: login.php');
    return;
}

require("header.php");

// Inkludera filer för databaskoppling och funktioner
require("includes/conn_mysql.php");
require("includes/customer_functions.php");

// Skapa databaskoppling
$connection = dbConnect();

// Visar alla kunder
$user = getCustomerData($connection, $_SESSION['id']);
?>

<main>
    <h1>Namn: <?php echo $user['customerName']; ?></h1>
    <h3>Adress: <?php echo $user['customerAddress']; ?></h3>
    <h3>Telefonnummer: <?php echo $user['customerPhoneNumber']; ?></h3>
    <h3>Personnummer: <?php echo $user['customerPersonNumber']; ?></h3>
    <h3>Email: <?php echo $user['customerEmail']; ?></h3>
    <h3>Skapad: <?php echo $user['customerDate']; ?></h3> <br>
    <h3>Du har lånat</h3> <?php
    if (!$_SESSION['borrowArray']) {
        echo '0 böcker';
    }
    else {
        echo '<ul style="padding-left: 1.5rem;">';
        foreach ($_SESSION['borrowArray'] as $book => $book_value) {
            echo '<li>'. $book_value .' antal av boken '. '<strong>'.$book.'</strong>'.'</li>';
        }
        echo '</ul>';1
            ?>
   <?php } ?>
   
</main>

    <?php
        require("footer.php");
    ?>