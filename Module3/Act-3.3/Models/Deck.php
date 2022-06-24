<?php 
include_once ('Carte.php');

class Deck {

    private $deck;

    public function __construct(){
        $carte = new Carte();
        for ($i=0; $i < 30; $i++) { 
            $tab[] = $carte->getCarte();
        }
        $this->deck = $tab;
    }

    public function getDeck(){
        return $this->deck;
    }
}