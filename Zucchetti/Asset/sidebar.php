<div id="hidden" style="background-color: transparent" onClick="toggleMenuClose()"></div>
        <div class="sidebar" id="sidebar">
        <button class="close-btn" onclick="toggleMenuClose()">✖</button>
        <h3><?php echo("Benvenuto ".$_SESSION['cognome']." ".$_SESSION['nome']);?></h3>
        <h4><?php echo("Ruolo: ".$_SESSION['ruolo'])?></h4>
        <ul>
            <li><a href="index.html">🏠 Home</a></li>
            <li><a href="servizi.html">💼 Servizi</a></li>
            <li><a href="Asset.php">📅 Prenotazioni</a></li>
            <li><a href="Contattaci.php">📞 Contatti</a></li>
            <br><br>
            <li><a href="../Asset/Logout.php?pagina=<?php echo("http://win/hobbycolori.it/Scuola/Zucchetti/Asset/ZVolta.php") ?>" data-role="button" data-inline="true" target="_self">Logout</a></li>
        </ul>
    </div>