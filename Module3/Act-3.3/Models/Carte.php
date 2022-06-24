<?php

include_once ('MysqlConnection.php');

class Carte extends MysqlConnection {

    public function getCarte(){

        $n = rand(1,10);

        $carteStatement = self::$db->prepare('SELECT * FROM carte WHERE id=:id');

        $carteStatement->execute();

        return  $carteStatement->fetch();

    }


}

