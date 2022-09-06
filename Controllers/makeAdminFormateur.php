<?php
    include_once "..\Model\Class\\formateur.class.php";
    include_once "..\Model\Class\Admin.class.php";
    session_start();
    $e=new Formateur();
    $a=new Admin();
    $mail=$_GET["email"];
    echo $mail;
    $res=$e->RechFormateurEmail($mail);
    $row=$res->fetch();
    print_r ($row);
    $a->id=$row[0];
    $a->First_Name=$row[1];
    $a->Last_Name=$row[2];
    $a->Email=$row[3];
    $a->Password=$row[4];
    $a->insertion($a);
   header("location:searchFormateur.php");
?>