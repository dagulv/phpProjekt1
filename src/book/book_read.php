<?php
session_start();

if (!isset($_SESSION['isLoggedInCustomer']) && !isset($_SESSION['isLoggedInEmployee'])) {
    header('Location: ../login.php');
    return;
}

require("../header.php");

/* Visar alla kunder */

//Inkludera filer för databaskoppling och funktioner
require("../includes/conn_mysql.php");
require("../includes/book_functions.php");

//Skapa databaskoppling
$connection = dbConnect();

// Visar alla kunder
$allbooks = getAllbooks($connection);
//var_dump($_SESSION);

?>

<main>
    <h1>Böcker</h1>
        <table>
            <?php
                //loopa igenom arrayen som innehåller alla kunder i tabellen
                while($item = mysqli_fetch_array($allbooks)):
                ?>
                    <tr>
                    <th><a href="info.php?infoID=<?php echo $item['bookID']; ?>"><?php echo $item['bookTitle'];?></a></th>
                <?php if (isset($_SESSION['isLoggedInEmployee'])) {?>
                    <th><a href="book_update.php?editID=<?php echo $item['bookID']; ?>">Ändra</a></th>
                    <th><a href="book_delete.php?deleteID=<?php echo $item['bookID']; ?>">Radera</a></th>
                <?php }
                    elseif (isset($_SESSION['isLoggedInCustomer'])) { ?>
                    <th><a href="book_read.php?bookID=<?php echo $item['bookID']; ?>">Låna</a></th>
                <?php } ?>
                    <th><i style="padding-left: 1rem; font-size:0.8rem;"><?php echo counterBook($item['bookID'], $connection); ?> exemplar kvar!</i></th>
                    </tr>
                
            <?php endwhile; 
                if(isset($_GET['bookID'])) {
                    borrowBook($_GET['bookID'], $connection);
                    $book = getBookData($connection, $_GET['bookID']);
                    //var_dump($_SESSION);
                    //var_dump($_SESSION['borrowArray']);
                    $temp = array($book['bookTitle'] => 1);
                    //var_dump($temp);
                    if (!in_array($book['bookTitle'], array_keys($_SESSION['borrowArray']))) {
                        $_SESSION['borrowArray'] = array_replace($_SESSION['borrowArray'], $temp);
                    }
                    else {
                        $_SESSION['borrowArray'][$book['bookTitle']] += 1;
                    }
                }
            ?>
            <?php if (isset($_SESSION['isLoggedInEmployee'])) {?>
                <p><a href="book_create.php">Lägg till bok</a></p>
            <?php } ?>
        </table>
        <a href="../index.php">Gå till index</a>
</main>
            
        <?php
            // Stänger databaskopplingen
            dbDisconnect($connection); 
        ?>

        <?php 
            require("../footer.php");
        ?>