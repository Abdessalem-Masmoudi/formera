<?php
    class User{
        public $id;
        public $First_Name;
        public $Last_Name;
        public $Email;
        public $Centre;
        public $Password;
        public function __construct(){
        }
        public function insertion($c){
            include_once ('..\Model\Config\config.php');
            $cn=new connexion();
            $pdo=$cn->CNX();
            $req="INSERT INTO  User (First_Name,Last_Name,Email,Password,Centre) VALUES ('$c->First_Name','$c->Last_Name','$c->Email','$c->Password','$c->Centre')";
            $pdo->exec($req) or print_r($pdo->errorInfo());
        }
        public function RechUser($email,$password){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="SELECT * FROM User where Email='$email'and Password='$password'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
        public function RechUserEmail($email){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="SELECT * FROM User where Email='$email'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
        public function RechUser2($id){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="SELECT * FROM User where id='$id'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
        public function SuppUser($id){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="DELETE FROM User where id='$id'";
            $pdo->exec($req) or print_r($pdo->errorInfo()); 	

        }
        function modifUser($e){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="UPDATE User set First_Name='$e->First_Name',Last_Name='$e->Last_Name',Email='$e->Email',Password='$e->Password',Centre='$e->Centre'  WHERE id='$e->id' ";
            $pdo->exec($req);
        }
        function listUser()
        {
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();      
            $req="SELECT * FROM User";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res; 
        }
        public function loginUser($email,$password){
            require_once('C:\wamp64\www\formera\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="SELECT count(*) FROM User where Password='$password' and Email='$email'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
    }
