<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LDNT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="header">
            <div class="headContent">
                <h1>LDNT Bokhandel</h1>
            </div>
            <div class="headContent headLink">
                <?php if(isset($_SESSION['isLoggedInEmployee'])): ?>
                    <a href="employees/employee_create.php">Lägg till bok</a>
                    <a href="employees/employee_delete.php">Ta bort bok</a>
                    <a href="employees/employee_update.php">Redigera bok</a>
                <?php endif; ?>

                <?php if(isset($_SESSION['isLoggedInCustomer'])): ?>        
                    <a href="customer/customer_read.php">Boklista</a>
                <?php endif; ?>   

                
                <p class="headLogin"><?php if(isset($_SESSION['isLoggedInCustomer'])): echo '<a href="logout.php">Logga ut</a>'; else: echo '<a href="login.php">Logga in</a>'; endif;?></p>
                
            </div>
            
        </div>
        
    </header>
    <?php if(isset($_SESSION['isLoggedInCustomer']) || isset($_SESSION['isLoggedInEmployee'])): ?>
    <p id="loginStatus"><?php echo $_SESSION['username']; echo '<h3>';echo $_SESSION['role'];echo '</h3>';?>
    <?php if(isset($_SESSION['isLoggedInCustomer'])): echo 'inloggad <a href="logout.php"><br>Logga ut</a>'; else: echo 'utloggad <a href="login.php"><br>Logga in</a>'; endif;?></p>
    <?php endif; ?>
 
    <div class="indexBox">
     <p>Meny</p>
     <a href="book/book_read.php">Boklista</a><br>
     <a href="customer/customer_create.php">Skapa kund</a><br>
     <a href="employees/employee_create.php">Skapa Anställd</a>
 </div>

<div class="footer">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#faebd7" fill-opacity="1" d="M0,224L26.7,218.7C53.3,213,107,203,160,181.3C213.3,160,267,128,320,133.3C373.3,139,427,181,480,197.3C533.3,213,587,203,640,186.7C693.3,171,747,149,800,149.3C853.3,149,907,171,960,192C1013.3,213,1067,235,1120,234.7C1173.3,235,1227,213,1280,213.3C1333.3,213,1387,235,1413,245.3L1440,256L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path></svg>
    <div class="footer-content">
        <p>© LDNT</p>
    </div>
</div>

</body>
</html>



