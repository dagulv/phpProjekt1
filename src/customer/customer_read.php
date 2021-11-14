<?php
// Startar upp sessionen
session_start();

/* Visar alla kunder */

if (!isset($_SESSION['isLoggedInEmployee'])) {
    header('Location: ../login.php');
    return;
}

require('../header.php');

// Inkludera filer för databaskoppling och funktioner
require("../includes/conn_mysql.php");
require("../includes/customer_functions.php");

// Skapa databaskoppling
$connection = dbConnect();

// Visar alla kunder
$allCustomers = getAllCustomers($connection);
?>

    <main>
        <h1>Kunder</h1>
        <ul>
            <?php
                //loopa igenom arrayen som innehåller alla kunder i tabellen
                while($item = mysqli_fetch_array($allCustomers)):
            ?>
            <li>
                <?php echo $item['customerName'];?> 
                <a href="customer_update.php?editID=<?php echo $item['customerID'] ?>">Ändra</a>
                <a href="customer_delete.php?deleteID=<?php echo $item['customerID'] ?>">Radera</a>
            </li>
            <?php endwhile; ?>
            <?php if (isset($_SESSION['isLoggedInEmployee'])) {?>
                <p><a href="customer_create.php">Lägg till kund</a></p>
            <?php } ?>
        </ul>
        <a href="../index.php">Gå tillbaka till index</a>
    </main>
        
        <?php
            // Stänger databaskopplingen
            dbDisconnect($connection); 
           ?>
        
        <?php
            require("../footer.php");
            ?>
