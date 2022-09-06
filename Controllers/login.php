<?php
include_once "../Model/Class/formateur.class.php";
include_once "..\Model\Class\Admin.class.php";
include_once "..\Model\Class\user.class.php";
    $c=new formateur();
    $p=new Admin();
    $u=new user();
    $mail=$_POST["email"];
    $pass=$_POST["password"];
    if($p->loginAdmin($mail,$pass)->fetchColumn(0)!=0){
        session_start();
            $_SESSION["emailAdmin"]=$mail;
            $_SESSION["passwordAdmin"]=$pass;
            header("location:../index.php");
    }elseif($c->loginFormateur($mail,$pass)->fetchColumn(0)!=0){
            session_start();
            $form=$c->RechFormateurEmail($mail)->fetch();
            print_r($form["id"]);
            $_SESSION["email"]=$mail;
            $_SESSION["password"]=$pass;
            $_SESSION["id"]=$form["id"];
            header("location:../index.php");
        
    }else{
        if($u->loginUser($mail,$pass)->fetchColumn(0)!=0){
            $user=$u->RechUserEmail($mail)->fetch();
        session_start();
        $_SESSION["emailUser"]=$mail;
        $_SESSION["idUser"]=$user[0];
        $_SESSION["passwordUser"]=$pass;
        header("location:../index.php");
        
    
}else{
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Verifier vos Donnees !!!');
    window.location.href='../Views/user/Login.php';
    </script>");
    }}
