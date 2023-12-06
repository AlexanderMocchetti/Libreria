<?php
include './connect.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Signup page</title>
</head>
<body>
    <?php
     if($_REQUEST["REQUEST_METHOD"] == "POST")
    ?>
    <form action='' method='post'>
        <h3>SIGNUP FORM</h3>
        <label for='nome'>Nome</label>
        <input type='text' name='nome' id='nome'>
        <label for='cognome'>Cognome</label>
        <input type='text' name='cognome' id='cognome'>
        <label for='email'>Email</label>
        <input type='email' name='email' id='email'>
        <label for='password'>Password</label>
        <input type='password' name='password' id='password'>
        <button type='submit'>Invia</button>
    </form> 
</body>
</html>
