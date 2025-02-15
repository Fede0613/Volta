<?php
session_start();
// Connessione al database
include("connessioneDB.php");

// Recupero dei dati dal modulo
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$role = $_POST['role'];
$user = $_POST['username'];
$pass = $_POST['password'];

//controlli sicurezza
$nome = str_replace(array("'","admin","ADMIN"),array(" "," "," "),$nome);
$cognome = str_replace(array("'","admin","ADMIN"),array(" "," "," "),$cognome);
$user = str_replace(array("'","admin","ADMIN"),array(" "," "," "),$user);
$pass = str_replace(array("'","admin","ADMIN"),array(" "," "," "),$pass);


// Verifica delle credenziali
$sql = mysqli_query($conn,"INSERT INTO users (username, password, name, surname, role) values ('$user', '$pass', '$nome', '$cognome', '$role')");

    /*echo($row['name'].$row['surname']);*/
  header("location: http://win/hobbycolori.it/Scuola/Zucchetti/Asset/ZVolta.php");  
 

mysqli_close($conn);

?>
