<?php
require ('item_functions.php');

function getEmployeeData($conn, $employeeID) {
    return getItemData($conn, 'employeeID', $employeeID, 'employee');
}
function getAllEmployees($conn){
    return getAllItems($conn, 'employeeName', 'employee');
}
function deleteEmployee($conn, $employeeID) {
    return deleteItem($conn, 'employeeID', $employeeID, 'employee');
}



/*
    Spara en anställd
*/
function saveEmployee($conn) {
    $date = date("Y-m-d H:i:s");
    $name = escapeInsert($conn, $_POST['txtName']);
    $password = escapeInsert($conn, $_POST['txtPassword']);
    $role = escapeInsert($conn, $_POST['txtRole']);
    $email = escapeInsert($conn, $_POST['txtEmail']);

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO employee (
        employeeName, employeePassword, roleID, employeeEmail
    )   VALUES('$name', '$passwordHash', '$role', '$email')";

    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    $insID = mysqli_insert_id($conn);
    return $insID;
}

/*
    Uppdatera en anställd
*/
function updateEmployee($conn) {
    $name = escapeInsert($conn, $_POST['txtName']);
    $password = escapeInsert($conn, $_POST['txtPassword']);
    $role = escapeInsert($conn, $_POST['txtRole']);
    $editID = $_POST['updateID'];

    $query = "UPDATE employee
                        SET employeeName='$name', employeePassword='$password', roleID='$role'
                        WHERE employeeID = ". $editID;
    
    $result = mysqli_query($conn, $query) or die("Query failed: $query");
}


?>