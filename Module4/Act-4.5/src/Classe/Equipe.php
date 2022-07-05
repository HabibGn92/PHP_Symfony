<?php

namespace App\Classe;


class Equipe
{
    protected $nomEquipe;
    protected $ville;
    protected $sport;
    protected $joueur;

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

    }

    /**
     * Get the value of sport
     */ 
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * Set the value of sport
     *
     * @return  self
     */ 
    public function setSport($sport)
    {
        $this->sport = $sport;

    }

    /**
     * Get the value of nomEquipe
     */ 
    public function getNomEquipe()
    {
        return $this->nomEquipe;
    }

    /**
     * Set the value of nomEquipe
     *
     * @return  self
     */ 
    public function setNomEquipe($nomEquipe)
    {
        $this->nomEquipe = $nomEquipe;

    }

    /**
     * Get the value of joueur
     */ 
    public function getJoueur()
    {
        return $this->joueur;
    }

    /**
     * Set the value of joueur
     *
     * @return  self
     */ 
    public function setJoueur($joueur)
    {
        $this->joueur = $joueur;
    }
}