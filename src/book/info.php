<?php
session_start();

/* Visar alla kunder */

if (!isset($_SESSION['isLoggedInCustomer']) && !isset($_SESSION['isLoggedInEmployee'])) {
    header('Location: ../login.php');
    return;
}

// Inkludera filer för databaskoppling och funktioner
require("../includes/conn_mysql.php");
require("../includes/book_functions.php");

require("../header.php");

// Skapa databaskoppling
$connection = dbConnect();

if(isset($_GET['infoID']) && $_GET['infoID'] > 0){
    $bookData = getBookwithCategory($connection, $_GET['infoID']);
}
?>

<?php //while($bookData = mysqli_fetch_array($booksData)): ?>
    <h1><?php echo $bookData['bookTitle']; ?></h1>
    <h3><?php echo $bookData['bookAuthor']; ?></h3>
    <h3><?php echo $bookData['categoryName']; ?></h3>
    <p>Publicerades <?php echo $bookData['bookPublished']; ?></p>
    <p>Pris <?php echo $bookData['bookPrice']; ?>:-</p>
    <p id="bookDescription"><?php echo $bookData['bookDescription']; ?></p>
    <p>Isbn: <?php echo $bookData['bookIsbn']; ?></p>
    <i><?php echo $bookData['bookQuantity'];?> kvar</i>
<?php //endwhile; ?>

<a href="../index.php">Gå till index</a>


        <?php
            // Stänger databaskopplingen
            dbDisconnect($connection); 
        ?>

            <?php 
                require("../footer.php");
            ?>