<?php

include('monstre.php');
include('sort.php');

class Joueur {
    public string $pseudo;
    public int $ptsVie = 30;
    public int $ptsMana = 10;
    private array $monstresPlace = array();
    public array $main = array();

    public function __construct($pseudo){
        $this->pseudo = $pseudo;
    }

    public function montrerMain(){
        $str='';
        foreach($this->main as $key => $value){
            $str = $str . 'Sort n°'. $key . ':'.PHP_EOL.'Cout Mana : ' . $value->getCoutMana().PHP_EOL.
            'Points degats : '.$value->getPtsDegats().PHP_EOL;
        }
        echo $str;
    }

    public function piocher(){
            // $rand=rand(0,1);
            // if($rand == 0){
            //     $this->main[] = new Sort();
            // }
            // else{
            //     $this->main[] = new Monstre();
            // }
            $this->main[] = new Sort();
            
    }

    public function jouer(Joueur $joueur,int $n){
        foreach($this->main as $key => $value){
            if($key === $n && $this->ptsMana >= $value->getCoutMana()){
                $joueur->ptsVie = $joueur->ptsVie - $value->getPtsDegats();
                $this->ptsMana = $this->ptsMana - $value->getCoutMana();
                unset($this->main[$key]);
            } 
        }
        // $this->ptsMana = 10;
    }


    public function getMonstresPlace(){
        return $this->monstresPlace;
    }

    public function placerMonstre(Monstre $monstre){

        if( count($this->monstresPlace)  < 5 ){
            $this->monstresPlace[] = $monstre;
            $this->ptsMana = $this->ptsMana - $monstre->getCoutMana();
        }
    }


    public function __toString(){
        $str='';
        // foreach($this->monstresPlace as $key => $value){
        //     $str = $str . 'Monstre n°'. (intval($key) + 1) . ':'.PHP_EOL.'Cout Mana : ' . $value->getCoutMana().PHP_EOL.'Points vie : '.
        //     $value->getPtsVie().PHP_EOL.'Points degats : '.$value->getPtsDegats().PHP_EOL;
        // }
        // foreach($this->main as $key => $value){
        //     $str = $str . 'Sort n°'. (intval($key) + 1) . ':'.PHP_EOL.'Cout Mana : ' . $value->getCoutMana().PHP_EOL.
        //     'Points degats : '.$value->getPtsDegats().PHP_EOL;
        // }
        return 'Joueur : '. $this->pseudo .PHP_EOL. 'Pts Vie:' . $this->ptsVie . PHP_EOL. 'Pts Mana :'. $this->ptsMana .PHP_EOL. $str;
    }
}


// $kenza = new Joueur('kenza');
// $habib = new Joueur('habib');
// $kenza->piocher();
// $kenza->piocher();
// $kenza->piocher();
// $kenza->piocher();
// print_r($kenza->montrerMain());
// $kenza->jouer($habib,1);
// print_r($kenza);








