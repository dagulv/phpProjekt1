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
// Skall den anställde redigeras?
if(isset($_GET['editID']) && $_GET['editID'] > 0){
    $employeeData = getEmployeeData($connection, $_GET['editID']);
}

// Skall den anställde uppdateras?
if(isset($_POST['updateID']) && $_POST['updateID'] > 0){
    updateEmployee($connection);

    header("Location: employee_read.php");
}

?>


<main>
    <h1>Uppdatera anställd</h1>
    <form action="employee_update.php" method="post">
        <input type="hidden" name="updateID" value="<?php echo $employeeData['employeeID']; ?>">
            
        <label>Namn:</label>
        <p><input type="text" name="txtName" value="<?php echo $employeeData['employeeName']; ?>"></p>
            
        <label>Lösenord:</label>
        <p><input type="text" name="txtPassword" value="<?php echo $employeeData['employeePassword']; ?>"></p>
            
        <label>Roll:</label>
        <p><input type="text" name="txtRole" value="<?php echo $employeeData['roleID']; ?>"></p>
            
        <p><input type="submit" value="Uppdatera"></p>
    </form>
</main>
        
    <?php
        // Stänger databasen
        dbDisconnect($connection);
    ?>

    <?php
        require("../footer.php");
    ?>


