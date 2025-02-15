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
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Prenotazioni - ZVolta</title>
    <link rel="icon" href="Z-Volta_Logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="stili/Prenotazione-Asset.css">
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
        <form action="file.php" method="post">
        <table style="width: 100%; height: 100%; vertical-align: middle">
            <tr>
                <td align="center" class="td-asset">
                    <div class="box-asset">
                        <h2>Prenota</h2>
                        <input type="number" id="tentacles" name="tentacles" min="1" max="100" placeholder="A" style="height: 10%; font-size: 100%">
                        <p style="width: 95%; margin-top: 30%"><b>Descrizione:</b><br> scrivania - cassettiera - armadietto</p>
                    </div>
                </td>
                 <td align="center" class="td-asset">
                     <div class="box-asset">
                        <h2>Prenota</h2>
                        <input type="number" id="tentacles" name="tentacles" min="1" max="100" placeholder="A2" style="height: 10%; font-size: 100%">
                        <p style="width: 95%; margin-top: 30%"><b>Descrizione:</b><br> scrivania con monitor esterno - cassettiera - armadietto</p>
                     </div>
                </td>
                <td align="center" class="td-asset">
                    <div class="box-asset">
                        <h2>Prenota</h2>
                        <input type="number" id="tentacles" name="tentacles" min="1" max="100" placeholder="B" style="height: 10%; font-size: 100%">
                        <p style="width: 95%; margin-top: 30%"><b>Descrizione:</b><br> sala riunioni</p>
                    </div>    
                </td>
                <td align="center" class="td-asset">
                    <div class="box-asset">
                        <h2>Prenota</h2>
                        <input type="number" id="tentacles" name="tentacles" min="1" max="100" placeholder="C" style="height: 10%; font-size: 100%">
                        <p style="width: 95%; margin-top: 30%"><b>Descrizione:</b><br> posto auto</p>
                    </div>
                </td>
            </tr>
            
        </table>
            <br>
            <input align="center" type="submit" value="invia" id="send-button">
        </form>
        
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
        
    </div>
    <footer>
        <p>&copy; <?php echo($anno) ?> Z-Volta. Tutti i diritti riservati.</p>
    </footer>
        
</body>
</html>