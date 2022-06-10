<?php
include('joueur.php');
class ZoneCombat {

    private static $nbMonstreParJoueur = 5;
    private Joueur $joueurA; 
    private Joueur $joueurB; 

    public function __construct($joueurA,$joueurB){
        $this->joueurA = $joueurA;
        $this->joueurB = $joueurB;
    }
}

$habib = new Joueur('habib');
$zone = new ZoneCombat($kenza,$habib);
print_r($zone);