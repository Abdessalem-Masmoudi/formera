<?php
include_once "../Model/Class/formation.class.php";
include_once "..\Model\Class\user.class.php";
include_once "..\Model\Class\participation.class.php";

session_start();
    $p = new Participation();
    $p-> idFormation = $_GET["id"];
    $p-> idUser = $_SESSION["idUser"];
    $p-> rate = $_POST['rate'];
    $res=$p->getPartnUserForm($p->idUser,$p->idFormation)->fetch();
    $p->id=$res['id'];
    $p-> modifrate($p);
    header("location:../Views/user/formationDetails.php?id=".$p-> idFormation);



?>