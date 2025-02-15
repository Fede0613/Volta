<?php 
session_start();
if (!isset($_SESSION['login'])){
    header("location: ZVolta.php");
}
//echo($_SESSION['cognome']);

    $mittente = $_SESSION['saluto']."@mail.com";
	$nome = $_SESSION['nome'];
	$cognome = $_SESSION['cognome'];
	$destinatario = "brunofederico0613@gmail.com";
	$oggetto = "segnalazione";
	$messaggio = $_POST['messaggio'];
	  
	  if(isset($_POST['invia'])){
		  $mia_email = "$mittente";
		  $email_destinatario = "$destinatario";
		  $oggetto = "$oggetto";
		  $message = $messaggio;
		  $header = '';
		  $header = "MINE-Version: 1.0\r\n";
		  $header = "Content-type: text/html; charset=utf-8\r\n";
		  $header .= "From: $nome $cognome <$mia_email>";
		  if(@mail($email_destinatario,$oggetto, $message, $header)){
			  echo "<div style='width: 500px; margin: 0 auto'><strong>E-mail inviata con successo!</strong></div>";
		  }
		  else {echo "<div style='width: 500px; margin: 0 auto'><strong>Errore! e-mail non inviata</strong></div>";}
	  }

?>