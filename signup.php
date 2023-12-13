<?php
include "./connect.php";
include "./utility.php";
session_start();
if(isset($_SESSION["user_id"])){
    header("Location: https://".$_SERVER["SERVER_NAME"]."/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Signup page</title>
</head>
<body>
    <form action='' method='post'>
        <h3>SIGNUP FORM</h3>
        <label for='nome'>Nome</label>
        <input type='text' name='nome' id='nome' required>
        <label for='cognome'>Cognome</label>
        <input type='text' name='cognome' id='cognome' required>
        <label for='email'>Email</label>
        <input type='email' name='email' id='email' required>
        <label for='password'>Password</label>
        <input type='password' name='password' id='password' required>
        <button type='submit'>Invia</button>
    </form> 
    <?php if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];
            $email = $_POST["email"];
            $password_hash = md5($_POST["password"]);
            if (check_if_user_present($conn, $email))
                $messaggio = "Utente già presente";
            else {
                $sql = "INSERT INTO utenti (nome, cognome, email, password_hash) VALUES ('$nome', '$cognome', '$email', '$password_hash')";
                $res = $conn->query($sql);
                $messaggio = "Signup avvenuto con successo";
                if (!$res) 
                    $messaggio = "Signup fallito";
            }
            echo "<p>$messaggio</p>";
        }
    ?>
    <a href='signin.php'>Pagina di login</a>
    <a href='index.php'>Vai alla home</a>
</body>
</html>
