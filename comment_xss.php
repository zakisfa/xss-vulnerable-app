<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Scénario 3 : Injection de lien malveillant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Scénario 3 : Injection de lien malveillant</h1>
    <p>Essayez d'injecter un lien qui redirige l'utilisateur vers un autre site.</p>
    
    <form method="POST">
        <label for="comment">Entrez un commentaire :</label><br>
        <textarea id="comment" name="comment"></textarea><br>
        <button type="submit">Envoyer</button>
    </form>

    <h2>Commentaires :</h2>
    <div class="output">
        <?php
        if (isset($_POST['comment'])) {
            echo $_POST['comment']; // ⚠️ Vulnérable au XSS
        }
        ?>
    </div>

    <a href="index.php">Retour au menu</a>
</body>
</html>
