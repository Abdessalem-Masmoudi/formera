<?php
session_start();
include_once '..\Model\Class\formation.class.php';
include_once '..\Model\Class\Admin.class.php';
$e = new Formation();
require_once('C:\wamp64\www\formera\Model\Config\config.php');
unset($_SESSION["res"]);
$cnx = new connexion();
$pdo = $cnx->CNX();
$req = "SELECT * FROM User";
if (isset($_POST["First_Name"]) || isset($_POST["Last_Name"]) || isset($_POST["Email"])) {
if ($_POST["First_Name"] || $_POST["Last_Name"] || $_POST["Email"]) {
    $req = $req . " where";
    if ($_POST["First_Name"]){
        $req = $req . " First_Name like '%" . $_POST["First_Name"]."%'";
        if ($_POST["Last_Name"] || $_POST["Email"]) {
            $req = $req ." and ";
        }
    }
    if ($_POST["Last_Name"]) {
        $req = $req . " Last_Name like '%" . $_POST["Last_Name"]."%'";
        if ($_POST["Email"])  {
            $req = $req ." and ";
        }
    }
    if ($_POST["Email"]) {
        $req = $req . " Email like '%". $_POST["Email"]."%'";
    }
}
}
$a=new Admin();
$res = $pdo->query($req) or print_r($pdo->errorInfo());
$result="";
foreach ($res as $row ){
    $result=$result.
    '
        <tr>
            <td>
                <div class="d-flex px-2 py-1">
                    
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">'.$row[1].' '.$row[2] .'</h6>
                        <p class="text-xs text-secondary mb-0">'.$row[3].'</p>
                    </div>
                </div>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0">User</p>
            </td>
            <td class="align-middle text-center text-sm">
                <span class="badge badge-sm bg-gradient-success">'.$row[5].'</span>
            </td>';
            if ($a->RechAdmin($row[3])->fetchColumn(0) == 0) {
                $result=$result. '<td class="align-middle text-center text-sm"><a href ="../../../Controllers/makeAdmin.php?email='.$row[3].'">Make Admin</a></td>';
            }else{
                $result=$result. '<td class="align-middle text-center text-sm">Admin</td>';
            }
            $result=$result. '<td class="align-middle text-center text-sm">
                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    📝
                </a>
                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    ❌
                </a>
            </td>
        </tr>
    ';}
$_SESSION["res"]=$result;

header("location:../Views/admin/pages/tableUsers.php");
