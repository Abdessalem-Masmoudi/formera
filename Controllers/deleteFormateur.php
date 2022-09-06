<?php 
    include_once '..\Model\Class\formation.class.php';
    include_once '..\Model\Class\formateur.class.php';
    include_once '..\Model\Class\former.class.php';
    include_once '..\Model\Class\favourit.class.php';
    include_once '..\Model\Class\participation.class.php';
    include_once '..\Model\Class\user.class.php';
    session_start();
    $f=new Formateur();
    $f->SuppFormateur($_GET['idFormateur']);
    $form=new Former();
    $list=$form->getFormerForm($_GET['idFormateur']);
    $formation=new Formation(); 
    $fav= new Favourit();
    $p=new Participation();
    foreach($list as $row){
        $formation->SuppFormation($row[0]);
        $p->SuppParticipationFormation($row[0]);
        $fav->SuppFavouritFormation($row[0]);
    }
    $form->SuppFormerFormateur($_GET['idFormateur']);
    //header("location:searchFormateur.php");
?>
