<?php
include "./connect.php";
session_start();
if (!isset($_SESSION["user_id"])) {
?>
<a href='signin.php'>Effettua il login</a>
<a href='signup.php'>Registrati se non sei ancora un utente</a>
<?php } else {
    if (!$_SERVER["REQUEST_METHOD"] == "GET") { ?>
<form action='' method='get'>
    <label for='autore'>Autore</label>
    <input type='text' name='autore' id='autore'>
    <label for='genere'>Genere</label>
    <input type='text' name='genere' id='genere'>
    <button type='submit'>Cerca</button>
</form>
<?php
    } else { 
        $autore = explode(" ", $_GET["autore"]);
        $genere = $_GET["genere"];
        $sql = 
            "SELECT isbn, titolo, anno_di_pubblicazione, generi.nome, editori.nome, editori.luogo, autori.nome, autori.cognome
             FROM (((libri JOIN autori ON libri.id_autore=autori.id) JOIN editori ON libri.id_editore=editori.id) JOIN generi ON libri.id_genere=generi.id)";
        if ($autore != ""){
            $autore_nome = $autore[0];
            $autore_cognome = $autore[1];
            $sql = "$sql WHERE autori.nome=$autore_nome AND autori.cognome=$autore_cognome";
        }
        if ($genere != "")
            
    }
}?>