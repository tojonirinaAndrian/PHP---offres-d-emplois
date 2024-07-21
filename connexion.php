<?php 
include 'configInscriConnex.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <main>
        <div class = "principal_div">
            <h1 class = "title">Connexion</h1>

            <!-- Message d'erreur en cas de mot de passe ou email incorrect : -->
            <?php           
                if (isset ($erreur)) {
                    echo "<p class = 'erreur' style = 'color : red'>". $erreur ."</p>";
                }
            ?>
            <!--  -->

            <form action="" method="POST">
                <label for="email_conn">Email : </label>
                <input type="text" name="email_conn" required><br>
                <label for="mdp_conn">Mot de passe : </label>
                <input type="text" name="mdp_conn" required><br>
                <input type="submit" value="Valider" name = "submit_conn" class ="button">
            </form>
            <p><a href="inscription.php">Cliquez ici si vous n'avez pas encore de compte</a></p>
        </div>
    </main>
</body>
</html>