<?php
    class Formateur{
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
            $req="INSERT INTO  Formateur (First_Name,Last_Name,Email,Password,Centre) VALUES ('$c->First_Name','$c->Last_Name','$c->Email','$c->Password','$c->Centre')";
            $pdo->exec($req) or print_r($pdo->errorInfo());
        }
        public function RechFormateur($email,$password){
            require_once('..\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="SELECT * FROM Formateur where Email='$email'and Password='$password'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
        public function RechFormateur2($id){
            require_once('..\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="SELECT * FROM Formateur where id='$id'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
        public function SuppFormateur($id){
            require_once('..\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="DELETE FROM Formateur where id='$id'";
            $pdo->exec($req) or print_r($pdo->errorInfo()); 	

        }
        function modifFormateur($e){
            require_once('..\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="UPDATE Formateur set First_Name='$e->First_Name',Last_Name='$e->Last_Name',Email='$e->Email',Password='$e->Password',Centre='$e->Centre'  WHERE id='$e->id' ";
            $pdo->exec($req);
        }
        function listFormateur()
        {
            require_once('..\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();      
            $req="SELECT * FROM Formateur";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res; 
        }
        public function loginFormateur($email,$password){
            require_once('..\Model\Config\config.php');
            $cnx=new connexion();
            $pdo=$cnx->CNX();
            $req="SELECT count(*) FROM Formateur where Password='$password' and Email='$email'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
            return $res;
        }
    }
?>