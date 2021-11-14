<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LDNT Bokhandel</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>

<header>
    <div class="header">
        <div class="headContent">
            <h1><a href="../index.php">LDNT Bokhandel</a></h1>
        </div>
        <div class="headContent headLink">
            <?php if(isset($_SESSION['isLoggedInCustomer'])): ?>
                <a class="button" href="/user.php?user=<?php echo $_SESSION['id']; ?>">Min sida</a>
                <a href="../index.php">Index</a>
                <a href="/book/book_read.php">Boklista</a>
            <?php endif; ?>
            
            <?php if(isset($_SESSION['isLoggedInEmployee'])): ?>
                <a href="../index.php">Index</a>
                <a href="/book/book_create.php">Lägg till bok</a>
                <a href="/book/book_read.php">Redigera bok</a>
                <a href="/employees/employee_create.php">Skapa anställd</a>
                <a href="/employees/employee_read.php">Redigera anställd</a>
                <a href="/customer/customer_read.php">Redigera kund</a>
            <?php endif; ?>
                            

            <?php if (isset($_SESSION['isLoggedInCustomer']) || isset($_SESSION['isLoggedInEmployee'])): echo '<a class="button" href="/logout.php">Logga ut</a>'; else: echo '<a class="button" href="/login.php">Logga in</a>'; endif;?>
        </div>
    </div>
</header>

