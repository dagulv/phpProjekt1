<?php 

// Inkludera filer för databaskoppling och funktioner
require("../includes/conn_mysql.php");
require("../includes/book_functions.php");

// Skapa databaskoppling
$connection = dbConnect();

// Ska kunden redigeras?
if(isset($_GET['editID']) && $_GET['editID'] > 0){
    $bookData = getBookData($connection, $_GET['editID']);
}

// Skall kunden uppdateras?
if(isset($_POST['updateID']) && $_POST['updateID'] > 0){
    updateBook($connection);

    header("Location: book_read.php");
}

?>

<!DOCTYPE HTML>
<html lang="sv">
    <head>
        <meta charset="utf-8" />
        <title>Kunder - Visa alla</title>
    </head>

    <body>
        <h1>Uppdatera bok - <?php echo $bookData['bookTitle']; ?></h1>

        <form action="book_update.php" method="post">
            <input type="hidden" name="updateID" value="<?php echo $bookData['bookID']; ?>">
            
            <label>Titel:</label>
            <p><input type="text" name="txtTitle" value="<?php echo $bookData['bookTitle']; ?>"></p>

            <label>Författare:</label>
            <p><input type="text" name="txtAuthor" value="<?php echo $bookData['bookAuthor']; ?>"></p>
            
            <label>Kategori:</label>
            <p><input type="text" name="txtCategoryID" value="<?php echo $bookData['categoryID']; ?>"></p>

            <label>Publicerad:</label>
            <p><input type="text" name="txtPublished" value="<?php echo $bookData['bookPublished']; ?>"></p>

            <label>Pris:</label>
            <p><input type="text" name="txtPrice" value="<?php echo $bookData['bookPrice']; ?>kr"></p>

            <label>Beskrivning:</label>
            <p><textarea name="txtDescription"><?php echo $bookData['bookDescription']; ?></textarea></p>

            <label>Isbn:</label>
            <p><input type="text" name="txtIsbn" value="<?php echo $bookData['bookIsbn']; ?>"></p>

            <label>Antal:</label>
            <p><input type="text" name="txtQuantity" value="<?php echo $bookData['bookQuantity']; ?>"></p>

            <p><input type="submit" value="Uppdatera"></p>
        </form>
        <?php
        // Stänger databasen
        dbDisconnect($connection);
        ?>
    </body>
</html>

