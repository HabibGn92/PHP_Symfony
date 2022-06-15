<?php
include('joueur.php');
class ZoneCombat {

    private static $nbMonstreParJoueur = 5;
    private Joueur $joueurA; 
    private Joueur $joueurB; 

    // public function __construct($joueurA,$joueurB){
    //     $this->joueurA = $joueurA;
    //     $this->joueurB = $joueurB;
    // }

    public function __toString(){
        return $this->joueurA->__toString() . PHP_EOL . $this->joueurB->__toString();
    }

    function initialiser()

    {
    
    echo "Pseudo joueur A: ";
    
    // Ouvre l'entree standard
    
    $handle = fopen ("php://stdin","r");
    
    // Recupere ce que l'utilisateur a ecrit
    
    $line = fgets($handle);
    
    // Créé le joueur avec son nom
    
    $this->joueurA = new Joueur($line);
    
    echo "Pseudo joueur B: ";
    
    $handle = fopen ("php://stdin","r");
    
    $line = fgets($handle);
    
    $this->joueurB = new Joueur($line);
    
    // Ajoute 3 cartes dans les mains de chaque joueur
    
    for($i = 0; $i < 3; $i++)
    
    {
    
    $this->joueurA->piocher();
    $this->joueurB->piocher();
    
    }
    
    }
    function lancer()

{

// appelle la fonction d'initialisation plus haut

$this->initialiser();

// affiche le plateau grace à la méthode magique __toString

echo $this;

// Execute ce qu'il y a dans la boucle tant que les 2 joueurs sont vivants

while ($this->joueurA->ptsVie > 0 && $this->joueurB->ptsVie > 0)

{

echo PHP_EOL.$this->joueurA->pseudo . " es-tu pret ? \n";

$handle = fopen ("php://stdin","r");

$entree = fgets($handle);

$this->joueurA->piocher();


$array = array();
foreach($this->joueurA->main as $key => $value){
    $array[]= $value->getCoutMana();
}

while($this->joueurA->ptsMana >= min($array) && count($this->joueurA->main) > 0){

echo PHP_EOL.$this;

$this->joueurA->montrerMain();

echo $this->joueurA->pseudo ." : quelle carte veux-tu jouer ? choisis le chiffre\n";

$handle = fopen ("php://stdin","r");

$entree = fgets($handle);

    $this->joueurA->jouer($this->joueurB, (int)$entree);

    $array = array();
    foreach($this->joueurA->main as $key => $value){
        $array[]= $value->getCoutMana();
    }
}

$this->joueurA->ptsMana = 10;


echo $this;
echo $this->joueurB->pseudo . " es-tu pret ? \n";

$handle = fopen ("php://stdin","r");

$entree = fgets($handle);

$this->joueurB->piocher();

$array = array();
foreach($this->joueurB->main as $key => $value){
    $array[]= $value->getCoutMana();
}

while($this->joueurB->ptsMana >= min($array) && count($this->joueurB->main) > 0){


echo $this;
$this->joueurB->montrerMain();

echo $this->joueurB->pseudo ." : quelle carte veux-tu jouer ? choisis le chiffre\n";

$handle = fopen ("php://stdin","r");

$entree = fgets($handle);

$this->joueurB->jouer($this->joueurA, (int)$entree);

$array = array();
foreach($this->joueurB->main as $key => $value){
    $array[]= $value->getCoutMana();
}
}

$this->joueurB->ptsMana = 10;

echo $this;

}

// Si on sort de la boucle c'est qu'un joueur est mort, ceci affiche le résultat

if ($this->joueurA->ptsVie <= 0 && $this->joueurB->ptsVie <= 0)

{

        echo "Egalite !";

}

else if ($this->joueurA->ptsVie <= 0)

        {

                echo $this->joueurA->pseudo . ' est un gros loser';

        }

        else if ($this->joueurB->ptsVie <= 0)

                {

                        echo $this->joueurB->pseudo . ' est un gros loser';

                }
}
}