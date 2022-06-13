<?php

abstract class Carte {

    protected int $coutMana;
    protected int $ptsDegats;

    function __construct($coutMana,$ptsDegats){
        $this->coutMana = $coutMana;
        $this->ptsDegats = $ptsDegats;
    }

    public function getPtsDegats(){
        return $this->ptsDegats;
    }

    public function getCoutMana(){
        return $this->coutMana;
    }

}