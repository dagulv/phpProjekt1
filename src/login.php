<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bokhandel</title>
</head>
<body>
    <?php
    if(isset($_GET['invalid_login'])) {
        echo "Your username and password combination is invalid";
    }
    ?>
    <form action="checklogin.php" method="post">
        <h1>Logga in</h1>
		<label>Email</label>
        <p><input type="email" name="txtUser"></p>

        <label>Lösenord</label>
        <p><input type="password" name="txtPassword"></p>

        <p><input type="submit" name="submit" value="logga in"></p>

    </form>

    <p>Ny användare?</p>
    <a href="customer/customer_create.php">Skapa login</a>
</body>
</html>