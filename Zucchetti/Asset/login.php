<?php
session_start();
/*if (isset($_SESSION['password'])){
    
} */
// Connessione al database
include("connessioneDB.php");

// Recupero dei dati dal modulo
$user = $_POST['username'];
$pass = $_POST['password'];
$user = str_replace(array("'","admin","ADMIN"),array(" "," "," "),$user);
$pass = str_replace(array("'","admin","ADMIN"),array(" "," "," "),$pass);




// Verifica delle credenziali
$sql = mysqli_query($conn,"SELECT * FROM users WHERE username = '$user' and password = '$pass'");
if($sql == mysqli_query($conn,"SELECT * FROM users WHERE username = '$user' and password != '$pass'")){
    header("location: ZVolta.php?error=1");
}
if(!$sql){die("Errore connessione");}
mysqli_error($conn);
$numero = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql)){
if($numero > 0){
    $_SESSION['login'] = $_POST['password'].$_POST['username'];
    $_SESSION['saluto'] = $_POST['username'];
    //sessione nome
    $name = mysqli_query($conn,"SELECT name FROM users WHERE username = '$user'");
while ($row = mysqli_fetch_assoc($name)) {
    $_SESSION['nome'] = $row['name'];}
    //sessione cognome
    $cognome = mysqli_query($conn,"SELECT surname FROM users WHERE username = '$user'");
while ($row = mysqli_fetch_assoc($cognome)) {
    $_SESSION['cognome'] = $row['surname'];}
    //sessione ruolo
    $ruolo = mysqli_query($conn,"SELECT role FROM users WHERE username = '$user'");
while ($row = mysqli_fetch_assoc($ruolo)) {
    $_SESSION['ruolo'] = $row['role'];}
    
    /*echo($row['name'].$row['surname']);*/
  header("location: http://win/hobbycolori.it/Scuola/Zucchetti/Asset/Asset.php");  
 }}

mysqli_close($conn);

?>
