<?php 

// Pour connecter les donnes a notre compte :
include 'configInscriConnex.php';
?>

<!-- ON CREE DES RECRUTEMENTS EN NOTRE NOM ICI -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de recruteur</title>
    <link rel="stylesheet" href="css/styleForm.css">
</head>
<body>
    <div class="principal_div">
        <p>Nom : <?php echo $nom_ ?></p>
        <p>Prenom(s) : <?php echo $prenom_ ?></p>
        <p>Vos contacts : </p>
        <span>Telephone : <?php echo $telephone_ ?></span>
        <span>Email : <?php echo $email_ ?></span>
        
        <!-- Les donnes sont envoyees dans MEs Emplois -->
        
        <form action="mesEmplois.php" method ="POST">
            <label for="entreprise">Nom de votre entreprise : </label>
            <input type="text" name="entreprise" required>
            <label for="emploi">Le nom de l'emploi propose : </label>
            <input type="text" name="emploi" required>
            <label for="informarionsGenerales">Les informations generales concernant le travail que vous proposez : </label>
            <input type="text" name="informationsGenerales" required>
            <label for="dossiers">Entrer ici les dossiers dont les opportuns ont besoin pour postuler : </label>
            <input type="text" name="dossiers" required>
            <label for="qualifications">Le profil que vous recherchez en tant que recruteur : </label>
            <input type="text" name="qualifications" required>
            <input type="submit" value="Valider" name="submit_create" class="button">
        </form>

    <!--  -->
    </div>
</body>
</html>