<?php 
include 'configCreationRecruteur.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Emplois</title>
    <link rel="stylesheet" href="css/styleMesEmplois.css">
</head>
<body>
    <div class="principal_div">
        <p>Ici se trouvent les emplois que vous avez propose.</p>
        <p>
            <a href="index.php">
            Retourner a la page d'acceuil.
            </a>
        </p>
        <BR>
        <?php 
        if (isset ($nom_)) {


            // Montrer ses emplois proposes :
            $statement = $db -> query ( "SELECT * FROM recruteurs WHERE nom = '$nom_' AND prenom = '$prenom_'");
            $nb_item = 0;
                
            echo "<div>";
                echo "<span> ENTREPRISE </span>";
                echo "<span> L'EMPLOI </span>";
                echo "<span> INFO G </span>";
                echo "<span> DOSSIERS </span>";
                echo "<span> QUALIFICATIONS </span>";
                echo "<span> LES OPTIONS </span>";
            echo "</div><BR>";

            while ($item = $statement -> fetch ()) {

                echo "<div>";
                    echo "<span> ".$item ['entreprise']."</span>";
                    echo "<span> ".$item ['emploi']."</span>";
                    echo "<span> ".$item ['informationsGenerales']." </span>";
                    echo "<span> ".$item ['dossiers']."</span>";
                    echo "<span> ".$item ['qualifications']."</span>";
                    $_SESSION ['emploi'] = $item ['emploi'];
                    $_SESSION ['qualifications'] = $item ['qualifications'];
                    $_SESSION ['dossiers'] = $item ['dossiers'];
                    $_SESSION ['informationsGenerales'] = $item ['informationsGenerales'];
                    echo "<span> ";


                    // Pour modifier ou supprimer : +++ integration de l'id dans l'URL avec ?id=.item['id']:
                        echo '<a href="modifier.php?id='.$item ['id'].'"> Modifier </a>';
                        echo '<a href="supprimer.php?id='.$item ['id'].'"> Supprimer </a>';
                    // 
                    
                        echo "</span>";
                echo "</div><BR>";
            
                $nb_item ++; 
            }

            // Si on n'a encore rien proposes :
            if ($nb_item == 0) {
                echo "
                <p>
                    Vous n'avez rien ici.
                </p>
                <p>
                    Cliquer ici pour proposer du travail : 
                    <a href='formulaireDeRecruteur.php'>Ici</a>
                </p>
                ";
            }
        }
        
        else {
            header ("Location:index.php");
        }
        ?>

    </div>
    
</body>
</html>