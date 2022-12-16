<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=uspn;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
    echo 'il y une error de connection !';
}
