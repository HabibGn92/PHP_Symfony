<?php
include 'compte.php';

class CompteEpargne extends Compte{

    private static float $tauxInteret = 6; 

    public function calculInteret():void{
        $this->solde = $this->solde + $this->solde * (self::$tauxInteret/100);
    }
} 

$A = new CompteEpargne(50);
$B = new CompteEpargne(100);
$C = new CompteEpargne(200);
$B->calculInteret();
echo $A->getSolde() .PHP_EOL. $B->getSolde(). PHP_EOL. $C->getSolde();
