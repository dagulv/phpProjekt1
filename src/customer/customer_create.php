<?php
/*
  Raderar customer
*/
if (!isset($_SESSION['isLoggedInCustomer']) && !isset($_SESSION['isLoggedInEmployee'])) {
  header('Location: ../login.php');
  return;
}
// Inkludera filer för databaskoppling och funktioner
require("../includes/conn_mysql.php");
require("../includes/customer_functions.php");

// Skapa databaskoppling
$connection = dbConnect();

// Ska kunden redigeras?
if(isset($_GET['deleteID']) && $_GET['deleteID'] > 0){
  $isDeleteID = $_GET['deleteID'];
}

// Skall kunden uppdateras?
if(isset($_POST['isnew']) && $_POST['isnew'] == 1){
  $saveCustomer = saveCustomer($connection);

  header("Location: customer_read.php");
}
?>
<!DOCTYPE HTML>
<html lang="sv">
    <head>
        <meta charset="utf-8" />
        <title>Kunder - Lägg till</title>
    </head>

    <body>
        <h1>Lägg till kund</h1>

        <form action="customer_create.php" method="post">
            <input type="hidden" name="isnew" id="isnew" value="1">

            <label>Namn:</label>
            <p><input type="text" name="txtName" palceholder="Namn"></p>

            <label>Address:</label>
            <p><input type="text" name="txtAddress" placeholer="Address"></p>
            
            <label>Telefonnummer:</label>
            <p><input type="text" name="txtPhoneNumber" placeholer="070-000-00-00"></p>

            <label>Personnummer:</label>
            <p><input type="text" name="txtPersonNumber" placeholer=""></p>

            <label>Email:</label>
            <p><input type="email" name="txtEmail" placeholer="email"></p>

            <label>Lösenord:</label>
            <p><input type="text" name="txtPassword" placeholer="lösenord"></p>

            <p><input type="submit" value="Lägg till"></p>
        </form>

        
        <?php
        // Stänger databasen
        dbDisconnect($connection);
        ?>
        <a href="../index.php">Gå tillbaka till index</a>
    </body>
</html>