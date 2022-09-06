<?php
    class Favourit{
        public $id;
        public $idUser;
        public $idFormation;
        public function __construct(){
        }
        public function insertion($c){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cn=new connexion();
            $pdo=$cn->CNX();
            $req="INSERT INTO  Favourit (idUser,idFormation) VALUES ('$c->idUser','$c->idFormation')";
            $pdo->exec($req) or print_r($pdo->errorInfo());
        }
        public function RechFavourit($id){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="SELECT * FROM Favourit where id='$id'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
        public function RechFavouritUser($id){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="SELECT * FROM Favourit where idUser='$id'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
        public function SuppFavourit($id){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="DELETE FROM Favourit where id='$id'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
        function modifFavourit($e){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="UPDATE Favourit set idUser='$e->idUser',idFormation='$e->idFormation' ";
            $pdo->exec($req)  or print_r($pdo->errorInfo());
        }
        function listFavourit()
        {
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();      
            $req="SELECT * FROM Favourit";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res; 
        }
    }
?>