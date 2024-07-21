<?php

class NouveauRecruteur {

    // attributs :
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $entreprise;
    private $emploi;
    private $informationsGenerales;
    private $dossiers;
    private $qualifications;

    // Constructeur :
    public function __construct ($nom, $prenom, $email, $telephone) {
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> email = $email;
        $this -> telephone = $telephone; 
    }

    // Initialisation supplementaire de donnes de l'objet
    public function travailPropose ($entreprise, $emploi, $informationsGenerales, $dossiers, $qualifications) {
        $this -> entreprise = $entreprise;
        $this -> emploi = $emploi;
        $this -> informationsGenerales = $informationsGenerales;
        $this -> dossiers = $dossiers;
        $this -> qualifications = $qualifications;
    }
    
    // utilisation des donnees privees :
    public function nom () {
        return $this -> nom;
    }
    
    public function entreprise () {
        return $this -> entreprise;
    }
    
    public function dossiers () {
        return $this -> dossiers;
    }
    
    public function telephone () {
        return $this -> telephone;
    }
    
    public function email () {
        return $this -> email ;
    }
    
    public function informationsGenerales () {
        return $this -> informationsGenerales;
    }
    
    public function emploi () {
        return $this -> emploi;
    }
    
    public function prenom () {
        return $this -> prenom;
    }
    
    public function qualifications () {
        return $this -> qualifications;
    }
} 
?>