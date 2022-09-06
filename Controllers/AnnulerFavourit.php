<?php
include_once "../Model/Class/formation.class.php";
include_once "..\Model\Class\user.class.php";
include_once "..\Model\Class\\favourit.class.php";

session_start();
    $p = new Favourit();
    $p-> idFormation = $_GET["idFormation"];
    $res=$p->getFavouritUserForm($_SESSION["idUser"],$p-> idFormation);
    $row=$res->fetch();
    print_r($res);
    $p-> id = $row[0];
    $p-> SuppFavourit($p-> id);
    header("location:../Views/user/formationDetails.php?id=".$p-> idFormation);

?>