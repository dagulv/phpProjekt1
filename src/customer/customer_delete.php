<?php
// Startar upp sessionen
session_start();

/* Raderar customer */

if (!isset($_SESSION['isLoggedInEmployee'])) {
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
if(isset($_POST['isdeleteid']) && $_POST['isdeleteid'] > 0){
  deleteCustomer($connection, $_POST['isdeleteid']);
  
  header("Location: customer_read.php");  
}

require("../header.php");
?>
  <main>
    <h1>Radera kund</h1>
    
    <form  method="post">
      <input type="hidden" name="isdeleteid" value="<?php echo $isDeleteID; ?>">
      <label>Vill du verkliga radera kunden?</label>  
      <p><input type="submit" value="Radera"></p>
    </form>
  </main>
    
    <?php
      // Stänger databasen
      dbDisconnect($connection);
    ?>

    <?php
      require("../footer.php");
    ?>