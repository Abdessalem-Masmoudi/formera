<?php
include_once '..\Model\Class\formation.class.php';
$e = new Formation();
require_once('C:\wamp64\www\formera\Model\Config\config.php');
$cnx = new connexion();
$pdo = $cnx->CNX();
$req = "SELECT * FROM Formation";
if (isset($_POST["Desigation"]) || isset($_POST["Desigation"]) || isset($_POST["Desigation"]) || isset($_POST["Desigation"])) {
    $req = $req . " where";
    if (isset($_POST["Prix"])) {
        $req = $req . "Prix like  " . $_POST["Prix"];
    }
    if (isset($_POST["Caracteristique"])) {
        $req = $req . "Caracteristique like  " . $_POST["Caracteristique"];
    }
    if (isset($_POST["Image"])) {
        $req = $req . "Image like  " . $_POST["Image"];
    }
    if (isset($_POST["description"])) {
        $req = $req . "description like  " . $_POST["description"];
    }
}
$res = $pdo->query($req) or print_r($pdo->errorInfo());
return $res;
