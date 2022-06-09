<?php
include 'compte.php';

class ComptePayant extends Compte{

    private static float $coutRetrait = 2 ;

    public function retirer(float $montant):void {
        $this->solde -= $montant + self::$coutRetrait;
    }
}

$A = new ComptePayant(50);
$B = new ComptePayant(100);
$C = new ComptePayant(200);
$B->retirer(10);
echo $A->getSolde() .PHP_EOL.$B->getSolde().PHP_EOL.$C->getSolde();