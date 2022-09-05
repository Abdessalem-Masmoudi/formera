<?php
 include_once "../Model/Class/formateur.class.php";
 include_once "../Model/Class/user.class.php";
 $type=$_POST["Type"];
 if($type == "Formateur"){
    $c=new Formateur();
    $c->First_Name=$_POST["First_Name"];
    $c->Last_Name=$_POST["Last_Name"];
    $c->Email=$_POST["Email"];
    $c->Centre=implode(',',$_POST["Centre"]);
    $c->Password=$_POST["Password"];
    $rePassword=$_POST["rePassword"];
    if($c->RechFormateur($c->Email,$c->Password)->fetchColumn(0)==0 && $rePassword==$c->Password){
    $c->insertion($c);
    header("location:../index.php");
    }else{if($c->RechFormateur($c->Email,$c->Password)->fetchColumn(0)!=0){
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Mail already existing !!!');
    window.location.href='../View/user/Inscription.php';
    </script>");
    }if($rePassword!=$c->Password){
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Password doesnt match !!!');
    window.location.href='../View/user/Inscription.php';
    </script>");
    }
    }
 }else{
    $c=new User();
    $c->First_Name=$_POST["First_Name"];
    $c->Last_Name=$_POST["Last_Name"];
    $c->Email=$_POST["Email"];
    $c->Centre=implode(',',$_POST["Centre"]);
    $c->Password=$_POST["Password"];
    $rePassword=$_POST["rePassword"];
    if($c->RechUser($c->Email,$c->Password)->fetchColumn(0)==0 && $rePassword==$c->Password){
    $c->insertion($c);
    header("location:../index.php");
    }else{if($c->RechUser($c->Email,$c->Password)->fetchColumn(0)!=0){
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Mail already existing !!!');
    window.location.href='../View/user/Inscription.php';
    </script>");
    }if($rePassword!=$c->Password){
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Password doesnt match !!!');
    window.location.href='../View/user/Inscription.php';
    </script>");
    }
    }
 }
 
?>