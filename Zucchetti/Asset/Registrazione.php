<?php
    /*data footer*/
    $anno = date("Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati - ZVolta</title>
    <link rel="icon" href="Z-Volta_Logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="stili/styles.css">
</head>
<body>
    <header>
        <h1>Gestione Asset Aziendale</h1>
    </header>

    
    <main style="margin-top: 5rem">
        <section id="login-section">
            <h2>Registrazione</h2>
            <form id="login-form" action="signin.php" method="POST">
                
                <div style="display: flex">
                <input type="text" id="nome" name="nome" placeholder="Nome" pattern="^(?!.*(admin|password|root))[A-Za-z0-9]+$" title="Questo campo non può contenere parole come 'admin', 'password', 'root' o caratteri speciali" style="float: left; display: inline; width: 200px" required>
                <input type="text" id="cognome" name="cognome" placeholder="Cognome" pattern="^(?!.*(admin|password|root))[A-Za-z0-9]+$" title="Questo campo non può contenere parole come 'admin', 'password', 'root' o caratteri speciali" style="float: left; display: inline; width: 200px" required>
                </div>
                    
                <select style="height: 30px; border-radius: 10px; font-size: 90%" name="role" required>
                    <option label="Seleziona ruolo" hidden=""></option>
                    <option value="dipendente">Dipendente</option>
                    <option value="coordinatore">Coordinatore</option>
                </select>
                
                <input type="text" id="username" name="username" placeholder="Username" pattern="^(?!.*(admin|password|root))[A-Za-z0-9_]+$" title="L'username non può contenere le parole vietate (admin, password, root) e caratteri eccetto (_)" required>

                <input type="password" id="password" name="password" placeholder="Password" pattern="^(?!.*(admin|password|root|')).*$" title="La password non può contenere le parole vietate (admin, password, root) e caratteri vietati (')" minlength="8" autocomplete="off" required>
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

                <button type="submit">Registrati</button>
                <p>Hai già un account? <a href="ZVolta.php">Accedi</a></p>
            </form>
        </section>        
    </main>
    

    <footer>
        <p>&copy; <?php echo($anno) ?> Z-Volta. Tutti i diritti riservati.</p>
    </footer>
</body>
</html>
