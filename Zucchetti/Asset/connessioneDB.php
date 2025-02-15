<?php 
$servername = "localhost";
$username = "root";
$password = "f3d&@8A5e!13q";
$dbname = "asset_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>