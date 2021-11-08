<?php
require ('item_functions.php');

function getCustomerData($conn, $customerID) {
    return getItemData($conn, 'customerID', $customerID, 'customer');
}
function getAllCustomers($conn){
    return getAllItems($conn, 'customerName','customer');
}
function deleteCustomer($conn, $customerID) {
    return deleteItem($conn, 'customerID', $customerID, 'customer');
}



/*
    Spara en kund
*/
function saveCustomer($conn) {
    $date = date("Y-m-d H:i:s");
    $name = escapeInsert($conn, $_POST['txtName']);
    $address = escapeInsert($conn, $_POST['txtAddress']);
    $phoneNumber = escapeInsert($conn, $_POST['txtPhoneNumber']);
    $personNumber = escapeInsert($conn, $_POST['txtPersonNumber']);
    $email = escapeInsert($conn, $_POST['txtEmail']);
    $password = escapeInsert($conn, $_POST['txtPassword']);

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO customer (
        customerName, customerAddress, customerPhoneNumber, customerPersonNumber, customerEmail, customerPassword, customerDate
    )   VALUES('$name', '$address', '$phoneNumber', '$personNumber', '$email', '$passwordHash', '$date')";

    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    $insID = mysqli_insert_id($conn);
    return $insID;
}

/*
    Uppdatera en kund
*/
function updateCustomer($conn) {
    $name = $_POST['txtName'];
    $address = $_POST['txtAddress'];
    $phoneNumber = $_POST['txtPhoneNumber'];
    $personNumber = $_POST['txtPersonNumber'];
    $email = $_POST['txtEmail'];
    $password = $_POST['txtPassword'];
    $editID = $_POST['updateID'];

    $query = "UPDATE customer
                        SET customerName='$name', customerAddress='$address', customerPhoneNumber='$phoneNumber', customerPersonNumber='$phoneNumber', customerEmail='$email', customerPassword='$password'
                        WHERE customerID = ". $editID;
    
    $result = mysqli_query($conn, $query) or die("Query failed: $query");
}

/* Hämta inlogg */
function getCustomerLogin($conn){
    $query = "SELECT customer.customerName, customer.customerEmail, customer.customerPassword FROM customer";
    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    return $result;
}
?>