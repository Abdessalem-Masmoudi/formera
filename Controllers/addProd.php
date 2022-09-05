<?php 
    include_once '..\Model\Class\formation.class.php';
    $e=new Formation();
    $e->Desigation=$_POST['Desigation'];
    $e->Prix=$_POST['Prix'];
    $e->Caracteristique=$_POST['Caracteristique'];
    $e->Image='images/produit/'.$_POST["Image"];
    $e->insertion($e);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Added Successful !!');
    window.location.href='..\Views\user\formation.php';
    </script>");
?>
