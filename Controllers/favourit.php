<?php
include_once "../Model/Class/formation.class.php";
include_once "..\Model\Class\user.class.php";
include_once "../Model/Class/favourit.class.php";

session_start();
    $email=$_SESSION["emailUser"];
    $password=$_SESSION["passwordUser"];
    $e=new User();
    $res=$e->RechUserEmail($email);
    $p = new Favourit();
    $p-> idFormation = $_GET["idFormation"];
    $row=$res->fetch();
    $p-> idUser = $row[0];
    $p-> insertion($p);
    header("location:search.php");



?>