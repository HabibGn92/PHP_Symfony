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

    public function __toString(){
        $str='';
        foreach($this->monstresPlace as $key => $value){
            $str = $str . 'Monstre n°'. (intval($key) + 1) . ':'.PHP_EOL.'Cout Mana : ' . $value->getCoutMana().PHP_EOL.'Points vie : '.
            $value->getPtsVie().PHP_EOL.'Points degats : '.$value->getPtsDegats().PHP_EOL;
        }
        return 'Joueur : '. $this->pseudo .PHP_EOL. $str;
    }
}

$monstre1 = new Monstre(2,8,5);
$monstre2 = new Monstre(4,6,2);
$monstre3 = new Monstre(2,8,5);
$monstre4 = new Monstre(4,6,2);
$monstre5 = new Monstre(2,8,5);
$monstre6 = new Monstre(4,6,2);
$kenza = new Joueur('kenza');
$habib = new Joueur('habib');
$kenza->placerMonstre($monstre1);
$kenza->placerMonstre($monstre2);
$kenza->placerMonstre($monstre3);

$habib->placerMonstre($monstre4);
$habib->placerMonstre($monstre5);
$habib->placerMonstre($monstre6);

