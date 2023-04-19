<?php
session_start();
require_once('../Session/session_connect.php');

date_default_timezone_set('Europe/Bucharest');
$dataterminare = date("Y-m-d H:i:s", time());

$cerere_SQL = "UPDATE Logari
SET Data_Terminare='$dataterminare', In_use ='0'
WHERE In_use = 1";
$rezultat = sqlsrv_query($conn, $cerere_SQL);
if ($rezultat === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo 'Am incheiat logarea';
}

require_once('session_destroy.php');
header ("Location: ../Index.php");
?>