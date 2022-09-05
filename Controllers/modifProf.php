<?php 
if($_POST['Password']==$_POST['rePassword']){
    include_once '..\Model\Class\formateur.class.php';
    include_once '..\Model\Class\user.class.php';
    session_start();
    $email=$_SESSION["email"];
    $password=$_SESSION["password"];
    $e=new Formateur();
    $res=$e->RechFormateur($email,$password);
    $row=$res->fetch();
    $e->id=$row[0];
    $e->First_Name=$_POST['First_Name'];
    $e->Last_Name=$_POST['Last_Name'];
    $e->Email=$_POST['Email'];
    $e->Centre=implode(',',$_POST["Centre"]);
    $e->Password=$_POST['Password'];
    $e->modifFormateur($e);

    $u=new user();
    $res=$u->RechUser($email,$password);
    $row=$res->fetch();
    $u->id=$row[0];
    $u->First_Name=$_POST['First_Name'];
    $u->Last_Name=$_POST['Last_Name'];
    $u->Email=$_POST['Email'];
    $u->Centre=implode(',',$_POST["Centre"]);
    $u->Password=$_POST['Password'];
    $u->modifUser($u);

    $_SESSION['email']=$_POST['Email'];
    $_SESSION['password']=$_POST['Password'];
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Modification Successful !!');
    window.location.href='../Views/user/Profile.php';
    </script>");
}else{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Password doesnt match !!!');
    window.location.href='../Views/user/Profile.php';
    </script>");
}
?>