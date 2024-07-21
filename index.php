<?php 
include 'configInscriConnex.php';


// Verification de la connexion : 
if (!null == $nom_) {
    $nom = $nom_;
    $prenom = $prenom_;
}

// SInon, redirection : 
else {
    header ("Location:connexion.php");
}
?>

<!DOCTYPE html>
<html lang="en"
<head>
    <meta charset="UTF-8"
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>BIENVENUE</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleMesEmplois.css">
</head>
<body>
    <div class = "principal_div">
        <h1 class ="title">Bienvenue</h1>
        <?php 
        echo $nom. " ". $prenom. "<br/>";
        ?>
        <p><a href="connexion.php">Cliquez ici pour pour vous connectez a un autre compte.</a></p><br>
        <p>On a des offres d'emplois appliquables, vous avec le contact des recruteurs et les informatons sur l'emploi propose.</p>
        <p>Si vous chercher a proposer un travail, veuiller cliquer sur le bouton suivant. Remplissez le formulaire et validez.</p>
        
        <!-- Proposer un emploi : -->
        <p><a href="formulaireDeRecruteur.php">Cliquez ici pour proposer un travail.</a></p>
        
        <!-- Voire MES emplois -->
        <p><a href="mesEmplois.php">Cliquez ici pour voir vos travails proposes.</a></p>
        <p><br>
            Les emplois postulables seront listes ICI : <BR>
        </p>
    </div>

    <div class = "la_liste_d_emplois">

    <!-- Connexion a la table recruteurs et affichage de tous les emplois : -->
        <?php 
            $statement = $db -> query ( "SELECT * FROM recruteurs");
                
            echo "<div>";
                echo "<span> RECRUTEUR </span>";
                echo "<span> ENTREPRISE </span>";
                echo "<span> L'EMPLOI </span>";
                echo "<span> INFO G </span>";
                echo "<span> DOSSIERS </span>";
                echo "<span> QUALIFICATIONS </span>";
                echo "<span> CONTACTS </span>";
            echo "</div><BR>";

            while ($item = $statement -> fetch ()) {
                echo "<div>";
                    echo "<span>".$item ['nom']." ".$item ['prenom']."</span>";
                    echo "<span> ".$item ['entreprise']."</span>";
                    echo "<span> ".$item ['emploi']."</span>";
                    echo "<span> ".$item ['informationsGenerales']." </span>";
                    echo "<span> ".$item ['dossiers']."</span>";
                    echo "<span> ".$item ['qualifications']."</span>";
                    echo "<span> ".$item ['telephone']."</span>";
                echo "</div><BR><BR>";
            }
        ?>    
    </div>
</body>
</html>