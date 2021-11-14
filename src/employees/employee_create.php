<?php
// Startar upp sessionen
session_start();

// Inkludera filer för databaskoppling och funktioner
require("../includes/conn_mysql.php");
require("../includes/employee_functions.php");// Inkludera filer för databaskoppling och funktioner

//Skapa databaskoppling
$connection = dbConnect();
/* Raderar anställd */

if (!isset($_SESSION['isLoggedInEmployee'])) {
  header('Location: ../login.php');
  return;
}

// Skall den anställde redigeras?
if(isset($_GET['deleteID']) && $_GET['deleteID'] > 0){
  $isDeleteID = $_GET['deleteID'];
}

// Skall den anställde uppdateras?
if(isset($_POST['isnew']) && $_POST['isnew'] == 1){
  $saveEmployee = saveEmployee($connection);
  
  header("Location: employee_read.php");
}

require("../header.php");
?>

<main>
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
  <a href="../index.php">Gå tillbaka till index</a>
</main>
        <?php
        // Stänger databasen
        dbDisconnect($connection);
        ?>

        <?php
          require("../footer.php");
        ?>