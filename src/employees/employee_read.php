<?php
session_start();

// Inkludera filer för databaskoppling och funktioner
require("../includes/conn_mysql.php");
require("../includes/employee_functions.php");

// Skapa databaskoppling
$connection = dbConnect();

if (!isset($_SESSION['isLoggedInEmployee'])) {
    header('Location: ../login.php');
    return;
}
require("../header.php");

// Visar alla anställda
$allEmployees = getAllEmployees($connection);

?>

<main>
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
</main>
            

        <?php
            // Stänger databaskopplingen
            dbDisconnect($connection); 
            ?>

            <?php
                require("../footer.php");
            ?>