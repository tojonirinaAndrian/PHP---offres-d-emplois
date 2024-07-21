<?php 
// Conn :
include 'configInscriConnex.php';
if (!empty($_GET ['id'])) {
    // simplifier l'utilisation des donnees 
    
    $id = $_GET ['id'];
    $informationsGenerales = $_SESSION ['informationsGenerales'];
    $dossiers = $_SESSION ['dossiers'];
    $qualifications = $_SESSION ['qualifications'];
    $emploi = $_SESSION ['emploi'];
}
else {
    header ('Location:mesEmplois.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modifier</h1>
    <p>Ne mettez rien dans la partie "nouveau" si vous ne desirez pas changer cette partie.</p>
    <p>L'emploi : </p>
    <p>Actuel : </p>
    <p>
        <?php 
        echo $emploi;
        ?>
    </p>
    <p>Nouveau : </p>
    
    <form action="" method="post">
        <input type="text" name ="emploi">
        <p>Les infomations generales : </p>
        <p>Actuelles : </p>
        <p>
            <?php 
            echo $informationsGenerales;
            ?>
        </p>
        <p>Nouveau : </p>
        <input type="text" name ="informationsGenerales">
        <p>Les dossiers : </p>
        <p>Actuelles : </p>
        <p>
            <?php 
            echo $dossiers;
            ?>
        </p>
        <p>Nouveau : </p>
        <input type="text" name ="dossiers">
        <p>Les qualifications : </p>
        <p>Actuelles : </p>
        <p>
            <?php 
            echo $qualifications;
            ?>
        </p>
        <p>Nouveau : </p>
        <input type="text" name ="qualifications">
        <input type="submit" value ="Modifier" name ="modifier">
    
    </form>

    <!-- Insertion dans la BDD : -->
<?php 
if (isset ($_POST['modifier'])) {

    // SI vide, on ne change rien :
    if ($_POST ['emploi'] != '') {
        $emploi = $_POST ['emploi'];
    }
    if ($_POST ['informationsGenerales'] != '') {
        $informationsGenerales = $_POST ['informationsGenerales'];
    }
    if ($_POST ['qualifications'] != '') {
        $qualifications = $_POST ['qualifications'];
    }
    if ( $_POST ['dossiers'] != '' ) {
        $dossiers = $_POST ['dossiers'];
    }

    // Insertion :
    $statement = $db -> prepare ("UPDATE recruteurs SET emploi = ?, informationsGenerales = ?, qualifications = ?, dossiers = ? WHERE id = ?");
    $statement -> execute (array ($emploi, $informationsGenerales, $qualifications, $dossiers, $id));
    echo "<p> C'est fait !</p>";

    // Redirection vers mes emplois :
    header ("Location:mesEmplois.php");
}

?>
</body>

</html>