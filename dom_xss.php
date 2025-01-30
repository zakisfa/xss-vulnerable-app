<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Scénario 2 : Modification du DOM avec XSS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Scénario 2 : Manipulation du DOM avec XSS</h1>
    <p>Essayez d'injecter du code pour modifier l'apparence de la page.</p>
    
    <form method="POST">
        <label for="dom_input">Texte :</label><br>
        <input type="text" id="dom_input" name="dom_input"><br>
        <button type="submit">Envoyer</button>
    </form>

    <h2>Résultat :</h2>
    <div class="output">
        <?php
        if (isset($_POST['dom_input'])) {
            echo $_POST['dom_input']; // ⚠️ Vulnérable au XSS
        }
        ?>
    </div>

    <a href="index.php">Retour au menu</a>
</body>
</html>
