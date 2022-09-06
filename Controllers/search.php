<?php
session_start();
include_once '..\Model\Class\formation.class.php';
$e = new Formation();
require_once('C:\wamp64\www\formera\Model\Config\config.php');
unset($_SESSION["res"]);
$cnx = new connexion();
$pdo = $cnx->CNX();
$req = "SELECT * FROM Formation";
if (isset($_POST["Desigation"]) || isset($_POST["PrixMax"]) || isset($_POST["PrixMin"]) || isset($_POST["Caracteristique"])) {
if ($_POST["Desigation"] || $_POST["PrixMax"] || $_POST["PrixMin"] || $_POST["Caracteristique"]) {
    $req = $req . " where";
    if ($_POST["PrixMax"]) {
        $req = $req . " Prix <=" . $_POST["PrixMax"];
        if ($_POST["Desigation"] || $_POST["PrixMin"] || $_POST["Caracteristique"] ) {
            $req = $req ." and ";
        }
    }
    if ($_POST["PrixMin"]){
        $req = $req . " Prix >= " . $_POST["PrixMin"];
        if ($_POST["Desigation"] || $_POST["Caracteristique"]) {
            $req = $req ." and ";
        }
    }
    if ($_POST["Caracteristique"]) {
        $req = $req . " Caracteristique like '%" . $_POST["Caracteristique"]."%'";
        if ($_POST["Desigation"])  {
            $req = $req ." and ";
        }
    }
    if ($_POST["Desigation"]) {
        $req = $req . " Desigation like '%". $_POST["Desigation"]."%'";
    }
}
}

$res = $pdo->query($req) or print_r($pdo->errorInfo());
$result="";
foreach ($res as $row) {
    $result= $result.'<div class="product">
<div class="product_image"><img src="images\formation\\' . $row[5] . '" alt=""  width="300px" height="200px"></div>
<div class="product_content">
<div class="product_title"><a href="formationDetails.php?id=' . $row[0] . '">' . $row[1] . '</a></div>
<div class="product_price">' . $row[2] . '$</div>
</div>
</div>';
}
$_SESSION["res"]=$result;
header("location:../Views/user/formation.php");
