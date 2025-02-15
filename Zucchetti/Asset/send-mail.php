<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../../vendor/phpmailer/phpmailer/src/Exception.php';
require_once '../../../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configura per utilizzare la funzione mail() di PHP
    $mail->isMail();

    // Mittente e destinatario
    $mail->setFrom('noreply@mail.com', 'No-Reply');
    $mail->addAddress('brunofederico@hobbycolori.it', 'Federico');

    // Contenuto dell'email
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body = 'Questo è un messaggio di test inviato da noreply@mail.com.';

    // Invia l'email
    $mail->send();
    echo "Email inviata con successo!";
} catch (Exception $e) {
    echo "Errore nell'invio dell'email: {$mail->ErrorInfo}";
}
?>