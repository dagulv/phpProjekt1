<?php

if (!isset($_SESSION['isLoggedInEmployee'])) {
    header('Location: ../login.php');
    return;
}
// Inkludera filer för databaskoppling och funktioner
require("../includes/conn_mysql.php");
require("../includes/employee_functions.php");

// Skapa databaskoppling
$connection = dbConnect();

// Visar alla anställda
$allEmployees = getAllEmployees($connection);

?>
<html lang="sv">
    <head>
        <meta charset="utf-8"/>
        <title>Anställda - Visa alla</title>
    </head>

    <body>
        <h1>Anställda</h1>

        <ul>
            <?php
                //loopa igenom arrayen som innehåller alla anställda i tabellen
                while($item = mysqli_fetch_array($allEmployees)):
            ?>
                <li>
                    <?php echo $item['employeeName'];?> 
                    <a href="employee_update.php?editID=<?php echo $item['employeeID'] ?>">Ändra</a>
                    <a href="employee_delete.php?deleteID=<?php echo $item['employeeID'] ?>">Radera</a>
                </li>
            <?php endwhile; ?>
            <p><a href="employee_create.php">Lägg till anställd</a></p>
        </ul>
        <?php
            // Stänger databaskopplingen
            dbDisconnect($connection); 
        ?>
    </body>
</html>