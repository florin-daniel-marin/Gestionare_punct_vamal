<?php 
session_start();
require_once('../../Session/session_connect.php');

function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}

$vpv = validate($_POST['parolaveche']);
    if ($_SESSION['Parola'] === $vpv) {
        if (validate($_POST['parolanoua'] == validate($_POST['parolanoua2']))) {
            $prlv = validate($_POST['parolaveche']);
            $prl = validate($_POST['parolanoua']);

            $sql = "UPDATE Ofiteri SET [Parola]='$prl' WHERE [Parola] = '$prlv'";
            $rezultat = sqlsrv_query($conn, $sql);
            echo 'Parola a fost modificata cu succes!';
        } else {
            echo 'Parola reintrodusa nu se potriveste!';
        }
    } else {
        echo 'Ai gresit parola!';
    }
header("Location: ../Sesiune.php");
?>