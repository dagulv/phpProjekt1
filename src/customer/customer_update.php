<?php 
// Startar upp sessionen
session_start();

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
if(isset($_GET['editID']) && $_GET['editID'] > 0){
    $customerData = getCustomerData($connection, $_GET['editID']);
}

// Skall kunden uppdateras?
if(isset($_POST['updateID']) && $_POST['updateID'] > 0){
    updateCustomer($connection);
    
    header("Location: customer_read.php");
}

require("../header.php");
?>

        
    <main>
        <h1>Uppdatera kund</h1>
        
        <form action="customer_update.php" method="post">
            <input type="hidden" name="updateID" value="<?php echo $customerData['customerID']; ?>">
            
            <label>Namn:</label>
            <p><input type="text" name="txtName" value="<?php echo $customerData['customerName']; ?>"></p>
            
            <label>Address:</label>
            <p><input type="text" name="txtAddress" value="<?php echo $customerData['customerAddress']; ?>"></p>
            
            <label>Telefonnummer:</label>
            <p><input type="text" name="txtPhoneNumber" value="<?php echo $customerData['customerPhoneNumber']; ?>"></p>
            
            <label>Personnummer:</label>
            <p><input type="text" name="txtPersonNumber" value="<?php echo $customerData['customerPersonNumber']; ?>"></p>
            
            <label>Email:</label>
            <p><input type="text" name="txtEmail" value="<?php echo $customerData['customerEmail']; ?>"></p>
            
            <label>Lösenord:</label>
            <p><input type="text" name="txtPassword" value="<?php echo $customerData['customerPassword']; ?>"></p>
            
            <p><input type="submit" value="Uppdatera"></p>
        </form>
    </main>

        <?php
            // Stänger databasen
            dbDisconnect($connection);
        ?>

        
        <?php
            require("../footer.php");
        ?>
