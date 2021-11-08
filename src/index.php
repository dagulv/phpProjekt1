<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bokhandel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 id="loginStatus">Du är <?php if($_SESSION['isLoggedIn']): echo 'inloggad <a href="logout.php"><br>Logga ut</a>'; else: echo 'utloggad <a href="login.php"><br>Logga in</a>'; endif;?></h1>
 <div class="indexBox">
     <p>Meny</p>
     <a href="book/book_read.php">Boklista</a><br>
     <a href="customer/customer_create.php">Skapa kund</a><br>
     <a href="employees/employee_create.php">Skapa Anställd</a>
 </div>
    

</body>
</html>