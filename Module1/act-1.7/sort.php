<?php

class Sort extends Carte{
    private int $coutMana;
    private int $ptsDegats;

    function __construct($coutMana,$ptsDegats){
        $this->coutMana = $coutMana;
        $this->ptsDegats = $ptsDegats;
    }

    public function attaquer(Monstre $monstre){
        $monstre->minusPtsVie($this->ptsDegats);
    }
}

// $sort = new Sort(2,8);
// $monstre = new Monstre(4,6,2);
// echo $monstre->getPtsVie().PHP_EOL;
// $sort->attaquer($monstre);
// echo $monstre->getPtsVie();