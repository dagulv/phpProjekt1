<?php
session_start();

require("header.php");
?>

<?php
    if(isset($_GET['invalid_login'])) {
        echo "Your username and password combination is invalid";
    }
?>

<main>
    <form action="checklogin.php" method="post">
        <h1>Logga in</h1>
        <div><input type="radio" name="radioType" id="radioEmployee" value="Anställd"><label for="radioEmployee">Anställd</label></div>
        <div><input type="radio" name="radioType" id="radioCustomer" value="Kund"><label for="radioCustomer">Kund</label></div>
        <br>
		<label>Email</label>
        <p><input type="email" name="txtUser"></p>
        
        <label>Lösenord</label>
        <p><input type="password" name="txtPassword"></p>
        
        <p><input type="submit" name="submit" value="logga in"></p>
    </form>
    
    <p>Ny användare?</p>
    <a href="/customer/customer_create.php">Skapa login</a>
</main>

    <?php
        require("footer.php");
    ?>
