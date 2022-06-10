<?php

include('monstre.php');

class Joueur {
    private string $pseudo;
    private int $ptsVie = 30;
    private int $ptsMana = 10;
    private array $monstresPlace = array();

    public function __construct($pseudo){
        $this->pseudo = $pseudo;
    }

    public function getMonstresPlace(){
        return $this->monstresPlace;
    }

    public function placerMonstre(Monstre $monstre){

        if( count($this->monstresPlace)  < 5 ){
            $this->monstresPlace[] = $monstre;
            $this->ptsMana = $this->ptsMana - $monstre->getCoutMana();
        }
    }
}

$monstre1 = new Monstre(2,8,5);
$monstre2 = new Monstre(4,6,2);
$monstre3 = new Monstre(2,8,5);
$monstre4 = new Monstre(4,6,2);
$monstre5 = new Monstre(2,8,5);
$monstre6 = new Monstre(4,6,2);
$kenza = new Joueur('kenza');
// print_r($kenza);
// $kenza->placerMonstre($monstre1);
// $kenza->placerMonstre($monstre2);
// $kenza->placerMonstre($monstre3);
// $kenza->placerMonstre($monstre4);
// $kenza->placerMonstre($monstre5);
// $kenza->placerMonstre($monstre6);
print_r($kenza);

// print_r($kenza->getMonstresPlace());