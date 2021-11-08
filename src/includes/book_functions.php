<?php
require ('item_functions.php');

function getBookData($conn, $bookID) {
    return getItemData($conn, 'bookID', $bookID, 'book');
}
function getAllBooks($conn){
    return getAllItems($conn, 'bookTitle','book');
}
function deleteBook($conn, $bookID) {
    return deleteItem($conn, 'bookID', $bookID, 'book');
}


/*
    Spara en kund
*/
function saveBook($conn) {
    $title = escapeInsert($conn, $_POST['txtTitle']);
    $author = escapeInsert($conn, $_POST['txtAuthor']);
    $categoryID = escapeInsert($conn, $_POST['txtCategoryID']);
    $published = escapeInsert($conn, $_POST['txtPublished']);
    $price = escapeInsert($conn, (int)$_POST['txtPrice']);
    $description = escapeInsert($conn, $_POST['txtDescription']);
    $isbn = escapeInsert($conn, $_POST['txtIsbn']);
    $quantity = escapeInsert($conn, (int)$_POST['txtQuantity']);
    $query = "INSERT INTO book (
        bookTitle, bookAuthor, CategoryID, bookPublished, bookPrice, bookDescription, bookIsbn, bookQuantity
    )   VALUES('$title', '$author', '$categoryID', '$published', '$price', '$description', '$isbn', '$quantity')";

    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    $insID = mysqli_insert_id($conn);
    return $insID;
}

/*
    Uppdatera en kund
*/
function updateBook($conn) {
    $title = $_POST['txtTitle'];
    $author = $_POST['txtAuthor'];
    $categoryID = $_POST['txtCategoryID'];
    $published = $_POST['txtPublished'];
    $price = (int)$_POST['txtPrice'];
    $description = $_POST['txtDescription'];
    $isbn = $_POST['txtIsbn'];
    $quantity = (int)$_POST['txtQuantity'];
    $editID = $_POST['updateID'];

    $query = "UPDATE book
                        SET bookTitle='$title', bookAuthor='$author', CategoryID='$categoryID', bookPublished='$published', bookPrice='$price', bookDescription='$description', bookIsbn='$isbn', bookQuantity='$quantity'
                        WHERE bookID = ". $editID;
    $result = mysqli_query($conn, $query) or die("Query failed: $query");
}
?>