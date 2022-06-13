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

    public function __toString(){
        return $this->joueurA->__toString() . PHP_EOL . $this->joueurB->__toString();
    }
}

$zone = new ZoneCombat($kenza,$habib);
echo $zone->__toString();