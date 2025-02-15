<?php 
session_start();
if (!isset($_SESSION['login'])){
    header("location: ZVolta.php");
}

header("Expires: on, 01 Jan 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
/*use League\OAuth2\Client\Provider\Google;*/
use PHPMailer\PHPMailer\Exception;
require_once '../../../vendor/autoload.php';
$mittente = isset($_POST['mittente']) ? ($_POST['mittente']):"";
$testo = isset($_POST['messaggio']) ? ($_POST['messaggio']):"";
$invio = "brunofederico0613@gmail.com";
$obj = "prova";
if($mittente == "dd@hobbycolori.it"){
  $mail = new PHPMailer(true);  
 try {
    /*Impostazioni server*/
    $mail->isMail();
    $mail->CharSet = "UTF-8";
    /*Recipients*/
    $mail->setFrom($mittente, "Federico");
    
    $mail->addAddress($invio, '');  //Indirizzo destinatario
    $mail->addReplyTo($mittente, '');//Indirizzo di risposta
    $mail->AddCustomHeader( "X-Confirm-Reading-To: <$mittente>\r\n" );
    $mail->AddCustomHeader( "Return-Receipt-To: <$mittente>\r\n" );
    $mail->AddCustomHeader( "Disposition-Notification-To: <$mittente>\r\n" );
/*    $mail->Priority = $priority; // Opzioni: null (predefinito), 1 = Alto, 3 = Normale, 5 = basso.
*/    
    /*Content*/
    $mail->isHTML(true);//Abilita invio in HTML
    $mail->Subject = $obj;//Oggetto
 /*   for($i=0; $i<count($_FILES['attachment']['tmp_name']); $i++){  
  $attachment = $_FILES['attachment']['tmp_name'][$i];
  $attachment_type = $_FILES['attachment']['type'][$i];
  $attachment_name = $_FILES['attachment']['name'][$i];
  if (is_uploaded_file($attachment))
  {
    $mail->addAttachment($attachment, $attachment_name); //Allegato
    }}*/
    $mail->Body = "<p>$testo</p>";//Corpo email
    $mail->Body .="<br>Cordiali saluti.<br>";
    $mail->AltBody = $testo; //Testo alternativo

    if($mail->send()){
    $msg= "Il messaggio &egrave; stato inviato con successo";}else{$msg= "Il messaggio non &egrave; stato inviato. Errore: {$mail->ErrorInfo}";}
} catch (Exception $e) {
    echo "Il messaggio non &egrave; stato inviato. Errore: {$mail->ErrorInfo}";
}echo("<div style='word-wrap: break-word'>$msg</div>");   
    
}else if($mittente == "noreply@hobbycolori.it"){
$host = "smtps.aruba.it";
$usrname = "brunofederico@hobbycolori.it";
$passw = "#44z7As84Fb!c@ubj?105tlop*3q";
$att = true;
$secure = PHPMailer::ENCRYPTION_SMTPS;  
$port = 465;

if($secure == true){$secure = PHPMailer::ENCRYPTION_SMTPS; }else{$secure = false;} 
require '../../../vendor/autoload.php';

/*Autenticazione tramite SMTP*/
/*$mail = new PHPMailer(true);*/ //se true vengono sollevate eventuali eccezioni utili per il debugging
try {
    //Impostazioni server
    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";
    $mail->SMTPDebug = SMTP::DEBUG_OFF;// DEBUG_SERVER(ABILITA) Debug mode attivare per visualizzare la sorgente 
    $mail->isSMTP();//Invio tramite SMTP
    $mail->Host = $host;//Server SMTP
    $mail->SMTPAuth = $att;//Abilita autenticazione SMTP
    $mail->Username = $usrname;//SMTP username
    $mail->Password = $passw;//SMTP password
    /*$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;*/
    $mail->SMTPSecure = $secure;///Abilita TLS implicito
    $mail->Port = $port;//Porta SMTP

    /*Recipients*/
    $mail->setFrom($mittente, "Federico");
    
    $mail->addAddress($invio, '');  //Indirizzo destinatario
    $mail->addReplyTo($mittente, '');//Indirizzo di risposta
    $mail->AddCustomHeader( "X-Confirm-Reading-To: <$mittente>\r\n" );
    $mail->AddCustomHeader( "Return-Receipt-To: <$mittente>\r\n" );
    $mail->AddCustomHeader( "Disposition-Notification-To: <$mittente>\r\n" );
/*    $mail->Priority = $priority; // Opzioni: null (predefinito), 1 = Alto, 3 = Normale, 5 = basso.
*/    
    /*Content*/
    $mail->isHTML(true);//Abilita invio in HTML
    $mail->Subject = $obj;//Oggetto
 /*   for($i=0; $i<count($_FILES['attachment']['tmp_name']); $i++){  
  $attachment = $_FILES['attachment']['tmp_name'][$i];
  $attachment_type = $_FILES['attachment']['type'][$i];
  $attachment_name = $_FILES['attachment']['name'][$i];
  if (is_uploaded_file($attachment))
  {
    $mail->addAttachment($attachment, $attachment_name); //Allegato
    }}*/
    $mail->Body = "<p>$testo</p>";//Corpo email
    $mail->Body .="<br>Cordiali saluti.<br>";
    $mail->AltBody = $testo; //Testo alternativo

    if($mail->send()){
  $mail_string = $mail->getSentMIMEMessage();       
 $server = "{imaps.aruba.it:993/imap/ssl}INBOX.Sent";      
 $mbox = imap_open($server,$usrname,$passw);
 if($mbox) imap_append($mbox,$server, $mail_string, "\\Seen");      
    $msg= "Il messaggio &egrave; stato inviato con successo";}else{$msg= "Il messaggio non &egrave; stato inviato. Errore: {$mail->ErrorInfo}";}
} catch (Exception $e) {
    echo "Il messaggio non &egrave; stato inviato. Errore: {$mail->ErrorInfo}";
}echo("<div style='word-wrap: break-word'>$msg</div>");}
?>