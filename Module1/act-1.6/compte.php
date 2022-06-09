<?php

class Compte {
    
    private static int $nbreCpte = 0;
    private int $code = 0;
    protected float $solde;
    
    public function __construct(float $solde=0){
        $this->solde = $solde;
        self::$nbreCpte++;
        $this->code = self::$nbreCpte;
    }

    public function getSolde():string {
        return  number_format($this->solde, 2, ',', ' ').'€';
    }

    public function deposer(float $montant):void {
        $this->solde += $montant;
    }

    public function retirer(float $montant):void {
        $this->solde -= $montant;
    }

}

