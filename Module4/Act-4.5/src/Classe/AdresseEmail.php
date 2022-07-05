<?php
namespace App\Classe;

class AdresseEmail {

    protected $adresseEmail;

    /**
     * Get the value of adresseEmail
     */ 
    public function getAdresseEmail()
    {
        return $this->adresseEmail;
    }

    /**
     * Set the value of adresseEmail
     *
     * @return  self
     */ 
    public function setAdresseEmail($adresseEmail)
    {
        $this->adresseEmail = $adresseEmail;

        return $this;
    }
}