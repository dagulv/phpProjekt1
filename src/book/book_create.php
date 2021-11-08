<?php
/*
  Raderar book
*/

// Inkludera filer för databaskoppling och funktioner
require("../includes/conn_mysql.php");
require("../includes/book_functions.php");

// Skapa databaskoppling
$connection = dbConnect();

// Ska kunden redigeras?
if(isset($_GET['deleteID']) && $_GET['deleteID'] > 0){
  $isDeleteID = $_GET['deleteID'];
}

// Skall kunden uppdateras?
if(isset($_POST['isnew']) && $_POST['isnew'] == 1){
  $savebook = saveBook($connection);

  header("Location: book_read.php");
}
?>
<!DOCTYPE HTML>
<html lang="sv">
    <head>
        <meta charset="utf-8" />
        <title>Bok - Lägg till</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <h1>Ny bok</h1>
        
      <div class="bookCreate">
        <form method="post">
            <input type="hidden" name="isnew" id="isnew" value="1">
            
            <label>Titel:</label>
            <p><input type="text" name="txtTitle" placeholder="Ex. Bröderna Lejonhjärta"></p>

            <label>Författare:</label>
            <p><input type="text" name="txtAuthor" placeholder="Ex. Astrid Lindgren"></p>
            
            <label>Kategori:</label>
            <p><input type="text" name="txtCategoryID" placeholder="Ex. 1"></p>

            <label>Publicerad:</label>
            <p><input type="text" name="txtPublished" placeholder="Ex. år-månad-dag"></p>

            <label>Pris:</label>
            <p><input type="text" name="txtPrice" placeholder="Ex. 299kr"></p>

            <label>Beskrivning:</label>
            <p><textarea name="txtDescription" placeholder="Ex. Det var en gång..."></textarea></p>

            <label>Isbn:</label>
            <p><input type="text" name="txtIsbn" placeholder="Ex. 9789129688313"></p>

            <label>Antal:</label>
            <p><input type="text" name="txtQuantity" placeholder="Ex. 10"></p>

            <p><input type="submit" placeholder="Lägg till"></p>
        </form>
      </div>

        <div class="categoryBox">
          <h1>Kategorier</h1>
          <p>
            1	Barnböcker<br>
            2	Data och IT<br>
            3	Deckare<br>
            4	Djur och Natur<br>
            5	Familj<br>
            6	Filosofi och Religion<br>
            7	Hem och Trädgård<br>
            8	Historia<br>
            9	Hobby och Hantverk<br>
            10 Humor och Serier<br>
            11 Juridik<br>
            12 Konst och Kultur<br>
            13 Kropp och Själ<br>
            14 Mat och Dryck<br>
            15 Memoarer och Biografier<br>
            16 Psykologi och Pedagogik<br>
            17 Resor<br>
            18 Samhälle och Debatt<br>
            19 Skönlitteratur<br>
            20 Sport och Fritid<br>
            21 Språk och Ordböcker<br>
            22 Ungdom<br>
            23 Vetenskap och Teknik
            </p>
        </div>

        <a href="book_read.php">Avbryt</a>
        <?php
        // Stänger databasen
        dbDisconnect($connection);
        ?>
    </body>
</html>