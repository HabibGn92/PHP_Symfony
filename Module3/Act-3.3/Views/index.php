<?php 
include_once ('../Models/Deck.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hearthstone</title>
</head>
<body>
    <?php
    $deck = new Deck();
    $res = $deck->getDeck();
    print_r($res) ?>
</body>
</html>