<?php
namespace App\Classe;

class AdresseEmail {

    protected $adresseEmail;
    private $affaireLeboncoin;

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

    /**
     * Get the value of affaireLeboncoin
     */ 
    public function getAffaireLeboncoin()
    {
        return $this->affaireLeboncoin;
    }

    /**
     * Set the value of affaireLeboncoin
     *
     * @return  self
     */ 
    public function setAffaireLeboncoin($affaireLeboncoin)
    {
        $this->affaireLeboncoin = $affaireLeboncoin;
    }
}