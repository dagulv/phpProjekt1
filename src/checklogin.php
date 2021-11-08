<?php
//Startar upp sessionen
session_start();
//Användare och lösenord för sidan ändra till customer användare
// Inkludera filer för databaskoppling och funktioner
require("includes/conn_mysql.php");
require("includes/customer_functions.php");

// Skapa databaskoppling
$connection = dbConnect();

// Visar alla kunder
$allLogins = getCustomerLogin($connection);
//Hämtar användare och lösenord från formuläret
$checkUser = $_POST['txtUser'];
$checkPass = $_POST['txtPassword'];

//Kontrollera sessionen
if ($allLogins):
    while ($login = mysqli_fetch_array($allLogins)):
        if($checkUser == $login['customerEmail'] && password_verify($checkPass, $login['customerPassword'])) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $login['customerName'];
            $_SESSION['role'] = 'Kund';
            header("Location: welcome.php");
            exit;
        }
    endwhile;
else:
    header("Location: login.php?invalid_login");
endif;
?>