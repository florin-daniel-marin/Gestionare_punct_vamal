<?php
session_start();
require_once('../Session/session_connect.php');

$cerere_SQL = "SELECT * FROM Tranzistanti";
$rezultat = sqlsrv_query($conn, $cerere_SQL);

if( $rezultat === false) {
    die(print_r(sqlsrv_errors(), true));
}

require_once('display_table.php');
?>
