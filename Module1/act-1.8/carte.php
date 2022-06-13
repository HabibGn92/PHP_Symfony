<?php

abstract class Carte {

    protected int $coutMana;
    protected int $ptsDegats;

    function __construct(){
        $this->coutMana = rand(1,10);
        $this->ptsDegats = rand(1,10);
    }

    public function getPtsDegats(){
        return $this->ptsDegats;
    }

    public function getCoutMana(){
        return $this->coutMana;
    }

}

