<?php
    /*data footer*/
    $anno = date("Y");
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ZVolta</title>
    <link rel="icon" href="Z-Volta_Logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="stili/styles.css">
    <link rel="stylesheet" href="stili/scrollbar.css">
</head>
<body>
    <header>
        <h1>Gestione Asset Aziendale</h1>
    </header>

    
    <main>
        
        <section id="login-section">
            <h2>Login</h2>
            <form id="login-form" action="login.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" pattern="[^']+" title="Il campo non può contenere caratteri speciali come: (')" placeholder="Inserisci qui il tuo nome utente" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" pattern="[^']+" placeholder="Inserisci qui la tua password" minlength="8" autocomplete="off" required>
                <button type="button" class="toggle-password" onclick="togglePassword()">
                  <img id="toggle-icon" src="immagini/open-eye.png" alt="Mostra Password" title="Mostra Password">
                </button>
                <script>
                    const input = document.getElementById("password");

                    // Disabilita copia, taglio e selezione
                    input.addEventListener("copy", (e) => e.preventDefault()); //disabilita copia
                    input.addEventListener("cut", (e) => e.preventDefault()); //disabilita taglia
                    input.addEventListener("contextmenu", (e) => e.preventDefault()); //disabilita menu
                    /*input.addEventListener("selectstart", (e) => e.preventDefault());*/ //disabilita seleziona tutto
                    
                    
                    function togglePassword() {
                    const passwordInput = document.getElementById("password");
                    const toggleIcon = document.getElementById("toggle-icon");

                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        toggleIcon.src = "immagini/close-eye.png"; // Icona occhio chiuso
                    } else {
                        passwordInput.type = "password";
                        toggleIcon.src = "immagini/open-eye.png"; // Icona occhio aperto
                    }
                    }
                </script>
                <div align="right" id="popup">Password o nome utente errati! Riprova.</div>

                <label for="captcha">Captcha:</label>
                <div id="captcha-container"></div>
                <input type="text" id="captcha-input" name="captcha" placeholder="Inserisci il captcha" required>

                <button type="submit">Accedi</button>
                <p>Non hai ancora un account? <a href="Registrazione.php">Creane uno</a></p>
            </form>
            
            <?php 
                //errore password errata
                if (isset($_GET['error']) && $_GET['error'] == '1'){ ?>
                
                <script> 
                    const popup = document.getElementById('popup');
                    popup.style.display = 'block';

                    // Nascondi il popup dopo 5 secondi (5000 ms)
                    setTimeout(() => {
                    popup.style.display = 'none';
                    }, 3000);
                    
                    //reload pagina
                    if (performance.navigation.type === performance.navigation.TYPE_RELOAD) {
                    // Reindirizzamento a una nuova pagina
                        window.location.href = "ZVolta.php";}
            </script>
            <?php } ?>
        </section>
        
        <script>
        // JavaScript Captcha Generation
        const captchaContainer = document.getElementById('captcha-container');
        const captchaValue = Math.random().toString(36).substring(2, 8).toUpperCase();
        captchaContainer.innerText = captchaValue;

        const captchaInput = document.getElementById('captcha-input');
        captchaInput.addEventListener('input', function () {
            if (captchaInput.value.toUpperCase() !== captchaValue) {
                captchaInput.setCustomValidity('Captcha incorrect');
            } else {
                captchaInput.setCustomValidity('');
            }
        });
    </script>

        
    </main>
    

    <footer>
        <p>&copy; <?php echo($anno) ?> Z-Volta. Tutti i diritti riservati.</p>
    </footer>
</body>
</html>
