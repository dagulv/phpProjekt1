<?php
/*
  Raderar customer
*/
if (!isset($_SESSION['isLoggedInEmployee'])) {
  header('Location: ../login.php');
  return;
}

// Inkludera filer för databaskoppling och funktioner
require("../includes/conn_mysql.php");
require("../includes/employee_functions.php");

// Skapa databaskoppling
$connection = dbConnect();

// Ska den antsällde redigeras?
if(isset($_GET['deleteID']) && $_GET['deleteID'] > 0){
  $isDeleteID = $_GET['deleteID'];
}

// Ska den anställde uppdateras?
if(isset($_POST['isdeleteid']) && $_POST['isdeleteid'] > 0){
  deleteEmployee($connection, $_POST['isdeleteid']);

  header("Location: employee_read.php");
}
?>
<!DOCTYPE HTML>
<html lang="sv">
    <head>
        <meta charset="utf-8" />
        <title>Anställd - Radera</title>
    </head>
    <body>
        <h1>Radera anställd</h1>

        <form  method="post">
            <input type="hidden" name="isdeleteid" value="<?php echo $isDeleteID; ?>">
            <label>Vill du verkliga radera den anställda?</label>

            <p><input type="submit" value="Radera"></p>
        </form>
        <?php
        // Stänger databasen
        dbDisconnect($connection);
        ?>
    </body>
</html>