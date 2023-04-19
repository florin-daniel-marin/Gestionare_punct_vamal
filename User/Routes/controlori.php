<?php
session_start();
require_once('../../Session/session_connect.php');

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//val sesiune:
$cadet1 = validate($_POST['cadet1']);
$cadet2 = validate($_POST['cadet2']);
    echo $cadet1;
$_SESSION['cadet1'] = $cadet1;
$_SESSION['cadet2'] = $cadet2;

//valideaza controlorii si ii seteaza in $_SESSION['C1_ID'] si $_SESSION['C2_ID']
require_once('../Select/Select_controlori.php');

//updateaza logarea cu id-urile celor doi cadeti(controlori)
require_once('../Update/Update_log.php');

header("Location: ../Workbench.php"); 
exit();
?>
