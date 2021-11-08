<?php
/* 
    Visar alla kunder
*/
if (!isset($_SESSION['isLoggedInEmployees'])) {
    header('Location: ../login.php');
    return;
}

// Inkludera filer för databaskoppling och funktioner
require("../includes/conn_mysql.php");
require("../includes/customer_functions.php");

// Skapa databaskoppling
$connection = dbConnect();

// Visar alla kunder
$allCustomers = getAllCustomers($connection);

?>
<html lang="sv">
    <head>
        <meta charset="utf-8"/>
        <title>Kunder - Visa alla</title>
    </head>

    <body>
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
        <?php
            // Stänger databaskopplingen
            dbDisconnect($connection); 
        ?>
        <a href="../index.php">Gå tillbaka till index</a>
    </body>
</html>