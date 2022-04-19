<?php
$host="localhost";
$dbname="behero";
$username="behero";
$password="behero";

try {
    $BDD = new PDO("mysql:host=localhost;dbname=behero;charset=utf8",
    "behero","behero", array(PDO::ATTR_ERRMODE
    =>PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die('Erreur fatale : ' . $e->getMessage());
}
?>