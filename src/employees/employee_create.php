<?php
/*
  Raderar anställd
*/
session_start();
if (!isset($_SESSION['isLoggedInEmployee'])) {
  header('Location: ../login.php');
  return;
}

// Inkludera filer för databaskoppling och funktioner
require("../includes/conn_mysql.php");
require("../includes/employee_functions.php");

// Skapa databaskoppling
$connection = dbConnect();

// Skall den anställde redigeras?
if(isset($_GET['deleteID']) && $_GET['deleteID'] > 0){
  $isDeleteID = $_GET['deleteID'];
}

// Skall den anställde uppdateras?
if(isset($_POST['isnew']) && $_POST['isnew'] == 1){
  $saveEmployee = saveEmployee($connection);

  header("Location: employee_read.php");
}
?>
<!DOCTYPE HTML>
<html lang="sv">
    <head>
        <meta charset="utf-8" />
        <title>Anställda - Lägg till</title>
    </head>

    <body>
        <h1>Lägg till anställd</h1>

        <form action="employee_create.php" method="post">
            <input type="hidden" name="isnew" id="isnew" value="1">

            <label>Namn:</label>
            <p><input type="text" name="txtName" placeholer="Namn"></p>

            <label>Email:</label>
            <p><input type="text" name="txtEmail" placeholer="Email"></p>

            <label>Lösenord:</label>
            <p><input type="text" name="txtPassword" placeholer="lösenord"></p>
            
            <label>Roll:</label>
            <p><input type="text" name="txtRole" placeholer="Roll" value="1"></p>

            <p><input type="submit" value="Lägg till"></p>
        </form>
        <?php
        // Stänger databasen
        dbDisconnect($connection);
        ?>
        <a href="../index.php">Gå tillbaka till index</a>
    </body>
</html>