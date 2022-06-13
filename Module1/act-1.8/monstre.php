<?php
include('carte.php');
include('DamageableInterface.php');

class Monstre extends Carte implements DamageableInterface{

    private int $ptsVie;

    public function __construct(){
        parent::__construct();
        $this->ptsVie = rand(1,10);   
    }

    public function getPtsVie(){
        return $this->ptsVie;
    }

    public function takeDamages(int $n){
        if ($this->ptsVie - $n <= 0) {
            $this->ptsVie = 0;
        }else {
            $this->ptsVie = $this->ptsVie - $n;
        }
    }

    public function attaquer(DamageableInterface $monstre){
       $monstre->takeDamages($this->ptsDegats);
    }
}


// $monstre1 = new Monstre(2,8,2);
// $monstre2 = new Monstre(2,8,5);
// // print_r($monstre2);
// $monstre1->attaquer($monstre2);


// // print_r($monstre2);
