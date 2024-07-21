<?php
include 'configInscriConnex.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body> 
    <main>
        <div class = "principal_div"> 
            <h1 class = "title">Inscription</h1>
            <form action="" method="POST">
                <label for="nom" name="nom">Nom : </label>
                <input type="text" name="nom" required><br>
                <label for="prenom">Prenom : </label>
                <input type="text" name="prenom" required><br>
                <label for="email">Email : </label>
                <input type="text" name="email" required><br>
                <label for="email">Telephone : </label>
                <input type="text" name="telephone" required><br>
                <label for="mdp">Mot de passe : </label>
                <input type="text" name="mdp" required><br>
                <input type="submit" value="Valider" name = "submit" class = "button">
            </form>
            <p><a href="connexion.php">Cliquez ici si vous avez deja compte</a></p>
        </div>
    </main>
</body>
</html>