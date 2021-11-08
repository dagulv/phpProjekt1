<?php
//Startar upp sessionen
session_start();
//Användare och lösenord för sidan ändra till customer användare
// Inkludera filer för databaskoppling och funktioner
require("includes/conn_mysql.php");
require("includes/item_functions.php");

// Skapa databaskoppling
$connection = dbConnect();

// Visar alla kunder
$allCustomerLogins = getLogins($connection,'customer');
$allEmployeeLogins = getLogins($connection,'employee');
//Hämtar användare och lösenord från formuläret
$checkUser = mysqli_real_escape_string($connection, $_POST['txtUser']);
$checkPass = mysqli_real_escape_string($connection, $_POST['txtPassword']);


$radio = $_POST['radioType'];

//Kontrollera sessionen
if ($radio=="Kund"):
    if ($allCustomerLogins):
        while ($login = mysqli_fetch_array($allCustomerLogins)):
            if($checkUser == $login['customerEmail'] && password_verify($checkPass, $login['customerPassword'])) {
                session_unset();
                $_SESSION['isLoggedInCustomer'] = true;
                $_SESSION['username'] = $login['customerName'];
                $_SESSION['role'] = $radio;
                header("Location: welcome.php");
                exit;
            }
        endwhile;
    else:
        header("Location: login.php?invalid_login");
    endif;
elseif ($radio=="Anställd"):
    if ($allCustomerLogins):
        while ($login = mysqli_fetch_array($allEmployeeLogins)):
            if($checkUser == $login['employeeEmail'] && password_verify($checkPass, $login['employeePassword'])) {
                session_unset();
                $_SESSION['isLoggedInEmployee'] = true;
                $_SESSION['username'] = $login['employeeName'];
                $_SESSION['role'] = $radio;
                header("Location: welcome.php");
                exit;
            }
        endwhile;
    else:
        header("Location: login.php?invalid_login");
    endif;
endif;
mysqli_close($connection);
?>