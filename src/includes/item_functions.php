<?php

/*
    Visa alla kunder
*/
function getAllItems($conn, $itemIDName, $table){
    $query = "SELECT * FROM $table ORDER BY $itemIDName ASC";
    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    return $result;
}
/*
    Hämta en kund
*/
function getItemData($conn, $itemIDName,  $itemID, $table) {
    $query = "SELECT * FROM $table
                        WHERE ".$itemIDName."=". $itemID; 
    
    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    $item = mysqli_fetch_assoc($result);

    return $item;
}


/*
    Radera en kund
*/
function deleteItem($conn, $itemIDName,  $itemID, $table) {
    $query = "DELETE FROM $table WHERE ".$itemIDName."=". $itemID;
    $result = mysqli_query($conn, $query) or die("Query failed: $query");
}

/*
    Utility function: tar bort oönskade HTML-tecken.
*/
function escapeInsert($conn, $insert) {
    $insert = htmlspecialchars($insert);
    $insert = mysqli_real_escape_string($conn, $insert);
    return $insert;
}

?>