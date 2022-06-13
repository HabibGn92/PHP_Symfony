<?php

class Sort extends Carte{

    public function attaquer(Monstre $monstre){
        $monstre->minusPtsVie($this->ptsDegats);
    }
}

// $sort = new Sort(2,8);
// $monstre = new Monstre(4,6,2);
// echo $monstre->getPtsVie().PHP_EOL;
// $sort->attaquer($monstre);
// echo $monstre->getPtsVie();