<?php
session_start();
include_once '..\Model\Class\formation.class.php';
$e = new Formation();
require_once('C:\wamp64\www\formera\Model\Config\config.php');
$_SESSION["res"]="";
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
    $result=$result.
    '
<tr>
    <td>
        <div class="d-flex px-2 py-1">
            
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">' . $row[1] . '</h6>
            </div>
        </div>
    </td>
    <td>
        <div class="d-flex px-2 py-1" >
            
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">' . $row[2] . '</h6>
            </div>
        </div>
    </td>
    <td>
        <div class="d-flex px-2 py-1 justify-content-center">
            
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">' . $row[3] . '</h6>
            </div>
        </div>
    </td>
    <td>
        <div class="d-flex px-2 py-1 justify-content-center">
            
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">' . $row[4] . '</h6>
            </div>
        </div>
    </td>
</tr>
';
}
$_SESSION["res"]=$result;
header("location:../Views/admin/pages/tableFormation.php");
