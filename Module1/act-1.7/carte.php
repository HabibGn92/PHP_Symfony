<?php

abstract class Carte {

    private int $coutMana;
    private int $ptsDegats;

    function __construct($coutMana,$ptsDegats){
        $this->coutMana = $coutMana;
        $this->ptsDegats = $ptsDegats;
    }

    public function getPtsDegats(){
        return $this->getPtsDegats;
    }

    public function getCoutMana(){
        return $this->coutMana;
    }

}