<?php 
    include_once '..\Model\Class\formation.class.php';
    include_once '..\Model\Class\former.class.php';
    include_once '..\Model\Class\favourit.class.php';
    include_once '..\Model\Class\participation.class.php';
    session_start();
    $e=new Formation();
    $e->id=$_GET["idFormation"];
    $e->SuppFormation($e->id);
    $fav= new Favourit();
    $fav->SuppFavouritFormation($e->id);
    $form=new Former();
    $form->SuppFormerFormation($e->id);
    $p=new Participation();
    $p->SuppParticipationFormation($e->id);
    header("location:search.php");
?>
