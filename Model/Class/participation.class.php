<?php
    class Participation{
        public $id;
        public $idUser;
        public $idFormation;
        public function __construct(){
        }
        public function insertion($c){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cn=new connexion();
            $pdo=$cn->CNX();
            $req="INSERT INTO  Participation (idUser,idFormation) VALUES ('$c->idUser','$c->idFormation')";
            $pdo->exec($req) or print_r($pdo->errorInfo());
        }
        public function RechParticipation($id){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="SELECT * FROM Participation where id='$id'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
        public function RechParticipationUser($id){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="SELECT * FROM Participation where idUser='$id'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
        public function SuppParticipation($id){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="DELETE FROM Participation where id='$id'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
        function modifParticipation($e){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="UPDATE Participation set idUser='$e->idUser',idFormation='$e->idFormation' ";
            $pdo->exec($req)  or print_r($pdo->errorInfo());
        }
        function listParticipation()
        {
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();      
            $req="SELECT * FROM Participation";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res; 
        }
    }
?>