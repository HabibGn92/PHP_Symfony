<?php
include('carte.php');

class Monstre extends Carte {

    private int $ptsVie;

    public function __construct($coutMana,$ptsVie,$ptsDegats){
        parent::__construct($coutMana,$ptsDegats);
        $this->ptsVie = $ptsVie;
       
    }

    public function getPtsVie(){
        return $this->ptsVie;
    }

    public function minusPtsVie(int $degats){
        if($degats >= $this->ptsVie){
            $this->ptsVie = 0;
        }else{
            $this->ptsVie = $this->ptsVie - $degats;
        }
        
    }

    public function attaquer(Monstre $monstre){
        $monstre->minusPtsVie($this->ptsDegats);
    }
}

include('sort.php');

$monstre1 = new Monstre(2,8,5);
$sort = new Sort(4,6);
print_r($monstre1);
print_r($sort);

// echo $monstre2->getPtsVie().PHP_EOL;
// $monstre1->attaquer($monstre2);
// echo $monstre2->getPtsVie();
