<?php

// creation de session :
session_start ();

// Connexion a la database :
class Database {
    
    private static $login = "root";
    private static $mdp = "";
    private static $conn = "";

    public static function connect () {
        try {
            self :: $conn = new PDO ("mysql:host=localhost;dbname=bdd_projet_php_s3", self :: $login, self :: $mdp);
        }

        catch (PDOException $e) {
            echo "Echec de connexion A la bdd. <BR>".$e -> getMessage ();
        }
        return self :: $conn;
    }
    

    public static function disconnect () {
        self :: $conn = "";
    }
}

// utilisation direct d'une la methode connect de la classe : 
$db = Database :: connect ();

// 

// Submit creation de compte : 
if (isset ($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $telephone = $_POST ['telephone'];

    // connexion au compte initial si deja existanate, 
    // on efface puis cree un autre avec le mem nom, ca ne change
    // rien au fonctionnement de celle ci :

    $statement = $db -> query ("SELECT * FROM membres WHERE email = '$email' AND mdp = '$mdp'");
        
    while ($item = $statement -> fetch ()) {
        // Insertion dans une session pour pouvoir utiliser les informations tout le long de la session :
        
        $_SESSION ['nom'] = $item ['nom'];
        $_SESSION ['prenom'] = $item ['prenom'];
        $id = $item ['id'];
        $_SESSION ['email'] = $item ['email'];
        $_SESSION ['telephone'] = $item ['telephone'];

        // Effacer si compte existant : 
        $statement = $db -> prepare ("DELETE FROM membres WHERE id = ?");
        $statement -> execute (array ($id));
            
    }

    // Insertion de donnees dans la BDD :
    $statement = $db -> prepare ("INSERT INTO membres (nom, prenom, email, mdp, telephone) VALUES (?, ?, ?, ?, ?)");
    $statement -> execute (array ($nom, $prenom, $email, $mdp, $telephone));

    // Redirection vers la page principale :
    header ("Location:index.php");
}


// Connexion.php :
else if (isset ($_POST['submit_conn'])) {
    $email = $_POST ['email_conn'];
    $mdp = $_POST ['mdp_conn'];
    
    // Verification si compte existe :
    $nb_ligne = 0;

    $statement = $db -> query ("SELECT * FROM membres WHERE email = '$email' AND mdp = '$mdp'");

    while ($item = $statement -> fetch ()) {
        $nb_ligne ++;

        // Insertion des donnes dans une session pour l'utiliser tout le long :
        $_SESSION ['nom'] = $item ['nom'];
        $_SESSION ['prenom'] = $item ['prenom'];
        $_SESSION ['email'] = $item ['email'];
        $_SESSION ['telephone'] = $item ['telephone'];
        
    }

    if ($nb_ligne > 0) {
        // Redirection vers la page principale si le compte existe :
        header ("Location:index.php");
    }
    
    else {
        // Sinon, message d'erreur :
        $erreur = "Adresse Email ou Mot de passe incorrect.";
    }    
}

if (isset($_SESSION ['nom'])){
    $nom_ = $_SESSION ['nom'];
    $prenom_ = $_SESSION ['prenom'];
    $telephone_ = $_SESSION ['telephone'];
    $email_ = $_SESSION ['email'];
}

?>