<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Scénario 1 : Pop-up XSS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Scénario 1 : Pop-up XSS</h1>
    <p>Essayez d'injecter du code pour afficher une pop-up.</p>
    
    <form method="POST">
        <label for="popup">Entrez un message :</label><br>
        <input type="text" id="popup" name="popup"><br>
        <button type="submit">Envoyer</button>
    </form>

    <h2>Résultat :</h2>
    <div class="output">
        <?php
        if (isset($_POST['popup'])) {
            echo $_POST['popup']; // ⚠️ Vulnérable au XSS
        }
        ?>
    </div>

    <a href="index.php">Retour au menu</a>
</body>
</html>
