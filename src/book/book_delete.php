<?php
/*
  Raderar book
*/

// Inkludera filer för databaskoppling och funktioner
require("../includes/conn_mysql.php");
require("../includes/book_functions.php");

// Skapa databaskoppling
$connection = dbConnect();

// Ska kunden redigeras?
if(isset($_GET['deleteID']) && $_GET['deleteID'] > 0){
  $isDeleteID = $_GET['deleteID'];
}

// Skall kunden uppdateras?
if(isset($_POST['isdeleteid']) && $_POST['isdeleteid'] > 0){
  deletebook($connection, $_POST['isdeleteid']);

  header("Location: book_read.php");
}
?>
<!DOCTYPE HTML>
<html lang="sv">
    <head>
        <meta charset="utf-8" />
        <title>Kunder - Radera</title>
    </head>
    <body>
        <h1>Radera kund</h1>

        <form  method="post">
            <input type="hidden" name="isdeleteid" value="<?php echo $isDeleteID; ?>">
            <label>Vill du verkliga radera kunden?</label>

            <p><input type="submit" value="Radera"></p>
        </form>
        <?php
        // Stänger databasen
        dbDisconnect($connection);
        ?>
    </body>
</html>