<?php
$host="localhost";
$dbname="emorando";
$username="emorando";
$password="beheroBDD";

try {
    $bdd = new PDO("mysql:host=". $host .";dbname=". $dbname .";charset=utf8",
    $username,
    $password,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die("Erreur : ". $e->getMessage());
    }
    ?>