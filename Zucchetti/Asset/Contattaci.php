<?php
session_start();
if (!isset($_SESSION['login'])){
    header("location: ZVolta.php");
}
  


/*echo($_SESSION['login']);*/

header("Expires: on, 01 Jan 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


/*data footer*/
$anno = date("Y");
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contattaci - ZVolta</title>
    <link rel="icon" href="Z-Volta_Logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="stili/Contatti.css">
    <link rel="stylesheet" href="stili/sidebar.css">
    <link rel="stylesheet" href="stili/scrollbar.css">
    <script src="js/sidebar.js"></script>
</head>

<body>
    <div align="center">
        <header>
            <table style="width: 100%">
                <tr>
                    <td class="td-header" style="width: 33.3%;">
                        <button class="menu-btn" onclick="toggleMenuOpen()">☰</button>
                    </td>
                    <td class="td-header" style="width: 33.3%;">
                        <h1>Prenotazione Asset</h1>
                    </td>
                    <td class="td-header" style="width: 33.3%;">
                        
                    </td>
                </tr>
            </table>
    </header>
        
        <!--Menu laterale-->
        <?php include("sidebar.php"); ?>
        
        
        <!--<img src="immagini/planimetria.jpg" height="50%" width="55%">-->
        
        <section>
        <form action="invio-email.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="mittente" value="noreply@hobbycolori.it">
            <textarea class="textmail" name="messaggio" placeholder="Inserisci qui il testo"></textarea><br>
            <input type="submit" id="send-button" name="invia" value="invia">
        </form>
        <p><label style="font-size: 1.1em">Per ulteriori informazioni</label><br>
            <b>Telefono:</b> <em>123-456-789</em></p></section>
        

        </div>
    
    <footer>
        <p>&copy; <?php echo($anno) ?> Z-Volta. Tutti i diritti riservati.</p>
    </footer>
        
</body>
</html>