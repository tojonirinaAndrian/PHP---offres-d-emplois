<?php 
include 'configInscriConnex.php';

// La classe se trouve ICI :
include 'NouveauRecruteur.class.php';

// Creation d'objet Employeur :
// Insertion des donnees :

if (isset ($_POST ['submit_create'])) {

    // Initialisation des donnees :

    $employeur = new NouveauRecruteur ($nom_, $prenom_, $email_, $telephone_);
    $employeur -> travailPropose ($_POST ['entreprise'], $_POST ['emploi'], $_POST ['informationsGenerales'], $_POST ['dossiers'], $_POST ['qualifications']);
    

    // Pour simplifier l'insertion dans la BDD :
    $entreprise = $employeur -> entreprise ();
    $nom = $employeur -> nom ();    
    $prenom = $employeur -> prenom ();
    $emploi = $employeur ->emploi ();
    $telephone = $employeur -> telephone ();
    $email = $employeur -> email ();
    $qualifications = $employeur -> qualifications ();
    $dossiers = $employeur -> dossiers ();
    $entreprise = $employeur -> entreprise ();
    $informationsGenerales = $employeur -> informationsGenerales ();

    
    // Insertion dans la base de donnees :::
    $statement = $db -> prepare ("INSERT INTO recruteurs (nom, prenom, telephone, email, entreprise, emploi, informationsGenerales, dossiers, qualifications) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $statement -> execute (array ($nom, $prenom, $telephone, $email, $entreprise, $emploi, $informationsGenerales, $dossiers, $qualifications));

    // 
}
?>