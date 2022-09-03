<?php
    class Formation{
        public $id;
        public $Desigation;
        public $Prix;
        public $Caracteristique;
        public $Image;
        public function __construct(){
        }
        public function insertion($c){
            include_once ('..\Model\Config\config.php');
            $cn=new connexion();
            $pdo=$cn->CNX();
            $req="INSERT INTO  Formation (Desigation,Prix,Caracteristique,Image) VALUES ('$c->Desigation','$c->Prix','$c->Caracteristique','$c->Image')";
            $pdo->exec($req) or print_r($pdo->errorInfo());
        }
        public function RechFormation($id){
            require_once('..\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="SELECT * FROM Formation where id='$id'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
        public function SuppFormation($id){
            require_once('..\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="DELETE FROM Formation where id='$id'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
        function modifFormation($e){
            require_once('..\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="UPDATE Formation set Desigation='$e->Desigation',Prix='$e->Prix',Caracteristique='$e->Caracteristique',Image='$e->Image'  WHERE id='$e->id' ";
            $pdo->exec($req)  or print_r($pdo->errorInfo());
        }
        function listFormation()
        {
            require_once('..\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();      
            $req="SELECT * FROM Formation";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res; 
        }
    }
?>