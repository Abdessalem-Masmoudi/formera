<?php
    class Participation{
        public $id;
        public $idUser;
        public $idFormation;
        public $rate;
        public function __construct(){
        }
        public function insertion($c){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cn=new connexion();
            $pdo=$cn->CNX();
            $req="INSERT INTO  Participation (idUser,idFormation,rate) VALUES ('$c->idUser','$c->idFormation',-1)";
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
            $req="SELECT * FROM Participation where idUser=$id";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
        public function RechParticipationFormation($id){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="SELECT * FROM Participation where idFomration=$id";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
        public function verifPartnUserForm($id,$idFormation){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="SELECT count(*) FROM Participation where idUser=$id and idFormation = $idFormation";
            
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            
            return $res;
        }
        public function getPartnUserForm($id,$idFormation){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="SELECT * FROM Participation where idUser=$id and idFormation = $idFormation";
            
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
        function modifrate($e){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="UPDATE Participation set   rate=$e->rate      where     idFormation='$e->idFormation' and  idUser=$e->idUser ";
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
        public function SuppParticipationFormation($id){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="DELETE FROM Participation where idFormation='$id'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
    }
