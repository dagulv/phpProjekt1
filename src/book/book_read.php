<?php
/* 
    Visar alla kunder
*/

// Inkludera filer för databaskoppling och funktioner
require("../includes/conn_mysql.php");
require("../includes/book_functions.php");

// Skapa databaskoppling
$connection = dbConnect();

// Visar alla kunder
$allbooks = getAllbooks($connection);
?>
<html lang="sv">
    <head>
        <meta charset="utf-8"/>
        <title>Böcker - Visa alla</title>
    </head>

    <body>
        <h1>Böcker</h1>

        <table>
            <?php
                //loopa igenom arrayen som innehåller alla kunder i tabellen
                while($item = mysqli_fetch_array($allbooks)):
            ?>
                <tr>
                    <th><?php echo $item['bookTitle'];?></th>
                    <th><a href="book_update.php?editID=<?php echo $item['bookID'] ?>">Ändra</a></th>
                    <th><a href="book_delete.php?deleteID=<?php echo $item['bookID'] ?>">Radera</a></th>
                </tr>
            <?php endwhile; ?>
            <p><a href="book_create.php">Lägg till bok</a></p>
                </table>
        <?php
            // Stänger databaskopplingen
            dbDisconnect($connection); 
        ?>
    </body>
</html>